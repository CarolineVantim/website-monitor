<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEndpointRequest;
use App\Models\Endpoint;
use App\Models\Site;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EndpointController extends Controller
{
    public function index(string $siteId):  View
    {
        $site = Site::with('endpoints.check')->find($siteId);

        if (!$site) {
            return back();
        }

        $this->authorize('owner', $site);

        $endpoints = $site->endpoints;

        return view('admin.endpoints.index', compact('site', 'endpoints'));

    }

    public function create(string $siteId): View
    {
        if (!$site = Site::find($siteId)) {
            return back();
        }

        return view('admin.endpoints.create', compact('site'));
    }

    public function store(StoreUpdateEndpointRequest $request, Site $site): RedirectResponse
    {
        $site->endpoints()->create($request->all());

        return redirect()
                ->route('endpoints.index', $site->id)
                ->with('message', 'Cadastrado com sucesso');
    }

    public function edit(Site $site, Endpoint $endpoint): View
    {
        return view('admin.endpoints.edit', compact('site', 'endpoint'));
    }

    public function update(StoreUpdateEndpointRequest $request,  Site $site, Endpoint $endpoint): RedirectResponse
    {

        $endpoint->update($request->validated());

        return redirect()
                ->route('endpoints.index', $site->id)
                ->with('message', 'Alterado com sucesso');
    }

    public function destroy(Site $site, Endpoint $endpoint): RedirectResponse
    {
        $endpoint->delete();

        return redirect()
                ->route('endpoints.index', $site->id)
                ->with('message', 'Endpoint deletado com sucesso');
    }
}
