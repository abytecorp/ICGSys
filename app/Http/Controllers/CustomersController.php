<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $title = 'Nuevo Proceso de validacion de credito';
        return view('customers.index',compact('title'));
    }
}
