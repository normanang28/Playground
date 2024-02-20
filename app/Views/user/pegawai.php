<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<div class="container mt-4">
				    <div class="d-flex justify-content-between align-items-center mb-3">
				        <h1></h1>
				        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
				            <i class="fa-solid fa-plus"></i> Tambah
				        </button>

				        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
				            <div class="modal-dialog modal-xl">
				                <div class="modal-content">
				                    <div class="modal-header">
				                        <h4 class="modal-title">Apakah anda yakin ingin menambah data pegawai?</h4>
				                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				                    </div>
				                    <form id="imageForm" class="form-horizontal form-label-left" action="<?= base_url('Data_Pegawai/tambah')?>" method="post">
				                        <div class="modal-body">
				                            <div class="row">
				                                <div class="mb-3 col-md-6">
				                                    <label class="form-label">Nama Pegawai<span style="color: black;"> :</span></label>
				                                    <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control text-capitalize" placeholder="Nama Pegawai" autocomplete="on">
				                                </div>
				                                <div class="mb-3 col-md-6">
				                                    <label class="form-label">No Telepon<span style="color: black;"> :</span></label>
				                                    <input type="text" id="no_telp" name="no_telp" class="form-control text-capitalize" placeholder="No Telepon" oninput="validateNumberInput(this)" autocomplete="on">
				                                </div>
				                                <script>
						                        function validateNumberInput(input) {
						                            input.value = input.value.replace(/\D/g, '');

						                            if (input.value.length > 14) {
						                                input.value = input.value.slice(0, 14);
						                            }
						                        }
							                    </script>
				                                <div class="mb-3 col-md-6">
				                                    <label class="form-label">Username<span style="color: black;"> :</span></label>
				                                    <input type="text" id="username" name="username" class="form-control text-capitalize" placeholder="Username" autocomplete="on">
				                                </div>
				                                <div class="mb-3 col-md-6">
				                                    <label class="form-label">Level<span style="color: black;"> :</span></label>
				                                    <select id="level" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="level" required="required">
					                                  <option>Pilih Level</option>
					                                  <option value="1">Super Admin</option>
					                                  <option value="2">Petugas Playground</option>
					                              	</select>
				                                </div>
			                        	</div>
				                        <div class="modal-footer">
				                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Kembali</button>
				                            <button type="submit" class="btn btn-success">Iya, Tambah</button>
				                        </div>
				                    </form>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>

				<table id="example" class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm" style="min-width: 100%">
					<thead>
						<tr>
							<th style="text-align: center;">Username</th>
							<th style="text-align: center;">Nama Petugas</th>
							<th style="text-align: center;">No Telepon</th>
							<th style="text-align: center;">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                    $no=1;
                    foreach ($data as $dataa){?>
						<tr>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->username?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_pegawai?></td>
							<td style="text-align: center;" class="text-capitalize"><?php echo $dataa->no_telp ?></td>
							<td class="d-flex justify-content-between">

                                <a href="<?= base_url('/Data_Pegawai/edit/'.$dataa->id_pegawai_user)?>"><button class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></button></a>
                                <button class="btn btn-danger" onclick="deletepetugas(<?= $dataa->id_pegawai_user ?>)"data-toggle="tooltip" data-placement="bottom"><i class="fa-solid fa-trash"></i></button>
                                
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
								<script>
								function deletepetugas(userId) {
						            Swal.fire({
						                title: 'Konfirmasi Hapus Data',
						                text: 'Apakah anda yakin ingin menghapus data ini?',
						                icon: 'warning',
						                showCancelButton: true,
						                confirmButtonColor: '#3085d6',
						                cancelButtonColor: '#d33',
						                confirmButtonText: 'Ya, Hapus',
						                cancelButtonText: 'Kembali'
						            }).then((result) => {
						                if (result.isConfirmed) {
						                    window.location.href = `/Data_Pegawai/hapus/${userId}`;
						                }
						            });
						        }
								</script>
                            </td>
						</tr>
                    <?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>