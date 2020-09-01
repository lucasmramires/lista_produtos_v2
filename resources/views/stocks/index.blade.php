@extends('base')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Produtos</h1>
    <div>
    <a href="{{ route('stocks.create')}}" class="btn btn-primary mb-3">Adicionar Produto</a>
    </div>     
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nome do Produto</td>
          <td>Descrição</td>
          <td>Quantidade</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($stocks as $stock)
        <tr>
            <td>{{$stock->id}}</td>
            <td>{{$stock->product_name}} </td>
            <td>{{$stock->description}}</td>
            <td>{{$stock->quantity}}</td>
            <td>
                <a href="{{ route('stocks.edit',$stock->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('stocks.destroy', $stock->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection