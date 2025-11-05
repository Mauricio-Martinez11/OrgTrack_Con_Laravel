@extends('layouts.app')

@section('title', 'Nuevo Envío - OrgTrack')
@section('page-title', 'Crear Nuevo Envío')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('envios.index') }}">Envíos</a></li>
    <li class="breadcrumb-item active">Nuevo Envío</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Paso / Progreso -->
        <div class="card">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col">
                        <div class="mb-1"><span class="badge badge-primary">1</span></div>
                        <div>Origen y Destino</div>
                        <small>Paso 1 de 3</small>
                    </div>
                    <div class="col">
                        <div class="mb-1"><span class="badge badge-secondary" id="step2-badge">2</span></div>
                        <div>Datos del envío</div>
                        <small>Paso 2 de 3</small>
                    </div>
                    <div class="col">
                        <div class="mb-1"><span class="badge badge-secondary" id="step3-badge">3</span></div>
                        <div>Confirmación</div>
                        <small>Paso 3 de 3</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- PASO 1: Mapa -->
        <!-- Rutas Guardadas -->
        <div class="card" id="rutasGuardadas">
            <div class="card-header"><h3 class="card-title">Rutas Guardadas</h3></div>
            <div class="card-body">
                <p class="mb-2">Selecciona una ruta guardada o marca nuevos puntos en el mapa</p>
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <select id="selRutaGuardada" class="form-control">
                            <option value="">Seleccionar ruta guardada</option>
                            <option value="ruta1">Ruta 1: Ferbo → Estación Argentina</option>
                            <option value="ruta2">Ruta 2: 4to anillo Norte → Parque Urbano</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 text-right">
                        <button type="button" id="btnNuevaRuta" class="btn btn-outline-primary btn-block">
                            <i class="fas fa-plus mr-1"></i> Añadir nueva ruta
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- PASO 1: Mapa -->
        <div class="card" id="step1">
            <div class="card-header"><h3 class="card-title">Ubicación en el Mapa</h3></div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span></div>
                    <input type="text" class="form-control" placeholder="Haz clic en el mapa para marcar el origen" readonly id="hintInput">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="btnReset">Reiniciar</button>
                    </div>
                </div>

                <div id="mapNuevoEnvio" style="height: 420px;" class="rounded border"></div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <span class="text-success"><i class="fas fa-circle"></i></span> <strong>Origen Actual</strong>
                        <input type="text" class="form-control mt-2" id="origenNombre" placeholder="Se mostrará al seleccionar dirección" readonly>
                    </div>
                    <div class="col-md-6">
                        <span class="text-danger"><i class="fas fa-circle"></i></span> <strong>Destino Actual</strong>
                        <input type="text" class="form-control mt-2" id="destinoNombre" placeholder="Se mostrará al seleccionar dirección" readonly>
                    </div>
                </div>
            </div>
            <div class="card-footer d-none"></div>
        </div>

        <!-- PASO 2: Datos del envío -->
        <div class="card d-none" id="step2">
            <div class="card-header"><h3 class="card-title">Partición 1</h3></div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Fecha de envío</label>
                        <input type="date" class="form-control" value="2025-10-22">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Hora de recogida</label>
                        <input type="time" class="form-control" value="06:00">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Hora de entrega estimada</label>
                        <input type="time" class="form-control" value="08:00">
                    </div>
                </div>

                <h5 class="mt-3">Productos a transportar</h5>
                <div id="productosContainer">
                <div class="producto-item border rounded p-3 mb-3">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Categoría</label>
                        <select class="form-control"><option>Verduras</option><option>Frutas</option></select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Producto</label>
                        <select class="form-control"><option>Zanahorias</option><option>Tomates</option></select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Cantidad</label>
                        <input type="number" class="form-control" value="5">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Peso volumétrico</label>
                        <input type="number" class="form-control" value="100">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tipo de empaque</label>
                        <select class="form-control"><option>Bolsa plástica</option><option>Cajón</option></select>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-outline-danger btn-sm btn-eliminar-producto"><i class="fas fa-times mr-1"></i> Eliminar</button>
                </div>
                </div>
                </div>
                </div>

                <div class="mb-2 only-step2 d-none" id="wrapAgregarProducto">
                    <button class="btn btn-outline-primary" id="btnAgregarProducto"><i class="fas fa-plus mr-1"></i> Agregar producto</button>
                </div>

                <!-- Lista de productos agregados -->
                <div id="productosAgregados" class="mt-2"><div class="alert alert-light border">Sin productos agregados</div></div>

                <h5 class="mt-3">Tipo de transporte requerido</h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fas fa-snowflake"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Refrigerado</span>
                                <span class="info-box-number">Seleccionado</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-secondary"><i class="fas fa-wind"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Ventilado</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="info-box-icon bg-secondary"><i class="fas fa-box"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Aislado</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contenedor para particiones extra dentro del paso 2 -->
            <div id="particionesContainer"></div>

            <div class="card-footer d-none"></div>
        </div>

        <!-- Segundo bloque: otra partición (visible al agregar) -->
        <div class="card d-none particion-item" id="particion2">
            <div class="card-header"><h3 class="card-title">Partición 2</h3></div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Fecha de envío</label>
                        <input type="date" class="form-control" value="2025-10-22">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Hora de recogida</label>
                        <input type="time" class="form-control" value="09:00">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Hora de entrega estimada</label>
                        <input type="time" class="form-control" value="11:00">
                    </div>
                </div>
                <div class="alert alert-info">Esta es una partición adicional de demostración (hardcodeada).</div>
            </div>
            <div class="card-footer text-right">
                <button type="button" class="btn btn-outline-danger btn-sm btn-eliminar-particion"><i class="fas fa-times mr-1"></i> Eliminar partición</button>
            </div>
        </div>

        <button class="btn btn-outline-secondary btn-block d-none only-step2" id="btnAgregarParticion">
            <i class="fas fa-layer-group mr-1"></i> Agregar otra partición
        </button>

        <!-- PASO 3: Confirmación -->
        <div class="card d-none mx-auto text-center" id="step3" style="max-width: 800px; font-size: 1.1rem;">
            <div class="card-header">
                <h3 class="card-title" style="font-size: 1.6rem;">Confirmar Solicitud de Envío</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="callout callout-success">
                            <h5 style="font-size: 1.2rem;">Origen</h5>
                            <p id="origenResumen">—</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="callout callout-danger">
                            <h5 style="font-size: 1.2rem;">Destino</h5>
                            <p id="destinoResumen">—</p>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col"><strong>Particiones</strong><div>1</div></div>
                            <div class="col"><strong>Peso Total</strong><div>500.0 kg</div></div>
                            <div class="col"><strong>Productos</strong><div>5</div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-none"></div>
        </div>
    </div>

    <!-- Barra global de navegación del wizard (sobre el copyright) -->
    <div class="mt-3 d-flex justify-content-between align-items-center" id="wizardActions">
        <button class="btn btn-secondary d-none" id="btnAnterior"><i class="fas fa-arrow-left mr-1"></i> Anterior</button>
        <div class="ml-auto">
            <a href="{{ route('envios.index') }}" class="btn btn-success d-none" id="btnEnviar"><i class="fas fa-paper-plane mr-1"></i> Enviar Solicitud</a>
            <button class="btn btn-primary" id="btnSiguiente">Continuar <i class="fas fa-arrow-right ml-1"></i></button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    // --- Wizard simple ---
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const step3 = document.getElementById('step3');
    const step2Badge = document.getElementById('step2-badge');
    const step3Badge = document.getElementById('step3-badge');
    const rutasCard = document.getElementById('rutasGuardadas');
    const btnAgregarParticion = document.getElementById('btnAgregarParticion');
    const cardParticion2 = document.getElementById('particion2');

    // Navegación usando barra global
    let currentStep = 1;
    const btnAnterior = document.getElementById('btnAnterior');
    const btnSiguiente = document.getElementById('btnSiguiente');
    const btnEnviar = document.getElementById('btnEnviar');
    function renderStep(){
        if (currentStep === 1){
            step1.classList.remove('d-none');
            step2.classList.add('d-none');
            step3.classList.add('d-none');
            rutasCard.classList.remove('d-none');
            document.querySelectorAll('.only-step2').forEach(el=> el.classList.add('d-none'));
            step2Badge.classList.replace('badge-primary','badge-secondary');
            step3Badge.classList.replace('badge-primary','badge-secondary');
            btnAnterior.classList.add('d-none');
            btnSiguiente.classList.remove('d-none');
            btnEnviar.classList.add('d-none');
        } else if (currentStep === 2){
            step1.classList.add('d-none');
            step2.classList.remove('d-none');
            step3.classList.add('d-none');
            rutasCard.classList.add('d-none');
            document.querySelectorAll('.only-step2').forEach(el=> el.classList.remove('d-none'));
            step2Badge.classList.replace('badge-secondary','badge-primary');
            step3Badge.classList.replace('badge-primary','badge-secondary');
            btnAnterior.classList.remove('d-none');
            btnSiguiente.classList.remove('d-none');
            btnEnviar.classList.add('d-none');
        } else {
            step1.classList.add('d-none');
            step2.classList.add('d-none');
            step3.classList.remove('d-none');
            rutasCard.classList.add('d-none');
            document.querySelectorAll('.only-step2').forEach(el=> el.classList.add('d-none'));
            step3Badge.classList.replace('badge-secondary','badge-primary');
            document.getElementById('origenResumen').innerText = origenNombre.value || 'Ferbo, Municipio Santa Cruz de la Sierra';
            document.getElementById('destinoResumen').innerText = destinoNombre.value || 'Avenida Pedro Marbán, Petrolero Sur, Estación Argentina';
            btnAnterior.classList.remove('d-none');
            btnSiguiente.classList.add('d-none');
            btnEnviar.classList.remove('d-none');
        }
    }
    // Listeners globales
    btnSiguiente.addEventListener('click', ()=>{
        if (currentStep === 1) currentStep = 2; else if (currentStep === 2) currentStep = 3;
        renderStep();
    });
    btnAnterior.addEventListener('click', ()=>{
        if (currentStep === 2) currentStep = 1; else if (currentStep === 3) currentStep = 2;
        renderStep();
    });
    renderStep();

    // --- Leaflet ---
    const map = L.map('mapNuevoEnvio').setView([-17.7833, -63.1833], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19, attribution: '&copy; OpenStreetMap' }).addTo(map);

    let origenMarker = null, destinoMarker = null, routeLine = null;
    const origenNombre = document.getElementById('origenNombre');
    const destinoNombre = document.getElementById('destinoNombre');
    const hintInput = document.getElementById('hintInput');

    function resetMap(){
        if (origenMarker) map.removeLayer(origenMarker);
        if (destinoMarker) map.removeLayer(destinoMarker);
        if (routeLine) map.removeLayer(routeLine);
        origenMarker = destinoMarker = routeLine = null;
        origenNombre.value = '';
        destinoNombre.value = '';
        hintInput.value = 'Haz clic en el mapa para marcar el origen';
    }

    document.getElementById('btnReset').onclick = resetMap;
    resetMap();

    map.on('click', function(e){
        if (!origenMarker){
            origenMarker = L.marker(e.latlng, {icon: L.divIcon({className:'text-success', html:'<i class="fas fa-map-marker-alt fa-lg"></i>'})}).addTo(map).bindPopup('Origen');
            origenNombre.value = 'Calle Ochoó, Mc Donald, Santa Cruz de la Sierra';
            hintInput.value = 'Ahora haz clic para marcar el destino';
        } else if (!destinoMarker){
            destinoMarker = L.marker(e.latlng, {icon: L.divIcon({className:'text-danger', html:'<i class="fas fa-map-marker-alt fa-lg"></i>'})}).addTo(map).bindPopup('Destino');
            destinoNombre.value = '530, Calle Pozo, Barrio Militar';
            // Dibujar ruta simulada
            routeLine = L.polyline([origenMarker.getLatLng(), e.latlng], {color:'#3b82f6', weight:4}).addTo(map);
            map.fitBounds(routeLine.getBounds(), {padding:[20,20]});
            hintInput.value = 'Ruta calculada';
        }
    });

    // --- Rutas guardadas (hardcode) ---
    const savedRoutes = {
        ruta1: {
            origen: [-17.7500, -63.2000],
            destino: [-17.8200, -63.1800],
            nombreOrigen: 'Ferbo, Municipio Santa Cruz de la Sierra',
            nombreDestino: 'Avenida Pedro Marbán, Petrolero Sur, Estación Argentina'
        },
        ruta2: {
            origen: [-17.7700, -63.1700],
            destino: [-17.7855, -63.2100],
            nombreOrigen: '4to Anillo Norte',
            nombreDestino: 'Parque Urbano Central'
        }
    };

    function aplicarRuta(r){
        resetMap();
        const data = savedRoutes[r];
        if (!data) return;
        origenMarker = L.marker(data.origen, {icon: L.divIcon({className:'text-success', html:'<i class="fas fa-map-marker-alt fa-lg"></i>'})}).addTo(map).bindPopup('Origen');
        destinoMarker = L.marker(data.destino, {icon: L.divIcon({className:'text-danger', html:'<i class="fas fa-map-marker-alt fa-lg"></i>'})}).addTo(map).bindPopup('Destino');
        routeLine = L.polyline([data.origen, data.destino], {color:'#3b82f6', weight:4}).addTo(map);
        map.fitBounds(routeLine.getBounds(), {padding:[20,20]});
        origenNombre.value = data.nombreOrigen;
        destinoNombre.value = data.nombreDestino;
        hintInput.value = 'Ruta seleccionada';
    }

    document.getElementById('selRutaGuardada').addEventListener('change', (e)=>{
        aplicarRuta(e.target.value);
    });

    document.getElementById('btnNuevaRuta').addEventListener('click', ()=>{
        // Solo UI; reinicia para permitir marcar nueva
        resetMap();
    });

    // --- Productos y particiones (UI demo) ---
    // Duplicar bloque de producto
    const productosContainer = document.getElementById('productosContainer');
    document.getElementById('btnAgregarProducto').addEventListener('click', ()=>{
        const first = productosContainer.querySelector('.producto-item');
        const clone = first.cloneNode(true);
        // limpiar valores
        clone.querySelectorAll('input').forEach(i=> i.value = i.type==='number' ? (i.previousElementSibling && i.previousElementSibling.innerText.includes('Cantidad') ? 1 : 0) : '');
        productosContainer.appendChild(clone);
    });
    // eliminar producto (delegación)
    productosContainer.addEventListener('click', (e)=>{
        if (e.target.closest('.btn-eliminar-producto')){
            const items = productosContainer.querySelectorAll('.producto-item');
            if (items.length > 1) e.target.closest('.producto-item').remove();
        }
    });

    btnAgregarParticion.addEventListener('click', ()=>{
        const clone = cardParticion2.cloneNode(true);
        clone.id = '';
        clone.classList.remove('d-none');
        document.getElementById('particionesContainer').appendChild(clone);
    });

    // eliminar particion (delegación en el documento)
    document.addEventListener('click', (e)=>{
        if (e.target.closest('.btn-eliminar-particion')){
            const card = e.target.closest('.particion-item');
            if (card) card.remove();
        }
    });

    // Eliminado ocultamiento forzado de botones globales
</script>
@endsection

