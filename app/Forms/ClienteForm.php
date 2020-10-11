<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ClienteForm extends Form
{
    public function buildForm()
    {   
        $cliente = $this->getData('id');
        $this
            ->add('name', 'text');
            //->add('pj', 'checkbox', ['label' => 'Pessoa Juridica'])
            //->add('telefone', 'text', ['label' => 'Telefone de contato', 'rules' => 'required']);
    }
}
