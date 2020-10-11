@extends('layouts.appAdmin')

@section('content')

    @component('admin.users.tabs-component',['user' => $form->getModel()])
        <div class="col-md-12">            
            {!! form($form->add('edit', 'submit', [
            'attr' => ['class' => 'btn btn-primary'],
            'label' => Icon::pencil().' Editar'
            ])) !!}
        </div>
    @endcomponent
    
@endsection

