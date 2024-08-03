<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\Interfaces\RequestInterfaceDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class StartController extends Controller
{
    public function index(Request $request)
    {
        if (!Cache::has(Auth::id())) {
            Cache::put(Auth::id(), $request->ip());
        }

        return view('welcome');
    }
}
