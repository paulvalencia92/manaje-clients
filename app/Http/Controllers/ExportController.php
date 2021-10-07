<?php

namespace App\Http\Controllers;

use App\Client;
use App\Export;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function index()
    {
        $exports = Export::paginate();
        return view('exports.index', compact('exports'));
    }
}
