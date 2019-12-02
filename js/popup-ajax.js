// Caching DOM

// Close icon
const close_rateus_i = document.querySelector('.close-rateus')
// Rate us div container
const rateus_div = document.querySelector('.rateus')
// Notnow span
const notnow_span = document.querySelector('.notnow')
// Stars icons
const stars_i = document.querySelectorAll('.star')
// Rateus Wrapper
const rateus_wrapper_div = document.querySelector('#rateus-wrapper')

window.onload = () => {

    setTimeout(function(){
        
        rateus_div.style.display = 'flex'
        
    }, 1000)

}

// Setting close button
close_rateus_i.addEventListener('click', () => {
    rateus_div.style.display = 'none'

})

// Setting Notnow close button
notnow_span.addEventListener('click', () => {
    rateus_div.style.display = 'none'

})

// Adding event to Store rated star

// Adding click event to each star icon
stars_i.forEach((star) =>{
    star.addEventListener('click', () => {
        var rate = star.id.replace('star-', '')
        
        var data = {
            "rate": rate
        }

        userData = JSON.stringify(data)
        
        sendAjax(userData)

    })

})

// XMLHttpRequest Function
function sendAjax(data){

    var xmlhttp = new XMLHttpRequest()

    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 1){
            console.log('Enviando...')
    
        }
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
        
            var response = JSON.parse(xmlhttp.response)

            rateus_wrapper_div.style.display = 'none'

            var response_span = document.createElement('span')
            response_span.innerHTML = response
            rateus_div.appendChild(response_span)
    
        }
    }

    xmlhttp.open('POST', 'servidor/rateus.php', true)
    xmlhttp.setRequestHeader("Content-Type", "application/json")
    xmlhttp.send(data)

}