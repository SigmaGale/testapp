<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name')}}</title>
    </head>
    <body >
        @include('includes.nav')
        <section class="container">
            @include('includes.notice')
             @yield('content')
        </section>
    <hr>
        <footer class="d-flex justify-content-center">
            <div class='container justify-content-center' style="text-align:center;">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        PHP version:<?php echo phpversion()?>
                    </div>
                    <div class="col-sm-4 col-md-4"> 
                        Created by: <a href="https://www.linkedin.com/in/mark-chester-de-quiroz-b2709b183/">Mark Chester De Quiroz</a>
                    </div> 
                    <div class="col-sm-4 col-md-4">
                        For: <a href="https://praxxys.ph/"> PRAXXYS </a>
                    </div>
                </div>
            </div>
         </footer>
         
    </body>
    
    
</html>
