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

        if (request()->get('status')) {
            switch (request()->get('status')) {
                case 'pending':
                    $orders = $orders->where('status', 'pending');
                    break;
                case 'delivered':
                    $orders = $orders->where('status', 'delivered');
                    break;
                
                default:
                    # code...
                    break;
            }
        } else if (request()->get('paid')) {
            $orders = $orders->where('paid', '1');
        } else if (request()->get('paid') != 1) {
            $orders = $orders->where('paid', '0');
        }
        return view('dashboard.orders', compact('orders'));
    }
}
