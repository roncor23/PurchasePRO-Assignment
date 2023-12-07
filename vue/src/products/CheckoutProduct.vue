<template>
  <div>
    <h2>Checkout</h2>
    <div v-for="(item, index) in cart" :key="index" class="checkout-item">
      <p>{{ item.name }} - ${{ item.price }} (Quantity: {{ item.quantity }})</p>
    </div>
    <p class="total">Total: ${{ total }}</p>
    <button @click="clearCheckout" class="clear-button">Clear Checkout</button>
  </div>
</template>

<script>
export default {
  name: 'CheckoutProduct',
  props: {
    cart: Array,
  },
  computed: {
    total() {
      return this.cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
    },
  },
  methods: {
    clearCheckout() {
      // Emit an event to notify the parent component to clear the checkout
      this.$emit('clear-checkout');
    },
  },
};
</script>

<style scoped>
/* Scoped styles here if needed */
.checkout-item {
  margin-bottom: 10px;
}

.total {
  font-size: 1.2rem;
  font-weight: bold;
  color: #e44d26;
}

.clear-button {
  margin-top: 10px;
  padding: 8px;
  background-color: #e44d26;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.clear-button:hover {
  background-color: #d3351e;
}
</style>
