<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Get the published event for the landing page.
     */
    public function getPublishedEvent()
    {
        return Event::where('is_published', true)->latest('date')->first();
    }
}
