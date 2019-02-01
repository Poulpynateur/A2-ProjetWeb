<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Site\Event;
use App\Models\Site\Register;
use App\Models\Site\Picture;

class EventsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::whereDate('date', '>=', date("Y-m-d"))->where('id_Approbations',2)->get();
        $pastEvents = Event::whereDate('date', '<', date("Y-m-d"))->where('id_Approbations',2)->get();
        $topEvent = Event::whereDate('date', '>=', date("Y-m-d"))->where('id_Approbations',4)->first();
        $pictures = Picture::all();
        return view('events.main', compact('events', 'pastEvents', 'topEvent', 'pictures'));
    }
}