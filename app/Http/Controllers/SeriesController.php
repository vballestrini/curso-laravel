<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) {
        //Retorna a url
        //echo $request->url();
        
        //Retorna os parâmetros da url
        //var_dump($request->query());
        
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        
        //return view('series.index', [
        //    'series' => $series
        //]);
        //OU
        //caso o parâmetro tenha o mesmo nome da variável
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create(){
        return view('series.create');
    }

    public function store(Request $request){
        //$serie = Serie::create([
        //    'nome' => $request->nome
        //]);
        $serie = Serie::create($request->all());
        $request->session()->flash('mensagem', "Série {$serie->nome} criada com sucesso.");
        
        return redirect('series.index');

    }

    public function destroy(Request $request){
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Série removida com sucesso.");
        
        return redirect('series.index');
    }

}
