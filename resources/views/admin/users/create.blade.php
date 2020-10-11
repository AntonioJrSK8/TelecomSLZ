@extends('layouts.appAdmin')

@section('content')
    <h3>Novo Usuário</h3>
    {!! form($form
        ->add('gravar', 'submit', ['label' => Icon::ok().' Salva', 'attr'=>['class'=>'btn btn-primary']])
        ->add('clear', 'reset', ['label' => Icon::erase().' Limpa', 'attr' => ['class' => 'btn btn-primary']])) !!}
@endsection

