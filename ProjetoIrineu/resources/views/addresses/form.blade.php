@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Endereços
@endsection
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="mui-panel">

                <div class="panel-heading">
                    Informe abaixo as informações do endereço
                </div>

                <div class="panel-body">
                @if(isset($errors) && count($errors)>0)
                <div class= "alert alert-danger">
                
                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
                </div>
              @endif
              @if(Session::has('mensagem_sucesso'))
                <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
              @endif

                <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','street',null)}}
                    <label>Rua</label>
                </div>

                <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('number','number',null)}}
                    <label>Nº Endereço</label>
                </div>

                <div class="mui-textfield mui-textfield--float-label">
                    {{ form::input('text','street',null)}}
                    <label>Rua</label>
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
