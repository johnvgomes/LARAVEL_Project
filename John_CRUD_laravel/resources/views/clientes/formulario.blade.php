@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Informe abaixo as informações do cliente
                <a class="pull-right" href="{{url('clientes')}}">Listagem cliente</a>
                </div>

                <div class="panel-body">
                  
                {{ Form::open() }}

                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection