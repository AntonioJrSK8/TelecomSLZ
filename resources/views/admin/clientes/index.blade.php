@extends('layouts.appAdmin')

@section('content')
    <h3>Lista de Clientes</h3>
        <!-- {!! Button::primary(Icon::plus().' Novo')->asLinkTo(route('admin.cliente.create')) !!} -->
        <div class="row">
            {!! Table::withContents($clientes->items())
            ->striped()
            ->callback('Ações', function($field, $model){
            $linkEdit = route('admin.cliente.edit', ['cliente' => $model->id]);
            $linkShow = route('admin.cliente.show', ['cliente' => $model->id]);
            
            return Button::primary(Icon::pencil().' Editar')->asLinkTo($linkEdit). '|' .
                   Button::warning(Icon::eye_open().' Show')->asLinkTo($linkShow);
            })
        !!}
        </div>
    {!! $clientes->links() !!}
@endsection