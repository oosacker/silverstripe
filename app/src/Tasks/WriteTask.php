<?php

use SilverStripe\Dev\BuildTask;

class WriteTask extends BuildTask
{
    protected $title = 'Write Task';

    protected $description = 'Write some data';

    private static $segment = 'write_task';

    public function run($request)
    {
        echo('filling TestObject table...<br>');

        for($i=0; $i<10; $i++) {
            $obj = TestObject::create();
            $obj->Name = $this->generateRandomString();
            $obj->Number = $i;
            $obj->write();
        }

        echo('done with task...<br>');
        
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
