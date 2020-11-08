<?php

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\View\ArrayData;

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

        $myarray = new ArrayData($currentWeather);
        
        return $myarray;

        // print_r($myarray);
        // die();

        // print_r ($currentWeather);
        // die();
    }
 
}
