<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie{

    public function criarSerie(string $nomeSerie, int $qtd_temporadas, int $ep_temporada): Serie{
        
        DB::beginTransaction();     
        $serie = Serie::create(['nome' => $nomeSerie]);
        for ($i=1; $i <= $qtd_temporadas; $i++) { 
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            for ($j=1; $j <= $ep_temporada; $j++) { 
                $temporada->episodios()->create(['numero' => $j]);
            }
        }
        DB::commit();

        return $serie;

    }


}