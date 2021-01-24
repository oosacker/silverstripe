<?php

//namespace Natsuki\MyApp;

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\View\ArrayData;
use Natsuki\MyApi\OpenWeatherConnector;

class WeatherCheckPageController extends PageController
{
    private static $allowed_actions = [
        'checkweather',
    ];


    /*
    * Routes (see routes.yml): 
    * /weather/checkweather/12345 - controller/action/ID
    * /weather/ - controller
    * /check-weather/ - template, can be overridden with index()
    */


    /*
    * this is called by the WeatherCheckPage.php
    */
    public function index(?HTTPRequest $req = null) 
    {
        echo('<pre>');
        var_dump($req);
        echo('</pre>');

        return [];
    }
    
    /* 
    * this is called by /weather/checkweather/ as defined in routes.yml
    * can also be called by template as checkweather()
    */
    public function checkweather(?HTTPRequest $req = null)
    {
        $weather = new OpenWeatherConnector();


        $cityId = $req['city_id'] ?? '2179538';
        //$cityId = $this->getRequest()->getVar('ID') ?? '2179538';

        // echo('<pre>');
        echo('id=' . $cityId);
        // echo('</pre>');

        $currentWeather = $weather->getWeather($cityId);

        $myarray = new ArrayData($currentWeather);
        
        // echo('<pre>');
        // var_dump($myarray);
        // echo('</pre>');

        return $myarray;
    }
 
}
