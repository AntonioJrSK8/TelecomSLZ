@extends('layouts.appPrd')

@section('content')
<br /><br />
<h3>Lista de Produtos</h3>

<div class="row">

    @foreach ($produtos as $produto)
    <div class="col-sm-0" style="margin: 1em auto 1em;">
        <div class="card imagem" style="width: 14rem; height: 26rem;">
            <a href="#"> 
                <img class="card-img-top" style="width: 100%; height: 15rem;"
                src="/storage/produtos/prd{{$produto->id}}.{{$produto->ext}}" alt="Card image cap">
            </a>
            <div class="card-body">
                <h6 class="card-title">
                    @php
                        echo mb_substr($produto->name, 0,30, 'utf-8').'...';
                    @endphp
                </h6>
                <p class="card-text small">
                    @php
                        echo mb_substr($produto->descricao, 0,100, 'utf-8').'...';
                    @endphp
                </p>
                
            </div>
            <a href="javascript:history.go(-1)" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
      
    @endforeach

</div>

@endsection