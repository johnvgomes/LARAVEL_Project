@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Isenções
                    <a class="pull-right" href="{{url('exemptions/create')}}">Nova isenção</a>
                </div>
                <div class="panel-body">
                    @if(Session::has('mensagem_sucesso'))
                    <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                    @endif
                    <table class ="table">
                        <th>ID</th>
                        <th>Motivo</th>
                        <th>Homologado</th>
                        <th></th>
                        <tbody>
                            @foreach ($exemption as $exemptions)
                            <tr>
                                <td>{{ $exemptions->id }}</td>
                                <td>{{ $exemptions->reason }}</td>
                                <td>{{ $exemptions->homologated }}</td>
                                <td>
                                    <a href="exemptions/{{ $exemptions->id }}/edit" class="btn btn-info btn-sm">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <a href="exemptions/{{ $exemptions->id }}/confirmDestroy" class="btn btn-danger btn-sm">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
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
@endsection