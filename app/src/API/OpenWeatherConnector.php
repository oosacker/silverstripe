<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Message;
use SilverStripe\Core\Environment;


class OpenWeatherConnector
{

    public function getWeather(string $cityId)
    {
        $api_key = Environment::getEnv('SS_WEATHER_API_KEY');
        $uri = Environment::getEnv('SS_WEATHER_API_URL') . '?id=' . $cityId . '&units=metric&appid=' . $api_key;

        $json = $this->runRequest($uri);

        return json_decode($json, true);
    }
    
    protected function runRequest(string $uri, ?string $method = 'GET', ?array $data=[]): string
    {
        $client = new Client();
    
        try {
            $response = $client->request(
                $method,
                $uri,
                $data
            );
        } 
        
        catch (RequestException $e) {
            $this->logError(Message::toString($e->getRequest()));
            if ($e->hasResponse()) {
                $this->logError(Message::toString($e->getResponse()));
            }
        } 
        
        catch (ClientException $e) {
            $this->logError(Message::toString($e->getRequest()));
            $this->logError(Message::toString($e->getResponse()));
        }


        if (empty($response)) {
            $this->logError('Empty Response');
            return '';
        }
        
        return $response->getBody()->getContents();
    }


    protected function logError(string $error)
    {
        echo '<pre>' . $error . '</pre>';
    }
}
