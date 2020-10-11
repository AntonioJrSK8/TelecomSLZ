@extends('layouts.appAdmin')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
       <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Indicador</li>
        </ol>
    <div class="panel-body">
        <div class="col-md-3">  
            <div class="panel-body">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Chamados Abertos
                    </div>
                    <div class="panel-body card-texto">
                        {!! $chAberto !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel-body">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        Chamados Pendentes
                    </div>
                    <div class="panel-body card-texto">
                        {!! $chPendente !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel-body">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Chamados Finalizados
                    </div>
                    <div class="panel-body card-texto">
                        {!! $chFinalizado !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel-body">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Chamados Atrasados
                    </div>
                    <div class="panel-body card-texto">
                        {!! $chAtrasado !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
