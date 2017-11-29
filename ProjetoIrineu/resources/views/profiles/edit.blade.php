@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Perfis
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Informe abaixo as informações do novo perfil
                <a class="pull-right" href="{{url('profiles')}}">Listagem dos perfis</a>
                </div>

                <div class="panel-body">

               
                      <!-- editando -->
                      {{Form::model($profile, ['method' => 'PATCH','url' => 'profiles/'.$profile->id])}}
                
                      <div class="form-group col-md-3 ">
                            {{ form::label('name','Nome')}}
                        </div>

                        <div class="form-group col-md-9 ">
                        {{ form::label('name',strtoupper($profile->user->name))}}
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


                                                 <div class="form-group col-md-12 ">
                                                 <h4>NECESSIDADES ESPECIAIS</h4>
                                                 <hr>
                                                 </div>
                                                 

                        @foreach ($specialNeeds as $sn)

                        
                            @if ($sn->count() == 0)
                            <div class="form-group col-md-12 "> 
                            
                            <p>não há necessidades especiais cadastradas</p>
                            </div>    
                            @else
                            
                                        <div class="form-group col-md-12 "> 
                                        <div class="form-group col-md-3 ">
                                        
                                         {{ form::checkbox("special_need[$sn->id][id]", $sn->id , ($profile->specialNeeds->find($sn->id)) ? true : false, ['class' => 'cb', 'id' => ''.$sn->description])}}
                                         {{ form::label('scholarity',$sn->description)}}
                                         </div>
                                         <div class="form-group col-md-3 ">
                                         {{ form::input('text',"special_need[$sn->id][observation]",($profile->specialNeeds->find($sn->id)) ? $profile->specialNeeds->find($sn->id)->pivot->observation : false,['class' => 'form-control', 'autofocus', 'placeholder' => 'Observação'])}}
                                        </div>      
                                         <div class="form-group col-md-6 "> 

                                         <div class="form-group col-md-6 "> 
                                         {{ form::label('lblpermanent','Permanente:')}}
                                         </div>      

                                         <div class="form-group col-md-3 "> 
                                         {{ form::radio("special_need[$sn->id][permanent]", 1, ($profile->specialNeeds->find($sn->id) && $profile->specialNeeds->find($sn->id)->pivot->permanent ==1) ? true : false) }}
                                         {{ form::label("special_need[$sn->id][permanent]",'sim')}}
                                         </div>
                                       
	                                    <div class="form-group col-md-3 "> 
                                         {{ form::radio("special_need[$sn->id][permanent]", 0,($profile->specialNeeds->find($sn->id) && $profile->specialNeeds->find($sn->id)->pivot->permanent ==1) ? false : true)}}
                                         {{ form::label("special_need[$sn->id][permanent]",'não')}}
                                         </div>
                                         
                                         </div>
                                        </div>
                                   

                            @endif
                        @endforeach

                           
                         
        <!--
                        <div class="form-group col-md-9">
                            {{ form::checkbox('special_need_id[]',null,['class' => 'form-control', 'autofocus', ''])}}
                            <label>Teste</label><br />
                            {{ form::checkbox('special_need_id[]',null,['class' => 'form-control', 'autofocus', ''])}}
                            {{ form::checkbox('special_need_id[]',null,['class' => 'form-control', 'autofocus', ''])}}
                        </div>
-->

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