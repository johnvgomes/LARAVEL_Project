@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Deletar Produto
                </div>
                <div class="panel-body">
                <div class="form-group col-md-12">
                Ei, Você deseja realmente deletar o produto: {{ $product->nome }}?
                </div>
                
                <div class="form-group col-md-1">
                {{ Form::open(['method' => 'DELETE', 'url' => '/products/'.$product->id, 'style' => 'display: inline;']) }}
                
                        <button type="submit" class="btn btn-primary btn-sm">
                           SIM
                        </button>
                {{ Form::close() }}
                </div>

                <div class="form-group col-md-11">
                <a href="../../products" class="btn btn-danger btn-sm">
                               
                NÃO
                </a>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection