@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Dashboard
@endsection
<div class="mui-container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="mui-col-md-8 mui-col-md-offset-2">
            <div class="mui-panel">
                <div class="panel-heading">Bem-vindo!</div>
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>