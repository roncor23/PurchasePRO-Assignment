<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Order;

class PlaceOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function placeOrders() {
            // Get the orders data from the request, default to an empty array
            $ordersData = $this->input('orders', []);

            $getUserId = $this->input('uId', '');

            $orders = [];

            // Loop through the orders data and create Order instances
            foreach ($ordersData as $orderData) {
                $order = Order::create([
                    'product_id' => $orderData['pid'],
                    'quantity' => $orderData['quantity'],
                    'user_id' => $getUserId,
                ]);

                $orders[] = $order;
            }

            return response()->json($orders);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
