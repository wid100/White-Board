// About us Header
function redirectToAboutPage(tabId) {
  window.location.href = "/about-us.html" + tabId;
}
document.addEventListener("DOMContentLoaded", function () {
  const hash = window.location.hash;
  if (hash) {
    const tabTriggerEl = document.querySelector(
      `button[data-bs-target="${hash}"]`
    );
    if (tabTriggerEl) {
      const tab = new bootstrap.Tab(tabTriggerEl);
      tab.show();
    }
  }
});

var swiper = new Swiper(".mySwiper", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
});

var swiper = new Swiper(".mySwiperYear", {
  slidesPerView: 5,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    320: { slidesPerView: 3 },
    480: { slidesPerView: 5 },
    640: { slidesPerView: 3 },
    800: { slidesPerView: 4 },
    1024: { slidesPerView: 5 },
  },
});
var swiper = new Swiper(".mySwiperIssue", {
  slidesPerView: 5,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    320: { slidesPerView: 3 },
    480: { slidesPerView: 5 },
    640: { slidesPerView: 3 },
    800: { slidesPerView: 4 },
    1024: { slidesPerView: 5 },
  },
});

// window.addEventListener("scroll", function () {
//   var header = document.querySelector(".sticky-header");
//   var sticky = header.offsetTop;
//   if (window.pageYOffset > sticky) {
//     header.classList.add("sticky");
//   } else {
//     header.classList.remove("sticky");
//   }
// });

window.addEventListener("scroll", function () {
  var header = document.querySelector(".sticky-header-mobile");
  var sticky = header.offsetTop;
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky-mobile");
  } else {
    header.classList.remove("sticky-mobile");
  }
});

$(document).ready(function () {
  $(".hamburger-menu").click(function () {
    $(".header-menu").addClass("active");
  });

  $(".close-btn").click(function () {
    $(".header-menu").removeClass("active");
  });
  $(".about-us-btn").click(function () {
    $(".header-menu").removeClass("active");
  });
  $(".sub-btn").click(function () {
    $(".header-menu").removeClass("active");
  });
});

$(document).ready(function () {
  $(".header-menu-link").click(function () {
    $(this).toggleClass("active");
    $(this).find(".megamenu-md").toggleClass("active");
  });
});

$(document).ready(function () {
  var $scrollTop = $("#scroll-top");

  $(window).on("scroll", function () {
    if ($(window).scrollTop() >= 400) {
      $scrollTop.addClass("show");
    } else {
      $scrollTop.removeClass("show");
    }
  });

  $scrollTop.on("click", function () {
    $("html, body").animate({ scrollTop: 0 }, "300");
  });
});

document.addEventListener("DOMContentLoaded", (event) => {
  const passwordInput = document.getElementById("password-input");
  const togglePassword = document.getElementById("toggle-password");
  const showEye = document.getElementById("show-eye");
  const hideEye = document.getElementById("hide-eye");

  togglePassword.addEventListener("click", () => {
    const type =
      passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);

    // Toggle the eye icons
    showEye.style.display = type === "password" ? "block" : "none";
    hideEye.style.display = type === "password" ? "none" : "block";
  });
});
document.addEventListener("DOMContentLoaded", (event) => {
  const passwordInput = document.getElementById("password-create-input");
  const togglePassword = document.getElementById("toggle-create-password");
  const showEye = document.getElementById("show-eye");
  const hideEye = document.getElementById("hide-eye");

  togglePassword.addEventListener("click", () => {
    const type =
      passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);

    // Toggle the eye icons
    showEye.style.display = type === "password" ? "block" : "none";
    hideEye.style.display = type === "password" ? "none" : "block";
  });
});
// ================== Writer  Pagination =======
document.addEventListener("DOMContentLoaded", function () {
  const paginationItems = document.querySelectorAll(".page-item");
  const pageSlider = document.getElementById("pageSlider");

  function setActivePage(pageNumber) {
    document.querySelector(".page-item.active").classList.remove("active");
    document
      .querySelector(`.page-item[data-page='${pageNumber}']`)
      .classList.add("active");
  }

  paginationItems.forEach((item) => {
    item.addEventListener("click", function () {
      const pageNumber = this.getAttribute("data-page");
      pageSlider.value = pageNumber;
      setActivePage(pageNumber);
      // Here you can add code to load the content for the selected page
      console.log(`Page ${pageNumber} selected`);
    });
  });

  pageSlider.addEventListener("input", function () {
    const pageNumber = this.value;
    setActivePage(pageNumber);
    // Here you can add code to load the content for the selected page
    console.log(`Page ${pageNumber} selected via slider`);
  });
});

// ===================== Requested Issue add Field
$(document).ready(function () {
  // Function to add a new input field
  function addField() {
    const newField = `
          <div class="choose-req-issue-item">
            <div class="choose-seleted-item">
            <button type="button" class="remove-field-btn">
                <img src="assets/images/icon/close.svg" alt="" />
              </button>
              <select name="request_issue" class="form-select">
                <option selected>Requested issue*</option>
                <option value="1">Issue 269</option>
                <option value="2">Issue 270</option>
              </select>
            </div>
            <input type="text" name="quantity" placeholder="Quantity..." />
          </div>
        `;
    $("#chooseRequestedIssue").append(newField);
  }

  // Function to remove an input field
  function removeField(element) {
    element.closest(".choose-req-issue-item").remove();
  }

  // Add field event
  $(document).on("click", ".add-field-btn", function () {
    addField();
  });

  // Remove field event
  $(document).on("click", ".remove-field-btn", function () {
    removeField($(this));
  });
});

