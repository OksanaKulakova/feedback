<?php

namespace App\Order;

interface OrderInterface
{
    public function create(array $attributes);
}