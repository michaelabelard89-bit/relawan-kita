<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;

class HomeController extends Controller {
    public function index() {
        $featuredEvents  = Event::approved()->orderBy('event_date','asc')->limit(3)->get();
        $totalEvents     = Event::approved()->count();
        $totalRegistrans = Registration::count();
        return view('home.index', compact('featuredEvents','totalEvents','totalRegistrans'));
    }
    public function about() { return view('home.about'); }
    public function contact() { return view('home.contact'); }
}