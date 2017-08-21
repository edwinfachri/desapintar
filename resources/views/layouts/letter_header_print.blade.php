<div class="row" style="border-bottom: 1px solid black;">
  <div class="col-xs-2 col-md-2  col-sm-2" style="left: 0%;">
    <img src="{{ url('/images/uploads/'.$profil_desa->logo) }}" >
  </div>
  <div class="col-xs-8 col-md-8 col-sm-8 letter-head-print" style="font-family: serif; left: 7%;">
    <div class="row">
      <h3 class="text-center" style="line-height: 0.3;">
        PEMERINTAH KABUPATEN {{ strtoupper($profil_desa->provinsi) }}
      </h3>
    </div>
    <div class="row">
      <div class="col-xs-4 col-md-4 col-sm-4" style="line-height: 0.3;">
      </div>
      <h4 class="text-center" style="line-height: 0.3;">
        KECAMATAN {{ strtoupper($profil_desa->kecamatan) }}
      </h4>
    </div>
    <div class="row">
      <div class="col-xs-4 col-md-4 col-sm-4" style="line-height: 0.3;">
      </div>
      <h4 class="text-center" style="line-height: 0.3;">
        DESA {{ strtoupper($profil_desa->desa) }}
      </h4>
    </div>
    <div class="row">
      <div class="col-xs-4 col-md-4 col-sm-4" style="line-height: 0.5;">
      </div>
      <h5 class="text-center">
        <?php   echo "Alamat ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->alamat)))
                   . ". Desa ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->desa)))
                   . ". Kecamatan ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->kecamatan)))
                   . ". Kabupaten ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->provinsi)))
                   . ". Kode Pos ".$profil_desa->kode_pos."."?>
      </h5>
    </div>
  </div>
</div>
