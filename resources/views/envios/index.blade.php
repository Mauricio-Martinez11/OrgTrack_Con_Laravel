@extends('layouts.app')

@section('title', 'Envíos - OrgTrack')
@section('page-title', 'Envíos')

@section('breadcrumb')
    <li class="breadcrumb-item active">Envíos</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-pills p-2">
                    <li class="nav-item"><a class="nav-link" href="#tab-curso" data-toggle="tab">Envíos en Curso</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#tab-anteriores" data-toggle="tab">Envíos anteriores</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab-pendientes" data-toggle="tab">Envíos pendientes</a></li>
                    <li class="nav-item ml-auto pr-2"><a href="{{ route('envios.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Nuevo Envío</a></li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane" id="tab-curso"></div>
                    <div class="tab-pane active" id="tab-anteriores">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <a href="{{ route('envios.show', ['id' => 9]) }}"><strong>ID: 9</strong></a>
                                        <span class="badge badge-success ml-2">Entregado</span>
                                        <div class="mt-2 small"><strong>Origen:</strong> Ferbo, Municipio Santa Cruz de la Sierra</div>
                                        <div class="small"><strong>Destino:</strong> Avenida Pedro Marbán, Petrolero Sur, Estación Argentina</div>
                                    </div>
                                    <div class="text-right small text-muted">
                                        <div><strong>Recogida:</strong> —</div>
                                        <div><strong>Entrega:</strong> —</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="tab-pendientes"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
