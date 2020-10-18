<?php

namespace App\Http\Controllers;

use App\Klasse;
use App\Prefikse;
//use App\List;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    public function studentshow(Request $request)
    {
        if ($request->isMethod('POST')) {
            $klasse = Klasse::all(); //запрос категорий
            $prefikse = Prefikse::all();
            //$student=List::all();
            $url_dat = [
                'url_klasse' => $klasse,
                'url_prefikse' => $prefikse
            ];
            return ($url_dat);
        }else {
            return view('welcome');
        }
    }
    public function addstudent(Request $request)
    {
        $klasse = Klasse::all(); //запрос категорий
        $prefikse = Prefikse::all();

        /* if ($request->isMethod('POST')) {
           $url_klasse = Klasse::all(); //запрос категорий
           $url_prefikse = Prefikse::all();



            $v_degrees = [
                ['id' => 1],
                ['id' => 2], ['id' => 3], ['id' => 4],
                ['id' => 5], ['id' => 6], ['id' => 7],
                ['id' => 8], ['id' => 9], ['id' => 10]
            ]; //Степень
            $trener_id = Auth::user()->id; // 
            //запрос исходных данных
            $url_klasse = Klasse::all(); //запрос категорий
            $categorie = Categorie::all();
            $gender = Gender::all();
            $age = Age::all();
            $degree = Degree::all();
            //$user = User::all(); // в отдельную функцию фильтр по тренеру
            $user = TrenerController::transferUser();
            //$user =$url_dat;


            $url_dat = [
                'url_categorie' => $categorie,
                'url_genders' => $gender,
                'url_ages' => $age,
                'url_degrees' => $degree,
                'url_user' => $user,
                'v_degrees' => $v_degrees,
                'trener_id' => $trener_id
            ];
            //dd($url_categorie);
            return ($url_dat);
        } else {
            return view('welcome');
        }*/

        $url_dat = [
            'url_klasse' => $klasse,
            'url_prefikse' => $prefikse
        ];
        return ($url_dat);
    }
}
