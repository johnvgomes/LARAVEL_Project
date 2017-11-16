<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="//cdn.muicss.com/mui-0.9.28/css/mui.min.css" rel="stylesheet" type="text/css" />
        <script src="//cdn.muicss.com/mui-0.9.28/js/mui.min.js"></script>

        <title>Processo Seletivo da Greve</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            /**
            * Body CSS
            */
            html,
            body {
            height: 100%;
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
            min-height: 100%;

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
        <header class="mui-appbar mui--z1">
            <div class="mui-container">
                <table>
                    <tr class="mui--appbar-height">
                        <td class="mui--text-title">Processo Seletivo da Greve</td>
                        <td class="mui--text-right">
                            <ul class="mui-list--inline mui--text-body2">
                                @if (Route::has('login'))
                                    @auth
                                        <li><a href="{{ url('/home') }}">Home</a></li>
                                    @else
                                        <li><a href="{{ route('login') }}">Entrar</a></li>
                                        <li><a href="{{ route('register') }}">Cadastre-se</a></li>
                                    @endauth
                                @endif
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
        </header>
        <div class="mui-container">
            <div id="content-wrapper" class="mui--text-center">
            <div class="mui--appbar-height"></div>
                <br />
                <br />
                <div class="mui--text-display1">
                    JOHN CRUD LARAVEL
                </div>

                <div class="links">
                    <button class="mui-btn"><a href="https://laravel.com/docs">Documentation</a></button>
                    <button class="mui-btn"><a href="https://laracasts.com">Laracasts</a></button>
                    <button class="mui-btn"><a href="https://laravel-news.com">News</a></button>
                    <button class="mui-btn"><a href="https://forge.laravel.com">Forge</a></button>
                    <button class="mui-btn"><a href="https://github.com/laravel/laravel">GitHub</a></button>
                </div>
            </div>
        </div>
    </body>
</html>
