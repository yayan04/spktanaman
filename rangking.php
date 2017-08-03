<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
include_once 'includes/rangking.inc.php';
$pro = new Rangking($db);
$stmt = $pro->readKhusus();
?>

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

	<br/>
	<div>
	
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#lihat" aria-controls="lihat" role="tab" data-toggle="tab">Form Masukan Data</a></li>
	    <li role="presentation"><a href="#rangking" aria-controls="rangking" role="tab" data-toggle="tab">Hasil Normalisasi</a></li>
	  </ul>
	
	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane active" id="lihat">
                <br><br>
	    	
             <div class="row">
                 <div style="margin-left: 25%" class="col-xs-6 col-sm-6 col-md-6">
		  	
		  	<div class="panel panel-default"><div class="panel-body">
                                <div class="text-center" style="padding-bottom: 10px"><h5>Masukkan Nilai Parameter</h5></div>
		  		<form method="post">

				    	<?php
						$stmt3 = $pgn2->readAll();
                                                $no = 1;
						while ($row2 = $stmt3->fetch(PDO::FETCH_ASSOC)){
							extract($row2); ?>
							<!--echo "<option value='{$id_kriteria}'>{$nama_kriteria}</option>";-->
                                                        <div class="form-group">
                                                            <label for="ik"><h6>(<?php echo $no ?>) <?php echo "{$nama_kriteria}" ?></h6></label>
                                                            <input type="text" class="form-control" id="nn" name="nn" placeholder="Nilai <?php echo "{$nama_kriteria}" ?>" required>
                                                        </div>
                                        <?php 
                                                $no++;
						}
					    ?>
				  
                                    <button style="width: 100%" type="submit" class="btn btn-success">Proses</button>
		  	</form>
                        </div></div>
		  	
		  </div>
		</div> 
		    		
	    </div>

	    <div role="tabpanel" class="tab-pane" id="rangking">
	    	<br/>
	    	<h4>Normalisasi R Perangkingan</h4>
			<table width="100%" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
		                <th colspan="<?php echo $stmt2->rowCount(); ?>" class="text-center">Kriteria</th>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Hasil</th>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Peringkat</th>
		            </tr>
		            <tr>
		            <?php
					while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
                                <th class="text-center"><?php echo $row2['nama_kriteria'] ?></th>
		            <?php
					}
					?>
		            </tr>
		        </thead>
		
		        <tbody>
		<?php
                $rank = 1;
		while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
		?>
		            <tr>
		                <th><?php echo $row1['nama_alternatif'] ?></th>
		                <?php
		                $a= $row1['id_alternatif'];
						$stmtr = $pro->readR($a);
						while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
							$b = $rowr['id_kriteria'];
							$tipe = $rowr['tipe_kriteria'];
							$bobot = $rowr['bobot_kriteria'];
						?>
                                <td class="text-center">
		                	<?php 
		                	if($tipe=='benefit'){
		                		$stmtmax = $pro->readMax($b);
								$maxnr = $stmtmax->fetch(PDO::FETCH_ASSOC);
								echo $nor = $rowr['nilai_rangking']/$maxnr['mnr1'];
							} else{
								$stmtmin = $pro->readMin($b);
								$minnr = $stmtmin->fetch(PDO::FETCH_ASSOC);
								echo $nor = $minnr['mnr2']/$rowr['nilai_rangking'];
							}
							$pro->ia = $a;
							$pro->ik = $b;
							$pro->nn2 = $nor;
							$pro->nn3 = $bobot*$nor;
							$pro->normalisasi();
		                	?>
		                </td>
		                <?php
		                }
						?>
                                                <td class="text-center">
							<?php 
							$stmthasil = $pro->readHasil($a);
							$hasil = $stmthasil->fetch(PDO::FETCH_ASSOC);
							echo $hasil['bbn'];
							$pro->ia = $a;
							$pro->has = $hasil['bbn'];
							$pro->hasil();
							?>
						</td>
		            </tr>
		<?php
		}
		?>
		        </tbody>
		
		    </table>
		    	
	    </div>
	  </div>
	
	</div>
<?php
include_once 'footer.php';
?>