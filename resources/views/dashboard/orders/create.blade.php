@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
    <div class="container">
      <form method="POST" action="{{ route('orders.store') }}">
        <div class="form-group row">
          <label for="status" class="col-md-4 col-form-label text-md-right">Status:</label>
          <div class="col-md-8">
            <select id="status" name="status" class="form-control">
              <option value="">Selecione o status</option>
              <option value="cancelado">Cancelado</option>
              <option value="enviado">Enviado</option>
              <option value="envio-pendente">Envio pendente</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="codigo" class="col-md-4 col-form-label text-md-right">Código de rastreio:</label>
          <div class="col-md-8">
            <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Insira o código de rastreamento">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </div>
      </form>
    </div>

  </body>
</html>

@endsection