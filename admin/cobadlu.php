<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php" ;?>

<head>
    <title>fdasfs</title>
</head>

<body>

   
                                <h4>Pembelian</h4>
                                
                                    <form>
                                        
                                            <label class="col-sm-2 col-form-label">Kode Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" onkeyup="koden()" >
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" readonly="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Stok Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="qty" id="qty" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="jumlah" id="jumlah" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" name="simpanpembelian" class="btn btn-dark">Simpan</button>
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
     <script src="jquery.min.js"></script>
    <script type="text/javascript">
    function koden(){
        var kode_barang = $("#kode_barang").val();
            $.ajax({
                url:'ajax.php',
                data:"kode_barang="+kode_barang,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#nama_barang').val(obj.nama_barang);
                
                
            });
             // var kd = document.getElementById("kode").value;
        // document.getElementById("no").value = kd;
       
    }
    </script>
   
    

</body>

</html>