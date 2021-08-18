<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLotes - Administradores</title>
    <?php require_once("../resources/resources-links.php") ?>
</head>
<body>
    <?php require_once("../components/header.php") ?>

    <div class="modal-container" id="modal-container">
        <form action="" class="form form-modal" id="form-create-admin">
            <button class="modal-button modal-toggle" >
                <i class="fas fa-times"></i>
            </button>
            <h2 class="form-title"><i class="fas fa-user"></i> Nuevo administrador</h2>
            <div class="form-contentInput">
                <input type="text" name="name" class="form-contentInput-input" placeholder="Nombre" autocomplete="off">
                <i class="fas fa-keyboard form-contentInput-icon"></i>
            </div>
            <div class="form-contentInput">
                <input type="text" name="lastname" class="form-contentInput-input" placeholder="Apellido" autocomplete="off">
                <i class="fas fa-keyboard form-contentInput-icon"></i>
            </div>
            <div class="form-contentInput">
                <input type="number" name="phone" class="form-contentInput-input" placeholder="Teléfono" autocomplete="off">
                <i class="fas fa-keyboard form-contentInput-icon"></i>
            </div>
            <div class="form-contentInput">
                <input type="email" name="email" class="form-contentInput-input" placeholder="Correo electrónico" autocomplete="off">
                <i class="fas fa-keyboard form-contentInput-icon"></i>
            </div>
            <div class="form-contentInput">
                <input type="password" name="password" class="form-contentInput-input" placeholder="Contraseña" autocomplete="off">
                <i class="fas fa-lock form-contentInput-icon"></i>
            </div>
            <div class="form-contentInput form-contentArea">
                <textarea class="form-contentInput-input form-contentTextArea-textArea" name="address" placeholder="Dirección"></textarea>
            </div>
            <div class="form-contentInput">
                <input type="submit" class="form-contentInput-button" id="btn-create-admin" value="Crear">
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
            <h1 class="container-header-title"><i class="fas fa-users"></i> Administradores</h1>
            <div class="container-header-actions">
                <!-- <button class="container-header-actions-action action-link">
                    <i class="fas fa-plus"></i>
                    Agregar nuevo administrador
                </button> -->
                <button class="container-header-actions-action modal-toggle">
                    <i class="fas fa-plus"></i>
                    Nuevo administrador
                </button>
            </div>
        </header>
        <!-- <form class="form-search" id="form-search">
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
                    <option value="Cuadrada">Cuadrada</option>
                </select>
                <i class="fas fa-boxes form-contentInput-icon"></i>
            </div>
        </form> -->
        <div class="message success" id="message">
                <p class="message-text">
                    ¡Creación exitosa!
                </p>
                <i class="fas fa-check message-icon"></i>
        </div>
        <table id="table-admins" class="table">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Rol</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <template id="template-table">
                    <tr>
                        <td class="id">ID</td>
                        <td class="name">Nombre</td>
                        <td class="lastname">Apellido</td>
                        <td class="phone">Teléfono</td>
                        <td class="email">Email</td>
                        <td class="status">Estado</td>
                        <td class="role">Rol</td>
                        <td class="actions">
                            <button class="container-header-actions-action table-action action-edit">
                                <i class="fas fa-pencil"></i>
                                Editar
                            </button>
                            <button class="container-header-actions-action table-action action-delete">
                                <i class="fas fa-trash-alt"></i>
                                eliminar
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </main>
    <script src="../js/users/users.js?v=<?php echo time(); ?>"></script>
    <?php require_once("../resources/resources-scripts.php") ?>
</body>
</html>