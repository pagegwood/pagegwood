<?php

namespace App\Content\Blocks;

class Form extends BlockBuilder
{
    public $view = 'blocks.form';

    public function getFormAttribute()
    {
        $form = $this->form_id;

        if (!empty($form)) {
            return $form;
        }
    }

    public function hasForm()
    {
        return !is_null($this->form);
    }

    public function renderForm()
    {
        if($this->hasForm()){
            return do_shortcode('[gravityform id="' . $this->form . '" title="false" description="false" ajax=false]');
        }
    }
}
