@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Clientes
                <a class="pull-right" href="{{url('clientes/novo')}}">Novo cliente</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   Listagem de Clientes
                </div>
            </div>
        </div>
    </div>
</div>
@endsection