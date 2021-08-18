<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLotes - Producción de lotes</title>
    <?php require_once("../resources/resources-links.php") ?>
</head>
<body>
    <?php require_once("../components/header.php") ?>

    <div class="modal-container" id="modal-container">
        <form action="" class="form form-modal" id="form-type-pieces-create">
            <button class="modal-button modal-toggle" >
                <i class="fas fa-times"></i>
            </button> 
            <h2 class="form-title"><i class="fas fa-boxes"></i> Nuevo tipo de pieza</h2>
            <div class="form-contentInput">
                <input type="text" name="type_piece" class="form-contentInput-input" placeholder="Nombre del tipo de pieza" autocomplete="off">
                <i class="fas fa-keyboard form-contentInput-icon"></i>
            </div>
            <div class="form-contentInput">
                <input type="submit" class="form-contentInput-button" id="btn-create-type" value="Crear">
            </div>
        </form>
        <div class="message success message-modal" id="message-modal">
            <p class="message-text">
                ¡Creación exitosa!
            </p>
            <i class="fas fa-check message-icon"></i>
        </div>
    </div>

    <main class="container">
        <header class="container-header">
            <h1 class="container-header-title"><i class="fas fa-box"></i> Lotes</h1>
            <div class="container-header-actions">
                <button class="container-header-actions-action action-link">
                    <i class="fas fa-plus"></i>
                    Agregar nuevo lote
                </button>
                <button class="container-header-actions-action modal-toggle">
                    <i class="fas fa-plus"></i>
                    Nueva pieza
                </button>
            </div>
        </header>
        <form class="form-search" id="form-search">
            <div class="form-contentInput">
                <input type="text" name="search" class="form-contentInput-input" placeholder="Número lote o responsable" autocomplete="off">
                <i class="fas fa-search form-contentInput-icon"></i>
            </div>
            <div class="form-contentInput">
                <input type="submit" class="form-contentInput-button" id="btn-search-lote" value="Buscar">
            </div>
            <div class="form-contentInput">
            <select class="form-contentInput-input" id="form-select" name="filter">
                    <option value="">Tipo de pieza</option>
                    <!-- <option value="Cuadrada">Cuadrada</option> -->
                </select>
                <i class="fas fa-boxes form-contentInput-icon"></i>
            </div>
        </form>
        <div class="message success" id="message">
                <p class="message-text">
                    ¡Creación exitosa!
                </p>
                <i class="fas fa-check message-icon"></i>
            </div>
        <div class="cards" id="cards">
            <template id="template-lote">
            <a class="card-lote" id="card-lote">
                    <input type="hidden" name="num_lote" id="input-number-lote" value="<?php echo $num_lote?>">
                    <div class="card-lote-image">
                        <img class="card-lote-image-img">
                    </div>
                    <div class="card-lote-information">
                        <p class="card-lote-number"></p>
                        <p class="card-lote-type-piece"></p>
                        <!-- <div class="card-lote-content">
                            <strong>Responsable:</strong>
                            <p class="card-lote-responsable"></p>
                        </div> -->
                        <div class="card-lote-content">
                            <strong>Piezas:</strong>
                            <p class="card-lote-number_pieces"></p>
                        </div>
                        <div class="card-lote-content">
                            <strong>Inicio:</strong>
                            <p class="card-lote-date-start"></p>
                        </div>
                        <div class="card-lote-content">
                            <strong>Terminación:</strong>
                            <p class="card-lote-date-finish"></p>
                        </div>
                    </div>
                   
             </a>
            </template>
        </div>
    </main>
    <?php require_once("../components/footer.php") ?>

    <script src="../js/lotes/lotes.js?v=<?php echo time(); ?>"></script>
    <!-- <script src="../js/type_pieces/type_pieces.js?v=<?php echo time(); ?>"></script> -->
    <?php require_once("../resources/resources-scripts.php") ?>
</body>
</html>