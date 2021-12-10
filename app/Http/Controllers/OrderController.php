<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order\BaseOrderFactory;
use App\Order\FileOrderFactory;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function add(OrderRequest $request)
    {
        $attributes = $request->validated();

        $baseOrderFactory = new BaseOrderFactory();
        $baseOrder = $baseOrderFactory->createOrder();
        $baseOrder->create($attributes);

        $fileOrderFactory = new FileOrderFactory();
        $fileOrder = $fileOrderFactory->createOrder();
        $fileOrder->create($attributes);

        $data['succes'] = ($baseOrder && $fileOrder) ? true : false;

        return response()->json($data);
    }
}
