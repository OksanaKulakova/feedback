<?php

namespace App\Order;

use App\Models\Order;
use App\Order\OrderInterface;
use Illuminate\Database\Eloquent\Model;

class BaseOrder implements OrderInterface
{
    public function create(array $attributes): Model
    {
        return Order::create($attributes);
    }
}