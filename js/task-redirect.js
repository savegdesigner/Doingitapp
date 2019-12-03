// Caching Lists
const lists = document.querySelectorAll('.list-title-name')


lists.forEach(list => {

    list.addEventListener('click', () => {
        let listid = list.getAttribute('data-listid')
        // window.location = `./tasks.php?listid=${listid}`
        console.log(listid)

    })

})