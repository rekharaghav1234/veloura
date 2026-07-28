<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //

    public function updateStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $order->status = $request->status;

    // Delivered date save
    if(
        $request->status == 'Delivered' &&
        !$order->delivered_at
    ){
        $order->delivered_at = now();
    }

    $order->save();

    return back()->with(
        'success',
        'Order status updated successfully.'
    );
}

public function updateReturnApproval(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $request->validate([
        'return_approval_status' => 'required'
    ]);

    $order->return_approval_status =
        $request->return_approval_status;

    $order->save();

    return back()->with(
        'success',
        'Return request updated successfully.'
    );
}

public function updateReturnProcess(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $request->validate([
        'return_process_status' => 'required'
    ]);

    $order->return_process_status =
        $request->return_process_status;

    $order->save();

    return back()->with(
        'success',
        'Return process updated successfully.'
    );
}
}
