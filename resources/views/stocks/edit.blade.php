@extends('base') 

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Edição de Produto</h1>
 
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('stocks.update', $stock->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
 
                <label for="product_name">Nome do Produto</label>
                <input type="text" class="form-control" name="product_name" value="{{ $stock->product_name }}" />
            </div>
 
            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" name="description" value="{{ $stock->description }}" />
            </div>
 
            <div class="form-group">
                <label for="quantity">Quantidade</label>
                <input type="text" class="form-control" name="quantity" value="{{ $stock->quantity }}" />
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>
@endsection