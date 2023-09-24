<?php

namespace App\Broadcasting;

class CheckoutChannel
{
    public function join()
    {
        return ['message' => 'Join success!'];
    }
}
