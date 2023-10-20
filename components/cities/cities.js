let navbar = document.querySelector('.header .nav-bar');

document.querySelector('#menu-btn').onclick = () => {
  navbar.classList.toggle('active');
}

window.onscroll = () => {
  navbar.classList.remove('active');
}

document.querySelector(".right-d #myBtn").onclick = () => {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}