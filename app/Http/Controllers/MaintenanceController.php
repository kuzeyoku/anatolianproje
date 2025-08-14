<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class MaintenanceController extends Controller
{
    public function index()
    {
        $date = Carbon::parse(setting('maintenance', 'end_date'))->format('m.d.Y');

        return view('common.maintenance', compact('date'));
    }
}
