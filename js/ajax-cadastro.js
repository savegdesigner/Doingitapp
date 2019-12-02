// Caching form
const register_form = document.querySelector('#register-form')

register_form.addEventListener('submit', (e) => {
    e.preventDefault()

    // Caching user data
    const user_input = document.querySelector('#user-input').value
    const email_input = document.querySelector('#email-input').value
    const password_input = document.querySelector('#password-input').value
    const passwordr_input = document.querySelector('#passwordr-input').value

    var data = {
        "username": user_input,
        "email": email_input,
        "password": password_input,
        "passwordr": passwordr_input
    }

    userdata = JSON.stringify(data)

    var xmlhttp = new XMLHttpRequest()

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 1){
            document.getElementById('resultado').innerHTML = 'Avaliando dados...'
    
        }
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
        
            var response = JSON.parse(xmlhttp.response)
    
            var resultado = document.getElementById('resultado')
    
            resultado.innerHTML = response;
    
        }
    }

    xmlhttp.open('POST', 'servidor/cadastro.php', true)
    xmlhttp.setRequestHeader("Content-Type", "application/json")
    xmlhttp.send(userdata)

})