<?php

namespace App\Http\Controllers;

use Illuminate\App\Helpers\SwapHelper;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SwapController extends Controller
{
    // public function index()
    // {
    //     $string1 = 'Hello';
    //     $string2 = 'World';
    //     $xorResult = xorFunction($string1, $string2);
    //     return view('xor', compact('xorResult'));
    // }
    public function index()
    {
        $string1 = 'Hello';
        $string2 = 'World';
        $xorResult = xorFunction($string1, $string2);
        return view('xor', compact('xorResult'));
    }
}
