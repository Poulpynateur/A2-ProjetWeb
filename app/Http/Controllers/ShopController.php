<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site\Goodie;
use App\Models\Site\Order;

use App\Models\Site\Categorie;

class ShopController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $order = Order::all();
        $goodies = Goodie::all();
        $bestSellers = Goodie::all()->sortByDesc('total_orders')->take(3);

        $categories = Categorie::all();
        return view('shop.main', compact('goodies', 'bestSellers','categories'));
        //return var_dump($bestSeller);
       
    }
}