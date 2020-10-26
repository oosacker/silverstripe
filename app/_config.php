<?php

use SilverStripe\Security\PasswordValidator;
use SilverStripe\Security\Member;
use SilverStripe\Akismet\AkismetSpamProtector;
use SilverStripe\i18n\i18n;

// remove PasswordValidator for SilverStripe 5.0
$validator = PasswordValidator::create();
// Settings are registered via Injector configuration - see passwords.yml in framework
Member::set_password_validator($validator);

i18n::set_locale('en_NZ'); 

i18n::config()
    ->set('date_format', 'dd.MM.yyyy')
    ->set('time_format', 'HH:mm');