<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <script type="text/javascript">
            new Vue({
                el: '.title',
                data: {
                    message: 'Hello Laravel!'
                }
            })
        </script>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                        <a href="">WHY JUNSTAR</a>
                        <a href="">PRICING</a>
                        <a href="">CONTACT</a>
                    @auth
                        <a href="{{ url('/book') }}">BOOK ORDER</a>
                        <a href="{{ url('/orders')}}">My Orders</a>
                        <a href="{{ url('/myprofile') }}">MY PROFILE</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Cost Calculator 
                </div>
                <div>
                    <form action="{{ url('user/orders') }}" method="POST">
                        {!! csrf_field() !!}
                        <table>
                            <tr>
                                <td>Laundry (kg)</td>
                                <td><input type="number" name="laundry" onchange="changeTotal(laundry, ironing)" /></td>
                            </tr>
                            <tr>
                                <td>Ironing (kg)</td>
                                <td><input type="number" name="ironing" onchange="changeTotal(laundry, ironing)" /></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td id="total">0$</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Calculate" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>