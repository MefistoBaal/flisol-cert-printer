<?php

namespace FlisolCertPrinter\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('certificados', [
            'title' => 'Consulta tu certificado'
        ]);
    }
}
