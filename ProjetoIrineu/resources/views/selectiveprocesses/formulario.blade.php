@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Informe abaixo as informações do processo seletivo
                <a class="pull-right" href="{{url('selectiveprocesses')}}">Listagem dos processos seletivos</a>
                </div>

                <div class="panel-body">


                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                @if(Request::is('*/edit'))
                      <!-- editando -->
                      {{Form::model($selectiveprocesses, ['method' => 'PATCH','url' => 'selectiveprocesses/'.$selectiveprocesses->id])}}
                @else
                     <!-- incluindo -->

                {{ Form::open(['route' => 'selectiveprocesses.store']) }}
                @endif

                        <div class="form-group col-md-2 ">
                            {{ form::label('name','Nome')}}
                        </div>

                        <div class="form-group col-md-10">
                            {{ form::input('text','name',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Nome'])}}
                        </div>

                        <div class="form-group col-md-2 ">
                            {{ form::label('start_date','Inicio')}}
                        </div>

                        <div class="form-group col-md-10">
                            {{ form::date('text','start_date',null,['class' => 'form-control', 'autofocus', 'placeholder' => 'Inicio'])}}
                        </div>

                        <div class="form-group col-md-2 ">
                            {{ form::label('end_date','Termino')}}
                        </div>

                        <div class="form-group col-md-10">
                            {{ form::date('text','end_date',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Termino'])}}
                        </div>

                        <div class="form-group col-md-2 ">
                            {{ form::label('description','Descrição')}}
                        </div>

                        <div class="form-group col-md-10">
                            {{ form::input('text','description',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Descrição'])}}
                        </div>

                        <div class="form-group col-md-2 ">
                            {{ form::label('active','Ativo')}}
                        </div>

                        <div class="form-group col-md-10">
                            {{ form::checkbox('boolean','active',true,['class' => 'form-control', 'autofocus', 'placeholder' => ' Ativo'])}}
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