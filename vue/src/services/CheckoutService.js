// CheckoutService.js

const BASE_URL = 'http://localhost/api';

export default {
  async placeOrder(orderItems, uId) {
    try {
      const response = await fetch(`${BASE_URL}/checkout`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ orders: orderItems, uId: uId}),
      });

      if (!response.ok) {
        throw new Error('Failed to place the order');
      }

      const result = await response.json();

      return result;

     
    } catch (error) {
      console.error('Error placing the order:', error.message);
      throw error;
    }
  },
};
