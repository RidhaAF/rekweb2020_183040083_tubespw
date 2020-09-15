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

<div class="row">
  <div class="col s1"></div>
  <div class="col s10 grey lighten-2">
<table class="highlight centered">
  <thead>
      <tr>
      <th>No</th>
      <th>Opsi</th>
      <th>Foto</th>
      <th>Merk</th>
      <th>Model</th>
      <th>CC</th>
      <th>Top Speed</th>
      <th>Tahun Produksi</th>
      <th>Negara Pembuat</th>
      <th>Harga</th>
    </tr>
  </thead>

<?php if (empty($mobil)) :?>
  <tr>
    <td colspan="10">
      <h1>Data Tidak Ditemukan!</h1>
    </td>
  </tr>
  <?php else : ?>

  <?php $i = 1; ?>
  <?php foreach( $mobil as $cars ) : ?>

  <tbody>
    <tr>
      <td class="no"><?= $i; ?></td>
      <td>
        <a href="../../php/ubah.php?id=<?= $cars["id"]; ?>">Ubah</a> |
        <a href="../../php/hapus.php?id=<?= $cars["id"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
      </td>
      <td><img src="../../assets/img/<?= $cars["foto"] ?>"></td>
      <td align="center"><?= $cars['merk']; ?></td>
      <td align="center"><?= $cars['model']; ?></td>
      <td align="center"><?= $cars['cc']; ?></td>
      <td align="center"><?= $cars['topspeed']; ?></td>
      <td align="center"><?= $cars['tahunproduksi']; ?></td>
      <td align="center"><?= $cars['negarapembuat']; ?></td>
      <td align="center" class="harga"><?= $cars['harga']; ?></td>
    </tr>
  </tbody>

    <?php $i++; ?>
    <?php endforeach; ?>
  <?php endif ?>
</table>
</div>
<div class="col s1"></div>
</div>