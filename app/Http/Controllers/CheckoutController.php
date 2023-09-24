<?php

namespace App\Http\Controllers;

use App\Events\NewOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function checkoutOrder()
    {
        $data = [
            'id' => '1',
            'item_name' => 'iPhone 14 Pro'
        ];
        event(new NewOrder($data)); // or NewOrder::dispatch($data);

        return $data;
    }
}
