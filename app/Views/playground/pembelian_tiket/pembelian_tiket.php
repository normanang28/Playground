<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<div class="container mt-4">
					<div class="alert alert-info" role="alert" data-aos="fade-down" data-aos-delay="100">
		                <i class="fa-solid fa-triangle-exclamation"></i>
		                Data Pembelian Tiket yang diinpit tidak dapat melakukan pengubahan data, dan setiap "Pembelian Tiket" hanya dapat dilakukan dalam metode pembayaran <b>Cash</b>.
		            </div>
		            <style>
		            @keyframes blink {
		              0% { opacity: 1; }
		              50% { opacity: 0; }
		              100% { opacity: 1; }
		            }

		            .alert-info i.fa-triangle-exclamation {
		              animation: blink 1s infinite;
		            }
		            </style>
				    <div class="d-flex justify-content-between align-items-center mb-3">
				    <h1></h1>
				    <div>
					    <button type="button" class="btn btn-success mb-2 ml-auto" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
					        <i class="fa-solid fa-plus"></i> Tambah
					    </button>
					</div>


				        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
				            <div class="modal-dialog modal-xl">
				                <div class="modal-content">
				                    <div class="modal-header">
				                        <h4 class="modal-title">Apakah anda yakin ingin menambah data ini?</h4>
				                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				                    </div>
									<form id="imageForm" class="form-horizontal form-label-left" action="<?= base_url('Playground/tambah_pembelian_tiket')?>" method="post">
									    <div class="modal-body">
									        <div class="row">
									            <div class="mb-3 col-md-6">
									                <label class="form-label">Nama Permainan<span style="color: black;"> :</span></label>
									                <select name="id_permainan" class="form-control text-capitalize" id="id_permainan" required autocomplete="on" onchange="updateTotalHarga()">
									                    <option disabled selected>Pilih Nama Permainan</option>
									                    <?php foreach ($p as $permainan) {?>
									                        <option class="text-capitalize" value="<?php echo $permainan->id_permainan ?>" data-harga="<?php echo $permainan->harga_permainan ?>"><?php echo $permainan->nama_permainan ?> - Rp <?php echo $permainan->harga_permainan ?>,00</option>
									                    <?php } ?>
									                </select>
									            </div>
									            <div class="mb-3 col-md-6">
									                <label class="form-label">Nama Pemain<span style="color: black;"> :</span></label>
									                <input type="text" id="nama_pemain" name="nama_pemain" class="form-control text-capitalize" placeholder="Nama Pemain" autocomplete="on">
									            </div>
									            <div class="mb-3 col-md-6">
									                <label class="form-label">Durasi<span style="color: black;"> :</span></label>
									                <input type="text" id="durasi" name="durasi" class="form-control text-capitalize" placeholder="Durasi" oninput="Durasi(this); updateTotalHarga()" autocomplete="on">
									            </div>
									            <div class="mb-3 col-md-6">
									                <label class="form-label">Total Harga<span style="color: black;"> :</span></label>
									                <div class="input-group mb-3 input-basic">
									                    <span class="input-group-text">Rp</span>
									                    <input readonly type="text" id="total_harga" name="total_harga" class="form-control text-capitalize" placeholder="Total Harga" autocomplete="on">
									                    <span class="input-group-text">,00</span>
									                </div>
									            </div>
									        </div>
									        <div class="modal-footer">
									            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Kembali</button>
									            <button type="submit" class="btn btn-success">Iya, Tambah</button>
									        </div>
									    </div>
									</form>
									<script>
								    function Durasi(input) {
									    let value = input.value.replace(/\D/g, '');
									    value = value.substring(0, 2);
									    input.value = value !== '' ? value : '';
									    updateTotalHarga();
									}

								    function updateTotalHarga() {
								        var selectedOption = document.getElementById('id_permainan');
								        var selectedOptionIndex = selectedOption.selectedIndex;

								        var durationInput = document.getElementById('durasi');
								        var durationValue = durationInput.value.replace(/\D/g, '');

								        if (selectedOptionIndex !== -1 && durationValue !== '') {
								            var hargaPermainan = selectedOption.options[selectedOptionIndex].getAttribute('data-harga');

								            var totalHarga = parseInt(hargaPermainan) * parseInt(durationValue);

								            var totalHargaInput = document.getElementById('total_harga');
								            totalHargaInput.value = formatCurrency(totalHarga);
								        } else {
								            var totalHargaInput = document.getElementById('total_harga');
								            totalHargaInput.value = '';
								        }
								    }

								    function formatCurrency(amount) {
								        let formattedValue = new Intl.NumberFormat('id-ID').format(Number(amount));
								        return formattedValue + '.000';
								    }
									</script>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>

				<table id="example" class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm" style="min-width: 100%">
					<thead>
						<tr>
							<th style="text-align: center;">Nama Permainan</th>
							<th style="text-align: center;">Nama pemain</th>
							<th style="text-align: center;">Durasi</th>
							<th style="text-align: center;">Total Harga</th>
							<th style="text-align: center;">Tanggal Pembelian</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                    $no=1;
                    foreach ($data as $dataa){?>
						<tr>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_permainan ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_pemain ?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->durasi ?> Jam</td>
							<td style="text-align: center;" class="text-capitalize">Rp <?php echo $dataa->total_harga?>,00</td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->tanggal_playground?></td>
							<td>
							<div class="d-flex justify-content-center mb-1">
							    <a class="mx-2" href="<?= base_url('/Laporan/print_nota/'.$dataa->id_playground)?>">
							        <button type="button" class="btn btn-info">
							            <i class="fa-solid fa-print"></i>
							        </button>
							    </a>

							    <a onclick="openDeleteModal('<?= base_url('/Playground/hapus_pembelian_tiket/'.$dataa->id_playground )?>')" class="mx-2">
							        <button type="button" class="btn btn-danger">
							            <i class="fa-solid fa-trash"></i>
							        </button>
							    </a>
							</div>

                            </td>
							<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                            <div class="modal fade" id="delete_petugas" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
							    <div class="modal-dialog modal-dialog-centered" role="document">
							        <div class="modal-content">
							            <div class="modal-header">
							                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
							            </div>
							            <div class="modal-body text-center">
							                <i class="fa-solid fa-triangle-exclamation" style="font-size: 80px; color: #FFA500;"></i>
							                <h1></h1><br>
							                <h5>Apakah anda yakin ingin menghapus data ini?</h5>
							            </div>
							            <div class="modal-footer">
							                <button type="button" class="btn btn-secondary light" data-bs-dismiss="modal">Kembali</button>
							                <a id="deleteLinkPetugas" href="#">
							                    <button type="button" class="btn btn-danger">Iya, Hapus</button>
							                </a>
							            </div>
							        </div>
							    </div>
							</div>
							<script>
							    function openDeleteModal(deleteLink) {
							        document.getElementById('deleteLinkPetugas').href = deleteLink;
							        $('#delete_petugas').modal('show');
							    }
							</script>
						</tr>
                    <?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
