//navbar.php navbar menu
document.querySelectorAll(".navbar__hamburger, .navbar__close").forEach((btn) => {
  btn.addEventListener("click", () => {
    document.querySelector(".navbar__menu-mobile-tablet").classList.toggle("open");
  });
});

//products.php filter menu
document.querySelectorAll(".filter-section__toggle, .filter-form__header-close").forEach((btn) => {
  btn.addEventListener("click", () => {
    document.querySelector(".filter-section").classList.toggle("open");
  });
});

//product.php images thumbnail
function showImage(newImgSrc) {
  if (newImgSrc) document.querySelector(".product-details__imgs-active").src = newImgSrc;
}
document.querySelectorAll(".product-details__imgs-img").forEach((thumbnail) => {
  thumbnail.addEventListener("click", () => showImage(thumbnail.getAttribute("src")));
});

//product.php product specs section
function showActive(elements, targetClass, className) {
  document.querySelectorAll(elements).forEach((element) => {
    element.classList.remove(className);
    if (element.classList.contains(targetClass)) element.classList.add(className);
  });
}
document.querySelectorAll(".product-specs__navbar-items").forEach((item) => {
  item.addEventListener("click", () => {
    const targetClass = item.classList[0];
    showActive(".product-specs__navbar-items", targetClass, "active");
    showActive(".product-specs__content", targetClass, "show");
  });
});
