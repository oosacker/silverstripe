<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Control\Email\Email;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Akismet\AkismetSpamProtector;

class ContactPageController extends PageController
{
    private static $allowed_actions = ['Form'];

    public function Form() 
    { 
        
        $nameField = TextField::create('Name', 'Name*:')
            ->setAttribute('placeholder','Your name')
            ->addExtraClass('mb-2');
        
        $emailField = EmailField::create('Email', 'Email*:')
            ->setAttribute('placeholder','Your email address')
            ->addExtraClass('mb-2');

        $messageField = TextareaField::create('Message', 'Message*:')
            ->setAttribute('placeholder','Enter your message here')
            ->addExtraClass('mb-1');

        $submitBtn = FormAction::create('submit', 'Submit')
            ->addExtraClass('mr-1');

        $resetBtn = FormAction::create('Reset')
            ->setAttribute('type', 'reset')
            ->addExtraClass('mr-1');

        $fieldGroup = FieldGroup::create(
            $nameField,
            $emailField,
            $messageField,
        )->addExtraClass('border rounded p-4 mb-1');

        $fields = new FieldList( 
            $fieldGroup
        );

        $actions = new FieldList( 
            $submitBtn,
            $resetBtn
        ); 

        $validator = RequiredFields::create('Name', 'Email', 'Message');

        $contactForm = Form::create($this, __FUNCTION__, $fields, $actions, $validator);

        $contactForm->enableSpamProtection([
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