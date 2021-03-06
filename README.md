## Overview

This is Natsuki's Silverstripe test site.

Find it online at http://silverstripe.natsuki.tech (may not be latest version).

Features:
* You can check Wellington's current weather by the Weather Checker link, you can also attach a city id as an HTTP variable.
* There is an email form via the Contact page. Each submission is saved to the database.
* There is a simple blogging system that I wrote.
* Go to /dev/tasks and there are some basic database read/write/delete tasks for TestObjects (a basic DataObject).
* You can test the Restful Server module by going to /api/v1/testobject, it will show you the TestObjects stored in the database (the data will be in XML as that is the default format, you have to add headers if you want JSON).   
* There is a demo of Silverstripe Elemental (https://github.com/silverstripe/silverstripe-elemental) on Elemental Blocks Page.
* The Test Object Page generates a new Test Object (type of DataObject) every time the index function runs. It contains a random string and number. These can be viewed by http://silverstripe.localhost/dev/tasks/read_task and deleted by http://silverstripe.localhost/dev/tasks/delete_task.
