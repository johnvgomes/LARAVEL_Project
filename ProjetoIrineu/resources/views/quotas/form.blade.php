@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Cotas
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informe abaixo as informações da cota
                    <a class="pull-right" href="{{url('quotas')}}">Listagem das cotas</a>
                </div>
                <div class="panel-body">
                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                @if(Request::is('*/edit'))
                      <!-- editando -->
                      {{Form::model($quotas, ['method' => 'PATCH','url' => 'quotas/'.$quotas->id])}}
                @else
                     <!-- incluindo -->

                {{ Form::open(['route' => 'quotas.store']) }}
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