<?php

namespace Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;

class MyElement extends BaseElement
{
    private static $singular_name = 'my element';

    private static $plural_name = 'my elements';

    private static $table_name = 'MyElement';

    private static $description = 'What my custom element does';

    private static $inline_editable = false;

    private static $db = [
        'CustomTitle' => 'Varchar',
        'HTMLText' => 'HTMLText',
    ];

    private static $has_one = [
        'Picture' => Image::class,
    ];

    private static $owns = [
        'Picture',
    ];

	public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }

    public function getType()
    {
        return 'My Element';
    }
}