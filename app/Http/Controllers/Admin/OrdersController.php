<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Requests\OrdersRequest;
use App\Models\Orders;
use \JD\Cloudder\Facades\Cloudder;

/**
 * @resource /admin/orders
 *
 * CRUD orders
 */

class OrdersController extends Controller
{

  protected $orders;

  public function __construct(Orders $orders){
    $this->orders=$orders;
  }

  /*
    Get all registers
  */
  public function index(){
    return response('', 200);
  }

  public function show(int $id){
    return response('', 200);
  }



}
