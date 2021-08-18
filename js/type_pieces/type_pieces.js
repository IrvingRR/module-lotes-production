// Variables
let $form = document.getElementById('form-type-pieces-create');
let $messageModule = document.getElementById('message-module');

// Functions
const create = async () => {

    let formData = new FormData($form);

    try {
        let request = await fetch('../php/type_pieces/create.php', {
            method: 'POST',
            body: formData
        });
        let json = await request.json();

        $messageModal.classList.add('active');
        $messageModal.textContent = json.message;

        if (json.status === "error") {
            $messageModal.classList.remove('success');
            $messageModal.classList.add('error');
        }

        if (json.status === "success") {
            $messageModal.classList.remove('error');
            $messageModal.classList.add('success');
        }

        setTimeout(() => {
            $messageModal.classList.remove('active');
            // window.location.reload();
        }, 2000);

    }catch(error) {
        console.log(error);
    }
}

// Executions
document.addEventListener('click', e => {
    e.preventDefault();

    if (e.target.matches('#btn-create-type')) {
        create();
    }
});