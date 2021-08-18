// Variables
const $select = document.getElementById("form-select");
const $cards = document.getElementById('cards');
const $templateLote = document.getElementById('template-lote').content;
const $fragmentLote = document.createDocumentFragment();

const $formCreateTypePieces = document.getElementById('form-type-pieces-create');
// const $formCreateLote = document.getElementById('form-create-lote');
const $formSearchLote = document.getElementById('form-search');

const $message = document.getElementById('message');
const $messageModal = document.getElementById('message-modal');

// Functions
const create_type_pieces = async () => {
    let formData = new FormData($formCreateTypePieces);

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

        $formCreateTypePieces.reset();

        setTimeout(() => {
            $messageModal.classList.remove('active');
            get_type_pieces();
        }, 3000);

    }catch(error) {
        console.log(error);
    }
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

function formatDate(date){
  return date.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
}

const redirect = (lote) => {
    window.location = `../admin/lote.php?num_lote=${lote}`;
}

const show_lotes = (data) => {
        $cards.innerHTML = "";
        data.forEach(lote => {
            $templateLote.querySelector('.card-lote').setAttribute('onclick', `redirect(${lote.number_lote})`);

            $templateLote.querySelector('.card-lote-image-img').setAttribute('src', '../images/box.png');
            $templateLote.querySelector('.card-lote-image-img').setAttribute('alt', `${lote.number_lote}`);
            $templateLote.querySelector('.card-lote-number').textContent = lote.number_lote;
            $templateLote.querySelector('.card-lote-type-piece').textContent = lote.type_pieces;
            $templateLote.querySelector('.card-lote-number_pieces').textContent = lote.number_pieces;
            $templateLote.querySelector('.card-lote-date-start').textContent = formatDate(lote.date_start_production);
            $templateLote.querySelector('.card-lote-date-finish').textContent = formatDate(lote.date_finish_production);

            let $clone = $templateLote.cloneNode(true);
            $fragmentLote.appendChild($clone);
        });

        $cards.appendChild($fragmentLote);
 
}

const get_all_lotes = async () => {
    try {
        let request = await fetch('../php/lotes/get_all.php');
        let json = await request.json();

        show_lotes(json);

    }catch (error) {
        console.log(error);
    }
}

const search_lote = async () => {
    const formData = new FormData($formSearchLote);

    try {
        let request = await fetch('../php/lotes/search.php', {
            method: "POST",
            body: formData
        });

        let json = await request.json();
        if(json.status === "error") {
            $message.classList.add('active');
            $message.textContent = json.message;

            $message.classList.remove('success');
            $message.classList.add('error');

            setTimeout(() => {
                    $message.classList.remove('active');
            }, 2000);
            get_all_lotes();
            return
        }

        show_lotes(json);

        $formSearchLote.reset();

    }catch (error) {
        console.log(error);
    }
}

const filter_lote = async () => {
    const formData = new FormData($formSearchLote);

    try {
        let request = await fetch('../php/lotes/filter.php', {
            method: "POST",
            body: formData
        });

        let json = await request.json();
        if(json.status === "error") {
            $message.classList.add('active');
            $message.textContent = json.message;

            $message.classList.remove('success');
            $message.classList.add('error');

            setTimeout(() => {
                    $message.classList.remove('active');
            }, 2000);
            get_all_lotes();
            return
        }

        show_lotes(json);

        $formSearchLote.reset();

    }catch (error) {
        console.log(error);
    }
}


// Executions
document.addEventListener('DOMContentLoaded', e => {
    get_all_lotes();
    get_type_pieces();
});

document.addEventListener('click', e => {
    e.preventDefault();

    if (e.target.matches('#btn-create-type')) {
        create_type_pieces();
    }

    // if (e.target.matches('#btn-crete-lote')) {
    //     create_lote();
    // }

    if (e.target.matches('#btn-search-lote')) {
        search_lote();
    }
});

document.addEventListener('change', e => {
    e.preventDefault();

    if(e.target.matches('#form-select')) {
        filter_lote();
    }
})