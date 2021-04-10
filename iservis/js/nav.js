const navSlide = ()=>{
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.menu-list');
    //Toggle Nav
    burger.addEventListener('click', ()=>{
        nav.classList.toggle('menu-active');
    });
    nav.addEventListener('click', ()=>{
        nav.classList.remove('menu-active');
    });
}

navSlide();