<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
class ServiceController extends Controller
{

    public function index(Request $request)
    {
        $inputDate = $request->input('date');

        if ($inputDate) {

        }
        // управление в админке слотами времени
        // миграции + модель + админка(управление слотами)
        // вывод услуги
        // route - forman/service-barber
    }
}
