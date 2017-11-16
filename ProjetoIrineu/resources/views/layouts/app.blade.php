<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="//cdn.muicss.com/mui-0.9.28/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-0.9.28/js/mui.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CRUD JOHN') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
            /**
            * Body CSS
            */

            .mui-appbar {
                background-color: #1f871f;
                color: #FFF;
            }

            .mui--text-title, h3 {
                font-weight: 400;
                font-size: 20px;
                line-height: 28px;
                color: #FFF;
            }

            html,
            body {
            height: 100%;
            background-color: #fff;
            }

            html,
            body,
            input,
            textarea,
            buttons {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
            }


            /**
            * Header CSS
            */
            header {
            position: fixed;
            background-color: #f00;
            top: 0;
            right: 0;
            left: 0;
            z-index: 2;
            }

            header ul.mui-list--inline {
            margin-bottom: 0;
            }

            header a {
            color: white;
            }

            header table {
            width: 100%;
            }


            /**
            * Content CSS
            */
            #content-wrapper {
            min-height: 20%;

            /* sticky footer */
            box-sizing: border-box;
            margin-bottom: -100px;
            padding-bottom: 100px;
            }


            /**
            * Footer CSS
            */
            footer {
            box-sizing: border-box;
            height: 100px;
            background-color: #eee;
            border-top: 1px solid #e0e0e0;
            padding-top: 35px;
            }
        </style>
</head>
<body>
    <div id="app">
        <header class="mui-appbar mui--z1">
            <div class="mui-container">
                <table>
                    <tr class="mui--appbar-height">
                        <td class="mui--text-title">Processo Seletivo - IFC Videira</td>
                        <td class="mui--text-center">
                            <ul class="mui-list--inline mui--text-body2">
                                @guest
                                <li><a href="{{url('/') }}">Home</a></li>
                            
                                @else
                                <li><a href="{{url('/') }}">Home</a></li>
                                <li><a href="{{url('/clientes') }}">Clientes</a></li>
                                <li><a href="{{url('/products') }}">Produtos</a></li>
                                <li><a href="{{url('/categories') }}">Categorias</a></li>
        
                                @endguest
                            </ul>
                        </td>
                        <td class="mui--text-right">
                            <ul class="mui-list--inline mui--text-body2">
                                <!-- Authentication Links -->
                                @guest
                                    <li><a href="{{ route('login') }}">Entrar</a></li>
                                    <li><a href="{{ route('register') }}">Cadastre-se</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                    Sair
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endguest
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
        </header>
        <br /><br /><br /><br />
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
