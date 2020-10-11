@extends('layouts.appAdmin')

@section('content')
    <h3>Editar Produto</h3>
    <div class="row">
        {!! form($form->add('edit', 'submit', [
            'attr' => ['class' => 'btn btn-primary'],
            'label' => Icon::pencil().' Editar'
        ])) !!}
    </div>
@endsection

