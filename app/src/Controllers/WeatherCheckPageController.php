<?php

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\View\ArrayData;

class WeatherCheckPageController extends PageController
{
    private static $allowed_actions = [
        'checkweather',
    ];


    /*
    * Routes (see routes.yml): 
    * /weather/checkweather/12345 - controller/action/ID/OtherID
    * /weather/ - controller
    * /check-weather/ - template, can be overridden with index()
    */

    // public function index() 
    // {
    //     $cityId = $this->getRequest()->getVar('ID') ?? '2179538';

    //     echo('<pre>');
    //     echo($cityId);
    //     echo('</pre>');
    // }
    
    public function checkweather()
    {
        $weather = new OpenWeatherConnector();

        $cityId = $this->getRequest()->getVar('ID') ?? '2179538';

        // echo('<pre>');
        // echo($cityId);
        // echo('</pre>');

        $currentWeather = $weather->getWeather($cityId);

        $myarray = new ArrayData($currentWeather);
        
        return $myarray;

        // print_r($myarray);
        // die();

        // print_r ($currentWeather);
        // die();
    }
 
}
