// Icon to task unavailable "while no list id on URL"

var task_icon = document.querySelector('.back-to-tasks')

var icon_wrapper_div = document.querySelector('.route-span-wrapper')

task_icon.addEventListener('click', (e) =>{
    e.preventDefault()
    icon_wrapper_div.style.display = 'block'

    setInterval(() =>{
        icon_wrapper_div.style.display = 'none'
    }, 3000)

})