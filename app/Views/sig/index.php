<?php echo view('layout/v_header'); ?>
<div class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 text-lg-end text-center">
                <h2 class="text-secondary fw-bold text-uppercase">Peta</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card rounded shadow-lg">
                    <div id="map" class="rounded" style="height: 580px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet Library -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([-3.614174035043423, 114.70011802840635], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        subdomains: ['a', 'b', 'c']
    }).addTo(map);

   
    

    <?php foreach ($kelola as $value) : ?>
        var marker = L.marker([<?= esc($value['latitude']); ?>, <?= esc($value['longitude']); ?>]).addTo(map); // manggil marker
        marker.bindPopup("<b><?= esc($value['nama']); ?></b>").openPopup(); // manggil popup
    <?php endforeach; ?>

    // var geojsonData = {
    //     "type": "FeatureCollection",
    //     "features": [{
    //         "type": "Feature",
    //         "properties": {},
    //         "geometry": {
    //             "coordinates": [
    //                 [
    //                     <?php foreach ($polygon as $value) : ?>[<?= esc($value['latitude']); ?>, <?= esc($value['longitude']); ?>],
    //                     <?php endforeach; ?>
    //                 ]
    //             ],
    //             "type": "Polygon"
    //         }
    //     }]
    // };


    fetch('geojson/langgar.geojson')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data, {
                    style: function(feature) {
                        return {
                            color: 'Red', // Warna garis tepi
                            fillColor: 'cyan', // Warna isi
                            fillOpacity: 0.5 // Opasitas isi
                        };
                    }
                }).addTo(map);
            })
            .catch(error => console.log(error));

   
    
</script>
<?php echo view('layout/v_footer'); ?>