<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class VisitaConfForm extends Form
{
    public function buildForm()
    {
        $this->add('visitado', 'checkbox', ['label' => "Confirmação de Visita Técnica"]);
    }
}
