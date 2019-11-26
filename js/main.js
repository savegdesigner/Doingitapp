// Show / Hide password

const eye_img = document.querySelector('#eye');
const password_input_registro = document.querySelector('#password-input');

// Função checando type do input (trocando type e imagem)
function passCheck(){
    if(password_input_registro.type == 'password'){
        password_input_registro.type = 'text';
        eye_img.src = 'imgs/icons/eye-icon-show.svg'
    }else{
        password_input_registro.type = 'password';
        eye_img.src = 'imgs/icons/eye-icon-hide.svg'
    }
}

// Evento de clique no Elemento executando passCheck
eye_img.addEventListener('click', () => {
    passCheck();
})