<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
class IndexController extends Controller
{
     public function index()
    {
        $get_quizes= Quiz::with('questions')->where('status','show')->paginate(10);
        return view('home', compact('get_quizes'));
    }
}
