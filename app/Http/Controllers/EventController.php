<?php

namespace App\Http\Controllers;

use App\DataTables\EventsDataTable;
use App\Http\Requests\EventRequests\DeleteEventRequest;
use App\Http\Requests\EventRequests\GetEventRequest;
use App\Http\Requests\EventRequests\PostEventRequest;
use App\Http\Requests\EventRequests\PutEventRequest;
use App\Models\Venue;
use App\Services\EventService;
use Illuminate\View\View;

class EventController extends Controller
{
    public function __construct(
        readonly private EventService $service,
    ) {
    }

    public function index(EventsDataTable $dataTable)
    {
        return $dataTable->render('event.index');
    }

    public function create(): View
    {
        return view('event.create', ['venues' => Venue::all()]);
    }

    public function store(PostEventRequest $request)
    {
        $this->service->createEvent($request->getDTO());

        return redirect()->route('event.index');
    }

    public function edit(GetEventRequest $request)
    {
        $event = $this->service->getEvent($request->getDTO());

        return view('event.edit', ['venues' => Venue::all(), 'event' => $event]);
    }

    public function update(PutEventRequest $request)
    {
        $this->service->updateEvent($request->getDTO());

        return redirect()->route('event.index');
    }

    public function show(GetEventRequest $request)
    {
        $event = $this->service->getEvent($request->getDTO());

        return view('event.show', compact('event'));
    }

    public function destroy(DeleteEventRequest $request)
    {
        $this->service->deleteEvent($request->getDTO());

        return redirect()->route('event.index');
    }
}
