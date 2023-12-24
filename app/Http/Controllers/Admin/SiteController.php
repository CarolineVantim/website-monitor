<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSiteRequest;
use App\Models\Site;

class SiteController extends Controller
{
    public function index()
    {
        $sites = Site::all();

        return view('admin/sites/index', compact('sites'));
    }

    public function create()
    {
        return view('admin/sites/create');
    }

    public function store(StoreUpdateSiteRequest $request)
    {
        $user = auth()->user();
        $user->sites()->create($request->all());

        return redirect()->route('sites.index');
    }

    public function edit(string $id)
    {
        if (!$site = Site::find($id)) {
            return back();
        }

        return view('admin/sites/edit', compact('site'));
    }

    public function update(StoreUpdateSiteRequest $request, Site $site)
    {
        //dd($request->url);
        $site->update($request->all());

        return redirect()->route('sites.index');
    }
}
