<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {
       // se uso las relaciones en los modelos para traer todo en una sola consulta y de manera facil. para usar un formato parecido al que piden
       // opte por investigar y usar (:id, name), asi trayendo solo estos datos. no use solo name, por que fallaba en la consulta.
       $companies = Company::with(['tasks.user:id,name'])->get();

       return response()->json($companies);
    }
}
