<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function index(Product $prd): View
    {
        $prd = Product::all();
        return view('product.index', compact('prd'));
    }
    public function destroy(Product $prod)
    {
        $prod->delete();
        return redirect('product')->with('status', 'Data Berhasil Dihapus.');
    }
}
