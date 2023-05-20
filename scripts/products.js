let avaliableItem = document.querySelectorAll(".avaliableItem")
const selectedItems =document.querySelector(".selected_items")

const cart = {
  items: [],

  // Add an item to the cart
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

  // Remove an item from the cart
  removeItem(item) {
    const index = this.items.findIndex((cartItem) => cartItem.item === item)
    if (index !== -1) {
      this.items.splice(index, 1)
      console.log(`Item "${item}" removed from the cart.`)
    } else {
      console.log(`Item "${item}" is not in the cart.`)
    }
  },

  // Clear all items from the cart
  clearCart() {
    this.items = []
    console.log('Cart cleared.')
  },

  // Get the number of items in the cart
  getItemCount() {
    let totalCount = 0
    this.items.forEach((cartItem) => {
      totalCount += cartItem.quantity
    })
    return totalCount
  },

  // Get the total price of items in the cart
  getTotalPrice() {
    let totalPrice = 0
    this.items.forEach((cartItem) => {
      totalPrice += cartItem.quantity * cartItem.price
    })
    return totalPrice.toFixed(2)
  },

  // Print the items in the cart
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
