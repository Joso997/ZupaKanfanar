<?php

namespace Župa\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function getIndex (){
        return view('private.create_calendar');
    }
}
