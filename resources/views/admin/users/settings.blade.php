@extends('layouts.appAdmin')

@section('content')
    <h3>Altera Senha de Usuário</h3>
    <div class="row">
        <div class="col-sm-3">
            {!! form($form->add('insert', 'submit', [
                'attr' => ['class' => 'btn btn-primary'],
                'label' => Icon::ok().' Salvar'
            ])) !!}
        </div>
    </div>
@endsection

