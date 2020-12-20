 <div class="row">
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Penjualan</h4>
                                <div class="basic-form">
                                    <?php
                                    include "koneksi.php";
                                    $carikode = mysqli_query($koneksi, "select max(no_nota) from item_transaksi") or die (mysql_error());
                                     // menjadikannya array
                                        $datakode = mysqli_fetch_array($carikode);
                                      // jika $datakode
                                      if ($datakode) {
                                       $nilaikode = substr($datakode[0], 1);
                                       // menjadikan $nilaikode ( int )
                                       $kode = (int) $nilaikode;
                                       // setiap $kode di tambah 1
                                       $kode = $kode + 1;
                                       $kode_otomatis = "P".str_pad($kode, 6, "0", STR_PAD_LEFT);
                                      } else {
                                       $kode_otomatis = "P000001";
                                      }
                                      ?>
                                   
                                        <?php echo $kode_otomatis ?>

                                         <form method="post"  id="">

                                            <?php
                                                    $sqla=mysqli_query($koneksi,"select * from item_transaksi  order by no_nota desc limit 1");
                                                    while($sqlb = mysqli_fetch_array($sqla)){
                                           ?>             
                                                   
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No Nota</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="no_nota" id="no_nota" value="<?php echo  $sqlb['no_nota'] ; ?>" required="">
                                            </div>
                                        </div>
                                    <?php } ?>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" onkeyup="koden()" onmouseleave="koden2()" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" readonly="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga beli</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="harga_beli" id="harga_beli" readonly="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Stok Barang</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="qty" id="qty" readonly="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah Beli</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="jumlah" id="jumlah" onkeyup="beli()">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga Jual</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Jual"  readonly="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Bayar</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="bayar" id="bayar" onkeyup="mbayar()">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Diskon</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="diskon" id="diskon" readonly="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <input type="submit" class="btn mb-1 btn-flat btn-outline-primary" class="fa-shopping-cart" name="carisu" id="carisu" value="Keranjang"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                     if (isset($_POST['carisu']))
                        {
                        include "koneksi.php";
                        
                        $no_nota = $_POST['no_nota'];
                        $kode_barang = $_POST['kode_barang'];
                        $nama_barang = $_POST['nama_barang'];
                        $jumlah = $_POST['jumlah'];
                        $harga_jual = $_POST['harga_jual'];
                        $diskon = $_POST['diskon'];
                        $bayar = $_POST['bayar'];
                        $tanggal=date('d/m/y');

                        mysqli_query($koneksi, "insert into item_transaksi VALUES ('$no_nota', '$kode_barang', '$nama_barang', '$jumlah', '$harga_jual', '$diskon', '$bayar', '$tanggal')");
                                     
                        ?>

                    
                

                    
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Keranjang</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama Barang</th>
                                                <th>Qyt</th>
                                                <th>Harga</th>
                                                <th>Diskon</th>
                                                <th>Total Jual</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                      
                                        $datad = mysqli_query($koneksi,"select * from item_transaksi where no_nota='$no_nota'");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      ?>
                                            <tr>
                                                <td><?php echo $data['kode_barang'];?></td>
                                                <td><?php echo $data['nama_barang'];?></td>
                                                <td><?php echo $data['jumlah'];?></td>
                                                <td><?php echo $data['harga_jual'];?></td>
                                                <td><?php echo $data['diskon'];?></td>
                                                <td><?php echo $data['total'];?></td>
                                                <td>   
                                                  
                                        <button type="button" id="DeleteButton" class="btn mb-1 btn-flat btn-outline-danger"><i class="fa fa-trash"></i></button>
                                        
                                                    
                                                </td>
                                            </tr>
                                             <?php ;} ?>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>