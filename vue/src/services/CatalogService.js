// CatalogService.js

const BASE_URL = 'http://localhost/api';

export default {
  async getProducts() {
    try {
      const response = await fetch(`${BASE_URL}/catalog`);

      if (!response.ok) {
        throw new Error('Failed to fetch products');
      }

      const result = await response.json();

      return result;
      
    } catch (error) {
      console.error('Error fetching products:', error.message);
      throw error;
    }
  },
};
