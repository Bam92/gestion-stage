const toggleButton = document.getElementById("add");

function toggle() {
  if (toggleButton.getAttribute("id") === "hide") {
    const hideElt = document.querySelectorAll(".toggleVisible");

    hideElt.forEach((el) => {
      console.log("done!");
      el.classList.add("addToggle");
      el.classList.remove("toggleVisible");
    });

    toggleButton.id = "add";
  }

  const showElt = document.querySelectorAll(".addToggle");

  showElt.forEach((el) => {
    el.classList.add("toggleVisible");
    el.classList.remove("addToggle");
  });

  toggleButton.id = "hide";
}

toggleButton.addEventListener("click", toggle);
