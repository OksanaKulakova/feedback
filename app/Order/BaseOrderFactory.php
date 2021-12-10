<?php

namespace App\Order;

use App\Order\BaseOrder;
use App\Order\OrderFactory;

class BaseOrderFactory implements OrderFactory
{
    public function createOrder()
    {
        return new BaseOrder();
    }
}
