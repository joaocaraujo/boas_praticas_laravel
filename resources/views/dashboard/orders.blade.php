@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-border">
            <thead>
            <tr>
                <th>#</th>
                <th>Status</th>
                <th>Paga</th>
                <th>Entrega N°</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->paid }}</td>
                        <td>{{ $order->track_code }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection