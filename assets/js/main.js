"use strict";
const navbarCollapse = document.querySelector(".navbar-collapse");

document.addEventListener("DOMContentLoaded", () => {
  document.querySelector(".primary-menu").classList.add("navbar-nav");
  document.querySelectorAll(".menu-item").forEach((menu) => {
    menu.classList.add("nav-item", "navigation-item");
    menu.querySelector("a").classList.add("nav-link");
  });

  document.querySelectorAll(".menu-item-has-children").forEach((dropdown) => {
    dropdown.classList.add("dropdown");
    dropdown.querySelector("a").classList.add("nav-link", "dropdown-toggle");
    dropdown.querySelector("a").setAttribute("href", "#");
    dropdown.querySelector("a").setAttribute("role", "button");
    dropdown.querySelector("a").setAttribute("data-bs-toggle", "dropdown");
    dropdown.querySelector("a").setAttribute("aria-expanded", "false");

    dropdown.addEventListener("mouseenter", (e) => {
      dropdown.querySelector("a").click();
      dropdown.style.border = "none";
    });
    dropdown.addEventListener("mouseleave", (e) => {
      dropdown.querySelector("a").click();
      dropdown.style.border = "none";
    });
  });

  document.querySelectorAll(".sub-menu").forEach((submenu) => {
    submenu.classList.add("dropdown-menu");

    submenu.querySelectorAll("li").forEach((list) => {
      list.querySelector("a").classList.add("dropdown-item", "text-black");
    });
  });

  window.addEventListener("scroll", (e) => {
    e.preventDefault();
    if (window.scrollY > 100) {
      document.querySelector("header").classList.add("header__bg");
    } else {
      document.querySelector("header").classList.remove("header__bg");
    }
  });

  document
    .querySelector(".navbar-toggler")
    .addEventListener("click", async (e) => {
      e.preventDefault();
      navbarCollapse.classList.toggle("animate__zoomIn");
      navbarCollapse.classList.remove("animate__zoomOut");
    });

  document
    .querySelector(".close__icon")
    .addEventListener("click", async (e) => {
      e.preventDefault();

      navbarCollapse.classList.toggle("animate__zoomOut");
      navbarCollapse.classList.remove("animate__zoomIn");

      setTimeout(() => {
        navbarCollapse.classList.toggle("show");
      }, 1000);
    });

  document.getElementById("year").textContent = new Date().getFullYear();
});
