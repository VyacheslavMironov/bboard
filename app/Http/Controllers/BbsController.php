<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bb;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BbsController extends Controller
{
    public function index()
    {
        $context = ['bbs' => Bb::latest()->get()];
        return view('index', $context);
    }

    public function detail($bb)
    {
        $context = ['bb' =>Bb::find($bb)];
        return view('detail', $context);
    }
}
