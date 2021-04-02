<?php

use SilverStripe\Dev\BuildTask;

class ReadTask extends BuildTask
{
    protected $title = 'Read Task';

    protected $description = 'Read some data';

    private static $segment = 'read_task';

    public function run($request)
    {
        echo('reading all rows in TestObject table...<br>');

        $list = TestObject::get();
        
        echo('<hr>');
        foreach($list as $item) {
            
            echo 'Name: ' . $item->Name . '<br/>Number: ' . $item->Number . '<br/>TestObjectPageID: ' . $item->TestObjectPageID;
            echo('<hr>');
        }

        echo('done with task...<br>');
        
    }

}
