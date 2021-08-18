// Variables
const $form = document.getElementById('form');
const $message = document.getElementById('message');

// Functions
const sigIn = async () => {
    const formData = new FormData($form);
    try {
        let request = await fetch('./php/login.php', {
            method: 'POST',
            // header: 'Content-type: application/json',
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
            window.location = './admin/home.php';
        }

        setTimeout(() => {
            $message.classList.remove('active');
        }, 3000);

    } catch (error) {
        console.log(error);
    }
}

// Executions
document.addEventListener('submit', e => {
    e.preventDefault();
    sigIn();
})