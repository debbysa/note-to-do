<?php
  include("../config/koneksi.php");

if (isset($_POST['submit'])) {
  mysqli_query($mysqli,"UPDATE travel SET nama_tempat='$_POST[nama_tempat]',keterangan='$_POST[keterangan]'
    WHERE id_travel ='$_POST[id_travel]'");
    
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
          <h2 class="section-heading text-uppercase">Dokumentasi Perjalanan Tour Anda</h2>
        </div>
      </div>
      <div class="row text-left">

        <div class="col-md-4">
          <h4 class="service-heading">Edit List Tour Anda</h4>
          <p class="text-muted">
            Buatlah list kegiatan apa saja yang ingin anda lakukan.
            Karena dengan mencatat semuanya, akan mempermudah anda mengingat apa saja yang harus dilakukan.
          </p>

          <!-- form -->

          <form action="" method="post">

          <?php
              $query=mysqli_query($mysqli,"SELECT * from travel where id_travel='$_GET[id]'");
              $data=mysqli_fetch_array($query);
          ?>
           <hr>
           <?php
            echo "<input type='hidden' name='id_travel' id=auto value='$data[id_travel]' readonly=''>
            Nama Tempat<br>
            <textarea name='nama_tempat'>$data[nama_tempat]</textarea><br><br>
            Keterangan<br>
            <textarea name='keterangan'>$data[keterangan]</textarea><br><br>";
            ?>

            <input type="submit" name="submit" value="submit">
            <input type="reset" name="reset" value="reset">
          </form>

        </div>
         <div class="col-md-1">
         </div>
        <div class="col-md-7">
          <h4 class="service-heading">List Tour Anda</h4>
          <?php
            $sql = "SELECT id_travel, nama_tempat, keterangan, date FROM travel";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th width=20>ID</th>
                <th width=150>Nama Tempat</th>
                <th width=250>Keterangan</th>
                <th width=100>Date</th>
                </tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row["id_travel"]. "</td>
                    <td>" . $row["nama_tempat"]. "</td>
                    <td> " . $row["keterangan"]."</td>
                    <td> ". $row["date"] ."</td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

          ?>
          <button type="button" onclick="window.location.href='tambahTravel.php'">BACK</button> 
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
