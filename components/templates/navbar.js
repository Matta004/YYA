
  let navbar = document.querySelector('.header .nav-bar');

document.querySelector('#menu-btn').onclick = () => {
  navbar.classList.toggle('active');
}

window.onscroll = () => {
  navbar.classList.remove('active');
}

let destinations = document.querySelector('.dropdown-menu');

document.querySelector('navbarDropdownMenuLink').onclick = () => {
  destinations.classList.toggle('active');
}