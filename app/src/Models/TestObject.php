<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;
// use TestObjectPage;

// These can be created from dev/tasks/write_task or /test-object-page/
// /test-object-page/ will create ones associated with that page

class TestObject extends DataObject
{
    private static $db = [
        'Name' => 'Varchar',
        'Number' => 'Int',
    ];

    private static $has_one = [
        'TestObjectPage' => TestObjectPage::class,
    ];

    // /api/v1/testobject/ID
    private static $api_access = true;

    public function canView($member = null) 
    {
        return true;
    }

    public function canEdit($member = null) 
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canDelete($member = null) 
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canCreate($member = null, $context = []) 
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

}