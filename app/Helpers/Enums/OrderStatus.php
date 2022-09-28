<?php 

namespace App\Helpers\Enums;

enum OrderStatus : string
{
  case PedidoRealizado = 'Pedido Realizado';
  case PedidoConfirmado = 'Pedido Confirmado';
  case PedidoConfecção = 'Pedido em Confecção';
  case PedidoFinalizado = 'Pedido Finalizado';
}