<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\Form;
use SilverStripe\Control\Email\Email;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Akismet\AkismetSpamProtector;

class ContactPageController extends PageController
{
    private static $allowed_actions = ['Form'];

    public function Form() 
    { 
        $fields = new FieldList( 
            TextField::create('Name'), 
            EmailField::create('Email'), 
            TextareaField::create('Message')
        ); 

        $actions = new FieldList( 
            FormAction::create('submit', 'Submit') 
        ); 

        $validator = RequiredFields::create('Name', 'Email', 'Message');

        $contactForm = Form::create($this, 'Form', $fields, $actions, $validator);

        $contactForm->enableSpamProtection([
            'protector' => AkismetSpamProtector::class,
            'name' => 'Captcha',
            'mapping' => [
                'Name' => 'authorName',
                'Email' => 'authorMail',
                'Message' => 'body'
            ]
        ]);

        return $contactForm; 
    }

    public function submit($data, $form) 
    { 
        $email = new Email(); 
         
        $email->setTo('oosacker@gmail.com'); 
        $email->setFrom($data['Email']); 
        $email->setSubject("Contact Message from {$data["Name"]}"); 
         
        $messageBody = " 
            <p><strong>Name:</strong> {$data['Name']}</p> 
            <p><strong>Message:</strong> {$data['Message']}</p> 
        "; 

        $email->setBody($messageBody); 
        $email->send(); 
        return [
            'Content' => 'Thanks for your message!',
            'Form' => ''
        ];
    }
}