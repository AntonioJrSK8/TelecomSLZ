<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class EmpresaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('urlimage', 'text')
            ->add('imagem', 'file', ['label' => 'Imagem']);
    }
}
