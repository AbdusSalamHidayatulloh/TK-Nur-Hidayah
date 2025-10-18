const menuBtn = document.getElementById('menuDropdown')
const sideBar = document.getElementById('mobile-menu')
const overlay = document.getElementById('overlay')

menuBtn.addEventListener('click', (e) => {
    e.stopPropagation()
    sideBar.classList.toggle('show')
    overlay.classList.toggle('show')
})

document.addEventListener('click', (e) => {
    const clickedOutside = !sideBar.contains(e.target) && !menuBtn.contains(e.target)
    const isOpened = sideBar.classList.contains('show')

    if(clickedOutside && isOpened) {
        sideBar.classList.remove('show')
        overlay.classList.remove('show')
    }
})