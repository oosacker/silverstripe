<?php

use SilverStripe\Admin\ModelAdmin;

use SilverStripe\Forms\GridField\GridFieldButtonRow;
use SilverStripe\Forms\GridField\GridFieldToolbarHeader;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;

use Symbiote\GridFieldExtensions\GridFieldTitleHeader;
use Symbiote\GridFieldExtensions\GridFieldEditableColumns;
use Symbiote\GridFieldExtensions\GridFieldAddNewInlineButton;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig;


class ContactFormAdmin extends ModelAdmin
{
    private static $managed_models = [
        ContactFormSubmission::class,
    ];

    private static $menu_title = 'Contact Messages';

    private static $url_segment = 'contact';

    // public function getEditForm($id = null, $fields = null)
    // {
    //     $form = parent::getEditForm($id, $fields);
    //     $gridFieldName = $this->sanitiseClassName($this->modelClass);
    //     $gridField = $form->Fields()->fieldByName($gridFieldName);

    //     // create a new gridfield config which will overwrite the old one
    //     $config = GridFieldConfig::create()
    //         ->addComponent(new GridFieldButtonRow('before'))
    //         ->addComponent(new GridFieldToolbarHeader())
    //         ->addComponent(new GridFieldTitleHeader())
    //         ->addComponent(new GridFieldEditableColumns())  // using this will override the getCMSFields in User class - Varchar will be assigned a TextField
    //         ->addComponent(new GridFieldDeleteAction())
    //         ->addComponent(new GridFieldAddNewInlineButton())
    //         ->addComponent(new GridFieldOrderableRows('SortOrder'));

    //     $gridField->setConfig($config);

    //     return $form;

    // }
}
