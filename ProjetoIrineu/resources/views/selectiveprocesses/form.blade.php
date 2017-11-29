@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Processos Seletivos
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="mui-panel">

                <div class="panel-heading">
                    Informe abaixo as informações do processo seletivo
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

                <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','name',null)}}
                    <label>Nome</label>
                </div>

                <div class="mui-textfield mui-textfield--float-label">
                    {{ form::date('start_date',null)}}
                </div>

                <div class="mui-textfield mui-textfield--float-label">
                    {{ form::date('end_date',null)}}
                </div>

                <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','description')}}
                    <label>Descrição</label>
                </div>

                <div class="form-group col-md-2 ">
                    {{ form::label('active','Ativo:')}}
                </div>

                <div class="form-group col-md-10">
                    {{ form::checkbox('active',true)}}
                </div>             

                

                <div class="form-group col-md-12 ">
                    <h4>CURSOS</h4>
                    <hr>
                </div>
                
                @foreach ($courses as $course)                
                    @if ($course->count() == 0)
                        <div class="form-group col-md-12 "> 
                            <p>não há cursos cadastrados</p>
                        </div>    
                    @else
                        <div class="form-group col-md-12 "> 
                            <div class="form-group col-md-3 ">
                                {{ form::label('name',$course->name)}} 
                            </div>
                            <div class="form-group col-md-1 ">
                                {{ form::checkbox("special_need[$sn->id][id]", $sn->id ,null,['class' => 'cb', 'id' => ''.$sn->description])}} 
                                {{ form::checkbox('course[$course->id][id]',$course->id,null,['class' => 'cb', 'id' => ''.$course->name])}}
                            </div>
                            <div class="mui-textfield mui-textfield--float-label">
                                {{ form::input('number','vacancy',null)}}
                                <label>Vagas</label>
                            </div> 
                        </div> 
                    @endif
                @endforeach
                
                <div class="form-group col-md-12 ">
                    <h4>COTAS</h4>
                    <hr>
                </div>

                @foreach ($quotas as $quotas)                
                    @if ($quotas->count() == 0)
                        <div class="form-group col-md-12 "> 
                            <p>não há cursos cadastrados</p>
                        </div>    
                    @else
                        <div class="form-group col-md-12 "> 
                            <div class="form-group col-md-3 ">
                                {{ form::label('name',$quotas->name)}} 
                            </div>
                            <div class="form-group col-md-1 ">
                                {{ form::checkbox('quotas[$quotas->id][id]',$quotas->id,null,['class' => 'cb', 'id' => ''.$quotas->name])}}
                            </div>
                            <div class="mui-textfield mui-textfield--float-label">
                                {{ form::input('number','vacancy',null)}}
                                <label>Vagas</label>
                            </div> 
                        </div> 
                    @endif
                @endforeach

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
