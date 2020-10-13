<?php

use SilverStripe\Security\Member;
use SilverStripe\Versioned\Versioned;

class ArticlePage extends Page
{
    private static $has_one = [
    ];

    private static $can_be_root = false;

    private static $db = [
        
    ];

    public function getName() {
        return Versioned::get_latest_version(self::class, $this->ID)
            ->Author()
            ->FirstName;
    }

}

