<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Mail\OrderShipped;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailRequest extends FormRequest
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

    public function emailOrderSummary() {

        $ordersData = $this->input('orders', []);
        $userId = $this->input('userId', '');

        // Check if userId is provided and not an empty string
        if ($userId !== '' && is_numeric($userId)) {
            // Assuming your users table has 'id', 'name', and 'email' columns
            $user = User::find($userId);

            if ($user) {
                $userEmail = $user->email;

                // Now you can use $userEmail to send the email
                Mail::to($userEmail)->send(new OrderShipped($userEmail, $ordersData));

                return response()->json(['message' => 'Order summary sent successfully', 'userEmail' => $userEmail]);
            } else {
                return response()->json(['message' => 'User not found'], 404);
            }
        } else {
            return response()->json(['message' => 'Invalid userId'], 400);
        }
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
