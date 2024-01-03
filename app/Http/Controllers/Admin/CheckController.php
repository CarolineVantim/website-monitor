<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Endpoint;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckController extends Controller
{
    public function index(Endpoint $endpoint): View
    {
        $checks = $endpoint->checks()->paginate();

        return view('admin.endpoints.logs.index', compact('endpoint', 'checks'));
    }
}
