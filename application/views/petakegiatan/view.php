<?php $this->load->view("_partial/header"); ?>
<script type="text/javascript">
function initialize() {
	var mapOptions = {
		center: {lat: 3.785097, lng: 98.212220},
		zoom: 9.7
		};
		map = new google.maps.Map(document.getElementById('map'),  mapOptions);
		

				peta_proyek = new google.maps.Data();
				peta_proyek.loadGeoJson('peta_proyek.php');
				peta_proyek.setMap(map);
					
				info_peta_proyek = new google.maps.InfoWindow();
				peta_proyek.addListener('click', function(e) {
					info_peta_proyek.close();
						var nama = e.feature.getProperty('nama');
						var program = e.feature.getProperty('program');
						var keterangan = e.feature.getProperty('keterangan');
						var tahun = e.feature.getProperty('tahun');
						var no = e.feature.getProperty('no');
						info_peta_proyek.setContent("<b>Nama Proyek</b> : "+nama+"<br><b>Program</b> : "+program+"<br><b>Keterangan</b> : "+keterangan+"<br><b>Tahun</b> : "+tahun+"<br><a href=foto_proyek.php?id="+no+">CLICK For Detail</a>");
						info_peta_proyek.setPosition(e.latLng);
						info_peta_proyek.setOptions({pixelOffset: new
						google.maps.Size(0,-35)});
						info_peta_proyek.open(map);
					});
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-4">
        <div class="d-flex align-items-left flex-column flex-sm-row">
            <h3 class="text-white pb-3 fw-bold">Selamat Datang <?= $users['username']; ?></h3>
        </div>
    </div>
</div>


<div class="page-inner mt--5">
    <div class="card full-height">
        <div class="card-body">
            <div class="row">
                
                <div class="col-lg-12">
                    <div id="map" style="width:100%; height: 500px;"></div>
                </div>
                

            </div>
        </div>
    </div>
</div>
<?php $this->load->view('_partial/footer'); ?>
<?php $this->load->view('_partial/tag_close'); ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyArO22tHwyNtWsMtBPB2t1_KB1gRcRaM3Q&callback=initMap"></script>
