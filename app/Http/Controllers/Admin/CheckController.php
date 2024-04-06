<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Endpoint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckController extends Controller
{
    public function index(Endpoint $endpoint): View
    {
        $checks = $endpoint->checks()->paginate();

        $checks->each(function ($check) {
            $check->created_at = Carbon::parse($check->created_at)->setTimezone('America/Sao_Paulo');

            return $check;
        });

        return view('admin.endpoints.logs.index', compact('endpoint', 'checks'));
    }
}
