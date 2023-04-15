@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{ route('orders.index', ['status' => 'pending']) }}" class="btn btn-warning">Pendentes</a>
        <a href="{{ route('orders.index', ['status' => 'delivered'])  }}" class="btn btn-primary">Enviados</a>
        <a href="{{ route('orders.index', ['paid' => 1])  }}" class="btn btn-success">Pagos</a>
        <a href="{{ route('orders.index', ['paid' => 0])  }}" class="btn btn-danger">Não pagos</a>
        <a href="{{ route('orders.index') }}" class="btn btn-light">Limpar Filtro</a>
        <hr>

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
                        <td>{{ $order->status == 'delivered' ? 'Enviado' : 'Envio pendente'}}</td>
                        <td>{{ $order->paid == 1 ? 'Pago' : 'Em aberto'}}</td>
                        <td>{{ $order->track_code }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection