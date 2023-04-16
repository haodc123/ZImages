<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use SoftDeletes;

    protected $table = 'customerorder';

    // below is no need because default
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';

    public function getAllOrders() {
        return self::all();
    }

    public function getAllOrdersPagination() {
        return self::paginate(\Config::get('constants.general.per_page'));
    }

    public function getOrdersFilter($name, $tel, $addr, $food, $status) {
        $orders = \DB::table('customerorder')
            ->where('customer_name', 'like', '%a%')
            ->paginate(\Config::get('constants.general.per_page'));
        return $orders;
    }

    public function getOrderWithPhone($phone) {
        return self::where('customer', $phone)->first();
    }

    public function save_order() {
        return $this->save();
    }

    public function update_order() {
        return self::where('id', $this->id)->update([
            'customer_addr' => $this->customer_addr,
            'order_note' => $this->order_note,
            'order_status' => $this->order_status
        ]);
    }

    public function delete_order() {
        return self::destroy($this->id);
    }
}
