<?php 

	require '../php/functions.php';

	$search = $_GET["search"];

	$query = "SELECT * FROM mobil WHERE
			foto LIKE '%$search%' OR
			merk LIKE '%$search%' OR
			model LIKE '%$search%' OR
			cc LIKE '%$search%' OR
			topspeed LIKE '%search%' OR
			tahunproduksi LIKE '%$search%' OR
			negarapembuat LIKE '%$search%' OR
			harga LIKE '%$search%' ";

	$mobil = query($query);

 ?>

<?php if (empty($mobil)) :?>
	<h1 align="center" class="data">Data Tidak Ditemukan!</h1>

<?php else : ?>

<?php foreach( $mobil as $cars ) : ?>

 <div class="row grey lighten-2">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-image">
          <img class="materialboxed responsive-img" src="assets/img/<?= $cars["foto"]; ?>">
        </div>
        <div class="card-content">
          <h2 class="card-title"><?= $cars["merk"]; ?></h2>
          <p class="card-title"><?= $cars["model"]; ?></p>
          <p class="card-title"><?= $cars["harga"]; ?></p>
        </div>
        <div class="card-action">
          <a href="php/profil.php?id=<?=$cars['id'];?>">Baca Spesifikasi Lengkap</a>
        </div>
      </div>
    </div>
  </div>

<?php endforeach; ?>
<?php endif ?>