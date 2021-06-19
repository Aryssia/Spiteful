const burgerbout = document.querySelectorAll('.burgerbout')[0];
    const menu = document.querySelectorAll('.Menu')[0];

    burgerbout.addEventListener('click', () => {
       /* menu.style.left = '0vw';
        menu.style.opacity = '100%';*/
        menu.classList.toggle('open')
    });