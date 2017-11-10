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


                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                @if(Request::is('*/editar'))
                      <!-- editando -->
                      {{Form::model($cliente, ['method' => 'PATCH','url' => 'clientes/'.$cliente->id])}}
                @else
                     <!-- incluindo -->

                      {{ Form::open(['url' => 'clientes/salvar']) }}
                @endif


               
                        
                        
                        <div class="form-group col-md-2 ">
                            {{ form::label('nome','Nome')}}
                        </div>

                        <div class="form-group col-md-10">
                            {{ form::input('text','nome',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Nome'])}}
                        </div>

                        <div class="form-group col-md-2">
                            {{ form::label('endereco','Endereço')}}
                        </div>

                        <div class="form-group col-md-10">
                        {{ form::input('text','endereco',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Endereço'])}}
                        </div>

                        <div class="form-group col-md-2">
                            {{ form::label('numero','Número')}}
                        </div>

                        <div class="form-group col-md-10">
                        {{ form::input('text','numero',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Número'])}}
                        </div>


                        <div class="col-md-4 col-md-offset-8">
                        <div class="form-group pull-right">
                            {{ form::submit('Salvar',['class'=>'btn btn-primary'])}}
                        </div>
                        </div>

                {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection