<?php

use SilverStripe\ORM\DataObject;

class ContactFormSubmission extends DataObject
{
    private static $db = [
        'Name' => 'Varchar(255)',
        'ToEmail' => 'EmailAddress',
        'FromEmail' => 'EmailAddress',
        'Subject' => 'Varchar(255)',
        'Message' => 'Text',
        //'SortOrder' => 'Int',       // Needed for the drag & drop reordering in CMS
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
        //'SortOrder'
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

    // public function getCMSFields() 
    // {
    //     //$fields = parent::getCMSFields();
    //     $fields = FieldList::create(
    //         TabSet::create('Root')
    //     );

    //     $gridConfig = GridFieldConfig::create()
    //         ->addComponent(new GridFieldButtonRow('before'))
    //         ->addComponent(new GridFieldToolbarHeader())
    //         ->addComponent(new GridFieldTitleHeader())
    //         ->addComponent(new GridFieldEditableColumns())  // using this will override the getCMSFields in User class - Varchar will be assigned a TextField
    //         ->addComponent(new GridFieldDeleteAction())
    //         ->addComponent(new GridFieldAddNewInlineButton())
    //         ->addComponent(new GridFieldOrderableRows('SortOrder'));

    //     $grid = GridField::create(
    //         'GridField',
    //         'Message list',
    //         $this,
    //         $gridConfig
    //     );

    //     $fields->addFieldToTab('Root.Main', $grid);

    //     //$fields->addFieldToTab('Root.Main', $grid);

    //     return $fields;
    // }

}
