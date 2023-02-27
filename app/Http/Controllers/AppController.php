<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home(Request $request)
    {
        $data = [];
        $data['elections'] = Election::all();

        return view('welcome', $data);
    }
}
