<?php
   ini_set('display_errors', 1);

   include (__DIR__ . '/../../app/data/daftarPesan.php');
	$title = "Tambah Makanan";
	$data = new daftarPesan();

	// print_r($data->getMakanan());
   include('../layouts/header.php');
?>

   <div class="row justify-content-center mt-3">
      <div class="col-md-8">
			<div class="row justify-content-center">
				<div class="col-md-4 border p-3">
					<div class="form-group">
						<form action="" method="post" >
							<div class="form-group">
								<label for="name">Nama Makanan</label>
								<input type="text" name="name" id="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="price">Harga</label>

								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">Rp. </span>
									</div>
									
									<input type="text" name="price" id="price" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<input type="submit" name="simpan" class="btn btn-success float-right" value="Simpan">
							</div>
						</form>
					</div>
				</div>

				<div class="col-md-5">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<td width="10%">#</td>
								<td width="50%">Nama</td>
								<td width="40%">Harga</td>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach ($data->getMakanan() as $makanan ) {									
							?>
							
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $makanan['nama'] ?></td>
								<td>Rp. <?= number_format($makanan['harga'], 0) ?></td>
							</tr>
							
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
      </div>
   </div>

<?php
   include_once('../layouts/footer.php');


	if (isset($_POST['simpan'])) {
		if ($data->addMakanan($_POST)) {
			echo "
				<script>
					alert('Tambah makanan sukses');
					window.location.href = window.location.href;
				</script>
			";
		
		} else {
			echo "
				<script>
					alert('Tambah makanan gagal');
				</script>;
			";
		}
	}
?>