@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Informe abaixo as informações do novo perfil
                <a class="pull-right" href="{{url('profiles')}}">Listagem dos perfis</a>
                </div>

                <div class="panel-body">


                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                @if(Request::is('*/edit'))
                      <!-- editando -->
                      {{Form::model($profiles, ['method' => 'PATCH','url' => 'profiles/'.$profiles->id])}}
                @else
                     <!-- incluindo -->

                {{ Form::open(['route' => 'profiles.store']) }}
                @endif


                        <div class="form-group col-md-2 ">
                            {{ form::label('name','Nome')}}
                        </div>

                        <div class="form-group col-md-10">
                            {{ form::input('text','name',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Nome'])}}
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