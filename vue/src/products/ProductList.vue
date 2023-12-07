<template>
    <div class="container">
    <!-- Iterate through the list of products and display ProductCard for each -->
    <ProductCard
        v-for="product in products"
        :key="product.id"
        :pid="product.id"
        :name="product.name"
        :description="product.description"
        :price="product.price"
        @checkout="checkout"
    />

    <UserModal
        :isModalOpen="isModalOpen"
        @storeUserDetails="storeUserDetails"
        @closeModal="closeModal"
    />

    <CheckoutProduct v-if="showCheckout" :cart="cart" @clear-checkout="clearCheckout"/>

    <button v-if="cart.length" @click="placeOrder" class="place-order-button">
      Place Order
    </button>
    </div>
  </template>
  
  <script>
  import UserModal from '@/components/UserModal.vue';
  import ProductCard from '@/components/ProductCard.vue';
  import CheckoutProduct from './CheckoutProduct.vue';
  import CheckoutService from '@/services/CheckoutService';
  import CatalogService from '@/services/CatalogService';
  import UserService from '@/services/UserService';
  import { mapActions, mapGetters } from 'vuex';

  export default {
    name: 'ProductList',
    components: {
      ProductCard,
      CheckoutProduct,
      UserModal
    },
    data() {
      return {
        products: [],
        showCheckout: false,
        cart: [],
        isModalOpen: false,
      };
    },
    async created() {
    try {
      // Fetch products from the CatalogService
      this.products = await CatalogService.getProducts();

    } catch (error) {
      console.error(`${error.message}`);
      // Handle error as needed
    }
  },
  computed: {
    ...mapGetters('user', ['getUserDetails']),
  },
    methods: {
        ...mapActions('user',['setUserDetails', 'clearUserDetails']),
        checkout(cart) {
            this.cart = [...this.cart, ...cart]; // Merge current cart items with existing cart
            this.showCheckout = true;
        },
        clearCheckout() {
            this.cart = [];
            this.showCheckout = false;
        },
        closeModal() {
            this.isModalOpen = false;
        },
        async placeOrder() {

            if(this.getUserDetails?.data?.id) {
               
            try {
                // Call the CheckoutService to place the order
                const order = await CheckoutService.placeOrder(this.cart, this.getUserDetails.data.id);

                // Clear the cart after placing the order
                this.cart = [];
                this.showCheckout = false;

                this.emailOrderDetails(order, this.getUserDetails.data.id);

                this.$toastr.success(`Order placed successfully!`);

            } catch (error) {
                console.error('Error placing the order:', error.message);
                this.$toastr.error(`${error.message}`);
                // Handle error as needed
            }
          } else {

            this.isModalOpen = true;

            return;

          }
        },
        async storeUserDetails(userData) {
            try {
                // Create FormData
                const formData = new FormData();
                formData.append('name', userData.name);
                formData.append('email', userData.email);
                formData.append('password', 'password'); // temporary

                // Call the storeUserDetails to store the user details
                const user = await UserService.storeUserDetails(formData);

                // Dispatch the setUserDetails action to save user details in Vuex
                await this.$store.dispatch('user/setUserDetails', user);

                // Close the modal
                this.isModalOpen = false;

                this.$toastr.success(`User store successfully!`);

            } catch (error) {
                console.error('Error storing the user details:', error.message);
                this.$toastr.error(`${error.message}`);

            }
        },


        async emailOrderDetails(order, userId) {
            try {
                // Call the storeUserDetails to store the user details
               const email = await UserService.emailOrderDetails(order, userId);

               this.$toastr.success(`${email.message}`);


            } catch (error) {
                this.$toastr.error(`${error.message}`);
                // Handle error as needed
            }
        },
    }
  };
  </script>

<style scoped>
.container {
  padding: 20px;
  display: flex; /* Display children in a row */
  gap: 20px; /* Add spacing between products */
  overflow-x: auto; /* Add horizontal scroll if needed */
  justify-content: flex-start;
}

.place-order-button {
  margin-top: 20px;
  padding: 10px;
  background-color: #dc3545;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  height: 466px;
}

.place-order-button:hover {
  background-color: #c82333;
}

</style>
  