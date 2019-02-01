<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    /**
     * Returns the legal disclaimer page
     * @return view
     */
    public function disclaimer(){
        return view('legal.disclaimer');
    }

    /**
     * Returns the privacy policy page
     * @return view
     */
    public function policy(){
        return view('legal.privacy');
    }

    /**
     * Returns the terms of sale page
     * @return view
     */
    public function sales(){
        return view('legal.saleTerms');
    }
}
