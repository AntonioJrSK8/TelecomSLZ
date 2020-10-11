@extends('layouts.appAdmin')

@section('content')
    <h3>Lista de Visitas Técnicas</h3>
        

        <div class="row">
            @if($tipo!='App\Models\Cliente')
                {!! Table::withContents($visitas->items())
                    ->striped()
                    ->callback('Ações', function($field, $model){
                        
                        $linkEdit = route('admin.visita.visitaConfirmada', ['visita' => $model->id]);
                        
                        return $model->visitado == 1 ?
                                Button::success(Icon::check().' Confirmado')->asLinkTo($linkEdit) :
                                Button::danger(Icon::stop().' Pendente')->asLinkTo($linkEdit) ;
                                
                    })
                !!}
            @else
                {!! Table::withContents($visitas->items())
                    ->striped();
                !!}
            @endif
        </div>

    {!! $visitas->links() !!}
@endsection