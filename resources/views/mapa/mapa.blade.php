@extends('inicio/app')

@section('titulo', 'Mapa - Mi Ubicación')

@section('contenido')
    <style>
        .leaflet-pane { z-index: 1 !important; }
        #map-container { 
            margin-top: 80px; 
            padding: 20px;
            min-height: calc(100vh - 80px);
        }
        
        #map { 
            width: 100%; 
            height: 70vh;
            border-radius: 10px;
            border: 2px solid #CDB4DB;
        }
        
        .controls {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .btn-location {
            background: #FFAFCC;
            color: #1A202C;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }
        
        .btn-location:hover {
            background: #CDB4DB;
            transform: translateY(-2px);
        }
        
        .status {
            text-align: center;
            margin: 10px 0;
            padding: 10px;
            border-radius: 8px;
            background: #f0f0f0;
        }
    </style>

    <div id="map-container">
        <div class="controls">
            <button onclick="getMyLocation()" class="btn-location">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Mi Ubicación Actual
            </button>
            
            
        </div>
        
        <div id="status" class="status">
            Haz clic en "Mi Ubicación Actual" para ver dónde estás
        </div>
        
        <div id="map"></div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <script>
        let map;
        let userMarker;
        const utjCoords = [20.678042711536982, -103.34192701873553];
        
        
        function initMap() {
            map = L.map('map').setView(utjCoords, 13);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);
            
            // Marcador 
            // L.marker(utjCoords)
            //     .addTo(map)
            //     .bindPopup('<b>UTJ | CIUDAD CREATIVA DIGITAL</b>')
            //     .openPopup();
        }
        
        
        function getMyLocation() {
            const status = document.getElementById('status');
            status.innerHTML = 'Buscando tu ubicación...';
            status.style.background = '#FFF3CD';
            status.style.color = '#856404';
            
            if (!navigator.geolocation) {
                status.innerHTML = 'Tu navegador no soporta geolocalización';
                return;
            }
            
            navigator.geolocation.getCurrentPosition(
                
                function(position) {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    
                    
                    map.setView([lat, lng], 15);
                    
                    
                    if (userMarker) {
                        map.removeLayer(userMarker);
                    }
                    
                    
                    userMarker = L.marker([lat, lng], {
                        icon: L.divIcon({
                            className: 'current-location-icon',
                            html: `<div style="
                                width: 30px;
                                height: 30px;
                                background: #FF0000;
                                border: 3px solid white;
                                border-radius: 50%;
                                box-shadow: 0 0 10px rgba(0,0,0,0.5);
                            "></div>`,
                            iconSize: [30, 30],
                            iconAnchor: [15, 15]
                        })
                    }).addTo(map);
                    
                    userMarker.bindPopup(`
                        
                        Latitud: ${lat.toFixed(6)}<br>
                        Longitud: ${lng.toFixed(6)}<br>
                        Precisión: ${position.coords.accuracy.toFixed(1)} metros
                    `).openPopup();
                    
                    // circulo
                    L.circle([lat, lng], {
                        color: 'red',
                        fillColor: '#f03',
                        fillOpacity: 0.2,
                        radius: position.coords.accuracy
                    }).addTo(map);
                    
                    
                    status.innerHTML = `
                        Ubicación encontrada<br>
                        Coordenadas: ${lat.toFixed(4)}, ${lng.toFixed(4)}
                    `;
                    status.style.background = '#D4EDDA';
                    status.style.color = '#155724';
                },
                
                
                function(error) {
                    let message = 'Error: ';
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            message += 'Permiso denegado';
                            break;
                        case error.POSITION_UNAVAILABLE:
                            message += 'Ubicación no disponible.';
                            break;
                        case error.TIMEOUT:
                            message += 'Tiempo de espera agotado.';
                            break;
                        default:
                            message += 'Error desconocido.';
                    }
                    status.innerHTML = message;
                    status.style.background = '#F8D7DA';
                    status.style.color = '#721C24';
                },
                
                
                {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 0
                }
            );
        }
        
        
        
        
        document.addEventListener('DOMContentLoaded', function() {
            initMap();
            
            
            setTimeout(getMyLocation, 1000);
        });
    </script>
@endsection