  <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Main Menu</li>
                     <li>
                        <a href="index.php" aria-expanded="false">
                             <i class="material-icons">home</i><span class="nav-text">dashboard</span>
                        </a>
                    </li>
                     <li>
                        <a href="kode.php" aria-expanded="false">
                             <i class="material-icons">help_outline</i><span class="nav-text">Kode</span>
                        </a>
                    </li>

                    <li>
                        <a href="kas.php" aria-expanded="false">
                             <i class="material-icons">attach_money</i><span class="nav-text">Kas</span>
                        </a>
                    </li>
                    
                     <li>
                        <a href="inventaris.php" aria-expanded="false">
                             <i class="material-icons">shop</i><span class="nav-text">Inventaris</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="penjualan.php" aria-expanded="false">
                             <i class="material-icons">shopping_cart</i><span class="nav-text">Penjualan</span>
                        </a>
                    </li>
                    <li>
                        <a href="barcode.php" aria-expanded="false">
                             <i class="material-icons">code</i><span class="nav-text">Barcode</span>
                        </a>
                    </li>
                    <?php if($_SESSION['akses']=='Admin'): ?>
                    <li>
                        <a href="pengaturan.php" aria-expanded="false">
                             <i class="material-icons">person</i><span class="nav-text">Pengaturan Pengguna</span>
                        </a>
                    </li>
                     <?php endif;?> 

                   
                </ul>
            </div>