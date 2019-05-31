<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) {
        //Retorna a url
        //echo $request->url();
        
        //Retorna os parâmetros da url
        //var_dump($request->query());
        
        $series = [
            'Hannibal',
            'Big Mouth',
            'Breaking Bad'
        ];
        
        return view('series.index', [
            'series' => $series
        ]);

        //OU
        //caso o parâmetro tenha o mesmo nome da variável
        //return view('series.index', compact('series'));
    }

    public function create(){
        return view('series.create');
    }

}
