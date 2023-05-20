let avaliableItem = document.querySelectorAll(".avaliableItem")
const selectedItems =document.querySelector(".selected_items")

const cart = {
  items: [],

  addItem(item, quantity, price) {
    const existingItem = this.items.find((cartItem) => cartItem.item === item);
    if (existingItem) {
      existingItem.quantity += quantity
      console.log(`Item "${item}" quantity updated in the cart.`)
    } else {
      this.items.push({ item, quantity, price })
      console.log(`Item "${item}" added to the cart.`)
    }
  },

  removeItem(item) {
    const index = this.items.findIndex((cartItem) => cartItem.item === item)
    if (index !== -1) {
      this.items.splice(index, 1)
      console.log(`Item "${item}" removed from the cart.`)
    } else {
      console.log(`Item "${item}" is not in the cart.`)
    }
  },

  clearCart() {
    this.items = []
    console.log('Cart cleared.')
  },

  getItemCount() {
    let totalCount = 0
    this.items.forEach((cartItem) => {
      totalCount += cartItem.quantity
    })
    return totalCount
  },

  getTotalPrice() {
    let totalPrice = 0
    this.items.forEach((cartItem) => {
      totalPrice += cartItem.quantity * cartItem.price
    })
    return totalPrice.toFixed(2)
  },

  printCart() {
    selectedItems.innerHTML = ""
    this.items.forEach((cartItem, index) => {
      let pq = cartItem.quantity *  cartItem.price
      selectedItems.innerHTML = selectedItems.innerHTML + 
          `<div class="col-12 listItem"><section class="top">
          ${cartItem.item}
          </section><section class="d-flex justify-content-between bottom"><span class="listItemPieces">
          ${cartItem.quantity} 
          </span><span class="listItemPrice">
          ${pq.toFixed(2)}
          </span></section></div>`
    })
    document.querySelector(".finalPrice").innerHTML = 'Total Price: ' + this.getTotalPrice()
  }
}


avaliableItem.forEach(item => {
  item.addEventListener('click', () => {
        
    cart.addItem(item.getAttribute('data-product-name'), 1, item.getAttribute('data-product-price'))
    cart.printCart()

  })
})
