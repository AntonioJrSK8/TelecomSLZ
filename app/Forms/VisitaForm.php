<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class VisitaForm extends Form
{
    public function buildForm()
    {
        $emp = config('app.name', '');
        
        $this
            ->add('name', 'text', ['label' => 'Nome', 'rules' => 'required|min:10|max:100'])
            ->add('email', 'email', ['label' => 'E-mail', 'rules' => 'required|email'])
            ->add('pj', 'checkbox', ['label' => 'Pessoa Juridica'])
            ->add('telefone', 'text', ['label' => 'Telefone de contato', 'rules' => 'required|numeric|min:10'])
            ->add('aceita_visita', 'checkbox', 
                  ['label' => 'Concordo que os dados pessoais fornecidos
                               acima serão utilizados para envio de conteúdo
                               informativo, analítico e publicitário sobre 
                               produtos, serviços e assuntos gerais, 
                               nos termos da Lei Geral de Proteção de Dados.',
                'rules' => 'required']
                );

            //Eu permito o contato de um técnico ao 
            //                                         clicar em 'Enviar', eu concordo com a " . $emp . " em me 
            //                                         contatar sobre seus produtos e serviços.", 'rules' => 'required']);
    }
}

//Concordo que os dados pessoais fornecidos acima serão utilizados para envio de conteúdo informativo, analítico e publicitário sobre produtos, serviços e assuntos gerais, nos termos da Lei Geral de Proteção de Dados.
