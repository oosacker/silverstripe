<?php

use SilverStripe\Control\Controller;

class TestController extends Controller 
{
    private static $allowed_actions = 
    [

    ];

    public function index()
    {
        echo '<pre>';
        echo '<h3>This is the Test Controller: ' . __FILE__ . '</h3>';
        echo '</pre>';
    }

}