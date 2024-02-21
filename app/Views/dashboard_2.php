<div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table items-table table-bordered table-striped verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Nama Pemain</th>
                                <th style="text-align: center;">Durasi</th>
                                <th style="text-align: center;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
	                          $no=1;
	                         
	                          foreach ($data2 as $dataa){
	                            if ($dataa->status != "1") {
                            ?>
                            <tr>
                                <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_pemain?></td>
                                <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->durasi?> Jam</td>
                                <td style="text-align: center;" class="text-capitalize">
                                    <?php 
                                        if ($dataa->status == 2) {
                                            echo '<span style="color: #01796f;">Selesai</span>';
                                        } else {
                                            echo $dataa->status;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php }}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>