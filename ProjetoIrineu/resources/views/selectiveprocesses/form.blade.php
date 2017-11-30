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
                    {{ form::checkbox('active',true)}}
                    <span style="margin-left: 10px;">{{ form::label('active','Ativo')}}</span>
                </div>             
                <table class="mui-table ">
                <tbody>
                <thead>
                    <tr>
                        <th>
                            Cursos
                        </th>
                    </tr>
                </thead>
                @foreach ($courses as $course)                
                    @if ($course->count() == 0)
                        <tr> 
                            <p>não há cursos cadastrados</p>
                        </tr>  
                    @else
                    <tr>
                        <td class="">
                        
                            <span>{{ form::checkbox('course[$course->id][id]',$course->id,null,['class' => 'cb', 'id' => ''.$course->name])}}</span>
                            <span style="margin-left: 10px;">{{ form::label('name',$course->name)}}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="mui-textfield mui-textfield--float-label">

                             {{ form::input('number',"course[$course->id][vacancy]",null,['autofocus'])}}
                                     
                            <label>Vagas</label>
                        </td>
                    </tr> 
                    @endif
                @endforeach
                </tbody>
                </table>
                <table class="mui-table">
                <tbody>
                <thead>
                    <tr>
                        <th>
                            Cotas
                        </th>
                    </tr>
                </thead>
                @foreach ($quotas as $quotas)                
                    @if ($quotas->count() == 0)
                        <tr class=""> 
                            <p>não há cursos cadastrados</p>
                        </tr>    
                    @else
                        <tr>
                            <td>
                                {{ form::checkbox('quotas[$quotas->id][id]',$quotas->id,null,['class' => 'cb', 'id' => ''.$quotas->name])}}
                                <span style="margin-left: 10px;">{{ form::label('name',$quotas->name)}}</span>
                            </td> 
                        </tr> 
                        <tr>    
                            <td class="mui-textfield mui-textfield--float-label">
                                {{ form::input('number','vacancy',null)}}
                                <label>Vagas</label>
                            </td>
                        </tr>
                        
                    @endif
                @endforeach
                </tbody>
                </table>
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
