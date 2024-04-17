<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function ShowPage()
    {
        return "This is from the SampleController. This should the page";
    }
}
