<?php 
    require("../db/conexion.php");
    require("../env.php");

    if (isset($_POST["deleteProduct"])) {
        deleteProduct($connection, $_POST["id"]);
        header('Location: ../views/productos.php');
    } 
    if (isset($_POST["newProduct"])) {     

        if(isset($_FILES["img"])) {
    
            $from=$_FILES["img"]["tmp_name"];
            
            $name=basename($_FILES["img"]["name"]);

            $to=$_SERVER["DOCUMENT_ROOT"]."/storage/img/".time().$name;

            move_uploaded_file($from, $to);

        } else {
            header('Location: ../views/productos.php');
        }
        $data=validateProduct($_POST);
      
        $to=$root_url."/storage/img/".basename($to);
        $data["img"]=$to;
      
        newProduct($connection, $data);
        header('Location: ../views/productos.php');
        exit();
    }
 
    if (isset($_POST["editProduct"])) {          

        $to=NULL;

        if($_FILES["img"]["name"] !="") {

            $from=$_FILES["img"]["tmp_name"];
            
            $name=basename($_FILES["img"]["name"]);

            $to=$_SERVER["DOCUMENT_ROOT"]."/storage/img/".time().$name;
            
            move_uploaded_file($from, $to);

            $to=$root_url."/storage/img/".basename($to);
            
        } else {
            header('Location: ../views/productos.php');
        }

        $data=validateProduct($_POST);

        $data["img"]=$to;
        $data["id"]=$_POST["id"];
        
        editProduct($connection, $data);
        header('Location: ../views/productos.php');
    }

    function newProduct($connection, $data) {
        $newProduct = "INSERT INTO productos (
            type, title, description, brand, model, img, price, link
            )
            VALUES (
                '".$data["type"]."',
                '".$data["title"]."',
                '".$data["description"]."',
                '".$data["brand"]."', 
                '".$data["model"]."', 
                '".$data["img"]."',
                '".$data["price"]."',
                '".$data["link"]."'
                )";

        mysqli_query($connection,$newProduct); 
    }
    function editProduct($connection,$data){
        if ($data["img"]==NULL) {
            $product_updated=" UPDATE productos
                        SET type = '".$data["type"]."',
                            title = '".$data["title"]."',
                            description = '".$data["description"]."',
                            brand = '".$data["brand"]."',
                            model = '".$data["model"]."',
                            price = '".$data["price"]."',
                            link = '".$data["link"]."' 
                        WHERE id = ".$data["id"]."";
        } else {
            $product_updated=" UPDATE productos
                        SET type = '".$data["type"]."',
                            title = '".$data["title"]."',
                            description = '".$data["description"]."',
                            brand = '".$data["brand"]."',
                            model = '".$data["model"]."',
                            price = '".$data["price"]."',
                            img = '".$data["img"]."',
                            link = '".$data["link"]."' 
                        WHERE id = ".$data["id"]."";
        }

        mysqli_query($connection,$product_updated);
        header('Location: ../views/coffee.php');
    }
    function deleteProduct($connection, $product_id) {
        $consulta="DELETE FROM productos WHERE id=".$product_id;
        mysqli_query($connection,$consulta);
        return ;
    }
    function validateProduct($form) {
        $data["type"] = $form["type"];
        $data["title"] = $form["title"];
        $data["description"] = $form["description"];
        $data["brand"] = $form["brand"];
        $data["model"] = $form["model"];
        $data["price"]= $form["price"];
        $data["link"]= $form["link"];

        return $data;
    }
    function getProduct($connection, $product_id) {
        $consulta="SELECT * FROM productos WHERE id=".$product_id;

        $datos= mysqli_query($connection,$consulta);

        return $datos;
    }
    function productMic($connection){
        $consulta = "SELECT * FROM productos WHERE type='Microfono'";
        $resultado = mysqli_query($connection, $consulta);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<div class='product-card'>";
                echo "<div class='product-image'>";
                echo "<span class='discount-tag'>" . $fila['discount'] . "% off</span>";
                echo "<a href='producto.php?id=" . $fila["id"] . "'><img src='" . $fila['img'] . "' class='product-thumb' alt=''></a>";
                echo "</div>";
                echo "<div class='product-info'>";
                echo "<h2 class='product-brand'>" . $fila['brand'] . "</h2>";
                echo "<p class='product-short-description'>" . $fila['model'] . "</p>";
                echo "<span class='price'>" . $fila['price'] . "</span><span class='actual-price'>$40</span>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No se encontraron resultados.";
        }
        mysqli_free_result($resultado);
    }
    function productMouse($connection){
        $consulta = "SELECT * FROM productos WHERE type='Mouse'";
        $resultado = mysqli_query($connection, $consulta);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<div class='product-card'>";
                echo "<div class='product-image'>";
                echo "<span class='discount-tag'>" . $fila['discount'] . "% off</span>";
                echo "<a href='producto.php?id=" . $fila["id"] . "'><img src='" . $fila['img'] . "' class='product-thumb' alt=''></a>";
                echo "</div>";
                echo "<div class='product-info'>";
                echo "<h2 class='product-brand'>" . $fila['brand'] . "</h2>";
                echo "<p class='product-short-description'>" . $fila['model'] . "</p>";
                echo "<span class='price'>" . $fila['price'] . "</span><span class='actual-price'>$40</span>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No se encontraron resultados.";
        }
        mysqli_free_result($resultado);
    }
    function productList($connection){
        $consulta = "SELECT * FROM productos";
        $resultado = mysqli_query($connection, $consulta);
        return $resultado;
    }
?>

 