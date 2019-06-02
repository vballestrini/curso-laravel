<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Http\Requests\SeriesFormRequest;
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

    public function store(SeriesFormRequest $request){

        $serie = Serie::create(['nome' => $request->nome]);
        for ($i=1; $i <= $request->qtd_temporadas; $i++) { 
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            for ($j=1; $j <= $request->ep_temporada; $j++) { 
                $temporada->episodios()->create(['numero' => $j]);
            }
        }

        $request->session()->flash('mensagem', "Série {$serie->nome} criada com sucesso.");
        
        return redirect()->route('series.index');

    }

    public function destroy(Request $request){
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Série removida com sucesso.");
        
        return redirect()->route('series.index');
    }

}
