const toggleButton = document.getElementById("add");
let toggleClass = document.querySelectorAll(".addToggle");

function toggle() {
  toggleClass.forEach((el) => {
    el.classList.add("toggleVisible");

    el.classList.remove("addToggle");
  });
}

toggleButton.addEventListener("click", toggle);
