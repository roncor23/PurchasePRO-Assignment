<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;

class CheckoutController extends Controller
{
    public function store(PlaceOrderRequest $request)
    {
        return $request->placeOrders();
    }
}
