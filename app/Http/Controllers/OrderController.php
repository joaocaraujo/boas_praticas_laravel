<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where(function($query) {

            if (!empty(request()->get('status'))) {
                $query->status(request()->get('status'));
            }         

            if (request()->get('paid') == 1)
                $query->paid();
        })->get();

        return view('dashboard.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('dashboard.orders.create');
    }

    public function store(OrderRequest $request)
    {
        Order::create($request->all());
    }
}
