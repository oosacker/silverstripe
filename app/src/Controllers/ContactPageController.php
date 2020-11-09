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
use SilverStripe\Core\Convert;
use Silverstripe\SiteConfig\SiteConfig;

class ContactPageController extends PageController
{
    private static $allowed_actions = ['form'];



    public function form() 
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

        // reads the site config data; settings are in the main Settings page of cms
        $config = SiteConfig::current_site_config(); 
        $adminEmail = $config->AdminEmail;
        $successMsg = $config->SuccessMessage;
        $subject = $config->EmailSubject;

        $messageBody = " 
            <p><strong>Name:</strong> {$data['Name']}</p> 
            <p><strong>Message:</strong> {$data['Message']}</p> 
        "; 

        $fromEmail = $data['Email'];

        $email = new Email(); 
        $email->setFrom($fromEmail); 
        $email->setTo($adminEmail); 
        $email->setSubject($subject);
        $email->setBody($messageBody); 
        $email->send(); 

        // saves the email to the database so they can be seen in cms
        $data = [
            'Name' => $data['Name'],
            'ToEmail' => $adminEmail,
            'FromEmail' => $data['Email'],
            'Subject' => $subject,//$this->EmailSubject,
            'Message' => $messageBody
        ];
        $databaseData = Convert::raw2sql($data);
        ContactFormSubmission::createContactRecord($databaseData);

        return [
            'Content' => $successMsg,
            'Form' => '' // if you dont have this, the form will be displayed again
        ];
    }
}