<?php

namespace App\Order;

use App\Order\FileOrder;
use App\Order\OrderFactory;

class FileOrderFactory implements OrderFactory
{
    public function createOrder()
    {
        return new FileOrder();
    }
}
