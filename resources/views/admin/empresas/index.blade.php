@extends('layouts.appAdmin')

@section('content')
    <h3>Lista de Empresa</h3>
        <!-- {!! Button::primary(Icon::plus().' Novo')->asLinkTo(route('admin.empresa.create')) !!} -->
        <div class="row">
            {!! Table::withContents($empresas->items())
            ->striped()
            ->callback('Ações', function($field, $model){
            $linkEdit = route('admin.empresa.edit', ['empresa' => $model->id]);
            $linkShow = route('admin.empresa.show', ['empresa' => $model->id]);
            
            return Button::primary(Icon::pencil().' Editar')->asLinkTo($linkEdit). '|' .
                   Button::warning(Icon::eye_open().' Show')->asLinkTo($linkShow);
            })
        !!}
        </div>
    {!! $empresas->links() !!}
@endsection