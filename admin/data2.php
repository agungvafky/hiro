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
                                      include "koneksi.php";
                                        $no_nota=$_GET['no_nota'];
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
                                                    
                                                        <button type="button" id="DeleteButton" value="<?php echo $data['kode_barang']; ?>" class="btn mb-1 btn-flat btn-outline-danger"></i>Hapus</button>
                                                    
                                                </td>
                                            </tr>
                                             <?php } ?>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>