<?php

namespace App\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Form;


class UserNameForm extends Form
{
    public function buildForm()
    {
        $name = $this->getData('name');
        $this
            ->add('name', 'text', ['rules'=>'required|max:100', 'value'=>$name]);
    }
}
