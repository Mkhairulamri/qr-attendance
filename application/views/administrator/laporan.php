
	
    <div class="container">   
         <center><h2>Laporan</h2></center>
         <br>
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-success">Laporan</h6>
                                </div>

                                <div class="card-body">
                                
                               <!-- <form class="navbar-search" action="<?php echo base_url('administrator/simpanan/hasil')?>" action="GET">
                                <div class="input-group">
                                <input type="text" name="cari" class="form-control bg-light border-0 small" value="Search..." aria-label="Search" require_once>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit" value="Cari">
                                    <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                                </div>
                                </form>                                 -->
                                <br>
                                <center>
                                <?php echo anchor('administrator/simpanan/export_excel','<button class="btn btn-sm btn-warning mb-3"><i class="fas fa-print"></i> Print Semua Data</button>')?>
                                </center>

                                <form class="navbar-search" action="<?php echo base_url('administrator/simpanan/hasil_tahun')?>" action="GET">
                                <div class="input-group">
                                <input type="text" name="cari" class="form-control bg-light border-0 small" placeholder="Cetak Laporan Pertahun Atau Perbulan..." aria-label="Search" require_once>
                                <div class="input-group-append">
                                    <button class="btn btn-success  " type="submit" value="Cari">
                                    <i class="fas fa-print fa-sm"></i>
                                    </button>
                                </div>
                               
                                </div>
                                </form>

                                <?php echo $this->session->flashdata('pesan')?>
                                <br>

                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NO Simpanan</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jam</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Status</th>
                                    </tr>
                                     <?php
                                    $no=1;
                                    foreach ($simpan as $jrs) : ?>
                                    <tr>
                                    <td width="20px"><?php echo $no++ ?></td>
                                    <td><?php echo $jrs->no_simpanan ?></td>
                                    <td><?php echo $jrs->nama ?></td>
                                    <td>Rp. <?php echo $jrs->jumlah ?></td>
                                    <td><?php echo $jrs->tanggal ?></td>
                                    <td><?php echo $jrs->jam ?></td>
                                    <td><?php echo $jrs->jenis ?></td>
                                    <td>
                                    <?php if($jrs->status=='masuk'){ ?>
                                    <div class="btn btn-sm btn-success">Saldo Tersedia</div><hr>
                                    <?php } else{ ?>
                                    <div class="btn btn-sm btn-warning">Saldo Sudah Ditarik</div><hr>
                                    <?php } ?>
                                    </td>
                                    </tr> 
                                    <?php endforeach;?>
                                    </table>
                                    <?php         
                                        foreach($jumlah as $rows){ 
                                        ?>
                                        <p> Total Simpanan : Rp. <?php echo $rows->total; ?></p>
                                        <?php } ?>
                                    </div>


                               
                               
                </div>
                            <!-- Approach -->
        </div>
</div>        