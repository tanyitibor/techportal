<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class SimpleMDE extends Field
{
    public static $js = [
        '/js/simplemde.min.js',
    ];

    public static $css = [
        '/css/simplemde.min.css',
    ];

    protected $view = 'admin.simplemde';

    public function render()
    {
        $this->script = "initEditor()";

        return parent::render();
    }
}
