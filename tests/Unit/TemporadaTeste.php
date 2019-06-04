<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Temporada;
use App\Episodio;

class TemporadaTeste extends TestCase
{

    private $temporada;


    protected function seuUp(): void
    {
        parent::setUp();

        $temporada = new Temporada();

        $episodio1 = new Episodio();
        $episodio1->assistido = true;

        $episodio2 = new Episodio();
        $episodio2->assistido = false;

        $episodio3 = new Episodio();
        $episodio3->assistido = true;

        $temporada->episodios()->add($episodio1);
        $temporada->episodios()->add($episodio2);
        $temporada->episodios()->add($episodio3);

        $this->temporada = $temporada;
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBuscaPorEpisodiosAssistidos()
    {
        $episodiosAssistidos = $this->temporada->getEpisodiosAssistidos();

        $this->assertCount(2, $episodiosAssistidos);

        foreach ($episodiosAssistidos as $episodio){
            $this->assertTrue($episodio->assistido);
        }

    }

    public function buscaEpisodios()
    {
        $episodios = $this->temporada->episodios;
        $this->assertCount(3, $episodios);
    }
}
