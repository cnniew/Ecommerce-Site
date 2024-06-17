//navbar.php navbar menu
document.querySelectorAll(".navbar__hamburger, .navbar__close").forEach((btn) => {
  btn.addEventListener("click", () => {
    document.querySelector(".navbar__menu-mobile-tablet").classList.toggle("open");
  });
});

//product.php filter menu
document.querySelectorAll(".filter-section__toggle, .filter-form__header-close").forEach((btn) => {
  btn.addEventListener("click", () => {
    document.querySelector(".filter-section").classList.toggle("open");
  });
});
