<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSiteRequest;
use App\Models\Site;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function index()
    {
        $sites = Site::paginate();

        return view('admin/sites/index', compact('sites'));
    }

    public function create(): View
    {
        return view('admin/sites/create');
    }

    public function store(StoreUpdateSiteRequest $request): RedirectResponse
    {
        $user = auth()->user();
        $user->sites()->create($request->all());

        return redirect()
                ->route('sites.index')
                ->with('message', 'Site criado com sucesso');
    }

    public function edit(string $id): View
    {
        if (!$site = Site::find($id)) {
            return back();
        }

        return view('admin/sites/edit', compact('site'));
    }

    public function update(StoreUpdateSiteRequest $request, Site $site): RedirectResponse
    {
        //dd($request->url);
        $site->update($request->all());

        return redirect()
                ->route('sites.index')
                ->with('message', 'Site alterado com sucesso');
    }

    public function destroy(Site $site): RedirectResponse
    {
        $site->delete();

        return redirect()
                ->route('sites.index')
                ->with('message', 'Site deletado com sucesso');
    }
}
