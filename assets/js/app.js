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
    item.querySelector("ul").classList.add("submenu-links");
  });

  
});

// console.log(subMenus);

// .main-navigation-lg > div > ul#primary-menu > li > ul.sub-menu
