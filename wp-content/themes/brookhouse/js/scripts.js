//Scripts
/*    const nav = document.querySelector('#main');
    let topOfNav = nav.offsetTop;

    function fixNav() {
      if (window.scrollY >= topOfNav) {
        document.body.style.paddingTop = nav.offsetHeight + 'px';
        document.body.classList.add('fixed-nav');
      } else {
        document.body.classList.remove('fixed-nav');
        document.body.style.paddingTop = 0;
      }
    }

    window.addEventListener('scroll', fixNav);
*/

// Reusable Vars
const body = document.body;

//Gallery JS
// function changeImage(current) {
//   var imagesNumber = document.getElementById("bigimages").childElementCount;

//   for (i = 1; i <= imagesNumber; i++) {
//     if (i == current) {
//       console.log(current);
//       document.getElementById("normal" + current).style.opacity = "1";
//     } else {
//       document.getElementById("normal" + i).style.opacity = "0";
//     }
//   }
//   console.log(this);
//   //thumbsScrollX().bind(this);
// }

function changeImage(e) {
  e.preventDefault();
  var nextImage = parseInt(e.target.parentElement.dataset.count) + 1;
  var imagesNumber = document.getElementById("bigimages").childElementCount;

  for (i = 1; i <= imagesNumber; i++) {
    if (i == nextImage) {
      console.log(current);
      document.getElementById("normal" + nextImage).style.opacity = "1";
    } else {
      document.getElementById("normal" + i).style.opacity = "0";
    }
  }

  var displayedImage = 8;
}

document.addEventListener("DOMContentLoaded", () => {
  alert("loaded");
  forEach();
});

const thumbs = document.querySelectorAll("#thumbs a");
thumbs.forEach(thumb => {
  thumb.addEventListener("click", changeImage);
});

// Flex Panels JS
const panels = document.querySelectorAll(".panel");
const underlay = document.querySelectorAll(".dark-underlay");

function toggleOpen(e) {
  //Removes all '.open' classes from panels
  panels.forEach(panel => {
    panel.classList.remove("open");
    panel.classList.remove("dark-underlay-active");
  });
  this.classList.toggle("open");
  panels.forEach(panel => {
    panel.classList.remove("text-active");
  });
  this.classList.add("text-active");
  this.classList.add("dark-underlay-active");
}

function toggleClose(e) {
  panels.forEach(panel => {
    panel.classList.remove("open");
    panel.classList.remove("dark-underlay-active");
    panel.classList.remove("text-active");
  });
}

panels.forEach(panel => panel.addEventListener("mouseenter", toggleOpen));
panels.forEach(panel => panel.addEventListener("mouseleave", toggleClose));

//Mobile Listeners
panels.forEach(panel => panel.addEventListener("touchend", toggleOpen));

//Nav JS
const nav = document.querySelector("#main");
let topOfNav = nav.offsetTop;

function fixNav() {
  if (window.scrollY >= topOfNav) {
    body.style.paddingTop = nav.offsetHeight + "px";
    body.classList.add("fixed-nav");
  } else {
    body.classList.remove("fixed-nav");
    body.style.paddingTop = 0;
  }
}

window.addEventListener("scroll", fixNav);

//Lazy Loading
const observer = lozad(); // lazy loads elements with default selector as ".lozad"
observer.observe();

//Slick

jQuery(".autoplay").slick({
  centerMode: true,
  centerPadding: "60px",
  slidesToShow: 3,
  arrows: false,
  dots: true,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: "40px",
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: "40px",
        slidesToShow: 3
      }
    }
  ],
  autoplay: true
});

// Mobile Nav
window.onload = function() {
  //Close mobile nav when dark overlay is clicked
  const overlay = document.querySelector(".dark-body-overlay");
  overlay.addEventListener("click", () => {
    body.classList.remove("mobile-nav-open");
  });
};

// Change Gallery Slider Position
//const thumbs = document.querySelectorAll("#thumbs a");
const thumbsContainer = document.querySelector("#thumbs");

function thumbsScrollX(e) {
  // const offsetLeft = this.offsetLeft,
  //   objectWidth = this.clientWidth,
  //   scrollLeft =
  //     window.pageXOffset !== undefined
  //       ? window.pageXOffset
  //       : (
  //           document.documentElement ||
  //           document.body.parentNode ||
  //           document.body
  //         ).scrollLeft,
  //   moveBy =
  //     scrollLeft -
  //     offsetLeft +
  //     thumbsContainer.clientWidth / 2 -
  //     objectWidth / 2;
  // console.log(moveBy);
  // console.log([thumbsContainer]);
  // thumbsContainer.scrollBy(moveBy, 0);

  console.log([this], [thumbsContainer]);
  thumbsContainer.scrollBy(this.offsetLeft / 2 - this.clientWidth / 2, 0);
}

// thumbs.forEach(thumb => {
//   thumb.addEventListener("click", thumbsScrollX);
// });
