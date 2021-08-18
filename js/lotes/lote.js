// variables
const $cardLote = document.getElementById('card-lote');
const $numberLote = document.getElementById('input-number-lote').value;
const $formEdit = document.getElementById('form-edit-lote');
const $select = document.getElementById('form-select');
const $formCreateLote = document.getElementById('form-create-lote');

const $message = document.getElementById('message');
const $messageModal = document.getElementById('message-modal');

// Functions
function formatDate(date){
  return date.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
}

const get_type_pieces = async () => {
    try {
        let request = await fetch('../php/type_pieces/get_all.php');
        let json = await request.json();
        let $options = `<option class="option" value="">Tipo de pieza</option>`;

        if (json.status === "error") {
            $options = `<option class="option" value="">No hay tipos de piezas disponibles</option>`;
            $select.innerHTML = $options;
            return;
        }
        
        json.forEach(el => {
            $options += `<option class="option" value="${el.name}">${el.name}</option>`;
            $select.innerHTML = $options;
        });

    } catch (error) {
        console.log(error);
    }
}

const get_lote = async () => {
    try {
         let request = await fetch(`../php/lotes/get_lote.php?number_lote=${$numberLote}`);
         let json = await request.json();
         console.log(json);
         $cardLote.querySelector('.card-lote-image-img').setAttribute('src', '../images/box.png');
         $cardLote.querySelector('.card-lote-image-img').setAttribute('alt', json[0].number_lote);
         $cardLote.querySelector('.card-lote-number').textContent = json[0].number_lote;
         $cardLote.querySelector('.card-lote-type-piece').textContent = json[0].type_pieces;
         $cardLote.querySelector('.card-lote-responsable').textContent = json[0].responsable;
         $cardLote.querySelector('.card-lote-number_pieces').textContent = json[0].number_pieces;
         $cardLote.querySelector('.card-lote-number_defect_pieces').textContent = json[0].number_defect_pieces;
         $cardLote.querySelector('.card-lote-date-start').textContent = formatDate(json[0].date_start_production);
         $cardLote.querySelector('.card-lote-date-finish').textContent = formatDate(json[0].date_finish_production);

        $formEdit.responsable.value = json[0].responsable;
        $formEdit.date_start.value = json[0].date_start_production;
        $formEdit.date_finish.value = json[0].date_start_production;
        $formEdit.type_piece.value = json[0].type_pieces;
        $formEdit.number_pieces.value = json[0].number_pieces;
        $formEdit.number_defect_pieces.value = json[0].number_defect_pieces;
        
    } catch (error) {
        console.log(error);
    }
}

const update_lote = async () => {
    const formData = new FormData($formEdit);
    try {
        let request = await fetch(`../php/lotes/edit.php?number_lote=${$numberLote}`, {
            method: "POST",
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
        
        $formEdit.reset();
        get_lote();

        setTimeout(() => {
            $messageModal.classList.remove('active');
        }, 2000);

    }catch(error) {
        console.log(error);
    }
}

const create_lote = async () => {
    const formData = new FormData($formCreateLote);
    try {
        let request = await fetch('../php/lotes/create.php', {
            method: "POST",
            body: formData
        });
        let json = await request.json();

        $message.classList.add('active');
        $message.textContent = json.message;

        if (json.status === "error") {
            $message.classList.remove('success');
            $message.classList.add('error');
            
            setTimeout(() => {
            $message.classList.remove('active');
            }, 2000);
            
            return;
        }

        if (json.status === "success") {
            $message.classList.remove('error');
            $message.classList.add('success');
        }
        
        $formCreateLote.reset();
        

        setTimeout(() => {
            $message.classList.remove('active');
        }, 2000);

    }catch(error) {
        console.log(error);
    }
}

const delete_lote = async () => {
    let isDelete = confirm(`¿Estás seguro de querer eliminar el lote con el número ${$numberLote}?`);
    if(isDelete) {
        let request = await fetch(`../php/lotes/delete.php?number_lote=${$numberLote}`);
        let json = await request.json();
        console.log(json);

        $message.classList.add('active');
        $message.textContent = json.message;

        if (json.status === "error") {
            $message.classList.remove('success');
            $message.classList.add('error');
        }

        if (json.status === "success") {
            $message.classList.remove('error');
            $message.classList.add('success');
        }
        
        setTimeout(() => {
            $message.classList.remove('active');
            window.location = '../admin/home.php';
        }, 1000);
    }
}

// Executions
document.addEventListener('DOMContentLoaded', e => {
    get_type_pieces();
    get_lote();
});


document.addEventListener('click', e => {
    e.preventDefault();

    if(e.target.matches('#btn-edit-lote')) {
        update_lote();
    }

    if (e.target.matches('#btn-crete-lote')) {
        create_lote();
    }

    if(e.target.matches('#btn-delete-lote')) {
        delete_lote();
    }
});