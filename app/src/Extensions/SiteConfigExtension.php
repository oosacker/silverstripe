<?php

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'AdminEmail' 		=> 'EmailAddress',
        'EmailSubject' 		=> 'Varchar(255)',
        'SuccessMessage' 	=> 'HTMLText',
    ];

    // this will add the options in the contact page settings, not the main settings!!
    public function updateCMSFields(FieldList $fields)
    {

		$adminEmail = EmailField::create('AdminEmail', 'Admin Email')
			->setDescription('The email address that form submissions should be sent to.');

		$emailSubject = TextField::create('EmailSubject', 'Email Subject');

		$emailSuccessMessage = HTMLEditorField::create('SuccessMessage', 'Email success message');

        $fields->addFieldsToTab(
            'Root.Email',
            [
                $adminEmail,
                $emailSubject,
                $emailSuccessMessage
            ]
        );
    }

}
