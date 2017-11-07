@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Produtos
                <a class="pull-right" href="{{url('products/novo')}}">Novo produto</a>
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
                            @foreach ($product as $products)
                            <tr>
                                <td>{{ $products->nome }}</td>
                                <td>{{ $products->valor }}</td>
                                <td>{{ $products->qtd }}</td>
                                <td>{{ $products->descricao }}</td>
                                <td>


                                <a href="products/{{ $products->id }}/editar" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>


                                <a href="products/{{ $products->id }}/confirmDelete" class="btn btn-danger btn-sm">
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