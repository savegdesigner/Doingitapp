var xmlhttp = new XMLHttpRequest()

xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 1) {
        resultado_p = document.createElement('p')
        resultado_p.id = 'resultado'
        document.getElementById('lists').appendChild(resultado_p)
        document.getElementById('resultado').innerHTML = 'Buscando suas listas...'

    }

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        var response = xmlhttp.response

        var lists = document.getElementById('lists')

        lists.innerHTML = response;

    }

}

xmlhttp.open('GET', 'servidor/listagem-inicio.php', true)
xmlhttp.send()