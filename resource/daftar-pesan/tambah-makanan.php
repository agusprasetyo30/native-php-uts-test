<?php
ini_set('display_errors', 1);

include(__DIR__ . '/../../app/data/daftarPesan.php');
$title = "Tambah Makanan";
$data = new daftarPesan();

include('../layouts/header.php');
// print_r($data->pagination(4, "SELECT * FROM makanan"));
?>

<div class="row justify-content-center mt-3">
	<div class="col-md-8">
	<h3 class="text-center m-3">Tambah Makanan</h3>
		<div class="row justify-content-center">
			<div class="col-md-4 border p-3">
				<div class="form-group">
					<form action="" method="post">
						<div class="form-group">
							<label for="name">Nama Makanan</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="Masukan nama makanan" required>
						</div>
						<div class="form-group">
							<label for="price">Harga</label>

							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Rp. </span>
								</div>

								<input type="text" name="price" id="price" class="form-control" placeholder="0" required>
							</div>
						</div>
						<div class="form-group float-right">
							<a href="../../?menu=daftar-pesan" class="btn btn-sm btn-warning">Kembali</a>
							<input type="submit" name="simpan" class="btn btn-sm btn-success " value="Simpan">
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
						$data_pagination = $data->pagination(4, "SELECT * FROM makanan");

						while ($makanan = mysqli_fetch_array($data_pagination)) {
						?>

							<tr>
								<td><?= $data->getNomer() ?>. </td>
								<td><?= $makanan['nama'] ?></td>
								<td>Rp. <?= number_format($makanan['harga'], 0) ?></td>
							</tr>

						<?php } ?>
					</tbody>
				</table>

				<!-- Pagination -->
				<?= $data->paginationNumber('daftar-pesan') ?>
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