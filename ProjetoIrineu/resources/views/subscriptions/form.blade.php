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
                    <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','name',null,['autofocus'])}}

                         <label>Nome</label>
                    </div>
                        @foreach ($specialNeeds as $sn)  
                            @if ($sn->count() == 0)

                            <p class="mui-textfield mui-textfield" >não há necessidades especiais cadastradas</p>
                        
                            @else

                            <div class="form-group col-md-12 "> 
                                <div class="form-group col-md-3 ">
                                    <div class="mui-checkbox">
                                                <label>
                                                {{ form::checkbox("special_need[$sn->id][id]", $sn->id ,null,['id' => ''.$sn->description])}}
                                                {{$sn->description}}
                                                </label>
                                    </div>
                                </div>
                                                
                                <div class="form-group col-md-3 ">
                                    <div class="mui-textfield mui-textfield--float-label">
                                        {{ form::input('text','special_need[$sn->id][observation]',null,['autofocus'])}}
                                            
                                        <label>observação</label>
                                    </div>
                                                
                                </div>  

                                <div class="form-group col-md-6 "> 
                                
                                    <div class="form-group col-md-6 "> 
                                        <div class="mui-textfield mui-textfield">
                                            {{ form::input('text','lblpermanent','Permanente:',['disabled'])}}

                                        </div>
                                    </div> 

                                    <div class="form-group col-md-3 "> 
                                                <div class="mui-radio ">
                                                    <br>
                                                    <label>
                                                    {{ form::radio("special_need[$sn->id][permanent]", 1) }}
                                                
                                                    sim
                                                    </label>
                                                </div>             
                                    </div>

                                    <div class="form-group col-md-3 "> 
                                                <div class="mui-radio ">
                                                    <br>
                                                    <label>
                                                    {{ form::radio("special_need[$sn->id][permanent]", 0) }}
                                                
                                                    não
                                                    </label>
                                                </div>             
                                    </div> 
                                </div> 

                                
                            </div>
                        @endif
                    @endforeach
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