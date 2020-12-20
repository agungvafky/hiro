<div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                
                <div class="header-right">
                    <ul class="clearfix">
                         <li class="icons dropdown d-none d-md-flex">
                      <?php echo  $_SESSION['nama']; ?>
                        </li>
                        
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span></span>
                               <img class="img-profile rounded-circle" src="../tempat/<?php echo  $_SESSION['foto']; ?>">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="editprofil.php?id=<?php echo $_SESSION['id']; ?>"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        
                                        <li><a href="logout.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>