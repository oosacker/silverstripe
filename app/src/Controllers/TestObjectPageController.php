<?php

use SilverStripe\Control\Controller;
use SilverStripe\Control\HTTPRequest;

class TestObjectPageController extends PageController
{

    public function index(HTTPRequest $request) 
    {
        $this->makeObject();
        
        return [];
    }

    protected function makeObject() 
    {
        $test = new TestObject();
        $test->Name = $this->generateRandomString();
        $test->Number = rand();
        $test->TestObjectPageID = $this->ID;
        $test->write();

        // die('done');
    }

    public function dump()
    {
        echo '<pre>';
        echo 'here is your data';
        var_dump($this->TestObjects);
        echo '</pre>';

        return $this->TestObjects;
    }

    protected function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
