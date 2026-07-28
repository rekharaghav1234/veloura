<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ReturnRequest;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function myOrders()
    {
        $orders = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
    
        foreach ($orders as $order) {
    
            foreach ($order->items as $item) {
    
                if ($item->product) {
    
                    $images = json_decode($item->product->images, true);
    
                    if (!is_array($images)) {
                        $images = explode(',', $item->product->images);
                    }
    
                    $item->product->first_image = trim($images[0] ?? '', '[]" ');
                }
            }
        }
    
        return view('frontend.my-orders', compact('orders'));
    }

    public function cancelOrder($id)
{
    $order = Order::where('id', $id)
                  ->where('user_id', auth()->id())
                  ->firstOrFail();

    if (in_array($order->status, ['Pending', 'Processing'])) {

        $order->status = 'Cancelled';
        $order->save();

        return back()->with('success', 'Order cancelled successfully.');
    }

    return back()->with('error', 'This order cannot be cancelled.');
}

public function returnForm($id)
{
    $order = Order::findOrFail($id);

    return view('frontend.order-return', compact('order'));
}

public function submitReturn(Request $request, $id)
{
    $request->validate([
        'reason' => 'required',
        'description' => 'nullable',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    $order = Order::findOrFail($id);

    // Already requested check
    if($order->return_request_status == 'Requested')
    {
        return back()->with(
            'error',
            'Return request already submitted.'
        );
    }

    // 5 Days Return Policy Check
    if (
        !$order->delivered_at ||
        now()->gt(
            \Carbon\Carbon::parse($order->delivered_at)
            ->addDays(5)
        )
    ) {
        return back()->with(
            'error',
            'Return period has expired. Returns are allowed only within 5 days of delivery.'
        );
    }

    $imageName = null;

    if($request->hasFile('image'))
    {
        $imageName =
            time().'_'.$request->image->getClientOriginalName();

        $request->image->move(
            public_path('uploads/returns'),
            $imageName
        );
    }

    ReturnRequest::create([
        'order_id'    => $order->id,
        'user_id'     => auth()->id(),
        'reason'      => $request->reason,
        'description' => $request->description,
        'image'       => $imageName,
        'status'      => 'Return Requested'
    ]);

    // Orders table update
    $order->status = 'Return Requested';

    $order->return_request_status = 'Requested';

    $order->return_approval_status = null;

    $order->return_process_status = null;

    $order->save();

    return redirect()
            ->route('my.orders')
            ->with(
                'success',
                'Return request submitted successfully.'
            );
}


public function updateRefundStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $order->refund_status = $request->refund_status;

    $order->save();

    return back()->with(
        'success',
        'Refund status updated successfully.'
    );
}
}