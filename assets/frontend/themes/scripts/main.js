function appHeight(){document.documentElement.style.setProperty("--app-height",window.innerHeight+"px"),document.documentElement.style.setProperty("--app-width",window.innerWidth+"px")}function headerMenuToggle(){const e=document.getElementById("headerMenu");e.classList.toggle("active")}window.addEventListener("resize",appHeight),appHeight(),window.addEventListener("load",e=>{AOS.init({duration:600,once:!0})});const swiper=new Swiper(".account-games__carousel-list",{loop:!0,spaceBetween:16,slidesPerView:1,navigation:{nextEl:"[data-slider-next]",prevEl:"[data-slider-prev]"},breakpoints:{576:{slidesPerView:2,spaceBetween:10},992:{slidesPerView:3}}});