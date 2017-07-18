<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pro = new Alternatif($db);
$stmt = $pro->readAll();
?>
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Data Alternatif</h4>
		</div>
            <?php
            if($_SESSION['username'] == "admin"){
            ?>
		<div class="col-md-6 text-right">
			<button onclick="location.href='alternatif-baru.php'" class="btn btn-primary">Tambah Data</button>
		</div>
            <?php } ?>
	</div>
	<br/>

	<table width="100%" class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>
                <th width="30px">No</th>
                <th>Nama Alternatif</th>
                <th>Hasil Alternatif</th>
                <?php
                if($_SESSION['username'] == "admin"){
                ?>
                <th width="100px">Aksi</th>
                <?php } ?>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Alternatif</th>
                <th>Hasil Alternatif</th>
                <?php
                if($_SESSION['username'] == "admin"){
                ?>
                <th>Aksi</th>
                <?php } ?>
            </tr>
        </tfoot>

        <tbody>
<?php
$no=1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama_alternatif'] ?></td>
                <td><?php echo $row['hasil_alternatif'] ?></td>
                <?php
                if($_SESSION['username'] == "admin"){
                ?>
                <td class="text-center">
					<a href="alternatif-ubah.php?id=<?php echo $row['id_alternatif'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a href="alternatif-hapus.php?id=<?php echo $row['id_alternatif'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			    </td>
                <?php } ?>
            </tr>
<?php
}
?>
        </tbody>

    </table>		
<?php
include_once 'footer.php';
?>