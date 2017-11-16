@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Produtos
                <a class="pull-right" href="{{url('products/create')}}">Novo produto</a>
                </div>
                <div class="panel-body">

                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                <table class ="table">
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th></th>
                    <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->nome }}</td>
                                <td>{{ $product->valor }}</td>
                                <td>{{ $product->qtd }}</td>
                                <td>{{ $product->category->descricao }}</td>
                                <td>


                                <a href="products/{{ $product->id }}/editar" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>


                                <a href="products/{{ $product->id }}/confirmDelete" class="btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                                
                                 </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection