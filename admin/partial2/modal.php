 <form method="post" action="">
 <div class="modal fade" id="tambahbarangmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Kode Barang</label>
                        <input type="text" class="form-control input-rounded" placeholder="Kode Barang" name="kode_barang" required="Isi dahulu">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Barang</label>
                        <input type="text" class="form-control input-rounded" placeholder="Nama Barang" name="nama_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Pemasok</label>
                        <select class="form-control form-control-sm input-rounded" name="kode_supplier" >
                            <option >--Pilih Disini--</option>
                            <?php
                            $datad = mysqli_query($koneksi,"select * from supplier");
                            while($data = mysqli_fetch_array($datad))
                            { ?>
                                <option value="<?php echo $data['kode_supplier'];?>"><?php echo $data['nama_supplier'];?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Harga Beli</label>
                        <input type="text" class="form-control input-rounded" placeholder="Harga Beli" name="harga_beli" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Persentase Keuntungan</label>
                        <input type="text" class="form-control input-rounded" placeholder="Persentase" name="persentase" required>
                    </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="simpanbarang" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<form method="post" action="">
     <div class="modal fade" id="tambahsupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pemasok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Kode Pemasok</label>
                            <input type="text" class="form-control input-rounded" placeholder="Kode Pemasok" name="kode_supplier" required="Isi dahulu">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Pemasok</label>
                            <input type="text" class="form-control input-rounded" placeholder="Nama Pemasok" name="nama_supplier" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Alamat Pemasok</label>
                            <input type="text" class="form-control input-rounded" placeholder="Alamat Pemasok" name="alamat_supplier" required>
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="simpan_supplier" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="">
     <div class="modal fade" id="tambahsupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pegguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Kode Pengguna</label>
                            <input type="text" class="form-control input-rounded" placeholder="Kode Pengguna" name="id" required="Isi dahulu">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Pemasok</label>
                            <input type="text" class="form-control input-rounded" placeholder="Nama Pengguna" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Password</label>
                            <input type="text" class="form-control input-rounded" placeholder="Password" name="passord" required>
                        </div>
                        <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Level</label>
                        <select class="form-control form-control-sm input-rounded" name="level" >
                            <option >--Pilih Disini--</option>
                            <option>admin</option>
                            <option>karyawan</option>
                          
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Password</label>
                            <input type="file" class="form-control input-rounded" placeholder="Password" name="foto" required>
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" name="simpan_supplier" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



