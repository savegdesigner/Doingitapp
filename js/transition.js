// Form smooth transition

var wrapper_field = document.querySelector('[wrapper]');

function transition(){

    wrapper_field.classList.remove('hide');
    wrapper_field.classList.add('transition');

}

window.onload = transition();