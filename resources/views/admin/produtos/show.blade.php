@extends('layouts.appAdmin')

@section('content')
<h3>Lista de Produtos</h3>

{!! Button::primary(Icon::plus().' Novo')->asLinkTo(route('admin.produto.create')) !!}
<br /><br />
<div class="row">

    @foreach ($produtos as $produto)
    <div class="col-sm-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180"
                style="height: 180px; width: 100%; display: block;"
                src="/storage/produtos/prd{{$produto->id}}.{{$produto->ext}}" data-holder-rendered="true">
            <div class="card-body">
                <h5 class="card-title">
                    @php
                    echo mb_substr($produto->name, 0,30, 'utf-8').'...';
                    @endphp
                </h5>
                <p class="card-text">
                    @php
                    echo mb_substr($produto->descricao, 0,100, 'utf-8').'...';
                    @endphp

                </p>
                {!! Button::primary(Icon::pencil().' Editar')
                ->asLinkTo(route('admin.produto.edit', ['user' => $produto->id])) !!}
                <p></p>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection