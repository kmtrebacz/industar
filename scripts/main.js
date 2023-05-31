let avaliableItem = document.querySelectorAll(".avaliableItem")
let delItems = document.querySelectorAll(".delItems")
const selectedItems = document.querySelector(".selected_items")

const cancelBtn = document.querySelector("div.cancel")
const payBtn = document.querySelector("div.pay")

/*
    UPDATING LIST
*/

const cart = {
  items: [],

  addItem(item, quantity, price) {
    const existingItem = this.items.find((cartItem) => cartItem.item === item)
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
      let pq = cartItem.quantity * cartItem.price
      selectedItems.innerHTML += `<div class="listItem d-flex"><div class="col-12"><section class="top col-12">
          ${cartItem.item}
          </section><section class="d-flex justify-content-between bottom col-12"><span class="listItemPieces">
          ${cartItem.quantity} 
          </span><span class="listItemPrice">
          ${pq.toFixed(2)}
          </span></section></div></div>`
    })
    document.querySelector(".finalPrice").innerHTML = 'Total Price: ' + this.getTotalPrice()
  }
}

avaliableItem.forEach(item => {
  item.addEventListener('click', () => {
    cart.addItem(item.getAttribute("data-product-name"), 1, item.getAttribute('data-product-price'))
    cart.printCart()
  })
})

if (delItems.length > 0) {
  delItems.forEach(item => {
    item.addEventListener('click', () => {
      let itemProductName = item.dataset.itemName.trim()
      console.log(itemProductName)

      if (cart && typeof cart.removeItem === 'function') {
        cart.removeItem(itemProductName)
        cart.printCart()
      } else {
        console.log("Cart or removeItem method not found.")
      }
    })
  })
} else {
  console.log("No items found with the class 'delItems'.")
}

cancelBtn.addEventListener("click", () => {
  if (confirm("Do you want to go back to the start page?")) {
    location.replace("./../index.php")
  }
})

payBtn.addEventListener("click", () => {
  if (confirm("Are you sure you want to pay?")) {
    const bill = generateBill()
    redirectToClearWebsite(bill)
  }
})

function generateBill() {
  let bill = ""

  bill += "<h1>Bill</h1>"
  bill += '<table class="table table-striped">'
  bill += "<tr><th>Item</th><th>Quantity</th><th>Price</th><th>Total</th></tr>"

  cart.items.forEach(cartItem => {
    const total = (cartItem.quantity * cartItem.price).toFixed(2)

    bill += `<tr><td>${cartItem.item}</td><td>${cartItem.quantity}</td><td>${cartItem.price}</td><td>${total}</td></tr>`
  })

  bill += "<tr><td colspan='3'>Total Price:</td><td>" + cart.getTotalPrice() + "</td></tr>"
  bill += "</table>"

  return bill
}

function redirectToClearWebsite(bill) {
  const clearWebsiteURL = "./bill.php"

  const form = document.createElement("form")
  form.action = clearWebsiteURL
  form.method = "POST"

  const billInput = document.createElement("input")
  billInput.type = "hidden"
  billInput.name = "bill"
  billInput.value = bill

  form.appendChild(billInput)

  document.body.appendChild(form)
  form.submit()
}
