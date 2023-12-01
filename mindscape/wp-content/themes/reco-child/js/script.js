/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function navFunction() {
  var x = document.getElementById("topnav");
  if (x.className === "top_nav") {
    x.className += " responsive";
  } else {
    x.className = "top_nav";
  }
}
function showProductItem() {
  var x = document.getElementById("productsitem");
  if (x.className === "dropdown") {
    x.className += " open";
  } else {
    x.className = "dropdown";
  }
}
function showFeatureItem() {
  var x = document.getElementById("featuresitem");
  if (x.className === "dropdown") {
    x.className += " open";
  } else {
    x.className = "dropdown";
  }
}
function showHowitworkItem() {
  var x = document.getElementById("howitworksitem");
  if (x.className === "dropdown mega-menu") {
    x.className += " open";
  } else {
    x.className = "dropdown mega-menu";
  }
}
function showWorkstatusItem() {
  var x = document.getElementById("whyworkstatus");
  if (x.className === "dropdown dropdown-2") {
    x.className += " open";
  } else {
    x.className = "dropdown dropdown-2";
  }
}

// for header sticky
window.addEventListener("scroll", () => {
  if (window.scrollY > 100) {
    document.getElementById("masthead").classList.add("shady");
  } else {
    document.getElementById("masthead").classList.remove("shady");
  }
});


// header scroll
$(window).scroll(function() {    
  var scroll = $(window).scrollTop();
  if (scroll >= 1) {
    $(".header").addClass("header-bg");
  }
  else {
    $(".header").removeClass("header-bg");
  }
});


// menu-toggler
$("#menu-toggler").click(function() {
  toggleBodyClass("menu-active");
});
function toggleBodyClass(className) {
  document.body.classList.toggle(className);
}
