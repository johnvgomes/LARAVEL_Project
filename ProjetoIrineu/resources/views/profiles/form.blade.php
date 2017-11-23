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

<!--
                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif
-->
                @if(Request::is('*/edit'))
                      <!-- editando -->
                      {{Form::model($profiles, ['method' => 'PATCH','url' => 'profiles/'.$profiles->id])}}
                @else
                     <!-- incluindo -->

                {{ Form::open(['route' => 'profiles.store']) }}
                @endif
<!--
                        <div class="form-group col-md-3 ">
                            {{ form::label('name','IMG')}}
                        </div>

                        <div class="form-group col-md-9">
                            {{ form::input('file','name',null,['class' => '', ''])}}
                        </div>
-->
                        <div class="form-group col-md-3 ">
                            {{ form::label('name','Nome')}}
                        </div>

                        <div class="form-group col-md-9 ">
                        {{ form::label('name',strtoupper(Auth::user()->name))}}
                         </div>


                        <div class="form-group col-md-3 ">
                            {{ form::label('date','Data de nascimento')}}
                        </div>

                        <div class="form-group col-md-9">
                                
                            {{ form::date('date',null,['class' => 'form-control', 'autofocus', 'placeholder' => 'Data Nascimento'])}}
                        </div>

                        <div class="form-group col-md-3 ">
                            {{ form::label('rg','RG')}}
                        </div>

                        <div class="form-group col-md-9">
                            {{ form::input('text','rg',null,['class' => 'form-control', 'autofocus', 'placeholder' => 'RG'])}}
                        </div>

                        <div class="form-group col-md-3 ">
                            {{ form::label('rg','Emissor do rg')}}
                        </div>

                        <div class="form-group col-md-9">
                            {{ form::input('text','rgemitter',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Nome'])}}
                        </div>

                        
                        <div class="form-group col-md-3 ">
                            {{ form::label('cpf','CPF')}}
                        </div>

                        <div class="form-group col-md-9">
                            {{ form::input('text','cpf',null,['class' => 'form-control', 'autofocus', 'placeholder' => 'CPF'])}}
                        </div>

                          
                        <div class="form-group col-md-3 ">
                            {{ form::label('sex','Sexo')}}
                        </div>

                        <div class="form-group col-md-9">


                        {{ Form::select('sex',  [
                                'masculino' => 'Masculino',
                                'feminino' => 'Feminino'
                                ], null, ['class' => 'form-control']) 
                        }}  
                         </div>
                         
                         <div class="form-group col-md-3 ">
                            {{ form::label('namefather','Nome do Pai')}}
                        </div>

                        <div class="form-group col-md-9">
                            {{ form::input('text','namefather',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Nome do Pai'])}}
                        </div>

                        <div class="form-group col-md-3 ">
                            {{ form::label('passport','Nome da Mãe')}}
                        </div>

                        <div class="form-group col-md-9">
                            {{ form::input('text','namemother',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Nome da Mãe'])}}
                        </div>

                        <div class="form-group col-md-3 ">
                            {{ form::label('passport','Passaporte')}}
                        </div>

                        <div class="form-group col-md-9">
                            {{ form::input('text','passport',null,['class' => 'form-control', 'autofocus', 'placeholder' => 'Passaporte'])}}
                        </div>

                        <div class="form-group col-md-3 ">
                            {{ form::label('naturaless','Naturalidade')}}
                        </div>

                        <div class="form-group col-md-9">
                            {{ form::input('text','naturaless',null,['class' => 'form-control', 'autofocus', 'placeholder' => 'Naturalidade'])}}
                        </div>

                        
                        <div class="form-group col-md-3 ">
                            {{ form::label('phone','Telefone')}}
                        </div>

                        <div class="form-group col-md-9">
                            {{ form::input('text','phone',null,['class' => 'form-control', 'autofocus', 'placeholder' => 'Telefone'])}}
                        </div>

                        <div class="form-group col-md-3 ">
                            {{ form::label('mobile','Celular')}}
                        </div>

                        <div class="form-group col-md-9">
                            {{ form::input('text','mobile',null,['class' => 'form-control', 'autofocus', 'placeholder' => 'Celular'])}}
                        </div>

                        <div class="form-group col-md-3 ">
                            {{ form::label('scholarity','Escolaridade')}}
                        </div>

                        <div class="form-group col-md-9">
                        
                        
                                                {{ Form::select('scholarity',  [
                                                        'Fundamental - Incompleto' => 'Fundamental - Incompleto',
                                                        'Fundamental - Completo' => 'Fundamental - Completo',
                                                        'Médio - Incompleto' => 'Médio - Incompleto',
                                                        'Médio - Completo' => 'Médio - Completo',
                                                        'Superior - Incompleto' => 'Superior - Incompleto',
                                                        'Superior - Completo' => 'Superior - Completo'
                                                        ], null, ['class' => 'form-control']) 
                                                }}  
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