<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{

    // timing 1:35:59
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {


        return view('dashboard');
    }
}
