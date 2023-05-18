const cancelBtn = document.querySelector("div.cancel")

cancelBtn.addEventListener('click', () => {
     if (confirm("Do you want to back to start page?") === true) {
          location.replace("./index.php")
     }
})