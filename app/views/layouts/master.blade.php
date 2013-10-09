<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>COSC2413</title>
        <meta name="description" content="cosc2413 assignment" />
        <meta name="keywords" content="cosc2413" />
        <meta name="robots" content="cosc2413" />
        {{ HTML::style('components/bootstrap/dist/css/bootstrap.min.css') }}
        {{ HTML::style('css/app.css') }}
        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->

        <!-- TODO put favicon here -->
    </head>
    <body>
        @include('layouts._header')
        
        <div class="container">
            @section('content')
            <div>
                <h1>Opps! There is something wrong here!</h1>
            </div>
            @show
            @include('layouts._footer')
        </div>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/components/jquery/jquery.min.js"><\/script>')</script>
        @section('scripts')
        @show
    </body>
<html>