<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ProdutoForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', ['label' => 'Nome'])
            ->add('descricao', 'textarea', ['label' => 'Descrição'])
            ->add('especificacao', 'textarea', ['label' => 'Especificações Técnica'])
            ->add('fabricante', 'text', ['label' => 'Fabricante'])
            ->add('modelo', 'text', ['label' => 'Modelo do Produto'])
            ->add('marca', 'text', ['label' => 'Marca'])
            ->add('precocompra', 'text', ['label' => 'Preço de Compra'])
            ->add('peso', 'text', ['label' => 'Peso'])
            ->add('imagem', 'file', ['label' => 'Imagem']);
    }
}