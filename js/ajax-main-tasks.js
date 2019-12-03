var xmlhttp = new XMLHttpRequest()

var listid = document.getElementById('listid').value
var listname = document.getElementById('listname').value


xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState == 1){
        resultado_p = document.createElement('p')
        resultado_p.id = 'resultado'
        document.getElementById('tasks').appendChild(resultado_p)
        document.getElementById('resultado').innerHTML = 'Buscando suas tarefas...'

    }

    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
        
        var response = xmlhttp.response

        var tasks = document.getElementById('tasks')

        tasks.innerHTML = response;

    }

}

xmlhttp.open('GET', `servidor/listagem-inicio-tasks.php?listid=${listid}&listname=${listname}`, true)
xmlhttp.send()