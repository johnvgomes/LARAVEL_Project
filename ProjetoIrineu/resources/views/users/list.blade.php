@extends('layouts.app')
<br /><br /><br /><br />
@section('title')
<img src="/icon/seta.svg" height="30" width="25" style="margin-top: -3px;"/>
Usuarios
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
                                        Nome
                                    </div>
                                </th>
                                <th>
                                    <div style="margin-top: 20px;">
                                        Permissão
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
                            @foreach ($user as $us)
                                <tr style="border-top: 1px solid #E0E0E0; border-collapse: separate;">
                                    <td>{{ $us->id }}</td>
                                    <td>{{ $us->name }}</td>
                                    <td>@if ($us->permission == 1)
                                        admin
                                        @else
                                        usuario comum
                                        @endif</td>
                                    <td>
                                        <form action="users/{{ $us->id }}/edit" style="margin-top: 10px; margin-left: calc(100% - 70px);">
                                            <button class="mui-btn mui-btn--small mui-btn--raised mui-btn--primary" style="display: inline; font-size: 25;"><img src="/icon/ic_mode_edit_white_24px.svg" height="20" width="20"/></button>
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
