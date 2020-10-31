<?php

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;

class WeatherCheckPageController extends PageController
{
    private static $allowed_actions = [
        'checkweather',
    ];
    
    public function checkweather()
    {
        $weather = new OpenWeatherConnector();

        $cityId = $this->getRequest()->getVar('city_id') ?? '2179538';

        $currentWeather = $weather->getWeather($cityId);

        return json_encode($currentWeather, JSON_PRETTY_PRINT);
        //die();
    }
}
