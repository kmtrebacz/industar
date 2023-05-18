let avaliableItem = document.querySelectorAll(".avaliableItem")
const selectedItems =document.querySelector(".selected_items")

avaliableItem.forEach(item => {
     item.addEventListener('click', () => {
          // alert(`Nazwa: ${item.getAttribute('data-product-name')} \nCena: ${item.getAttribute('data-product-price')}`)

          selectedItems.innerHTML = selectedItems.innerHTML + 
          `<div class="col-12 listItem"><section class="top">
          ${item.getAttribute('data-product-name')}
          </section><section class="d-flex justify-content-between bottom"><span class="listItemPieces">1 piece</span><span class="listItemPrice">
          ${item.getAttribute('data-product-price')}
          </span></section></div>`

     })
})