<?php

namespace Župa\Http\Controllers;

use PHPHtmlParser\Dom;
class PagesController extends Controller {

    public function getIndex(){

            return view('pages.home');

    }

}