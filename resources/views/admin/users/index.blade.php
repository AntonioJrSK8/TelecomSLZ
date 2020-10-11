@extends('layouts.appAdmin')

@section('content')
    <h3>Lista de Usuário</h3>
        {!! Button::primary(Icon::plus().' Novo')->asLinkTo(route('admin.user.create')) !!}
    <div class="row">
        {!! Table::withContents($users->items())
            ->striped()
            ->callback('Ações', function($field, $model){
                $linkEdit = route('admin.user.edit', ['user' => $model->id]);
                $linkShow = route('admin.user.show', ['user' => $model->id]);

                return Button::primary(Icon::pencil().' Editar')->asLinkTo($linkEdit). '|' . 
                       Button::warning(Icon::eye_open().' Show')->asLinkTo($linkShow);
            }) !!}
    </div>
        {!! $users->links() !!}
@endsection

