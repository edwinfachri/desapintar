<div class="row letter-head-pdf">
  <img class="col-md-6" src="{{ asset('/images/uploads/'.$profil_desa->logo) }}"
      style="max-width: 100px; max-height: 100px; position: absolute;">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-4">
      </div>
      <h3 class="col-md-8 text-center">
        PEMERINTAH KABUPATEN {{ strtoupper($profil_desa->kota) }}
      </h3>
    </div>
    <div class="row">
      <div class="col-md-4">
      </div>
      <h4 class="col-md-8 text-center">
        KECAMATAN {{ strtoupper($profil_desa->kecamatan) }}
      </h4>
    </div>
    <div class="row">
      <div class="col-md-4">
      </div>
      <h4 class="col-md-8 text-center">
        DESA {{ strtoupper($profil_desa->desa) }}
      </h4>
    </div>
    <div class="row">
      <div class="col-md-4">
      </div>
      <p class="col-md-8 text-center">
        <?php   echo "Alamat ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->alamat)))
                   . ". Desa ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->desa)))
                   . ". Kecamatan ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->kecamatan)))
                   . ". Kabupaten ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->kota)))
                   . ". Kode Pos ".$profil_desa->kode_pos."."?>
      </p>
    </div>
  </div>
</div>
