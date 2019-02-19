@extends('main')

@section('title', 'sv. Silvestra | Kanfanar')

@section('content')
    <div class="well">

        {!! Form::open(['url' => '/processform', 'class' => 'form-horizontal']) !!}

        <fieldset>

            <!-- Email -->
            <div class="form-group">
                {!! Form::label('', '', ['class' => 'col-lg-2 control-label']) !!}
                <?php
                // the international date formater object
                $formatter = new IntlDateFormatter(
                    "hrv-HRV",
                    IntlDateFormatter::MEDIUM,
                    IntlDateFormatter::NONE,
                    "Europe/Zagreb",
                    IntlDateFormatter::GREGORIAN,
                    "E, dd. MMM YYYY"
                );
                $monday = new DateTime('monday');

                // clone start date
                $endDate = clone $monday;

                // Add 7 days to start date
                $endDate->modify('+7 days');

                // Increase with an interval of one day
                $dateInterval = new DateInterval('P1D');

                $dateRange = new DatePeriod($monday, $dateInterval, $endDate);
                $index = 0;
                ?>
                @foreach($dateRange as $day)
                <div class="row p-1 container-fluid">
                    <div class="col-sm-4 small_calendar">
                        <div class="card">
                            <div class="card-body" id="{!! "c_body_".$index++ !!}">
                                <h5 class="card-title datum">{{$formatter->format($day)}}</h5>
                                <div class="input-group mb-3">
                                {!! Form::text('text', $value = null, ['class' => 'form-control mjesto', 'placeholder' => 'text']) !!}
                                    <div id="0" class="input-group-append">
                                        <button type="button" class="btn btn-primary add_info">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 info_board">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Dodatne Informacije</h5>
                                {!! Form::text('text', $value = null, ['class' => 'form-control d_info', 'placeholder' => 'text']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


            <!-- Submit Button -->
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="button" class="btn btn-lg btn-info pull-right" id="submit">Submit</button>
                </div>
            </div>

        </fieldset>

        {!! Form::close()  !!}

    </div>
@endsection

@section('stylesheet')
    {!! app('html')->style('css/jumbotron.css') !!}
@endsection