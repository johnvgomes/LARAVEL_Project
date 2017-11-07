@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                Informe abaixo as informações do produto
                <a class="pull-right" href="{{url('products')}}">Listagem dos produtos</a>
                </div>

                <div class="panel-body">


                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif
                @if(Session::has('mensagem_fail'))
                  <div class= "alert alert-danger">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                @if(Request::is('*/editar'))
                      <!-- editando -->
                      {{Form::model($product, ['method' => 'PATCH','url' => 'products/'.$product->id])}}
                @else
                     <!-- incluindo -->

                      {{ Form::open(['url' => 'products/salvar']) }}
                @endif


               
                        
                        
                        <div class="form-group col-md-2 ">
                            {{ form::label('nome','Nome')}}
                        </div>

                        <div class="form-group col-md-10">
                            {{ form::input('text','nome',null,['class' => 'form-control', 'autofocus', 'placeholder' => ' Nome'])}}
                        </div>

                        <div class="form-group col-md-2">
                            {{ form::label('valor','Valor (R$)')}}
                        </div>

                        <div class="form-group col-md-10">
                        {{ form::input('text','valor',null,['class' => 'form-control', '', 'placeholder' => ' Valor'])}}
                        </div>

                        <div class="form-group col-md-2">
                            {{ form::label('qtd','Quantidade')}}
                        </div>

                        <div class="form-group col-md-10">
                        {{ form::input('number','qtd',null,['class' => 'form-control', '', 'placeholder' => ' Quantidade'])}}
                        </div>

                        
                        <div class="form-group col-md-2">
                            {{ form::label('categories_id','Categoria')}}
                        </div>

                        <div class="form-group col-md-10">
                        {{ Form::select('categories_id', $categories, null, ['class' => 'form-control']) }}  
                          

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