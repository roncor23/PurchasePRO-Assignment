// CheckoutService.js

const BASE_URL = 'http://localhost/api';

export default {
  async storeUserDetails(userDetails) {

    try {
      const response = await fetch(`${BASE_URL}/user`, {
        method: 'POST',
        body: userDetails,
      });

      if (!response.ok) {
        throw new Error('Failed to store the user details');
      }

    
      const result = await response.json();
      console.log("check result user", result);

      return result;

    

    } catch (error) {
      console.error('Error storing the user details:', error.message);
      throw error;
    }
  },
  async emailOrderDetails(order, userid) {

    try {
      const response = await fetch(`${BASE_URL}/email/send`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({orders: order, userId: userid}),
      });

      if (!response.ok) {
        throw new Error('Failed to send the order details in email');
      }

    
      const result = await response.json();
      console.log("check result user", result);
      
      return result;

    

    } catch (error) {
      console.error('Error storing the user details:', error.message);
      throw error;
    }
  },
};
