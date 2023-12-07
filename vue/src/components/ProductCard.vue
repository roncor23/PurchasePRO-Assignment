<template>
  <div class="container">
    <!-- Product -->
    <div class="product">
      <img :src="imageSrc" :alt="name">
      <div class="product-details">
        <h2>{{ name }}</h2>
        <p>{{ description }}</p>
        <p class="product-price">$ {{ price }}</p>
        <div class="quantity-container">
          <label for="quantity" class="quan">Quantity:</label>
          <button @click="decrementQuantity" class="quantity-button">-</button>
          <input
            type="number"
            id="quantity"
            v-model="quantity"
            min="1"
            class="quantity-input"
          />
          <button @click="incrementQuantity" class="quantity-button">+</button>
        </div>
        <button @click="addToCart" class="add-to-cart-button">Add to Cart</button>
      </div>
    </div>
    <!-- Checkout Button -->
    <button @click="checkout" v-if="cart.length" class="checkout-button">Checkout</button>
  </div>
</template>

<script>
export default {
  name: 'ProductCard',
  props: {
    pid: Number,
    name: String,
    description: String,
    price: String,
  },
  data() {
    return {
      cart: [],
      quantity: 1, // Default quantity is 1
    };
  },
  methods: {
    addToCart() {

      this.$toastr.success(`Added ${this.name} to the cart with quantity ${this.quantity}!`);

      let sizeprod = {};

      const size = {
        pid: this.pid,
        name: this.name,
        description: this.description,
        price: this.price,
        quantity: this.quantity,
      };

      sizeprod = {
        ...size,
      };
      this.cart.push(sizeprod);

    },
    checkout() {

      this.$emit('checkout', this.cart);
      // Clear the cart after checkout
      this.cart = [];
    },
    incrementQuantity() {
      this.quantity += 1;
    },
    decrementQuantity() {
      if (this.quantity > 1) {
        this.quantity -= 1;
      }
    },
  },
  computed: {
    imageSrc() {
      // Temporary Image Placeholder
      return 'https://via.placeholder.com/800x450';
    },
  },
};
</script>

<style scoped>
/* Scoped styles here if needed */
.quan {
  padding: 5px;
}
.product {
  width: 500px;
  background-color: #fff;
  border-radius: 8px;
  overflow: hidden;
  margin-bottom: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.product img {
  width: 100%;
  height: auto;
  border-bottom: 1px solid #ddd;
}

.product-details {
  padding: 20px;
}

.product h2 {
  margin-top: 0;
  font-size: 1.5rem;
  color: #333;
}

.product p {
  color: #777;
}

.product-price {
  font-size: 1.2rem;
  font-weight: bold;
  color: #e44d26;
  margin-top: 10px;
}


.quantity-container {
  margin-top: 10px;
  padding: 5px;
}

.quantity-input {
  width: 50px;
  padding: 5px;
  margin-left: 5px;
  margin-right: 5px;
}

.quantity-button {
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 5px 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.quantity-button:hover {
  background-color: #0056b3;
}

.add-to-cart-button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.add-to-cart-button:hover {
  background-color: #0056b3;
}

.checkout-button {
  height: 470px;
  padding: 10px;
  background-color: #28a745;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.checkout-button:hover {
  background-color: #218838;
}
</style>
