<?php

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;


class RestfulServerController extends Controller
{
    private static $allowed_actions = [
        
    ];

    public function index()
    {

        $this->redirect('/api/v1/testobject');
    }
}
