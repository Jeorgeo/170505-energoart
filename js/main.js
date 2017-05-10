
// WOW эффект

new WOW().init();

// popup windows

var link = document.querySelectorAll(".message-btn");

var popup = document.querySelector(".popup-question");
var close = document.querySelector(".popup-question-close");
var win_popup = document.querySelector(".wrap");
var i = 0;

for (var i = 0; i < link.length; i++) {
  link[i].addEventListener("click", function(event) {
    event.preventDefault();
    popup.classList.add("modal-content-show");
    win_popup.classList.add("modal-content-show");
  });
}

close.addEventListener("click", function(event) {
  event.preventDefault();
  popup.classList.remove("modal-content-show");
  win_popup.classList.remove("modal-content-show");
});

window.addEventListener("keydown", function(event) {
  if (event.keyCode === 27) {
    if (popup.classList.contains("modal-content-show")) {
      popup.classList.remove("modal-content-show");
      win_popup.classList.remove("modal-content-show");
    }
  }
});

win_popup.addEventListener("click", function(event) {
  if (win_popup.classList.contains("modal-content-show")) {
    popup.classList.remove("modal-content-show");
    win_popup.classList.remove("modal-content-show");
  }
});
