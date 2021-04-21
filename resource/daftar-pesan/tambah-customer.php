<?php
ini_set('display_errors', 1);

include(__DIR__ . '/../../app/data/daftarPesan.php');
$title = "Tambah Customer";
$data = new daftarPesan();

include('../layouts/header.php');
// print_r($data->pagination(4, "SELECT * FROM makanan"));

?>

<div class="row justify-content-center mt-3">
	<div class="col-md-8">
	<h3 class="text-center m-3">Tambah Customer & Transaksi</h3>
		<div class="row justify-content-center">
			<div class="col-md-7 border p-3">
				<div class="form-group">
					<form action="" method="post">
						<div class="form-group">
							<small for="name">ID Customer</small>
							<input type="text" name="id_customer" id="id_customer" class="form-control" value="<?= $data->customerIdGenerated() ?>" readonly>
						</div>
						<div class="form-group">
							<small for="name">Nama Customer</small>
							<input type="text" name="name" id="name" class="form-control" placeholder="Masukan nama makanan" required>
						</div>
						<div class="form-group">
							<small for="status" class="d-block">Status Customer</small>
							
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" name="status" id="member" value="MEMBER">
								<label class="form-check-label" for="member">Member</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" name="status" id="non" value="NON">
								<label class="form-check-label" for="non">Non Member</label>
							</div>
						</div>
						<div class="form-group">
							<small for="pesan_makanan">Pilih Makanan yang Dipesan</small>

							<select name="pesan_makanan[]" id="pesan-makanan" class="form-control form-select" multiple="multiple">
								<?php
									foreach ($data->getMakanan() as $makanan) {
								?>
								
								<option value="<?=$makanan['id']?>"><?= $makanan['nama'] . "&nbsp;&nbsp;" . '[ Rp. ' . number_format($makanan['harga'], 0) . ' ]' ?></option>
								
								<?php } ?>
							</select>
						</div>
						<div class="form-group float-right">
							<a href="../../?menu=daftar-pesan" class="btn btn-sm btn-warning">Kembali</a>
							<input type="submit" name="simpan" class="btn btn-sm btn-success " value="Simpan">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	
	include_once('../layouts/footer.php');
?>

<script>
	$(document).ready(function() {
		$('#pesan-makanan').select2({
			placeholder: 'Masukan makanan yang dibeli',
		});
	})

</script>

<?php
	if (isset($_POST['simpan'])) {
		// echo '<pre>';
		// 	print_r($_POST);
		// echo '</pre>';

		// $data->addCustomerTransaction($_POST);
		if ($data->addCustomerTransaction($_POST)) {
			echo "
					<script>
						alert('Tambah Sukses');
						// window.location.href = window.location.href;
					</script>
				";
		}
	}
?>

