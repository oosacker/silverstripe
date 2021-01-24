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

        foreach($list as $item) {
            echo $item->Name . ' ' . $item->Number;
            echo('<br>');
        }

        echo('done with task...<br>');
        
    }

}
