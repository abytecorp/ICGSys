<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Study_credit;
use App\Document_type;
use App\Customer;
use DB;

class ApiController extends Controller
{
    public function getCities()
    {
        return $city = City::select(DB::raw('CONCAT(cities.city," ( ",departaments.departament," ) ") AS city'),'cities.id','cities.id_departament','departaments.departament')
            ->join('departaments','cities.id_departament','departaments.id')
            ->get();
    }
    public function getStudyCreditsByUser($user)
    {
        return $credits = Study_credit::where('us_cr','=',$user)
            ->get();
    }
    public function getIdTypes()
    {
        return $id_types = Document_type::get();
    }
    public function customersNew(Request $request)
    {
        $company = Customer::create([
            'idn' => $request['document_type_id'],
            'idn' => $request['idn'],
            'name' => strtoupper($request['name']),
            'first_last_name' => strtoupper($request['first_last_name']),
            'second_last_name' => strtoupper($request['second_last_name']),
            'birth_date' => $request['birth_date'],
            'born_city' => $request['born_city'],
            'address_city' => $request['address'],
            'address' => $request['address'],
            'email' => $request['email'],
            'id_company' => $request['id_company'],
            'us_cr' => 28,
            '', '', '', '', '', '', '', '', 'neighborhood', 'cellphone', 'phone', 'mail', 'us_cr'
        ]);
        return;
    }
}
