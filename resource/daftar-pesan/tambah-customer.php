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
	<h3 class="text-center m-3">Tambah Customer</h3>
		<div class="row justify-content-center">
			<div class="col-md-7 border p-3">
				<div class="form-group">
					<form action="" method="post">
						<div class="form-group">
							<label for="name">ID Customer</label>
							<input type="text" name="id_customer" id="id_customer" class="form-control" value="<?= $data->customerIdGenerated() ?>" readonly>
						</div>
						<div class="form-group">
							<label for="name">Nama Customer</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="Masukan nama makanan" required>
						</div>
						<div class="form-group">
							<label for="status" class="d-block">Status Customer</label>
							
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" name="status" id="member" value="MEMBER">
								<label class="form-check-label" for="member">Member</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" name="status" id="non" value="NON">
								<label class="form-check-label" for="non">Non Member</label>
							</div>
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