<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                	<style>
            		.hidden {
					    display: none;
					}
                	</style>
                    <table class="table items-table table-bordered table-striped verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Nama Pemain</th>
                                <th style="text-align: center;">Nama Permainan</th>
                                <th style="text-align: center;">Durasi</th>
                                <th style="text-align: center;" class="hidden">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $dataa) {
                                if ($dataa->status == "1") {
                            ?>
                                    <tr>
                                        <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_pemain ?></td>
                                        <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_permainan ?></td>
                                        <td style="text-align: center;" class="text-capitalize">
                                            <span id="countdown_<?php echo $no; ?>"></span>
                                            <script>
                                                var countDownDate_<?php echo $no; ?> = new Date("<?php echo date('M d, Y H:i:s', strtotime($dataa->jam_selesai)); ?>").getTime();

                                                var x_<?php echo $no; ?> = setInterval(function () {
                                                    var now_<?php echo $no; ?> = new Date().getTime();

                                                    var distance_<?php echo $no; ?> = countDownDate_<?php echo $no; ?> - now_<?php echo $no; ?>;

                                                    var hours_<?php echo $no; ?> = Math.floor(distance_<?php echo $no; ?> / (1000 * 60 * 60));
                                                    var minutes_<?php echo $no; ?> = Math.floor((distance_<?php echo $no; ?> % (1000 * 60 * 60)) / (1000 * 60));
                                                    var seconds_<?php echo $no; ?> = Math.floor((distance_<?php echo $no; ?> % (1000 * 60)) / 1000);

                                                    var countdownElement_<?php echo $no; ?> = document.getElementById("countdown_<?php echo $no; ?>");

                                                    if (distance_<?php echo $no; ?> > 0) {
                                                        countdownElement_<?php echo $no; ?>.innerHTML = hours_<?php echo $no; ?> + "h " + minutes_<?php echo $no; ?> + "m " + seconds_<?php echo $no; ?> + "s ";
                                                    } else {
                                                        clearInterval(x_<?php echo $no; ?>);
                                                        countdownElement_<?php echo $no; ?>.innerHTML = "Selesai";

                                                        var editStatusButton_<?php echo $no; ?> = document.getElementById("edit_status_btn_<?php echo $no; ?>");
                                                        if (editStatusButton_<?php echo $no; ?>) {
                                                            editStatusButton_<?php echo $no; ?>.click();
                                                        }
                                                    }
                                                }, 1000);
                                            </script>
                                        </td>
                                        <td class="hidden">
                                            <div class="text-center mb-1">
                                                <form method="post" action="<?= base_url('/Dashboard/edit_status/'.$dataa->id_playground )?>">
                                                    <button type="submit" class="btn btn-warning" name="edit_status_btn" id="edit_status_btn_<?php echo $no; ?>">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                    $no++; 
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
