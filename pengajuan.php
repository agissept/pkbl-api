<?php
  include "config.php";
  include "kk.php";
  include "nama.php";
  include "perusahaan.php";
  include "alamat.php";
  include "time.php";


  $result = $con->query("SELECT * FROM user WHERE role = 'surveyor' ORDER BY RAND()");
  
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <div class="container mt-5">
    <div class="row">
      <div class="col-6">
        <form action="proses_pengajuan.php" method="post" id="formPengajuan">
          <button type="submit" class="btn btn-primary">Submit</button>

          <div class="form-group">
            <input type="text"class="form-control" name="nama" placeholder="Nama" value="<?php echo $nama?>">
          </div>
          <div class="form-group">
            <input type="text"class="form-control" name="nik" placeholder="Nomor Induk Kependudukan" value="<?php echo $nik?>">
          </div>
          <div class="form-group">
            <input type="text"class="form-control" name="instansi" placeholder="Instansi" value="<?php echo $perusahaan?>">
          </div>
          <div class="form-group">
            <input type="text"class="form-control" name="time" placeholder="Time" value="<?php echo $time?>">
          </div>
          <div class="form-group">
            <input type="text"class="form-control" name="jalan" placeholder="Jalan" value="<?php echo $jalan ?>">
          </div>
          <?php 
            $arrayDana = array(
              '10000000',
              '15000000',
              '10000000',
              '20000000',
              '30000000',
              '35000000',
              '40000000',
              '45000000',
              '50000000',
              '55000000',
              '60000000',
              '65000000',
              '70000000',
              '75000000',
              '80000000',
              '85000000',
              '90000000',
              '95000000',
              '100000000'
            );
              shuffle($arrayDana);

          ?>
          <div class="form-group">
            <input type="text"class="form-control" name="dana" placeholder="Jumlah Dana" value="<?php echo $arrayDana[0]?> ">
          </div>
          <?php 
            $arraySektor = array('Perikanan', 'Pertanian', 'Perdagangan', 'Industri', 'Peternakan', 'Perkebunan', 'Jasa', 'Lainnya');
            shuffle($arraySektor);
          ?>
          <div class="form-group">
            <label for="sektor">Sektor</label>
            <select class="form-control" name="sektor" id="sektor">
            <?php 
                for ($i=0; $i < count($arraySektor); $i++) { 
                  echo "<option value='$arraySektor[$i]'>$arraySektor[$i]</option>";
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="selectProvinsi">Provinsi</label>
            <select class="form-control" name="provinsi" id="selectProvinsi" onchange="getKota(this.value)">
            
            </select>
          </div>
          <div class="form-group">
            <label for="selectKota">Kota</label>
            <select class="form-control" name="kota" id="selectKota" onchange="getKecamatan(this.value)">
            
            </select>
          </div>
          <div class="form-group">
            <label for="selectKecamatan">Kecamatan</label>
            <select class="form-control" name="kecamatan" id="selectKecamatan" onchange="getKelurahan(this.value)">
            
            </select>
          </div>
          <div class="form-group">
            <label for="selectKelurahan">Kelurahan</label>
            <select class="form-control" name="kelurahan" id="selectKelurahan"">
            
            </select>
          </div>
  
          <div class="form-group">
            <label for="surveyor">Surveyor</label>
            <select class="form-control" name="surveyor" id="surveyor">
              <?php 
                while($surveyor = mysqli_fetch_array($result)){
                  ?>
                  <option value=<?php echo $surveyor['username'] ?>><?php echo $surveyor['username']?></option>"
                  <?php
                }
              ?>
            </select>
          </div>
          <?php 
            $arrayType = array('Kemitraan', 'Bina Lingkungan', 'CSR');
            shuffle($arrayType);
          ?>
          <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" name="type" id="type"">
            <?php 
                for ($i=0; $i < count($arrayType); $i++) { 
                  echo "<option value='$arrayType[$i]'>$arrayType[$i]</option>";
                }
                sleep(5);
              ?>
            </select>
          </div>
  
        </form>
      </div>
    </div>
  </div>

  <script>
    var provinsi
    var kota
    var kecamatan
    var token 


    $(document).ready( function () {
      getToken();
    });

    function getToken() { 
      var url = "https://x.rajaapi.com/poe";
      $.get(url, function(data, status){
        token = data.token;
        console.log('token', token)
        getProvinsi();
      });
     }


    function getProvinsi(){
      var $select = $('#selectProvinsi');
      $select.empty();
      var url = "https://x.rajaapi.com/MeP7c5ne"+ token +"/m/wilayah/provinsi";
      $.get(url, function(data, status){
        provinsi = shuffle(data.data)
        $.each(provinsi,function(key, value) {
          $select.append("<option value='" + value.name + "'>" + value.name + "</option>");
        })
        getKota(provinsi[0].name);
      });
    }


    function getKota(namaProvinsi){
      var $select = $('#selectKota');
      $select.empty();

      var idProvinsi = search(namaProvinsi, provinsi).id

      var url = "https://x.rajaapi.com/MeP7c5ne"+ token +"/m/wilayah/kabupaten?idpropinsi=" + idProvinsi;
      $.get(url, function(data, status){
        kota = shuffle(data.data)

        $.each(kota,function(key, value) {
          $select.append("<option value='" + value.name + "'>" + value.name + "</option>");
        })
        getKecamatan(kota[0].name);
      });
    }

    function getKecamatan(namaKota){
      var $select = $('#selectKecamatan');
      $select.empty();

      var idKota = search(namaKota, kota).id

      var url = "https://x.rajaapi.com/MeP7c5ne"+ token +"/m/wilayah/kecamatan?idkabupaten=" + idKota;
      $.get(url, function(data, status){
        kecamatan = shuffle(data.data);
        $.each(data.data,function(key, value) {
          $select.append("<option value='" + value.name + "'>" + value.name + "</option>");
        })
        getKelurahan(kecamatan[0].name);
      });
    }

    function getKelurahan(namaKecamatan){
      var $select = $('#selectKelurahan');
      $select.empty();

      var idKecamatan = search(namaKecamatan, kecamatan).id

      var url = "https://x.rajaapi.com/MeP7c5ne"+ token +"/m/wilayah/kelurahan?idkecamatan=" + idKecamatan;
      $.get(url, function(data, status){
        $.each(data.data,function(key, value) {
          $select.append("<option value='" + value.name + "'>" + value.name + "</option>");
        })
        document.getElementById('formPengajuan').submit();
      });
    }

    function search(nameKey, myArray){
        for (var i=0; i < myArray.length; i++) {
            if (myArray[i].name === nameKey) {
                return myArray[i];
            }
        }
      }

    function shuffle(a) {
      for (let i = a.length - 1; i > 0; i--) {
          const j = Math.floor(Math.random() * (i + 1));
          [a[i], a[j]] = [a[j], a[i]];
      }
    return a;
}

  



  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>