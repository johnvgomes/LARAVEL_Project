@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cotas
                    <a class="pull-right" href="{{url('quotas/create')}}">Nova cota</a>
                </div>
                <div class="panel-body">
                    @if(Session::has('mensagem_sucesso'))
                    <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                    @endif
                    <table class ="table">
                        <th>ID</th>
                        <th>Nome</th>
                        <th></th>
                        <tbody>
                            @foreach ($quota as $quotas)
                            <tr>
                                <td>{{ $quotas->id }}</td>
                                <td>{{ $quotas->name }}</td>
                                <td>
                                    <a href="quotas/{{ $quotas->id }}/edit" class="btn btn-info btn-sm">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
                                    <a href="quotas/{{ $quotas->id }}/confirmDestroy" class="btn btn-danger btn-sm">
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