<?php

use SilverStripe\Admin\ModelAdmin;


class TestObjectAdmin extends ModelAdmin
{
    private static $managed_models = [
        TestObject::class,
    ];

    private static $menu_title = 'Test Objects';

    private static $url_segment = 'TestObjects';

}
