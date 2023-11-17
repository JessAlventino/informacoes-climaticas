<?php
require 'Classes/Models/Clima.php';

use GuzzleHttp\Client;
class OpenWeather
{

    public $latitude = '-27.09761782374477';
    public $longitude = '-48.91155413694792';
    public $appid = '0a68275cdc87ff96bc95b4bc205063a5';

    public function getTempoAtual()//Chama a Api
    {
        try{
        $recurso = "https://api.openweathermap.org/data/2.5/weather?units=metric&lang=pt&lat=".$this->latitude."&lon=".$this->longitude."&appid=".$this->appid;

        $client = new GuzzleHttp\Client();
        $resposta = $client->request('GET', $recurso, []);

        

        $objJson = json_decode($resposta->getBody());
        $clima = $this->mapear($objJson); //chamando o metodo mapear
        $this->guardarEmCache($clima);

      

    } catch (\Exception $e) {
        $clima = $this->obterDoCache();
    }
        return $clima;
    }
    private function mapear($objJson){ //chama a classe clima do models
        $clima = new Clima();
        $clima->temperatura = $objJson->main->temp;
        $clima->cidade = $objJson->name;
        $clima->umidade = $objJson->main->humidity;
        $clima->direcaoDoVento = $objJson->wind->deg;
        $clima->velocidadeDoVento = $objJson->wind->speed;
        $clima->sensacaoTermica= $objJson->main->feels_like;
        $clima->descricao = $objJson->weather[0]->description;
        $clima->temperaturaMaxima = $objJson->main->temp_max;
        $clima ->temperaturaMinima = $objJson->main->temp_min;
        $clima->icone = $objJson->weather[0]->icon;
        $clima->nascerDoSol = $objJson->sys->sunrise;
        $clima->porDoSol= $objJson->sys->sunset;;
        return $clima;



    }


    public function guardarEmCache($clima) 
    {
        $dadosSerializados = serialize($clima);
         $caminhoArquivoCache = 'cache/Clima.bin';

         file_put_contents($caminhoArquivoCache, $dadosSerializados);
    }

    public Function obterDoCache()
    {
        $caminhoArquivoCache = 'cache/Clima.bin';

        $dadosSerializados = file_get_contents($caminhoArquivoCache);

        $dadosDeserializados = unserialize($dadosSerializados);

        return $dadosDeserializados;
    }
}