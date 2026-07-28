<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\ReturnRequest;
class AdminController extends Controller
{




    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);
    
        return view('admin.users.index', compact('users'));
    }
    
public function dashboard()
{
    $totalProducts = Product::count();

    $totalOrders = Order::count();

    $totalUsers = User::where('role','user')->count();

    $totalReturns = Order::whereNotNull('return_request_status')->count();

    $totalRevenue = Order::where('status', 'Delivered')->sum('total_amount');
    // Ya agar sabhi orders ka revenue chahiye to:
    // $totalRevenue = Order::sum('total_amount');


    $pendingOrders = Order::where('status','Pending')->count();

    $deliveredOrders = Order::where('status','Delivered')->count();

    return view('admin.dashboard', compact(
        'totalProducts',
        'totalOrders',
        'totalUsers',
        'totalReturns',
        'totalRevenue',
        'pendingOrders',
        'deliveredOrders'
    ));
}
}