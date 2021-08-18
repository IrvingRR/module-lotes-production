<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLotes - Nuevo lote</title>
    <?php require_once("../resources/resources-links.php") ?>
</head>
<body>
    <?php require_once("../components/header.php") ?>
    <main class="container-form">
    <form action="" class="form" id="form-create-lote">
            <input type="hidden" name="num_lote" id="input-number-lote" value="<?php echo $num_lote?>">

            <h2 class="form-title"><i class="fas fa-box"></i> Nuevo Lote</h2>
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
                    <!-- <option value="Cuadrada">Cuadrada</option> -->
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
                <input type="submit" class="form-contentInput-button" id="btn-crete-lote" value="Crear">
            </div>
        </form>
        <div class="message success" id="message">
            <p class="message-text">
                ¡Creación exitosa!
            </p>
            <i class="fas fa-check message-icon"></i>
        </div>
    </main>
    <?php require_once("../components/footer.php") ?>

    <?php require_once("../resources/resources-scripts.php") ?>
    <script src="../js/lotes/lote.js?v=<?php echo time(); ?>"></script>
</body>
</html>