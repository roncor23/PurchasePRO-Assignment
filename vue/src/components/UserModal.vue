<template>
        <!-- Modal component -->
        <div v-if="isModalOpen" class="modal">
            <div class="modal-content">
                <h2>User Details</h2>
                <form @submit.prevent="storeUserDetails">
                <label for="name">Name:</label>
                <input type="text" id="name" v-model="user.name" required />

                <label for="email">Email:</label>
                <input type="email" id="email" v-model="user.email" required />

                <button type="submit" class="submit-button">Submit</button>
                </form>
                <button @click="closeModal" class="close-modal">Close</button>
            </div>
        </div>
</template>
<script>
export default {
  name: 'UserModal',
  props: {
    isModalOpen: Boolean
  },
  data() {
    return {
        user: {
            name: '',
            email: '',
        },
    };
  },
  methods: {

    storeUserDetails() {

      this.$emit('storeUserDetails', this.user);
  
    },

  },

};
</script>
<style scoped>
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content {
  background-color: #fff;
  padding: 50px;
  border-radius: 8px;
}
label,input {
    padding: 8px;
}
.submit-button {
    padding: 8px;
    cursor: pointer;
}
.close-modal {
    padding: 8px;
    margin-top: 30px;
}
</style>