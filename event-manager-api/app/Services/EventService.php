<?php

namespace App\Services;
use App\Http\Requests;
use App\Models\Event;

class EventService {
    public function __construct(public Event $event){}

    public function getEvents() {
        return $this->event->orderBy('created_at', 'desc')->take(20)->get();
    }

    public function create($request) {
        $newEvent = $this->event->create([
            'title' => $request->title, 
            'description' => $request->description,
            'city' => $request->city,
            'date' => $request->date,
            'max_participants' => $request->max_participants, 
        ]);

        return $request->user()->events()->save($newEvent);
    }
}