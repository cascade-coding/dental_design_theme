// handling submenu for large screen

const main_navigation_lg = document.querySelector(".main-navigation-lg");

const subMenus = main_navigation_lg.querySelectorAll(
  "div > ul#primary-menu > li > ul.sub-menu"
);

subMenus.forEach((item) => {
  console.log(item.outerHTML);

  const list_items = item.querySelectorAll(":scope > li");

  console.log(list_items.length);

  if (list_items.length === 1) {
    list_items[0].querySelector("a").classList.add("large-menu-subtitle");
  }

  list_items.forEach((item) => {
    if (list_items.length > 1 && item.querySelector("ul.sub-menu") === null) {
      item.classList.add("!pb-3");
      item.querySelector("a").classList.add("submenu-link");
    } else {
      item.classList.add("!pb-6");

      console.log(item.querySelector("a").href.slice(-1), "iiii");

      if (item.querySelector("a").href.slice(-1) === "#") {
        item
          .querySelector("a")
          .classList.add(
            "!font-semibold",
            "!text-neutral-600",
            "pointer-events-none"
          );
      }

      item.querySelector("a").classList.add("regular-menu-subtitle");
    }

    item.classList.add("submenu-links");
  });
});

// handling submenu for small screen
const main_navigation_sm = document.querySelector(".main-navigation-sm");

const subMenusSm = main_navigation_sm.querySelectorAll(
  "div > ul#primary-menu > li > ul.sub-menu"
);

subMenusSm.forEach((item) => {
  const list_items = item.querySelectorAll(":scope > li");

  list_items.forEach((item) => {
    if (list_items.length > 1 && item.querySelector("ul.sub-menu") === null) {
      item.classList.add("!pb-3");
      item.querySelector("a").classList.add("submenu-link-sm");
    } else {
      item.classList.add("!pb-6");

      console.log(item.querySelector("a").href.slice(-1), "iiii");

      if (item.querySelector("a").href.slice(-1) === "#") {
        item
          .querySelector("a")
          .classList.add("!text-neutral-400", "pointer-events-none");
      }

      item.querySelector("a").classList.add("regular-menu-subtitle-sm");
    }

    item.classList.add("submenu-links-sm");
  });
});

const toggle_mobile_menu = document.getElementById("toggle-mobile-menu");
const mobile_menu = document.getElementById("mobile-menu");

const menu_icon = document.getElementById("menu_icon");
const close_icon = document.getElementById("close_icon");

toggle_mobile_menu.addEventListener("click", (e) => {
  mobile_menu.classList.toggle("!block");

  toggle_mobile_menu.classList.toggle("mobile-menu-open");
});

// close the mobile nav on outside click
document.addEventListener("click", function (e) {
  const main_nav_wrapper = document
    .getElementById("main_nav_wrapper")
    .contains(e.target);

  if (!main_nav_wrapper) {
    mobile_menu.classList.remove("!block");
    toggle_mobile_menu.classList.remove("mobile-menu-open");
  }
});

// ! sliders

const swiperHomeTop = new Swiper(".swiper-home-top", {
  loop: true,
  effect: 'fade',
  fadeEffect: {
    crossFade: true
  },
  autoplay: {
    delay: 4000,
    disableOnInteraction: false
  },
  speed: 800, 
});
