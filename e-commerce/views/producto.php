<?php
    require("../db/conexion.php");
    require("../controllers/user_controller.php");
    require("../controllers/products_controller.php");
    session_start();
    if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
        $datos = loginUser(array($_SESSION["username"], $_SESSION["password"]), $connection);
        $auth = ($datos != false);
    } else {
        $auth = false;
    }
    $product=getProduct($connection, $_GET["id"]);
    $fila=mysqli_fetch_array($product);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/producto.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title><?php echo $fila["title"]?></title>
</head>
<body>
    <?php require_once("template.php");?>
    <!-- Modal -->
    <dialog id="modal-editar">
            <form action="../controllers/products_controller.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="type" class="form-label">Tipo de Producto</label>
                    <input type="text" id="type" name="type" class="form-input" value="<?php echo $fila["type"]?>" placeholder="Tipo de producto">
                </div>
                <div class="form-group">
                    <label for="title" class="form-label">Titulo</label>
                    <input type="text" id="title" name="title" class="form-input" value="<?php echo $fila["title"]?>" placeholder="Titulo del producto">
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" id="description" cols="30" rows="10" style="resize: none;" value="<?php echo $fila["description"]?>"></textarea>
                </div>
                <div class="form-group">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" id="brand" name="brand" class="form-input" value="<?php echo $fila["brand"]?>" placeholder="Marca del producto">
                </div>
                <div class="form-group">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" id="model" name="model" class="form-input" value="<?php echo $fila["model"]?>" placeholder="Modelo del producto">
                </div>
                <div class="form-group">
                    <label for="price" class="form-label">Precio</label>
                    <input type="text" id="price" name="price" class="form-input" value="<?php echo $fila["price"]?>" placeholder="Precio del producto">
                </div>
                <div class="form-group">
                    <label for="img" class="form-label">Imagen</label>
                    <input type="file" class="form-input" id="img" name="img">
                </div>
                <div class="form-group">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" id="link" name="link" class="form-input" value="<?php echo $fila["link"]?>" placeholder="Link del producto">
                </div>
                <div class="form-group">
                    <button type="submit" name="editProduct" class="form-submit-button">Editar</button>
                </div>
            </form>
            <button id="btn-cerrar-editar">Cerrar</button>
        </dialog>
    <section>
        <div class="mainInfo">
            <div class="product-img-container">
                <div class="thumbnail_container">
                    <img class="thumbnail" src="../storage/img/no_found.png" alt="">
                    <img class="thumbnail" src="../storage/img/no_found.png" alt="">
                    <img class="thumbnail" src="../storage/img/no_found.png" alt="">
                    <img class="thumbnail" src="../storage/img/no_found.png" alt=""> 
                </div>
                <div>
                    <img class="item-img" src="<?php echo $fila["img"]?>" alt="">
                </div>
            </div>
            <div>
                <div class="product-details-container">
                    <div class="container-product-name">
                        <h1 class="product-name"><?php echo $fila["title"] ?></h1>
                        <?php if ($auth && isset($datos["type"]) && $datos["type"] === "administrador"): ?>
                            <div class="container-actions">
                                <button id="btn-modal-editar"><i class="bi bi-pencil-square"></i></button>
                                <form action="../controllers/products_controller.php" method="post">
                                    <input name="id" type="text" hidden value="<?php echo $fila["id"]?>">
                                    <button type="submit" name="deleteProduct"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div style="color: black;margin-block: 10px;">
                        <span><?php echo $fila["type"] ?></span>
                        <span>></span>
                        <span><?php echo $fila["brand"] ?></span>
                        <span>></span>
                        <span style="color: #e51b27;"><?php echo $fila["model"] ?></span>
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
                </div>
                <div>
                    <a class="btn-buy" href="http://mpago.la/1XuC2va">COMPRAR</a>
                </div>
            </div>
        </div>
        <div>
            <h1 style="color:#f00">Acerca del Producto</h1>
            <p style="color:black"><?php echo $fila["description"] ?></p>
        </div>
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

