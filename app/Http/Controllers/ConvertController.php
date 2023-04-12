<?php

namespace App\Http\Controllers;

use App\Models\Angka;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Helpers\SwapHelper;

class ConvertController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {

        return view('convert');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
}
