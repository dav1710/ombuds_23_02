<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function vacancies()
    {
        $vacancies = Vacancy::all();
        return view('about', compact('vacancies'));
    }
}
