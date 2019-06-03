<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Http\Request;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;

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

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie){

        $serie = $criadorDeSerie->criarSerie($request->nome, $request->qtd_temporadas, $request->ep_temporada);

        $request->session()->flash('mensagem', "Série {$serie->nome} criada com sucesso.");
        
        return redirect()->route('series.index');

    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie){
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);
        $request->session()->flash('mensagem', "$nomeSerie removida com sucesso.");
        
        return redirect()->route('series.index');
    }

}
