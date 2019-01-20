//Scripts

// Reusable Vars
const body = document.body;

//Gallery JS
//Large Image Container
const currentImg = document.querySelector(".main-image"),
  //Get the thumbnail container
  thumbsContainer = document.querySelector("#thumbs");
//Set the current data count image to 0
let currentThumb = 0;
const galleryOverlay = document.querySelector(".inner-gallery-overlay");

function changeImage(e) {
  //Prevent page from reloading when a tag is clicked
  e.preventDefault();
  //Get the full size image src from the thumbs data attr and set it as the large image container bg img
  currentImg.style.backgroundImage = `url(${this.attributes[2].value})`;
  //Change overlay content
  galleryOverlay.innerHTML = this.attributes[3].value;

  //get the data count of the clicked thumb
  const dataCount = parseInt(this.attributes[1].value);
  //get the thumb width in pixels
  const thumbWidth = this.clientWidth;
  console.log(
    `Scroll width: ${thumbsContainer.scrollWidth}  
     Container Element Width: ${thumbsContainer.clientWidth}
     Thumb Width: ${this.clientWidth}
     Data-count: ${dataCount}
     Distance from left: ${this.offsetLeft}
    `
  );
  //declare the scroll amount
  let scrollAmount;
  //See which way to scroll the thumb container and set the scroll left value
  if (currentThumb > dataCount) {
    scrollAmount = -(currentThumb - dataCount) * thumbWidth;
    thumbsContainer.scrollLeft += scrollAmount;
    console.log(scrollAmount);
  } else {
    console.log("scroll right");
    scrollAmount = -(currentThumb - dataCount) * thumbWidth;
    thumbsContainer.scrollLeft += scrollAmount;
    console.log(scrollAmount);
  }
  //Update the current thumb data count of image on display
  currentThumb = dataCount;
}

const thumbs = document.querySelectorAll("#thumbs a");
thumbs.forEach(thumb => {
  thumb.addEventListener("click", changeImage);
});

//Change this on main site
if (window.location.href.slice(-7) === ".local/") {
  document.querySelector("#bigimages").addEventListener("click", e => {
    if (e.target.attributes[1].value === "nextImage") {
      console.log("next");
      const nextImg =
        thumbs[currentThumb + 1].attributes[2].value ||
        thumbs[thumbs.length - 1].attributes[2].value;
      currentImg.style.backgroundImage = `url(${nextImg})`;
      currentThumb++;
      console.log(thumbs[thumbs.length - 1]);
      thumbsContainer.scrollLeft += thumbs[0].clientWidth;
      galleryOverlay.innerHTML = thumbs[currentThumb].attributes[3].value;
    }

    if (e.target.attributes[1].value === "previousImage") {
      console.log("prev");
      const nextImg = thumbs[currentThumb - 1];
      currentImg.style.backgroundImage = `url(${nextImg.attributes[2].value})`;
      currentThumb--;
      thumbsContainer.scrollLeft -= thumbs[0].clientWidth;
      galleryOverlay.innerHTML = thumbs[currentThumb].attributes[3].value;
    }
  });
}

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

// // Change Gallery Slider Position
// //const thumbs = document.querySelectorAll("#thumbs a");
// const thumbsContainer = document.querySelector("#thumbs");

// function thumbsScrollX(e) {
//   // const offsetLeft = this.offsetLeft,
//   //   objectWidth = this.clientWidth,
//   //   scrollLeft =
//   //     window.pageXOffset !== undefined
//   //       ? window.pageXOffset
//   //       : (
//   //           document.documentElement ||
//   //           document.body.parentNode ||
//   //           document.body
//   //         ).scrollLeft,
//   //   moveBy =
//   //     scrollLeft -
//   //     offsetLeft +
//   //     thumbsContainer = .clientWidth / 2 -
//   //     objectWidth / 2;
//   // console.log(moveBy);
//   // console.log([thumbsContainer = ]);
//   // thumbsContainer = .scrollBy(moveBy, 0);

//   console.log([this], [thumbsContainer = ]);
//   thumbsContainer = .scrollBy(this.offsetLeft / 2 - this.clientWidth / 2, 0);
// }

// // thumbs.forEach(thumb => {
// //   thumb.addEventListener("click", thumbsScrollX);
// // });
