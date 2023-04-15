<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('dashboard.orders', compact('orders'));
    }
}
