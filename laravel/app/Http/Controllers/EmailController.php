<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;

class EmailController extends Controller
{
    public function sendOrderEmail(EmailRequest $request)
    {
        return $request->emailOrderSummary();
    }
}
