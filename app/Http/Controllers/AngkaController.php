<?php

namespace App\Http\Controllers;

use App\Models\Angka;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AngkaController extends Controller
{
    public function index()
    {
        $angka = Angka::all();
        return view('angka.index', [
            'angka' => $angka
        ]);
    }
}
