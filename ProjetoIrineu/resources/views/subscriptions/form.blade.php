@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Inscrição
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="mui-panel">
                <div class="panel-heading">
                    Informe abaixo as informações da inscrição
                </div>
                <div class="panel-body">

                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                @if(Request::is('*/edit'))
                      <!-- editando -->
                      {{Form::model($subscriptions, ['method' => 'PATCH','url' => 'subscriptions/'.$subscriptions->id])}}
                @else
                     <!-- incluindo -->
                {{ Form::open(['route' => 'subscriptions.store']) }}
                @endif
                    <table class="mui-table ">
                        <tbody>
                            <thead>
                                <tr>
                                    <th>
                                        Processo Seletivo
                                    </th>
                                </tr>
                            </thead>
                            @if ($selectiveprocesses->count() == 0)
                                    <tr> 
                                        <p>não há processos seletivos cadastrados</p>
                                    </tr>  
                            @else
                                @foreach ($selectiveprocesses as $selectiveprocess)                
                                    <tr>
                                        <td class="">
                                            <span>{{ form::checkbox('selective_proccess[$selectiveprocess->id][id]',$selectiveprocess->id,null,['class' => 'cb', 'id' => ''.$selectiveprocess->name])}}</span>
                                            <span style="margin-left: 10px;">{{ form::label('name',$selectiveprocess->name)}}</span>
                                        </td>
                                    </tr> 
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <table class="mui-table ">
                        <tbody>
                            <thead>
                                <tr>
                                    <th>
                                        Curso
                                    </th>
                                </tr>
                            </thead>
                            @if ($courses->count() == 0)
                                    <tr> 
                                        <p>não há processos seletivos cadastrados</p>
                                    </tr>  
                            @else
                                @foreach ($courses as $course)                
                                    <tr>
                                        <td class="">
                                            <span>{{ form::checkbox('course[$course->id][id]',$course->id,null,['class' => 'cb', 'id' => ''.$course->name])}}</span>
                                            <span style="margin-left: 10px;">{{ form::label('name',$course->name)}}</span>
                                        </td>
                                    </tr> 
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <table class="mui-table ">
                        <tbody>
                            <thead>
                                <tr>
                                    <th>
                                        Cota
                                    </th>
                                </tr>
                            </thead>
                            @if ($courses->count() == 0)
                                <tr> 
                                    <p>não há cotas cadastradas</p>
                                </tr>  
                            @else
                                @foreach ($quotas as $quota)                
                                    <tr>
                                        <td class="">
                                            <span>{{ form::checkbox('quota[$quota->id][id]',$quota->id,null,['class' => 'cb', 'id' => ''.$quota->name])}}</span>
                                            <span style="margin-left: 10px;">{{ form::label('name',$quota->name)}}</span>
                                        </td>
                                    </tr> 
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div style="margin-left: calc(50% - 115px);">
                        <a class="mui-btn mui-btn--raised" href="{{url('subscriptions')}}">Voltar</a>
                        <button type="submit" class="mui-btn mui-btn--primary">Salvar</button>
                    </div>
                {{ Form::close() }}
                </form>
                </div>
            </div>
        </div>
    </div>
</div>