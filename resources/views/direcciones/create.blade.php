@extends('layouts.app')

@section('title', 'Nueva Dirección - OrgTrack')
@section('page-title', 'Nueva Dirección')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('direcciones.index') }}">Direcciones Guardadas</a></li>
    <li class="breadcrumb-item active">Nueva Dirección</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Seleccionar Origen y Destino en el Mapa</h3>
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-location-arrow"></i></span></div>
                    <input type="text" id="hintDir" class="form-control" value="Selecciona el punto de origen en el mapa" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" id="resetDir" type="button">Reiniciar</button>
                    </div>
                </div>

                <div id="mapDirecciones" style="height: 420px;" class="rounded border"></div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label>Nombre del lugar de origen:</label>
                        <input type="text" class="form-control" id="dirOrigen" placeholder="Ej. Finca Orgánica La Esperanza" readonly>
                    </div>
                    <div class="col-md-6">
                        <label>Nombre del lugar de destino:</label>
                        <input type="text" class="form-control" id="dirDestino" placeholder="Ej. Planta Central de Procesamiento" readonly>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-primary">Guardar Dirección</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    const mapD = L.map('mapDirecciones').setView([-17.7833, -63.1833], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19, attribution: '&copy; OpenStreetMap' }).addTo(mapD);

    let mO = null, mD = null, line = null;
    const dirOrigen = document.getElementById('dirOrigen');
    const dirDestino = document.getElementById('dirDestino');
    const hintDir = document.getElementById('hintDir');

    function reset(){
        if (mO) mapD.removeLayer(mO);
        if (mD) mapD.removeLayer(mD);
        if (line) mapD.removeLayer(line);
        mO = mD = line = null;
        dirOrigen.value = '';
        dirDestino.value = '';
        hintDir.value = 'Selecciona el punto de origen en el mapa';
    }
    document.getElementById('resetDir').onclick = reset;
    reset();

    mapD.on('click', (e) => {
        if (!mO){
            mO = L.marker(e.latlng, {icon: L.divIcon({className:'text-success', html:'<i class="fas fa-map-marker-alt fa-lg"></i>'})}).addTo(mapD).bindPopup('Origen');
            dirOrigen.value = 'Ferbo, Municipio Santa Cruz de la Sierra';
            hintDir.value = 'Ahora selecciona el destino';
        } else if (!mD){
            mD = L.marker(e.latlng, {icon: L.divIcon({className:'text-danger', html:'<i class="fas fa-map-marker-alt fa-lg"></i>'})}).addTo(mapD).bindPopup('Destino');
            dirDestino.value = 'Avenida Pedro Marbán, Petrolero Sur, Estación Argentina';
            line = L.polyline([mO.getLatLng(), e.latlng], { color:'#3b82f6', weight:4 }).addTo(mapD);
            mapD.fitBounds(line.getBounds(), { padding:[20,20] });
            hintDir.value = 'Ruta trazada';
        }
    });
</script>
@endsection
