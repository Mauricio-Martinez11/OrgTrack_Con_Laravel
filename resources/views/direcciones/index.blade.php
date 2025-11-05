@extends('layouts.app')

@section('title', 'Direcciones Guardadas - OrgTrack')
@section('page-title', 'Direcciones Guardadas')

@section('breadcrumb')
    <li class="breadcrumb-item active">Direcciones Guardadas</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de direcciones</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar dirección...">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-default"><i class="fas fa-search"></i></button>
                            <a href="{{ route('direcciones.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Nueva dirección
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <div class="mr-2">
                            <div class="font-weight-bold">Calle Sapocó → Pasillo Montegrande</div>
                            <small class="text-muted">Santa Cruz de la Sierra, Bolivia</small>
                        </div>
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-pen mr-1"></i>Editar</a>
                            <a href="#" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash mr-1"></i>Eliminar</a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <div class="mr-2">
                            <div class="font-weight-bold">Av. Grigotá → Calle Cordercuz</div>
                            <small class="text-muted">Santa Cruz de la Sierra, Bolivia</small>
                        </div>
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-pen mr-1"></i>Editar</a>
                            <a href="#" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash mr-1"></i>Eliminar</a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <div class="mr-2">
                            <div class="font-weight-bold">Cochabamba, Centro → Calle Juan de Garay, Barrio Militar</div>
                            <small class="text-muted">Santa Cruz de la Sierra, Bolivia</small>
                        </div>
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-pen mr-1"></i>Editar</a>
                            <a href="#" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash mr-1"></i>Eliminar</a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <div class="mr-2">
                            <div class="font-weight-bold">Avenida San Juan → Calle Buceta</div>
                            <small class="text-muted">Santa Cruz de la Sierra, Bolivia</small>
                        </div>
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-pen mr-1"></i>Editar</a>
                            <a href="#" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash mr-1"></i>Eliminar</a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <div class="mr-2">
                            <div class="font-weight-bold">Ángel Chávez Ruiz → La Morita, El Pari</div>
                            <small class="text-muted">Provincia Andrés Ibáñez, Santa Cruz</small>
                        </div>
                        <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-pen mr-1"></i>Editar</a>
                            <a href="#" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash mr-1"></i>Eliminar</a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
