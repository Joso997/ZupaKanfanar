<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="google-site-verification" content="m3YjEeNfF9rXJ6IS9JgDP1-DuRpUQI3EO5ZevTfE1t8" />
    <title>{{ config('app.name', 'Župa') }} @yield('title')</title>
    <meta name="description" content="Službena stranica župe svetog Silvestra Kanfanar. Pronađite obavijesti, slike, novosti te buduća događanja u župi.">
    <meta name="keywords" content="crkva, župa, zupa, kanfanar, sveti, sv, silvestar, silvestra, obavijesti, novosti, događaji, slike, kontakt, broj, telefon, stranica, službena" />
    <meta name="author" content="Josip Marić">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="8 days">
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/8/8a/33-St.Sylvester_I.jpg" />
    <!-- zupa, kanfanar, obavijesti -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {!! app('html')->style('/css/font-awesome.min.css') !!}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <!--[if lt IE 9]>

    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <![endif]-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114437607-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-114437607-1');
    </script>

</head>