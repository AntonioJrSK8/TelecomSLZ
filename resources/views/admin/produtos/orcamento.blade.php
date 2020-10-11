@extends('layouts.appPrd')

@section('content')
<br /><br />
{!! Form::open(array('route' => 'produto.gravaorcamento')) !!}
<div class="row">
    <h3>Orçamento</h3>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="empresa">Empresa</label>
            <input class="form-control" type="text" name="empresa" id="empresa">
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" id="email" required>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="telefone">Telefone/Whatsapp</label>
            <input class="form-control" type="text" name="telefone" id="telefone" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        Quantos ramais você precisa?
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="NRamais" id="exampleRadios1" value="Ate 5 ramais" checked>
            <label class="form-check-label" for="exampleRadios1">
                Até 5 ramais
            </label>
        </div>
    </div>
    <div class="col-6">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="NRamais" id="exampleRadios2" value="de 6 a 10 ramais" >
            <label class="form-check-label" for="exampleRadios2">
                De 6 a 10 ramais
            </label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="NRamais" id="exampleRadios3" value="de 11 a 30 ramais" >
            <label class="form-check-label" for="exampleRadios3">
                De 11 a 30 ramais
            </label>
        </div>
    </div>
    <div class="col-6">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="NRamais" id="exampleRadios4" value="mais de 30 ramais" >
            <label class="form-check-label" for="exampleRadios4">
                Mais de 30 ramais
            </label>
        </div>
    </div>
</div>
<br/>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Informações adicionais</label>
            <textarea class="form-control" name="informacoes" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>
</div>
<br/>
<div class="row justify-content-end">
    <div class="col-3">
        <button class="btn btn-primary" type="submit">Enviar</button>
    </div>
</div>
{!! Form::close() !!}
@endsection