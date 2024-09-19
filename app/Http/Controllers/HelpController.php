<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helpers\ExceptionHandlerHelper;
use App\Models\Order;
use App\Repositories\User\ActivityRepository;
use Illuminate\Http\Request;

class HelpController extends Controller {
    public function getHelp(Request $request) {

        $order = Order::where('email', $request->email)
            ->where('reference_id', $request->reference_id)
            ->first();

        $orders = $order->orderItems;
        return view('pages.booking-help', compact('orders'));
    }
}