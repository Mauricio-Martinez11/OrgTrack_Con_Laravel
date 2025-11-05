@extends('layouts.app')

@section('title', 'Seguimiento del envío - OrgTrack')
@section('page-title', 'Seguimiento del envío')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('envios.index') }}">Envíos</a></li>
    <li class="breadcrumb-item active">Detalle</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="mb-3">Partición 1 - Estado: <span class="badge badge-success">Entregado</span></h5>
                        <h6>Transportista</h6>
                        <p class="mb-1">Nombre: Mauri Martinez</p>
                        <p class="mb-1">Teléfono: 75386249</p>
                        <p class="mb-3">CI: 132252</p>

                        <h6>Vehículo</h6>
                        <p class="mb-1">Placa: STU0123</p>
                        <p class="mb-3">Tipo: Mediano - Refrigerado</p>

                        <h6>Transporte</h6>
                        <p class="mb-3">Tipo de transporte: Refrigerado<br>Descripción: Ideal para productos que requieren baja temperatura como frutas y lácteos</p>

                        <div class="timeline-item mb-3">
                            <span class="text-success">●</span>
                            <strong class="ml-1">Recogida:</strong> 1/10/2025 – 09:30
                            <div class="mt-2 p-2 bg-light rounded">
                                <strong>Origen:</strong> Ferbo, Municipio Santa Cruz de la Sierra<br>
                                Recogida de: Verduras - Zanahorias (100 kg)<br>
                                Sin instrucciones
                            </div>
                        </div>

                        <div class="timeline-item">
                            <span class="text-muted">●</span>
                            <strong class="ml-1">Entrega:</strong> 1/10/2025 – 11:30
                            <div class="mt-2 p-2 bg-light rounded">
                                <strong>Destino:</strong> Avenida Pedro Marbán, Petrolero Sur, Estación Argentina<br>
                                Entrega de: Verduras - Zanahorias (100 kg)<nobr></nobr><br>
                                Sin instrucciones
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div id="map" style="height: 420px;" class="rounded border"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    const map = L.map('map').setView([-17.7833, -63.1833], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    const origen = L.marker([-17.7500, -63.2000]).addTo(map).bindPopup('Origen');
    const destino = L.marker([-17.8200, -63.1800]).addTo(map).bindPopup('Destino');

    const route = L.polyline([
        [-17.7500, -63.2000],
        [-17.7800, -63.1950],
        [-17.8000, -63.1900],
        [-17.8200, -63.1800]
    ], { color: '#007bff', weight: 4 }).addTo(map);

    map.fitBounds(route.getBounds(), { padding: [20, 20] });
</script>
@endsection


