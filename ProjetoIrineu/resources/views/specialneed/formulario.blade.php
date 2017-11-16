@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Informe abaixo as informações da categoria
                <a class="pull-right" href="{{url('specialneeds')}}">Listagem das necessidades especiais</a>
                </div>

                <div class="panel-body">


                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                @if(Request::is('*/editar'))
                      <!-- editando -->
                      {{Form::model($spneeds, ['method' => 'PATCH','url' => 'specialneeds/'.$spneeds->id])}}
                @else
                     <!-- incluindo -->

                      {{ Form::open(['url' => 'specialneeds/salvar']) }}
                @endif


                        <div class="form-group col-md-2 ">
                            {{ form::label('description','Descrição')}}
                        </div>

                        <div class="form-group col-md-10">
                            {{ form::input('text','description',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Descrição'])}}
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