window.addEventListener("DOMContentLoaded", (e) => {
  const gift = document.querySelector(".box");

  gift.addEventListener("click", function () {
    let bodyBox = document.querySelector(".box-body");

    bodyBox.classList.add("active");
  });
});

