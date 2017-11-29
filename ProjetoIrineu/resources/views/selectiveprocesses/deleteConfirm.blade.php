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
                <div class="panel-heading">Deletar Processo Deletivo</div>
                <div class="panel-body">
                    <div class="form-group col-md-12">
                        Deseja excluir o processo seletivo: {{ $selectiveprocesses->description }}?
                    </div>
                
                    <div class="mui-col-md-1">
                    {{ Form::open(['method' => 'DELETE', 'url' => '/selectiveprocesses/'.$selectiveprocesses->id, 'style' => 'display: inline;']) }}
                
                        <button type="submit" class="mui-btn mui-btn--primary">
                            SIM
                        </button>
                    {{ Form::close() }}
                    </div>

                    <div class="mui-col-md-offset-2">
                        <a href="../../selectiveprocesses" class="mui-btn mui-btn--danger">
                            NÃO
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>