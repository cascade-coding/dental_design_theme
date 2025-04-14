console.log("awesome");

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
