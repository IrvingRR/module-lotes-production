<?php 
$num_lote = $_GET['num_lote'];
// echo json_encode("Numero de lote: $num_lote");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLotes</title>
    <?php require_once("../resources/resources-links.php") ?>
</head>
<body>
    <?php require_once("../components/header.php") ?>

    <div class="modal-container" id="modal-container">
        <form action="" class="form form-modal" id="form-edit-lote">
            <button class="modal-button modal-toggle" >
                <i class="fas fa-times"></i>
            </button>
            <h2 class="form-title"><i class="fas fa-pencil"></i> Editar Lote</h2>
            <div class="form-contentInput">
                <input type="text" name="responsable" class="form-contentInput-input" placeholder="Responsable" autocomplete="off">
                <i class="fas fa-user form-contentInput-icon"></i>
            </div>
            <label class="form-label">Fecha de inicio de producción:</label>
            <div class="form-contentInput">
                <input type="date" name="date_start" class="form-contentInput-input" autocomplete="off">
            </div>
            <label class="form-label">Fecha de terminación de producción:</label>
            <div class="form-contentInput">
                <input type="date" name="date_finish" class="form-contentInput-input" autocomplete="off">
            </div>
            <div class="form-contentInput">
                <select class="form-contentInput-input" id="form-select" name="type_piece">
                    <option value="">Tipo de pieza</option>
                    <option value="Cuadrada">Cuadrada</option>
                </select>
                <i class="fas fa-boxes form-contentInput-icon"></i>
            </div>
            <div class="form-contentInput">
                <input type="number" name="number_pieces" class="form-contentInput-input" placeholder="Número de piezas" autocomplete="off" value="0">
                <i class="fas fa-number form-contentInput-icon"></i>
            </div>
            <div class="form-contentInput">
                <input type="number" name="number_defect_pieces" class="form-contentInput-input" placeholder="Número de piezas defectuosas" value="0" autocomplete="off">
                <i class="fas fa-number form-contentInput-icon"></i>
            </div>
            <div class="form-contentInput">
                <input type="submit" class="form-contentInput-button" id="btn-edit-lote" value="Editar">
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
            <h1 class="container-header-title"><i class="fas fa-box"></i> Vista del lote</h1>
        </header>
        <div class="container flex-center">
            <div class="card-lote view-lote" id="card-lote">
                    <input type="hidden" name="num_lote" id="input-number-lote" value="<?php echo $num_lote?>">
                    <div class="card-lote-image">
                        <img class="card-lote-image-img">
                    </div>
                    <div class="card-lote-information">
                        <p class="card-lote-number"></p>
                        <p class="card-lote-type-piece"></p>
                        <div class="card-lote-content">
                            <strong>Responsable:</strong>
                            <p class="card-lote-responsable"></p>
                        </div>
                        <div class="card-lote-content">
                            <strong>Piezas:</strong>
                            <p class="card-lote-number_pieces"></p>
                        </div>
                        <div class="card-lote-content">
                            <strong>Piezas defectuosas:</strong>
                            <p class="card-lote-number_defect_pieces"></p>
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
                    <div class="lote-actions">
                        <button class="container-header-actions-action lote-action modal-toggle"><i class="fas fa-pencil"></i> Editar</button>
                        <button class="container-header-actions-action lote-action " id="btn-delete-lote"><i class="fas fa-trash-alt"></i> Eliminar</button>
                    </div>
             </div>
             <div class="message success" id="message">
            <p class="message-text">
                ¡Creación exitosa!
            </p>
            <i class="fas fa-check message-icon"></i>
        </div>
        </div>
    </main>
    <?php require_once("../components/footer.php") ?>

    <script src="../js/lotes/lote.js?v=<?php echo time(); ?>"></script>
    <?php require_once("../resources/resources-scripts.php") ?>
</body>
</html>