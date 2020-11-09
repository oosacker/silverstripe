<?php

use SilverStripe\Admin\ModelAdmin;

class ContactFormAdmin extends ModelAdmin
{
    private static $managed_models = [
        ContactFormSubmission::class,
    ];

    private static $menu_title = 'Contact Messages';

    private static $url_segment = 'contact';
}
