<?php

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class ContactPage extends Page
{
    // private static $db = [
    //     'ToEmail' 			=> 'EmailAddress',
    //     'EmailSubject' 		=> 'Varchar(255)',
    //     'SuccessMessage' 	=> 'HTMLText',
    // ];

    // // this will add the options in the contact page settings, not the main settings!!
    // public function getCMSFields()
    // {
	// 	$fields = parent::getCMSFields();

	// 	$toEmail = EmailField::create('ToEmail', 'To Email')
	// 		->setDescription('The email address that form submissions should be sent to.');
	// 	//$fields->addFieldToTab('Root.FormOptions', $toEmail);

	// 	$emailSubject = TextField::create('EmailSubject', 'Email Subject');
	// 	//$fields->addFieldToTab('Root.FormOptions', $emailSubject);

	// 	$emailSuccessMessage = HTMLEditorField::create('SuccessMessage', 'Email success message');
	// 	//$fields->addFieldToTab('Root.FormOptions', $emailSuccessMessage);

    //     $fields->addFieldsToTab(
    //         'Root.Email',
    //         [
    //             $toEmail,
    //             $emailSubject,
    //             $emailSuccessMessage
    //         ]
    //     );

    //     return $fields;
    // }
}