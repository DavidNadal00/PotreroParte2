<header>
        <div class="nav-container">
            <div class="nav-left-area"><img class="nav-logo" src="../public/img/logo_e-commerce_red-white.png" alt=""></div>
            <div class="nav-center-area">
                <form class="form-search" action="">
                    <input class="nav-search-input" type="text" placeholder="Buscar productos">
                    <button class="" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="nav-right-area">
                <?php if($auth==false){?>
                <a href="../views/login.php">Iniciar Sesión</a>
                <a href="../views/sign_in.php">Registrarse</a>
                <?php }else{?>
                    <a href="#"><span><?php echo $_SESSION["username"]?></span></a>
                    <a href="../controllers/logout_controller.php"><span>Cerrar Sesión</span></a>
                <?php }?>
            </div>
        </div>
    </header>
    <nav-menu>
        <a class="a-nav-menu" href="../views/index.php">INICIO</a>
        <a class="a-nav-menu" href="">QUIENES SOMOS</a>
        <a class="a-nav-menu" href="../views/productos.php">PRODUCTOS</a>
        <a class="a-nav-menu" href="">AYUDA</a>
    </nav-menu>
    <?php if ($auth && isset($datos["type"]) && $datos["type"] === "administrador"): ?>
        <button id="btn-modal-nuevo">Nuevo</button>
    <?php endif; ?>
    <!-- Modal -->
    <dialog id="modal-nuevo">
            <form action="../controllers/products_controller.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="type" class="form-label">Tipo de Producto</label>
                    <input type="text" id="type" name="type" class="form-input" placeholder="Tipo de producto">
                </div>
                <div class="form-group">
                    <label for="title" class="form-label">Titulo</label>
                    <input type="text" id="title" name="title" class="form-input" placeholder="Titulo del producto">
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Descripción del producto</label>
                    <textarea name="description" id="description" cols="30" rows="10" style="resize: none;"></textarea>
                </div>
                <div class="form-group">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" id="brand" name="brand" class="form-input" placeholder="Marca del producto">
                </div>
                <div class="form-group">
                    <label for="modelo" class="form-label">Modelo</label>
                    <input type="text" id="model" name="model" class="form-input" placeholder="Modelo del producto">
                </div>
                <div class="form-group">
                    <label for="price" class="form-label">Precio</label>
                    <input type="text" id="price" name="price" class="form-input" placeholder="Precio del producto">
                </div>
                <div class="form-group">
                    <label for="img" class="form-label">Imagen</label>
                    <input type="file" class="form-input" id="img" name="img">
                </div>
                <div class="form-group">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" id="link" name="link" class="form-input" placeholder="Link del producto">
                </div>
                <div class="form-group">
                    <button type="submit" name="newProduct" class="form-submit-button">Cargar</button>
                </div>
            </form>
            <button id="btn-cerrar-nuevo">Cerrar</button>
        </dialog>