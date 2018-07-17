<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    /**
     * Show invite page.
     *
     * @return \Illuminate\Http\Response
     */
    public function invite()
    {
        return view('invite');
    }
}
