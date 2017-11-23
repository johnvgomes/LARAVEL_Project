@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias
                <a class="pull-right" href="{{url('categories/create')}}">Nova categoria</a>
                </div>
                <div class="panel-body">

                @if(Session::has('mensagem_sucesso'))
                  <div class= "alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif

                <table class ="table">
                    <th>Descrição</th>
                    <th></th>
                    <tbody>
                            @foreach ($category as $categories)
                            <tr>
                                <td>{{ $categories->descricao }}</td>
                                <td>


                                <a href="categories/{{ $categories->id }}/edit" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>


                                <a href="categories/{{ $categories->id }}/confirmDestroy" class="btn btn-danger btn-sm">
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