<?php
  include("../config/koneksi.php");

  if (isset($_POST['submit'])) {


    $code = $_FILES["file"]["error"]; //mengambil nilai error dari proses upload
    if ($code == 0) { // jika kode bernilai 0 (nol)
      $pesan = ""; //kosongkan pesan;
      $folder = "../uploads/"; //deklarasikan nama folder
      $tmp = $_FILES["file"]["tmp_name"]; //menyimpan nama file
      $nama_file = $_FILES["file"]["name"]; //menyeting nama file
      $path = "$folder/$nama_file"; //memindah file kedalam folder repository
      $upload_check = false; //mengecek proses upload


      $tipe_file = array('image/jpeg','image/gif','image/png'); //menyimpan array untuk ekstensi file gambar
      if (!in_array($_FILES["file"]["type"], $tipe_file)) { //pengecekan jika tipe ekstensi file yang diupload tidak sesuai
        $pesan = "Cek kembali ekstensi file anda (*.jpeg,*.jpg,*.png,*.gif) <br/>"; //tampilkan pesan jika ekstensi tidak sesuai
        $upload_check = true;
      }
      

      if(file_exists($path)){ //jika file sudah ada
        $pesan = "File dengan Nama yang sama telah tersimpan, try again<br/>"; //tampilkan pesan ini
        $upload_check = true; //pengecekan upload menjadi benar
      }

      $ukuran = $_FILES["file"]["size"]; //mengecek size dari file yang diupload
        if ($ukuran > 700000) { // jika ukuran file melebihi 800KB maka,
          $pesan .= "Ukuran Melebihi 700 KB <br/>"; //akan muncul pesan berikut
          $upload_check = true; //pengecekan upload bernilai benar
        }

       if (!$upload_check AND move_uploaded_file($tmp, $path)) { //jika pengecekan bernilai tidak true
        $pesan .= "form berhasil diproses"; 
        $gambar = "$folder/".basename( $_FILES["file"]["name"]);
        $id = $_POST['id'];
        $title = $_POST['todo_title'];
        $description = $_POST['description'];
      }


    $id = $_POST['id'];
  	$catatan = $_POST['catatan'];
    // echo "$id,$title";

    $query = "INSERT INTO diary VALUES ('$id','.$path.','$catatan', now() )";
    $insertdiary = mysqli_query($mysqli, $query);
    if(!$insertdiary){
       echo mysqli_error($mysqli);
    }
    // mysqli_close($mysqli);
  
  }
}
 ?>

 <html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>My Diary's Website</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="../css/agency.min.css" rel="stylesheet">
  <link href="../css/agency.css" rel="stylesheet">
</head>

<body id="page-top">

<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Diaries</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../landing.php#kegiatanmu">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#mydiary">My Diary</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logout.php">LOGOUT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">
          <?php
          echo "Welcome";
          ?>
        </div>
        <div class="intro-heading text-uppercase">Let's Make Your Activities</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#kegiatanmu">Make It</a>
      </div>
    </div>
  </header>


<!-- Services -->
  <section id="kegiatanmu">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Catatan Harian</h2>
        </div>
      </div>
      <div class="row text-left">

        <div class="col-md-3">
          <h4 class="service-heading">Input Kegiatan</h4>
          <p class="text-muted">
            Buatlah list kegiatan apa saja yang ingin anda lakukan.
            Karena dengan mencatat semuanya, akan mempermudah anda mengingat apa saja yang harus dilakukan.
          </p>

          <?php
            // if ($insertdiary) {
            //     echo "<div class='alert alert-success' role='alert'>
            //     Add Data success
            //     </div>";
            // }
          ?>

           

          <!-- form -->

            <form action="" method="post" enctype="multipart/form-data" onsubmit="myFunction()">

              <?php
                include("../config/koneksi.php");
                $query=mysqli_query($mysqli,"select max(id_diary) from diary");
                $data=mysqli_fetch_array($query);
                $kode=$data[0];
                $no=(int)($kode);
                $no++;
              ?>

              <div id="sukses" class='alert alert-success' role='alert'></div>

              <input type="hidden" name="id" value='<?php echo $no;?>' readonly=''><br><br>
              Catatan Anda <br/> 
              <textarea name="catatan"></textarea><br><br>

              <input type="file" name="file"><br/><br/>
              <input type="submit" name="submit" value="submit" onclick="myFunction()">
              <input type="reset" name="reset" value="reset">
            </form>

            <script>
              function myFunction() {
                  // alert("The form was submitted");
                text = "Add Data success!";
                document.getElementById("sukses").innerHTML = text;
              }
            </script>

        </div>

         <div class="col-md-1">
         </div>

        <div class="col-md-8">
           <h4 class="service-heading">List Catatan Harian Anda</h4>
          <?php
            $sql = "SELECT id_diary, catatan, date FROM diary";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th width=20>ID</th>
                <th width=170>Catatan</th>
                <th width=160>Date</th>
                <th width=50>Edit</th>
                <th width=50>Delete</th>
                </tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row["id_diary"]. "</td>
                    <td>" . $row["catatan"]. "</td>
                    <td> ". $row["date"] ."</td>
                    <td>
                      <p data-placement='top' data-toggle='tooltip' title='Edit'>
                       <a href=editDiary.php?id=$row[id_diary]>
                      ";
                      ?>
                        <button class='btn btn-default' type='button'>
                        <span class='fa fa-pencil-square-o' aria-hidden='true'></span>
                        </button>
                      <?php
                      echo "
                      </a>
                      </p>
                    </td>
                    <td>
                      <p data-placement='top' data-toggle='tooltip' title='Delete'>
                        <a href=deleteDiary.php?id=$row[id_diary] onClick=\"return confirm('yakin menghapus?')\">
                        <button class='btn btn-default' type='button'>
                        <span class='fa fa-eraser' aria-hidden='true'></span>
                        </button>
                        </a>
                      </p>
                    </td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

          ?>
        </div>

      </div>
    </div>
  </section>


 <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/agency.min.js"></script>

</body>
</html>
