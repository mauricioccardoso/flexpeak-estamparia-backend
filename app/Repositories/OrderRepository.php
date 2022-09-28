<?php

namespace App\Repositories;

use App\Helpers\Enums\OrderStatus;
use App\Http\Requests\OrderRequest;
use App\Models\Item;
use App\Models\Order;
use DateTime;
use Illuminate\Support\Facades\DB;


class OrderRepository
{
  public function add(OrderRequest $request)
  {

    return DB::transaction(function () use ($request) {
      $dateNow = new DateTime();

      $order = Order::create([
        'user_id' => $request->user_id,
        'created_at' => $dateNow->format('Y-m-d H:i:s'),
        'order_status' => OrderStatus::PedidoRealizado,
      ]);

      
      $itemsData = array_map(function ($item) use ($order) {
        $item['order_id'] = $order->id;
        unset($item['id']);
        return $item;
      }, $request->items);

      Item::insert($itemsData);

      return $order;
    });
  }
}
