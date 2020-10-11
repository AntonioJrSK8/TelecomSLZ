<?php

namespace App\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Form;


class UserForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');
        $this
            ->add('name', 'text', ['rules'=>'required|max:100'])
            ->add('email', 'email', ['rules' => "required|max:255|unique:users,email,{$id}"])
            ->add('type', 'select', [
                    'label'=>'Tipo de Usuário',
                    'choices'=>$this->roles(),
                    'rules' => 'required|in:'.implode(',',array_keys($this->roles())),
                ])
            ->add('sendMail', 'checkbox', [
                'label'=>'Envia email de Boas Vindas',
                'value'=>true,
                'checked'=>false
            ]);
    }
    protected function roles()
    {
        return [
            User::ROLE_ADMIN => 'Administrador',
            User::ROLE_TECNICO => 'Técnico',
            User::ROLE_CLIENTE => 'Cliente',
        ];
    }
}
