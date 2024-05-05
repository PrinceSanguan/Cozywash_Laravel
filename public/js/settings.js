//Hamburger
function toggleMenu() {
  const menu = document.querySelector('.menu');
  if (menu.style.left === "-250px") {
    menu.style.left = "0";
  } else {
    menu.style.left = "-250px";
  }
}
