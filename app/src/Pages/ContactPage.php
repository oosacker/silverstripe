<?php

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class ContactPage extends Page
{
    private static $has_one = [];
    
    private static $db = [
        'ToEmail' 			=> 'Varchar(255)',
        'EmailSubject' 		=> 'Text',
        'SuccessMessage' 	=> 'Text',
    ];

    public function getCMSFields()
    {
		$fields = parent::getCMSFields();

		$toEmail = EmailField::create('ToEmail', 'To Email')
			->setDescription('The email address that form submissions should be sent to.');
		//$fields->addFieldToTab('Root.FormOptions', $toEmail);

		$emailSubject = TextField::create('EmailSubject', 'Email Subject');
		//$fields->addFieldToTab('Root.FormOptions', $emailSubject);

		$emailSuccessMessage = TextareaField::create('SuccessMessage', 'Email success message');
		//$fields->addFieldToTab('Root.FormOptions', $emailSuccessMessage);

        $fields->addFieldsToTab(
            'Root.FormOptions',
            [
                $toEmail,
                $emailSubject,
                $emailSuccessMessage
            ]
        );

        return $fields;
    }
}