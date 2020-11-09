<?php

use SilverStripe\Assets\Image;
use SilverStripe\Assets\File;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Versioned\Versioned;

class ArticlePage extends Page
{
    private static $can_be_root = false;

    private static $db = [];

    // only one image per article page
    private static $has_one = [
        'Photo' => Image::class,
    ];

    // this will automatically set files as 'published' when the article is published
    private static $owns = [
        'Photo',
    ];

    public function getName() {
        return Versioned::get_latest_version(self::class, $this->ID)
            ->Author()
            ->FirstName;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $photo = UploadField::create('Photo');
        $fields->addFieldToTab('Root.Main', $photo, 'Content');
       
        return $fields;
    }

}

