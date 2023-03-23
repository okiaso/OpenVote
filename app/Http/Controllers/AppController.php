<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home(Request $request)
    {
        $data = [];
        $data['events'] = Event::all();

        return view('welcome', $data);
    }
}
