<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CTVMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    The Project will be live soon. Please be patient.
                </div>
                <div class="bg-purple w-full px-2">
                    <div class="container mx-auto rounded-t shadow bg-cover bg-bottom m-4" style="background-image: url(https://i.imgur.com/R68RNUK.jpg)">
                        <!-- Text shadow utilities will be cool -->
                        <nav class="flex justify-between p-8 items-center mb-16">
                            <a href="#" class="font-sans text-black md:text-white text-sm md:text-4xl font-thin">Massive Dynamics</a>
                            <ul class="list-reset flex">
                                <li><a href="#" class="text-black md:text-white p-2 md:p-4">Home</a></li>
                                <li><a href="#" class="text-black md:text-white p-2 md:p-4 whitespace-no-wrap">About Us</a></li>
                                <li><a href="#" class="text-black md:text-white p-2 md:p-4">Contact</a></li>
                            </ul>
                        </nav>

                        <div class="text-center text-white pb-16">
                            <h1 class="font-sans font-thin">Reality is just a matter of perception.</h1>
                            <h2 class="font-thin text-sm tracking-wide mt-2 mb-4">There are no limits, except for those that we impose on ourselves. Join the future</h2>

                            <a href="#" class="rounded bg-orange text-white p-4 font-bold inline-block mb-16">
                                Apply Now
                            </a>


                        </div>
                    </div>

                </div>


            </div>
        </div>
    </body>
</html>
