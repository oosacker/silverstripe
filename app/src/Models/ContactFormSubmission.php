<?php


use RiverLink\Website\App\Admin\ContactFormAdmin;
use SilverStripe\ORM\DataObject;

class ContactFormSubmission extends DataObject
{
    private static $db = [
        'Name' => 'Varchar(255)',
        'ToEmail' => 'EmailAddress',
        'FromEmail' => 'EmailAddress',
        'Subject' => 'Varchar(255)',
        'Message' => 'Text',
    ];

    private static $summary_fields = [
        'Created.Nice' => 'When',
        'Name' => 'Sender name',
        'ToEmail' => 'To',
        'FromEmail' => 'From',
        'Subject' => 'Subject',
        'Message' => 'Message',
    ];

    private static $default_sort = [
        'Created' => 'DESC',
    ];

    private static $primary_model_admin_class = ContactFormAdmin::class;

    public static function createContactRecord($data)
    {

        // var_dump($data);
        // die();

        $obj = self::create();

        $obj->Name = $data['Name'];
        $obj->ToEmail = $data['ToEmail'];
        $obj->FromEmail = $data['FromEmail'];
        $obj->Subject = $data['Subject'];
        $obj->Message = $data['Message'];

        $obj->write();
    }

}
