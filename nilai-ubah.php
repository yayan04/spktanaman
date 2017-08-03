<?php
include_once 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

include_once 'includes/nilai.inc.php';
$eks = new Nilai($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->kt = $_POST['kt'];
	$eks->jm = $_POST['jm'];
	
	if($eks->update()){
		echo "<script>location.href='nilai.php'</script>";
	} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal Ubah Data!</strong> Terjadi kesalahan, coba sekali lagi.
</div>
<?php
	}
}
?>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-12">
		  	<div class="page-header">
			  <div class="text-center">
            			<h5>Ubah Nilai</h5>
                            </div>
			</div>
			
			    <form method="post">
				  <div class="form-group">
				    <label for="kt">Keterangan Nilai</label>
				    <input type="text" class="form-control" id="kt" name="kt" value="<?php echo $eks->kt; ?>">
				  </div>
				  <div class="form-group">
				    <label for="jm">Jumlah Nilai</label>
				    <input type="text" class="form-control" id="jm" name="jm" value="<?php echo $eks->jm; ?>">
				  </div>
				  <button type="submit" class="btn btn-primary">Ubah</button>
				  <button type="button" onclick="location.href='nilai.php'" class="btn btn-success">Kembali</button>
				</form>
			  
		  </div>
		</div>
		<?php
include_once 'footer.php';
?>