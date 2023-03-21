<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        try {
            return view('pages.admin.dashboard');
        } catch (\Exception $e) {
            return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }
}
