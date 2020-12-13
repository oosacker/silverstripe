<?php

use SilverStripe\Dev\BuildTask;

class TestTask extends BuildTask
{
    protected $title = 'Test Task';

    protected $description = 'This is a <strong>TEST</strong>';

    private static $segment = 'test_task';

    public function run($request)
    {
        echo('testing task...');
    }

}
