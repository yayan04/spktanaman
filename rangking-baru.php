<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pgn1 = new Alternatif($db);
include_once 'includes/kriteria.inc.php';
$pgn2 = new Kriteria($db);
include_once 'includes/nilai.inc.php';
$pgn3 = new Nilai($db);
if($_POST){
	
	include_once 'includes/rangking.inc.php';
	$eks = new rangking($db);

	$eks->ia = $_POST['ia'];
	$eks->ik = $_POST['ik'];
	$eks->nn = $_POST['nn'];
	
	if($eks->insert()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil Tambah Data!</strong> Tambah lagi atau <a href="rangking.php">lihat semua data</a>.
</div>
<?php
	}
	
	else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Tambah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
	}
}
?>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-12">
		  	<div class="page-header">
                            <div class="text-center">
                                <h4>Tambah Rangking</h4>
                            </div>
			</div>
			
			    <div class="row">
                    <div style="margin-left: 25%;" class="col-xs-6 col-sm-6 col-md-6">
		  	
		  	<div class="panel panel-default"><div class="panel-body">
                                <div class="text-center" style="padding-bottom: 10px"><h5>Masukkan Nilai Parameter</h5></div>
		  		<form method="post">


				    	<?php
						$stmt3 = $pgn2->readAll();
						while ($row2 = $stmt3->fetch(PDO::FETCH_ASSOC)){
							extract($row2); ?>
							<!--echo "<option value='{$id_kriteria}'>{$nama_kriteria}</option>";-->
                                                        <div class="form-group">
                                                            <label for="ik"><h6>(<?php echo "{$id_kriteria}" ?>) <?php echo "{$nama_kriteria}" ?></h6></label>
                                                            <input type="text" class="form-control" id="nn" name="nn" placeholder="Nilai <?php echo "{$nama_kriteria}" ?>" required>
                                                        </div>
                                        <?php 
						}
					    ?>
				  
                                  
                                    <button style="width: 100%" type="submit" class="btn btn-primary">Proses</button>
                                    <!--<button style="width: 49.5%" type="button" onclick="location.href='rangking.php'" class="btn btn-success">Kembali</button>-->
		  	</form>
                        </div></div>
		  	
		  </div>
		</div>
	</div>
			  
		  </div>
		<?php
include_once 'footer.php';
?>