@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Isenções
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informe abaixo as informações da isenção
                    <a class="pull-right" href="{{url('exemptions')}}">Listagem das isenções</a>
                </div>
                <div class="panel-body">
                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                @if(Request::is('*/edit'))
                      <!-- editando -->
                      {{Form::model($exemptions, ['method' => 'PATCH','url' => 'exemptions/'.$exemptions->id])}}
                @else
                     <!-- incluindo -->

                {{ Form::open(['route' => 'exemptions.store']) }}
                @endif

                    <div class="form-group col-md-2 ">
                        {{ form::label('reason','motivo')}}
                    </div>

                    <div class="form-group col-md-10">
                        {{ form::input('text','reason',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Motivo'])}}
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