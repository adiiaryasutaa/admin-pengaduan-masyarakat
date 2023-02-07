<h1 class="h3 text-gray-800">Aduan</h1>
<p class="mb-4">Daftar aduan dari masyarakat</p>

<div class="row row-cols-2">
	<?php foreach ($aduan as $a): ?>
		<div class="col">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-danger"><?= $a->judul ?></h6>
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
							<!--<div class="dropdown-header">Dropdown Header:</div>-->
							<a class="dropdown-item" href="#">Lihat</a>
							<a class="dropdown-item" href="#">Hapus</a>
						</div>
					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<?= $a->isi ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>