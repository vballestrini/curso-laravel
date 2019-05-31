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
        
        $html = "<ul>";
        foreach ($series as $serie){
            $html .= "<li>$serie</li>";
        }
        $html .= "</ul>";
    
        return $html;
    }
}
