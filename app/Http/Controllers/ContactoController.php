<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactoMail;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function enviar(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email',
            'tel' => 'required',
            'mensaje' => 'required|string',
        ]);

        Mail::to('info@charrosjalisco.com')->send(new ContactoMail($datos));

        return redirect()->route('home')->with('success', 'Mensaje enviado correctamente.');
    }
}
