const navbar = document.querySelector('.navbar-nav')
const nav = document.querySelectorAll('.link')
const body = document.body
const dark = document.getElementById('dark')

navbar.addEventListener('click', e => {
    for (const n of nav) {
        if (n.classList.contains('active')) {
            n.classList.remove('active')
        }
        e.target.classList.add('active')
    }
})

const activeLink = nav[0]
localStorage.setItem('activeLink', activeLink.id)

// Get the active link from localStorage
const storedLink = localStorage.getItem('activeLink')
if (storedLink) {
    const link = document.querySelector(`[id="${storedLink}"]`)
    link.classList.add('active')
}

dark.addEventListener('click', () => {
    body.classList.toggle('dark')
    const cek = body.classList.contains('dark')

    localStorage.setItem('darkMode', cek)
})

function trueDarkMode() {
    const setClass = localStorage.getItem('darkMode')

    if (setClass == 'true') {
        body.classList.add('dark')
    } else {
        body.classList.remove('dark')
    }
}

trueDarkMode()

