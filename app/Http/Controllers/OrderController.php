<?php

namespace App\Http\Controllers;

use App\Helpers\Enums\OrderStatus;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\User;
use App\Repositories\OrderRepository;
use DateTime;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private OrderRepository $orderRepository)
    {
    }


    public function index(Request $request)
    {
        return User::all();
    }

    public function store(OrderRequest $request)
    {
        return response()
            ->json($this->orderRepository->add($request), 201);
    }
}
