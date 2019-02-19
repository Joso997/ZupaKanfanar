@extends('main')

@section('title', 'sv. Silvestra | Kanfanar')

@section('content')


    <div class="jumbotron jumbotron-fluid mh-100" id="naslovnica">
        <div class="container" >
            {!! app('html')->image('slike/logo6.png', 'a picture', array('id' => 'logo')) !!}
            <h1 class="display-3">Župa Kanfanar</h1>
            <p class="lead">Svim posjetiteljima stranice želimo mir, radost i svako dobro.</p>
        </div>
    </div>
    <div class="container">
        <div class="card card-nav" style="border-bottom: 0px;">
            <div class="card-header">
                <ul class="nav nav-tabs indigo card-header-tabs nav-justified " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><h5>Početna</h5></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#raspored" role="tab" aria-controls="raspored" aria-selected="false"><h5>Raspored</h5></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kontakt" role="tab" aria-controls="kontakt" aria-selected="false"><h5>Kontakt</h5></a>
                    </li>
                </ul>
            </div>
        </div>
            <div class="tab-content" >
                <div class="card-body tab-pane active" id="home" role="tabpanel">
                    @include('tabs/index')
                </div>
                <div class="tab-pane text-center" id="raspored" role="tabpanel">
                    @include('tabs/raspored')
                </div>
                <div class="card-body tab-pane" id="kontakt" role="tabpanel">
                    @include('tabs/kontakt')
                </div>
                <div class="card-body tab-pane" id="galerija">
                    @include('tabs/galerija')
                </div>
            </div>

        <hr>
        <div id="rest-content">
            <!--div class="row">
                <div class="col-lg-6 vl">
                    {{--@include('rows-card-body/novosti')--}}
                </div>
                <div class="col-lg-6" >
                     {{--@include('rows-card-body/events')--}}
                </div>
            </div-->
            <hr>
            @include('rows-card-body/galerija')
        </div>

    </div>
    <div id="temp_raspored" style="display: none;">

    </div>

@endsection

@section('stylesheet')
    {!! app('html')->style('css/jumbotron.css') !!}
    {!! app('html')->style('css/news&events.css') !!}
    {!! app('html')->style('css/home.css') !!}
    {!! app('html')->style('css/galerija.css') !!}
@endsection