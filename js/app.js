// Variables
const $menu = document.getElementById('menu');
const $modal = document.getElementById('modal-container');

// Functions

// Executions
document.addEventListener('click', e => {
    e.preventDefault();
    
    if (e.target.matches('.menu-user-actions-toogle') || e.target.matches('.menu-user-actions-toogle *')) {
        $menu.querySelector('.menu-user-actions').classList.toggle('active');
    }

    if (e.target.matches('.modal-toggle') || e.target.matches('.modal-toggle *')) {
        $modal.classList.toggle('active');
    }


    if (e.target.matches('.action-link') || e.target.matches('.action-link *')) {
        window.location = "../admin/create_lote.php";
    }

    if (e.target.matches('.menu-logo') || e.target.matches('.menu-logo *')) {
        window.location = "../admin/home.php";
    }
    
    if (e.target.matches('.action-link-admins') || e.target.matches('.action-link-admins *')) {
        window.location = "../admin/users.php";
    }

});