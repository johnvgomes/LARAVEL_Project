@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Dashboard
@endsection
<style type="text/css">
    .bgimg {
        background-image: linear-gradient(to bottom, rgba(255,255,255,0.85) 0%,rgba(255,255,255,0.85) 100%), url('/img/bg.jpg');
        background-position: right 50%;
    }
    #outer
    {
        width:100%;
    }
    .inner
    {
        display: inline-block;
        color: #3a3f59;
        font-size:18;
    }
</style>
<div class="mui-container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="mui-col-md-8 mui-col-md-offset-2">
            <div class="mui-panel">
                <div class="panel-heading"><div class="mui--text-headline">Bem-vindo!</div></div>
                <div class="panel-body">
                    <div class="mui--text-subhead">Minhas inscrições:</div><br />                    
                        <div id="outer" class="mui-panel bgimg">
                            <div class="xs-12 md-8 inner" style="margin-top:15px;">Ciência da Computação - 2017</div>      
                            <div class="xs-6 md-4 inner" style="float:right;"><button class="mui-btn mui-btn--small mui-btn--primary mui-btn--fab" style="display: inline-block; font-size: 25; margin-top: 10px; margin-left: calc(100% - 70px); "><img src="/icon/ic_info_outline_white_24px.svg" height="20" width="20" style="margin-left: -4px;"/></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>