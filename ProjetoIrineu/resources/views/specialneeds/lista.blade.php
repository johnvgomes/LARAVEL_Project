@extends('layouts.app')
<br /><br /><br /><br />
<div class="mui-container">
    <div class="row">
        <div class="panel-body" style="width: 50%; left:25%; right: 75%; position: absolute;">
            <p style="margin-left: -15px;">Necessidades especiais</p><br /><br />
                <form action="{{url('specialneeds/create')}}">
                    <button type="submit" class="mui-btn mui-btn--small mui-btn--primary mui-btn--flat" style="left: 60%;">Nova Necessidade Especial</button>
                </form>
                <div class="panel-body">

                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                <table class ="mui-table" >
                    <thead >
                        <tr>
                            <th>Descrição</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($spneeds as $spneed)
                    <tr style="border-top: 1px solid #E0E0E0; border-collapse: separate;">
                        <td>{{ $spneed->description }}</td>
                        <td style="display: block; margin-left: 65%;">
                            <form action="specialneeds/{{ $spneed->id }}/edit">
                                <button class="mui-btn mui-btn--small mui-btn--raised mui-btn--primary" style="display: inline; font-size: 25;"><img src="/icon/ic_mode_edit_white_24px.svg" height="20" width="20"/></button>
                            </form>    
                        </td> 
                        <td style="margin-left: 30px;">                
                            <form action="specialneeds/{{ $spneed->id }}/confirmDestroy">
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