// ========File Upload ==========
 const maxFileSize = 5 * 1024 * 1024; // 5 MB
 const maxFiles = 3;
 let uploadedArticles = [];
 let uploadedPhotos = [];
 let uploadedGraphs = [];

 function handleFiles(files, type) {
   const errorMessagesDiv = document.getElementById(
     type === "article"
       ? "articleErrorMessages"
       : type === "photo"
       ? "photoErrorMessages"
       : "graphErrorMessages"
   );
   errorMessagesDiv.innerHTML = "";

   let uploadedFiles =
     type === "article"
       ? uploadedArticles
       : type === "photo"
       ? uploadedPhotos
       : uploadedGraphs;

   if (files.length + uploadedFiles.length > maxFiles) {
     errorMessagesDiv.innerHTML = `Opps! You can only upload a maximum of ${maxFiles} files.`;
     return;
   }

   for (let i = 0; i < files.length; i++) {
     if (files[i].size > maxFileSize) {
       errorMessagesDiv.innerHTML += `Opps! File "${files[i].name}" is bigger than 5 MB... try a smaller one.<br>`;
     } else {
       uploadedFiles.push(files[i]);
     }
   }

   if (type === "article") {
     uploadedArticles = uploadedFiles;
     displayUploadedFiles("article");
   } else if (type === "photo") {
     uploadedPhotos = uploadedFiles;
     displayUploadedFiles("photo");
   } else {
     uploadedGraphs = uploadedFiles;
     displayUploadedFiles("graph");
   }
 }

 function displayUploadedFiles(type) {
   const uploadedFilesDiv = document.getElementById(
     type === "article"
       ? "uploadedArticleFiles"
       : type === "photo"
       ? "uploadedPhotoFiles"
       : "uploadedGraphFiles"
   );
   const uploadedSection = document.getElementById(
     type === "article"
       ? "uploadedArticleSection"
       : type === "photo"
       ? "uploadedPhotoSection"
       : "uploadedGraphSection"
   );

   let uploadedFiles =
     type === "article"
       ? uploadedArticles
       : type === "photo"
       ? uploadedPhotos
       : uploadedGraphs;

   if (uploadedFiles.length > 0) {
     uploadedSection.style.display = "block";
   } else {
     uploadedSection.style.display = "none";
   }

   uploadedFilesDiv.innerHTML = "";

   uploadedFiles.forEach((file, index) => {
     const fileItem = document.createElement("div");
     fileItem.className = "file-item";
     fileItem.innerHTML = `
          <p>${file.name}</p>
          <button onclick="removeFile(${index}, '${type}')">
         <svg width="14" height="14" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.7363 16.4628C17.8199 16.5464 17.8862 16.6457 17.9315 16.755C17.9767 16.8642 18 16.9813 18 17.0995C18 17.2178 17.9767 17.3349 17.9315 17.4441C17.8862 17.5534 17.8199 17.6526 17.7363 17.7363C17.6526 17.8199 17.5534 17.8862 17.4441 17.9315C17.3349 17.9767 17.2178 18 17.0995 18C16.9813 18 16.8642 17.9767 16.755 17.9315C16.6457 17.8862 16.5464 17.8199 16.4628 17.7363L9 10.2723L1.53716 17.7363C1.3683 17.9051 1.13926 18 0.90045 18C0.661636 18 0.432603 17.9051 0.263736 17.7363C0.0948685 17.5674 4.7076e-09 17.3384 0 17.0995C-4.7076e-09 16.8607 0.0948685 16.6317 0.263736 16.4628L7.7277 9L0.263736 1.53716C0.0948685 1.3683 -1.7793e-09 1.13926 0 0.90045C1.7793e-09 0.661636 0.0948685 0.432603 0.263736 0.263736C0.432603 0.0948685 0.661636 1.77931e-09 0.90045 0C1.13926 -1.7793e-09 1.3683 0.0948685 1.53716 0.263736L9 7.7277L16.4628 0.263736C16.6317 0.0948685 16.8607 -4.7076e-09 17.0995 0C17.3384 4.7076e-09 17.5674 0.0948685 17.7363 0.263736C17.9051 0.432603 18 0.661636 18 0.90045C18 1.13926 17.9051 1.3683 17.7363 1.53716L10.2723 9L17.7363 16.4628Z" fill="#187FAC"/>
</svg>
          </button>
        `;
     uploadedFilesDiv.appendChild(fileItem);
   });
 }

 function removeFile(index, type) {
   if (type === "article") {
     uploadedArticles.splice(index, 1);
     displayUploadedFiles("article");
   } else if (type === "photo") {
     uploadedPhotos.splice(index, 1);
     displayUploadedFiles("photo");
   } else {
     uploadedGraphs.splice(index, 1);
     displayUploadedFiles("graph");
   }
 }


// About us megizine count
const counters = [
  { id: "counter1", start: 0, end: 2000, increment: 10 },
  { id: "counter2", start: 0, end: 120, increment: 2 },
  { id: "counter3", start: 0, end: 15, increment: 1 },
];

// Function to update a counter
function updateCounter(counter) {
  const element = document.getElementById(counter.id);
  const update = () => {
    if (counter.start < counter.end) {
      counter.start += counter.increment;
      element.textContent = counter.start + "+";
      requestAnimationFrame(update);
    } else {
      element.textContent = counter.end + "+";
    }
  };
  update();
}

// Start all counters
counters.forEach((counter) => updateCounter(counter));
