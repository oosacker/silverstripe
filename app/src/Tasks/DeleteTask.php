<?php

use SilverStripe\Dev\BuildTask;

class DeleteTask extends BuildTask
{
    protected $title = 'Delete Task';

    protected $description = 'Delete data';

    private static $segment = 'delete_task';

    public function run($request)
    {
        echo('deleting all rows in TestObject table...<br>');

        $list = TestObject::get();

        foreach($list as $item) {
            echo $item->delete();
            echo('removed <br>');
        }

        echo('done with task...<br>');
        
    }

}
