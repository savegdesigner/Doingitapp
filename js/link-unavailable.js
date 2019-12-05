// Icon to task unavailable "while no list id on URL"

var task_icon = document.querySelector('.back-to-tasks')

var route_span_wrapper = document.querySelector('.route-span-wrapper')

task_icon.addEventListener('click', (e) =>{
    e.preventDefault()
    route_span_wrapper.style.display = 'flex'

    setInterval(() =>{
        route_span_wrapper.style.display = 'none'
    }, 2000)

})