// Variables
const $table = document.getElementById('table-admins');
const $templateTable = document.getElementById('template-table').content;
const $fragment = document.createDocumentFragment();
const $formCreate = document.getElementById('form-create-admin');
const $messageModal = document.getElementById('message-modal');

// Functions
const show_users = (data) => {
    console.log(data);
    let statusUser = "";
    let roleUser = "";

    data.forEach(user => {

        if(user.status == 1) {
            statusUser = "Activo";
        }else {
            statusUser = "Baneado";
        }

        if(user.role == 1) {
            roleUser = "Administrador";
        }else {
            roleUser = "Usuario común";
        }

        $templateTable.querySelector('.id').textContent = user.id;
        $templateTable.querySelector('.name').textContent = user.name;
        $templateTable.querySelector('.lastname').textContent = user.lastname;
        $templateTable.querySelector('.status').textContent = statusUser;
        $templateTable.querySelector('.role').textContent = roleUser;

        $templateTable.querySelector('.action-edit').dataset.id = user.id;
        $templateTable.querySelector('.action-delete').dataset.id = user.id;

        let $clone = $templateTable.cloneNode(true);
        $fragment.appendChild($clone);
    });

    $table.querySelector('tbody').appendChild($fragment);
} 

const get_all = async () => {
    try {
        let request = await fetch('../php/users/get_all.php');
        let json = await request.json();

        show_users(json);
    } catch (error) {
        console.log(error);
    }
}

const create_admin = async () => {
    const formData = new FormData($formCreate);
    try {
        let request = await fetch('../php/users/create.php', {
            method: "POST",
            body: formData
        });
        let json = await request.json();

        $messageModal.classList.add('active');
        $messageModal.textContent = json.message;

        if (json.status === "error") {
            $message.classList.remove('success');
            $message.classList.add('error');
        }

        if (json.status === "success") {
            $messageModal.classList.remove('error');
            $messageModal.classList.add('success');
        }
        
        $formCreate.reset();

        setTimeout(() => {
            $messageModal.classList.remove('active');
        }, 2000);

    }catch(error) {
        console.log(error);
    }
}

// Executions
document.addEventListener('DOMContentLoaded', e => {
    get_all();
});

document.addEventListener('click', e => {
    e.preventDefault();

    if(e.target.matches('#btn-create-admin')) {
        create_admin();
    }
})