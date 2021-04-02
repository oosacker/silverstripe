<?php

use SilverStripe\Assets\Image;
use SilverStripe\Assets\File;
use SilverStripe\AssetAdmin\Forms\UploadField;

class TestObjectPage extends Page
{

    private static $db = [];

    private static $has_many = [
        'TestObjects' => TestObject::class,
    ];

    public function getData() 
    {
        return $this->test_data();
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }
}
