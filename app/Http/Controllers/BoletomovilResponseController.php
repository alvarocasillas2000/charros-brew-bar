<?php

namespace App\Http\Controllers;

use App\Models\BoletomovilResponse;
use Illuminate\Http\Request;

class BoletomovilResponseController extends Controller
{
    public function index()
    {
        $responses = BoletomovilResponse::with('reservation.businessDay')
            ->latest()
            ->paginate(20);

        return view('boletomovil-responses.index', compact('responses'));
    }
}
