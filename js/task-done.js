window.onload = () => {

    // Cache DOM
    var task_check = document.querySelectorAll('.task-check')

    // Check if completed to set style
    task_check.forEach(check => {
        var complete = check.getAttribute('data-complete')

        if (complete == 1) {
            // Setting style to COMPLETED checkbox
            check.style.backgroundColor = '#2e92a8'

        }

    })

    task_check.forEach((check) => {
        check.addEventListener('click', () => {
            var label_id = check.value

            var data = {
                "task": label_id
            }

            userData = JSON.stringify(data)

            sendAjax(userData)

        })

    })

}

// Ajax Function
function sendAjax(data) {

    var xmlhttp = new XMLHttpRequest()

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 1) {
            console.log('Enviando...')

        }

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var response = JSON.parse(xmlhttp.response)

            console.log(response)

        }

    }

    xmlhttp.open('POST', 'servidor/task-done.php', true)
    xmlhttp.setRequestHeader("Content-Type", "application/json")
    xmlhttp.send(data)

}