<?php

namespace App\Http\Controllers;

use App\Orders;
use App\User;
use App\Enums\ResStatus;
use App\Http\Requests\PreOrderReq;
use Session;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    private $order;
    private $customer;

    public function save_order(PreOrderReq $request) {
        $validated = $request->validated();
        
        $request->merge(['f_status' => 0]);
        $this->do_save_order($request);
        
        $type = 'order';
        return redirect()->route('next', ['type' => $type]);
        
    }

    public function update_order(PreOrderReq $request) {
        if ($request->order_action == "delete") {
        
            $this->do_delete_order($request);
            
            // Prepare success info to view
            $type = 'deleteorder';
        } else {
            $validated = $request->validated();
            
            $this->do_update_order($request);
            
            // Prepare success info to view
            $type = 'updateorder';
        }

        return redirect()->route('next', ['type' => $type]);
        
    }

    public function do_save_order($request) {
        $input = $request->all();
        $customer = new User();
        $customer->user_tel = $input['f_tel'];
        $customer_id = $customer->save_user();

        $order = new Orders();
        $order->customer_tel = $input['f_tel'];
        $order->order_status = $input['f_status'];
        $order->customer_id = $customer_id;
        $order->save_order();
    }

    public function do_update_order($request) {
        $input = $request->all();
        $customer = new User();
        $customer->user_addr = $input['f_addr'];
        $customer->id = $input['f_customer_id'];
        $customer->update_user_addr();
        
        $order = new Orders();
        $order->customer_name = $input['f_name'];
        $order->customer_tel = $input['f_tel'];
        $order->customer_addr = $input['f_addr'];
        $order->order_note = $input['f_food'];
        $order->order_status = $input['f_status'];
        $order->id = $input['f_id'];
        $order->update_order();
    }

    public function do_delete_order($request) {
        $input = $request->all();
        $order = new Orders();
        $order->id = $input['f_id'];
        $order->delete_order();
    }

    public function ctr_list_orders() {
        $order = new Orders();
        $list_orders = $order->getAllOrdersPagination();

        return view('control.orders', [
            'orders' => $list_orders
        ]);
    }

    public function ctr_filter_orders(Request $request) {
        $name = $request->name;
        $tel = $request->tel;
        $addr = $request->addr;
        $food = $request->food;
        $status = $request->status;

        $order = new Orders();
        $list_orders = $order->getOrdersFilter($name, $tel, $addr, $food, $status);

        return response()->json([
            "data" => $list_orders,
            "status" => ResStatus::Success
        ]);
    }
}
