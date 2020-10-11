@extends('layouts.appPrd')

@section('content')
<h3>Lista de Produtos</h3>

<br /><br />
<div class="row">
    <div class="col-sm-12">
        {{ Form::open(array('route' => 'produto.busca', 'method' => 'POST')) }}
        {{ Form::label('nameprd', 'Busca seu produto ou serviço') }}
        {{ Form::text('nameprd', null, ['class'=>'form-control']) }}
        {{ Form::close() }}
    </div>
</div>

<div class="row">
    @foreach ($produtos as $produto)
    <div class="col-sm-3" style="margin: 1em auto 1em;">
        <div class="card imagem" style="width: 14rem; height: 26rem;">
             
                <img class="card-img-top" style="width: 100%; height: 15rem;"
                src="/storage/produtos/prd{{$produto->id}}.{{$produto->ext}}" alt="Card image cap">
         
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
            <!-- <a href="{{ route('produto.detalhes',['id' => $produto->id]) }}" class="btn btn-primary">Detalhes</a> -->
           
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{$produto->id}}">
                Detalhes
            </button>
        
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal{{$produto->id}}" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gridModalLabel">Produto / Serviço</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid bd-example-row">
                        <div class="row">
                            <div class="col-md-9">
                                @php
                                    echo mb_substr($produto->name, 0,30, 'utf-8').'...';
                                @endphp
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-8 ml-auto">
                                <img class="card-img-top" style="width: 100%; height: 15rem;"
                                    src="/storage/produtos/prd{{$produto->id}}.{{$produto->ext}}" alt="Card image cap">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-9 ml-auto">
                                <p class="text-right text-danger">
                                    @php
                                        echo 'R$ '. mb_substr( $produto->precocompra , 0,100, 'utf-8');
                                    @endphp
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-9">
                                @php
                                    echo mb_substr($produto->descricao, 0,100, 'utf-8').'...';
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Adicionar na Sacola</button>
                </div>
            </div>
        </div>
    </div>

      
    @endforeach

</div>

@endsection