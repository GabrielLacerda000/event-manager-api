<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\EventService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    public function __construct(public EventService $eventService){}

    public function index() {
        $events = $this->eventService->getEvents();
        return EventResource::collection($events);
    }

    public function store(StoreEventRequest $request) {
        $this->eventService->create($request->validated());

        return response()->json([
           'success'=> true,
           'message' => 'Event created successfully!',
        ], 201);
    }

    public function show(Event $event) {
        return new EventResource($event);
    }

    public function update() {

    }

    public function destroy(Event $event) {

        if(auth()->user()->id !== $event->user_id) {
        
            return response()->json(['error' => 'Unauthorized'], 403);
        }
      
        $event->delete();
        return response()->json(['message' => 'Post deleted successfully'], 200);
    }
}
