<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
$stmt1x = $pro1->readAll();
$stmt1y = $pro1->readAll();
$stmt1z = $pro1->readRank();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
$stmt2x = $pro2->readAll();
$stmt2y = $pro2->readAll();
$stmt2yx = $pro2->readAll();
$stmt2z = $pro2->readAll();
include_once 'includes/rangking.inc.php';
$pro = new Rangking($db);
$stmt = $pro->readKhusus();
$stmtx = $pro->readKhusus();
$stmty = $pro->readKhusus();
$stmtz = $pro->readAll();
?>
	<br/>
	<div>
	
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#rangking" aria-controls="rangking" role="tab" data-toggle="tab">Laporan Perangkingan</a></li>
	    <li role="presentation" style="cursor: pointer;"><a id="cetak" role="tab">Cetak Laporan 1 (PrintMe)</a></li>
	    <li role="presentation"><a href="laporan-cetak.php" role="tab">Cetak Laporan 2 (FPDF)</a></li>
	  </ul>
	
	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane active" id="rangking">
	    	<br/>
	    	<h4>Nilai Masukan</h4>
			<table width="100%" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th colspan="<?php echo $stmt2z->rowCount(); ?>" class="text-center">Kriteria</th>
		            </tr>
		            <tr>
		            <?php
					while ($row2z = $stmt2z->fetch(PDO::FETCH_ASSOC)){
					?>
		                <th class="text-center"><?php echo $row2z['nama_kriteria'] ?></th>
		            <?php
					}
					?>
		            </tr>
		        </thead>
		
		        <tbody>
		            <tr>
                                <td class="text-center">
                                    <?php $_POST['n1'] ?>
		                </td>
                                <td class="text-center">
                                    <?php $_POST['n2'] ?>
		                </td>
                                <td class="text-center">
                                    <?php $_POST['n3'] ?>
		                </td>
                                <td class="text-center">
                                    <?php $_POST['n4'] ?>
		                </td>
                                <td class="text-center">
                                    <?php $_POST['n5'] ?>
		                </td>
                                <td class="text-center">
                                    <?php $_POST['n6'] ?>
		                </td>
		            </tr>
		        </tbody>
		
		    </table>
	    	<h4>Nilai Alternatif Kriteria</h4>
			<table width="100%" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
		                <th colspan="<?php echo $stmt2x->rowCount(); ?>" class="text-center">Kriteria</th>
		            </tr>
		            <tr>
		            <?php
					while ($row2x = $stmt2x->fetch(PDO::FETCH_ASSOC)){
					?>
		                <th class="text-center"><?php echo $row2x['nama_kriteria'] ?><br/>(<?php echo $row2x['tipe_kriteria'] ?>)</th>
		            <?php
					}
					?>
		            </tr>
		        </thead>
		
		        <tbody>
		<?php
		while ($row1x = $stmt1x->fetch(PDO::FETCH_ASSOC)){
		?>
		            <tr>
		                <th><?php echo $row1x['nama_alternatif'] ?></th>
		                <?php
		                $ax= $row1x['id_alternatif'];
						$stmtrx = $pro->readR($ax);
						while ($rowrx = $stmtrx->fetch(PDO::FETCH_ASSOC)){
						?>
		                <td class="text-center">
		                	<?php 
		                	echo abs($rowrx['nilai_rangking']);
		                	?>
		                </td>
		                <?php
		                }
						?>
		            </tr>
		<?php
		}
		?>
		        </tbody>
		
		    </table>
	    	<h4>Normalisasi R</h4>
			<table width="100%" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
		                <th colspan="<?php echo $stmt2y->rowCount(); ?>" class="text-center">Kriteria</th>
		            </tr>
		            <tr>
		            <?php
					while ($row2y = $stmt2y->fetch(PDO::FETCH_ASSOC)){
					?>
		                <th class="text-center"><?php echo $row2y['nama_kriteria'] ?></th>
		            <?php
					}
					?>
		            </tr>
		        </thead>
		
		        <tbody>
		<?php
		while ($row1y = $stmt1y->fetch(PDO::FETCH_ASSOC)){
		?>
		            <tr>
		                <th><?php echo $row1y['nama_alternatif'] ?></th>
		                <?php
		                $ay= $row1y['id_alternatif'];
						$stmtry = $pro->readR($ay);
						while ($rowry = $stmtry->fetch(PDO::FETCH_ASSOC)){
						?>
		                <td class="text-center">
		                	<?php 
		                	echo $rowry['nilai_normalisasi'];
		                	?>
		                </td>
		                <?php
		                }
						?>
		            </tr>
		<?php
		}
                ?><tr><td colspan="7"></td></tr>
                <tr>
			<th><b>Bobot</b></th>
		            <?php
					while ($row2yx = $stmt2yx->fetch(PDO::FETCH_ASSOC)){
					?>
		                <th class="text-center"><b><?php echo $row2yx['bobot_kriteria'] ?></b></th>
		            <?php
					}
					?>
		            </tr>
		        </tbody>
		
		    </table>
		    <h4>Hasil Akhir</h4>
			<table width="100%" id="table-akhir" class="table table-striped table-bordered">
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
		while ($row1 = $stmt1z->fetch(PDO::FETCH_ASSOC)){
		?>
		            <tr>
		                <th><?php echo $row1['nama_alternatif'] ?></th>
		                <?php
		                $a= $row1['id_alternatif'];
						$stmtr = $pro->readR($a);
						while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
						?>
		                <td class="text-center">
		                	<?php 
		                	echo $rowr['bobot_normalisasi'];
		                	?>
		                </td>
		                <?php
		                }
						?>
                                                <?php if ($stmtz->rowCount() > 0){ ?>
						<td align="center">
							<?php 
							echo $row1['hasil_alternatif'];
							?>
						</td>
                                                <td style="font-weight: bold" align="center">
							<?php 
							echo $rank;
							?>
						</td>
                                                <?php } ?>
		            </tr>
		<?php
                $rank++;
		}
		?>
		        </tbody>
		
		    </table>
		    	
	    </div>
	  </div>
	
	</div>
        <br>
	<footer class="text-center">&copy; 2017 ZalixMedia | Modified by Yayan Yanuari</footer>
        <br><br>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-printme.js"></script>
    <script>
    	$('#cetak').click(function() {

    		$("#rangking").printMe({ "path": "css/bootstrap.css", "title": "LAPORAN HASIL AKHIR" }); 

		});
    </script>
    <script type="text/javascript" src="js/tableExport.js"></script>
	<script type="text/javascript" src="js/jquery.base64.js"></script>
	<script type="text/javascript" src="js/html2canvas.js"></script>
	<script type="text/javascript" src="js/jspdf/libs/sprintf.js"></script>
	<script type="text/javascript" src="js/jspdf/jspdf.js"></script>
	<script type="text/javascript" src="js/jspdf/libs/base64.js"></script>
  </body>
</html>