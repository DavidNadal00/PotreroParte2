<?php
    require("../db/conexion.php");
    require("../controllers/user_controller.php");
    require_once("../controllers/products_controller.php");
    session_start();
    if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
        $datos = loginUser(array($_SESSION["username"], $_SESSION["password"]), $connection);
        $auth = ($datos != false);
    } else {
        $auth = false;
    }
?>
<!DOCTYPE html>
<html lang="es-ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/producto.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Productos</title>
</head>
<body>
    <?php
        require_once("../views/template.php");
    ?>
    <section class="list-products">
        <?php
            $resultado = productList($connection);

            if (mysqli_num_rows($resultado) > 0) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
        ?>
        <single-product>
                <div>
                    <a href="producto.php?id=<?php echo($fila["id"]);?>"><img class="img-producto" src="<?php echo $fila['img'];?>" alt=""></a>
                </div>
                <div class="contenido-principal">
                    <div class="container-product-name">
                        <a class="product-name" href="producto.php?id=<?php echo($fila["id"]);?>"><?php echo $fila['title'];?></a>
                    </div>
                    <content-product>
                        <div class="container-tags">
                            <span class="tag"><?php echo $fila['type'];?></span>
                            <span class="tag"><?php echo $fila['brand'];?></span>
                        </div>
                        <?php if (!empty($fila['discount'])) : ?>
                            <div class="Sale-Price-Container">
                                <div>
                                    <span class="Price-Sale-Discount">-%<?php echo $fila['discount']; ?></span>
                                </div>
                                <div class="price-container">
                                    <?php $price = $fila['price'] * (1 - $fila['discount'] / 100); ?>
                                    <?php $price_formatted = number_format($fila['price'], 0, ',', '.'); ?>
                                    <span class="sale-preview"><?php echo "$" . $price_formatted; ?></span>
                                    <?php $discounted_price_formatted = number_format($price, 0, ',', '.'); ?>
                                    <span class="discount-preview"><?php echo "$" . $discounted_price_formatted; ?></span>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="price-container">
                                <?php $price_formatted = number_format($fila['price'], 0, ',', '.'); ?>
                                <span class="discount-preview"><?php echo "$" . $price_formatted; ?></span>
                            </div>
                        <?php endif; ?>
                    </content-product>  
                </div>
        </single-product>
        <?php 
                }
            } else {
                echo "No se encontraron resultados.";
            }
            mysqli_free_result($resultado);
        ?>
    </section>
    <script src="../public/js/modal.js"></script>
    <footer>
        <nav>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-tiktok"></i></a>
        </nav>
        <p style="margin-block:5px;">Todos los derechos reservados &copy; 2023 Empresa de Hardware</p>
    </footer>
</body>
</html>