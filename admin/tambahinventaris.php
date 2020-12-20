<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php"; ?>

<head>
<?php include('partial2/head.php'); ?>
<script src="jquery.min.js"></script>
</head>

<body>
    <?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['id']==""){
        header("location:../index.php?pesan=gagal");
    }
 
    ?>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="./images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            topbar start
        ***********************************-->
        <div class="header">    
            <?php include('partial2/topbar.php'); ?>
        </div>
        <!--**********************************
            topbar end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
           <?php include('partial2/sidebar.php'); ?>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid">
                <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tambah Barang</h4>
                                <div class="basic-form">
                                    <form method="post" action="" enctype="multipart/form-data">


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="foto" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga Jual</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="harga_jual"  placeholder="Harga Jual" required="">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" name="tanggal"  placeholder="Harga Jual" required="">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Barang Masuk</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" name="barang_masuk"  placeholder="Barang Masuk" required="">
                                            </div>
                                        </div>

                                        <hr>
                                        <b>Rincian Ukuran :</b><br><br>
                                        <button type=button id="btn-tambah-form" class="btn mb-1 btn-flat btn-outline-primary" ></i>Tambah Ukuran</button>
                                        <button type="button" id="btn-reset-form" class="btn mb-1 btn-flat btn-outline-dark"><i class="fa fa-back"></i>Reset Form</button>
                                        <br><br>
                                        Ukuran 1 : 

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang</label>
                                            <div class="col-sm-3">
                                                <input type="hidden" name="no[]" id="no" value="1" readonly="">
                                                <input type="hidden" name="nok" id="nok" value="1" readonly="">
                                                <input type="text" class="form-control" name="kode[]" id="kode"  placeholder="kode barang" required="">
                                            </div>
                                        </div>


                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Ukuran</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="ukuran[]"  placeholder="Ukuran" required="">
                                            </div>
                                        </div>

                                       
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" name="jumlah[]" id="jumlah"   placeholder="Jumlah" required="">
                                            </div>
                                        </div>
                                        <br><br>

                                        <div id="insert-form"></div>

                                                               

                                    
                                            


                                        <div class="form-group row">
                                            <div class="col-sm-10">    
                                                    <button type="submit" name="simpanbarang" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>
                                                    <a href="inventaris.php">
                                                        <button type="button" class="btn mb-1 btn-flat btn-outline-dark"><i class="fa fa-back"></i>kembali</button>
                                                    </a>                                                
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
             <?php include('partial2/footer.php'); ?>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <script>
    $(document).ready(function(){ // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
            var nok = parseInt($("#nok").val()); // Ambil jumlah data form pada textbox jumlah-form
             var kode = $("#kode").val();
            var nextform = nok + 1; // Tambah 1 untuk jumlah form nya
            
            // Kita akan menambahkan form dengan menggunakan append
            // pada sebuah tag div yg kita beri id insert-form
            $("#insert-form").append("Ukuran"  + nextform + " : " +

            "<div class='form-group row'>"+
                "<label class='col-sm-2 col-form-label'>Kode Barang</label>"+
                    "<div class='col-sm-3'>"+
                    "<input type='hidden' name='no[]' value="+ nextform +" readonly>"+
                    "<input type='text' class='form-control' name='kode[]' id='kode' value="+ kode +" required>"+
                "</div>"+
            "</div>"+


            "<div class='form-group row'>"+
                "<label class='col-sm-2 col-form-label'>Ukuran</label>"+
                    "<div class='col-sm-3'>"+
                        "<input type='text' class='form-control' name='ukuran[]'  placeholder='Ukuran' required>"+
                    "</div>"+
            "</div>"+
                           
           "<div class='form-group row'>"+
                "<label class='col-sm-2 col-form-label'>Jumlah</label>"+
                    "<div class='col-sm-3'>"+
                    "<input type='number' class='form-control' name='jumlah[]' id='jumlah'   placeholder='Jumlah' required>"+
                "</div>"+
            "</div>"+
            "<br><br>");
            
            $("#nok").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });
        
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function(){
            $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
            $("#no").val("1"); // Ubah kembali value jumlah form menjadi 1
        });
    });
    </script>
    <?php include('partial2/modal.php'); ?>
    <?php
    if(isset($_POST['simpanbarang']))
    {
        $kode_barang=$_POST['kode_barang'];
        $nama_barang=$_POST['nama_barang'];
        $harga_jual=$_POST['harga_jual'];
        $tanggal=$_POST['tanggal'];
        $barang_masuk=$_POST['barang_masuk'];
        $filename=$_FILES['foto']['name'];

        //seleksi data dari data base
        $cekdata = mysqli_query($koneksi,"select * from barang where kode_barang='$kode_barang'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($cekdata);
        // cek apakah username dan password di temukan pada database
        if($cek > 0){
        echo"<script>alert('data sudah ada!');</script>";
        }
        else
        {
        mysqli_query($koneksi,"insert into barang values
            ('$kode_barang',
            '$nama_barang',
            '$harga_jual',
            '$tanggal',
            '$barang_masuk',
            '$filename',
            '$barang_masuk',
            '')");
          
         move_uploaded_file($_FILES['foto']['tmp_name'], "../tempat/".$_FILES['foto']['name']);

                 // Ambil data yang dikirim dari form
        $no = $_POST['no']; // Ambil data nis dan masukkan ke variabel nis
        $kode = $_POST['kode']; // Ambil data nama dan masukkan ke variabel nama
        $ukuran = $_POST['ukuran']; // Ambil data telp dan masukkan ke variabel telp
        $jumlah = $_POST['jumlah']; // Ambil data alamat dan masukkan ke variabel alamat

        // Proses simpan ke Database
        $query = "INSERT INTO ukuran VALUES";

        $index = 0; // Set index array awal dengan 0
        foreach($no as $nos){ // Kita buat perulangan berdasarkan nis sampai data terakhir
            $query .= "('".$nos."','".$kode[$index]."','".$ukuran[$index]."','".$jumlah[$index]."'),";
            $index++;
        }

        // Kita hilangkan tanda koma di akhir query
        // sehingga kalau di echo $query nya akan sepert ini : (contoh ada 2 data siswa)
        // INSERT INTO siswa VALUES('1011001','Rizaldi','Laki-laki','089288277372','Bandung'),('1011002','Siska','Perempuan','085266255121','Jakarta');
        $query = substr($query, 0, strlen($query) - 1).";";

        // Eksekusi $query
        mysqli_query($koneksi, $query);

        echo"<script>alert('data berhasil disimpan');
        </script>";
        
        }
    }
        ?>

    <!--**********************************
        Scripts
    ***********************************-->
   <script src="../plugins/common/common.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/gleek.js"></script>
    <script src="../js/styleSwitcher.js"></script>

    <script src="../plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

</body>

</html>