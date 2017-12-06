@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Inscrição
@endsection
<div class="mui-container">
    <div class="row">
        <div style="width: 50%; left:25%; right: 75%; position: absolute;">
                
                <div class="panel-body">

                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif
                    <div style="margin-left: calc(30% - 150px);">
                            <table class ="mui-table" style="margin-top: 0px;">
                                <thead style="border-bottom: 2px solid #E0E0E0;">
                                <tr>
                                        <th>
                                            <div style="margin-top: 20px;">
                                                ID
                                            </div>
                                        </th>
                                        <th>
                                            <div style="margin-top: 20px;">
                                                Processo seletivo
                                            </div>
                                        </th>
                                        <th>
                                            <div style="margin-top: 20px;">
                                                Usuario
                                            </div>
                                        </th>
                                        <th>
                                        <th>
                                            <div style="margin-top: 20px;">
                                                Cota
                                            </div>
                                        </th>
                                        <th>
                                        <th>
                                            <div style="margin-top: 20px;">
                                                Curso
                                            </div>
                                        </th>
                                        <th>
                                        <th>
                                            <div style="margin-top: 20px;">
                                                Data pagamento
                                            </div>
                                        </th>
                                        <th>
                                        <th>
                                            <div style="margin-top: 20px;">
                                                Pago
                                            </div>
                                        </th>
                                        <th>
                                            <div style="margin-top: 20px; margin-left: calc(100% - 70px);">
                                                Ações
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                
                                    @foreach ($subscription as $subscriptions)
                                   
                                        <tr style="border-top: 1px solid #E0E0E0; border-collapse: separate;">
                                            <td>{{ $subscriptions->id }}</td>
                                            <td>{{ $subscriptions->selective_process_id }}</td>
                                            <td>{{ $subscriptions->user_id }}</td>
                                            <td>{{ $subscriptions->quota_id }}</td>
                                            <td>{{ $subscriptions->course_id }}</td>
                                            <td>{{ $subscriptions->payment_date}}</td>
                                            <td>{{ $subscriptions->payd}}</td>
                                           
                                            <td>
                                                <form action="subscriptions/{{ $subscriptions->id }}/edit" style="margin-top: 10px; margin-left: calc(100% - 70px);">
                                                    <button class="mui-btn mui-btn--small mui-btn--raised mui-btn--primary" style="display: inline; font-size: 25;"><img src="/icon/ic_mode_edit_white_24px.svg" height="20" width="20"/></button>
                                                </form>    
                                            </td> 
                                            <td>                
                                                <form action="subscriptions/{{ $subscriptions->id }}/confirmDestroy" style="margin-top: 10px; margin-left: calc(10% - 35px);">
                                                    <button class="mui-btn mui-btn--small mui-btn--raised mui-btn--danger" style="display: inline; font-size: 20;"><img src="/icon/ic_delete_forever_white_24px.svg" height="20" width="20" /></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
        </div>
    </div>
</div>
<form action="{{url('subscriptions/create')}}" style="margin-left: 100px; margin-bottom: -20px;">
    <div class="fixed-action-btn horizontal click-to-toggle">
        <button class="mui-btn mui-btn--fab mui-btn--primary" style="font-size: 25px;">+</button>
    </div>
</form>