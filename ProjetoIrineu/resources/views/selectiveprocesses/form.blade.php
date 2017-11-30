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

                <div class="mui-textfield mui-textfield">
                {{ form::date('start_date',null,['class' => '', 'autofocus'])}}
                 
                     <label>Data de Inicio</label>
                </div>

                <div class="mui-textfield mui-textfield">
                {{ form::date('end_date',null,['class' => '', 'autofocus'])}}
                 
                     <label>Data de Fim</label>
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
                @if ($course->count() == 0)
                        <tr> 
                            <p>não há cursos cadastrados</p>
                        </tr>  
                @else
                    @foreach ($courses as $course)                
                        <tr>
                            <td class="">
                            
                                <span>{{ form::checkbox("course[$course->id][id]",$course->id,null,['class' => 'cb', 'id' => ''.$course->name])}}</span>
                                <span style="margin-left: 10px;">{{ form::label('name',$course->name)}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="mui-textfield mui-textfield--float-label">

                                {{ form::input('number',"course[$course->id][vacancy]",null,['autofocus'])}}
                                        
                                <label>Vagas</label>
                            </td>
                        </tr> 
                    @endforeach
                @endif
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
                @if ($quotas->count() == 0)
                        <tr class=""> 
                            <p>não há cursos cadastrados</p>
                        </tr>    
                @else
                    @foreach ($quotas as $quotas)                
                            <tr>
                                <td>
                                    {{ form::checkbox("quotas[$quotas->id][id]",$quotas->id,null,['class' => 'cb', 'id' => ''.$quotas->name])}}
                                    <span style="margin-left: 10px;">{{ form::label('name',$quotas->name)}}</span>
                                </td> 
                            </tr> 
                            <tr>    
                                <td class="mui-textfield mui-textfield--float-label">
                                    {{ form::input('number',"quotas[$quotas->id][vacancy]",null)}}
                                    <label>Vagas</label>
                                </td>
                            </tr>
                    @endforeach
                @endif
                </tbody>
                </table>
               <!-- btn voltar -->
               <div style="margin-left: calc(50% - 115px);">
               <a class="mui-btn mui-btn--raised" href="{{url('selectiveprocesses')}}">Voltar</a>
               <button type="submit" class="mui-btn mui-btn--primary">Salvar</button>
                 </div>
     
                {{ Form::close() }}              
                </form>  
                </div>
            </div>
        </div>
    </div>
</div>
