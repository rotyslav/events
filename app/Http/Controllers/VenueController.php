<?php

namespace App\Http\Controllers;

use App\DataTables\VenueDataTable;
use App\Http\Requests\VenueRequests\DeleteVenueRequest;
use App\Http\Requests\VenueRequests\GetVenueRequest;
use App\Http\Requests\VenueRequests\PostVenueRequest;
use App\Http\Requests\VenueRequests\PutVenueRequest;
use App\Models\Venue;
use App\Services\VenueService;

class VenueController extends Controller
{
    public function __construct(
        readonly private VenueService $service
    ) {
    }

    public function index(VenueDataTable $dataTable)
    {
        return $dataTable->render('venue.index');
    }

    public function create()
    {
        return view('venue.create');
    }

    public function store(PostVenueRequest $request)
    {
        $this->service->createVenue($request->getDTO());

        return redirect()->route('venue.index');
    }

    public function show(GetVenueRequest $request)
    {
        $venue = $this->service->getVenue($request->getDTO());

        return view('venue.show', compact('venue'));
    }

    public function edit(GetVenueRequest $request)
    {
        $venue = $this->service->getVenue($request->getDTO());

        return view('venue.edit', compact('venue'));
    }

    public function update(PutVenueRequest $request)
    {
        $this->service->updateVenue($request->getDTO());

        return redirect()->route('venue.index');
    }

    public function destroy(DeleteVenueRequest $request)
    {
        $this->service->deleteVenue($request->getDTO());

        return redirect()->route('venue.index');
    }

}
