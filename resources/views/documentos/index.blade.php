@extends('layouts.app')

@section('title', 'Documentos - OrgTrack')
@section('page-title', 'Mis documentos')

@section('breadcrumb')
    <li class="breadcrumb-item active">Documentos</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mis envíos completados</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 280px;">
                        <input type="text" class="form-control float-right" placeholder="Buscar por ID de envío...">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <span class="mr-2"><strong>ID:</strong> 9</span>
                                        <span class="badge badge-success">Entregado</span>
                                        <div class="mt-2 small"><strong>Origen:</strong> Ferbo, Municipio Santa Cruz de la Sierra</div>
                                        <div class="small"><strong>Destino:</strong> Av. Pedro Marbán, Petrolero Sur, Estación Argentina</div>
                                    </div>
                                    <div class="text-right small text-muted">
                                        <div><strong>Recogida:</strong> 13/10/2025</div>
                                        <div><strong>Entrega:</strong> --</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <i class="far fa-file-pdf fa-3x text-danger mb-2"></i>
                                <p class="mb-2">Documento completo</p>
                                <a href="{{ route('documentos.particiones', ['id' => 9]) }}" class="btn btn-outline-primary btn-block">Ver particiones</a>
                                <a href="{{ route('documentos.ver', ['id' => 9]) }}" class="btn btn-primary btn-block">Ver documento</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
