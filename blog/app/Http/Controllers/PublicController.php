<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function about () {
        return view('about', [
        
        'name' => 'SEDC',
        'team' => [
            'John Doe',
            'Jane Doe'
        ]
        ]);
    }
}
