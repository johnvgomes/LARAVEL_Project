@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Necessidades Especiais
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="mui-panel">
                <div class="panel-heading">
                Informe abaixo as informações da necessidade especial
                </div>

                <div class="panel-body">


                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                @if(Request::is('*/edit'))
                      <!-- editando -->
                      {{Form::model($spneeds, ['method' => 'PATCH','url' => 'specialneeds/'.$spneeds->id])}}
                @else
                     <!-- incluindo -->
                {{ Form::open(['route' => 'specialneeds.store']) }}
                @endif
                    <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','description',null,['class' => 'form-control', 'autofocus', 'placeholder' => 'Descrição'])}}

                         <label>Descrição</label>
                    </div>
                    <div style="margin-left: calc(50% - 115px);">
                        <a class="mui-btn mui-btn--raised" href="{{url('specialneeds')}}">Voltar</a>
                        <button type="submit" class="mui-btn mui-btn--primary">Salvar</button>
                    </div>
                {{ Form::close() }}
                </form>
                </div>
            </div>
        </div>
    </div>
</div>