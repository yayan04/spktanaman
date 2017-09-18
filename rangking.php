<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
$stmt2z = $pro2->readAll();
include_once 'includes/rangking.inc.php';
$pro = new Rangking($db);
$stmt = $pro->readKhusus();
$stmtz = $pro->readAll();
?>

<?php
include_once 'includes/alternatif.inc.php';
$pgn1 = new Alternatif($db);
include_once 'includes/kriteria.inc.php';
$pgn2 = new Kriteria($db);
include_once 'includes/nilai.inc.php';
$pgn3 = new Nilai($db);
if($_POST){
	
	include_once 'includes/rangking.inc.php';
	$eks = new rangking($db);

        $stmtmin = $pgn1->readMinID();
        $min = $stmtmin->fetch(PDO::FETCH_ASSOC);
        $stmtmax = $pgn1->readMaxID();
        $max = $stmtmax->fetch(PDO::FETCH_ASSOC);
        
        while($min['MinID'] <= $max['MaxID']){
            
            $eks->ia = $min['MinID'];
           
            $eks->ik1 = $_POST['ik1'];
            $eks->ik2 = $_POST['ik2'];
            $eks->ik3 = $_POST['ik3'];
            $eks->ik4 = $_POST['ik4'];
            $eks->ik5 = $_POST['ik5'];
            $eks->ik6 = $_POST['ik6'];
            
            if($min['MinID'] == 14){                    // TANAMAN PADI
                $suhu = abs($_POST['n1'] - 23);         // Suhu
                if($suhu >= 0 && $suhu <= 0.99){
                    $eks->n1 = 5;
                }
                else if($suhu >= 1 && $suhu <= 1.99){
                    $eks->n1 = 4;
                }
                else if($suhu >= 2 && $suhu <= 2.99){
                    $eks->n1 = 3;
                }
                else if($suhu >= 3 && $suhu <= 3.99){
                    $eks->n1 = 2;
                }
                else if($suhu >= 4 && $suhu <= 4.99){
                    $eks->n1 = 1;
                }
                else {
                    $eks->n1 = 1;
                }
                //---------------------------------------------------------------
                $tekanan = abs($_POST['n2'] - 1011.035);      // Tekanan Udara
                if($tekanan >= 0 && $tekanan <= 0.4){
                    $eks->n2 = 5;
                }
                else if($tekanan >= 0.5 && $tekanan <= 0.8){
                    $eks->n2 = 4;
                }
                else if($tekanan >= 0.9 && $tekanan <= 1.2){
                    $eks->n2 = 3;
                }
                else if($tekanan >= 1.3 && $tekanan <= 1.6){
                    $eks->n2 = 2;
                }
                else if($tekanan >= 1.7 && $tekanan <= 2){
                    $eks->n2 = 1;
                }
                else {
                    $eks->n2 = 1;
                }
                //---------------------------------------------------------------
                $kecepatan = abs($_POST['n3'] - 7.22);         // Kecepatan Angin
                if($kecepatan >= 0 && $kecepatan <= 2){
                    $eks->n3 = 5;
                }
                else if($kecepatan >= 3 && $kecepatan <= 4){
                    $eks->n3 = 4;
                }
                else if($kecepatan >= 5 && $kecepatan <= 6){
                    $eks->n3 = 3;
                }
                else if($kecepatan >= 7 && $kecepatan <= 8){
                    $eks->n3 = 2;
                }
                else if($kecepatan >= 9 && $kecepatan <= 10){
                    $eks->n3 = 1;
                }
                else {
                    $eks->n3 = 1;
                }
                //---------------------------------------------------------------
                $kelembaban = abs($_POST['n4'] - 75);         // Kelembaban Udara
                if($kelembaban >= 0 && $kelembaban <= 5){
                    $eks->n4 = 5;
                }
                else if($kelembaban >= 6 && $kelembaban <= 10){
                    $eks->n4 = 4;
                }
                else if($kelembaban >= 11 && $kelembaban <= 15){
                    $eks->n4 = 3;
                }
                else if($kelembaban >= 16 && $kelembaban <= 20){
                    $eks->n4 = 2;
                }
                else if($kelembaban >= 21 && $kelembaban <= 25){
                    $eks->n4 = 1;
                }
                else {
                    $eks->n4 = 1;
                }
                //----------------------------------------------------------------
                $curah = abs($_POST['n5'] - (1750/12));         // Curah Hujan
                if($curah >= 0 && $curah <= 29){
                    $eks->n5 = 5;
                }
                else if($curah >= 30 && $curah <= 59){
                    $eks->n5 = 4;
                }
                else if($curah >= 60 && $curah <= 89){
                    $eks->n5 = 3;
                }
                else if($curah >= 90 && $curah <= 119){
                    $eks->n5 = 2;
                }
                else if($curah >= 120 && $curah <= 149){
                    $eks->n5 = 1;
                }
                else {
                    $eks->n5 = 1;
                }
                //----------------------------------------------------------------
                $ketinggian = abs($_POST['n6'] - 1500);         // Ketinggian Tempat
                if($ketinggian >= 0 && $ketinggian <= 299){
                    $eks->n6 = 5;
                }
                else if($ketinggian >= 300 && $ketinggian <= 599){
                    $eks->n6 = 4;
                }
                else if($ketinggian >= 600 && $ketinggian <= 899){
                    $eks->n6 = 3;
                }
                else if($ketinggian >= 900 && $ketinggian <= 1199){
                    $eks->n6 = 2;
                }
                else if($ketinggian >= 1200 && $ketinggian <= 1499){
                    $eks->n6 = 1;
                }
                else {
                    $eks->n6 = 1;
                }
                //----------------------------------------------------------------
            }
            else if($min['MinID'] == 15){               // TANAMAN JAGUNG
                $suhu = abs($_POST['n1'] - 25);         // Suhu
                if($suhu >= 0 && $suhu <= 0.99){
                    $eks->n1 = 5;
                }
                else if($suhu >= 1 && $suhu <= 1.99){
                    $eks->n1 = 4;
                }
                else if($suhu >= 2 && $suhu <= 2.99){
                    $eks->n1 = 3;
                }
                else if($suhu >= 3 && $suhu <= 3.99){
                    $eks->n1 = 2;
                }
                else if($suhu >= 4 && $suhu <= 4.99){
                    $eks->n1 = 1;
                }
                else {
                    $eks->n1 = 1;
                }
                //---------------------------------------------------------------
                $tekanan = abs($_POST['n2'] - 1011.035);      // Tekanan Udara
                if($tekanan >= 0 && $tekanan <= 0.4){
                    $eks->n2 = 5;
                }
                else if($tekanan >= 0.5 && $tekanan <= 0.8){
                    $eks->n2 = 4;
                }
                else if($tekanan >= 0.9 && $tekanan <= 1.2){
                    $eks->n2 = 3;
                }
                else if($tekanan >= 1.3 && $tekanan <= 1.6){
                    $eks->n2 = 2;
                }
                else if($tekanan >= 1.7 && $tekanan <= 2){
                    $eks->n2 = 1;
                }
                else {
                    $eks->n2 = 1;
                }
                //----------------------------------------------------------------
                $kecepatan = abs($_POST['n3'] - 7.22);         // Kecepatan Angin
                if($kecepatan >= 0 && $kecepatan <= 2){
                    $eks->n3 = 5;
                }
                else if($kecepatan >= 3 && $kecepatan <= 4){
                    $eks->n3 = 4;
                }
                else if($kecepatan >= 5 && $kecepatan <= 6){
                    $eks->n3 = 3;
                }
                else if($kecepatan >= 7 && $kecepatan <= 8){
                    $eks->n3 = 2;
                }
                else if($kecepatan >= 9 && $kecepatan <= 10){
                    $eks->n3 = 1;
                }
                else {
                    $eks->n3 = 1;
                }
                //----------------------------------------------------------------
                $kelembaban = abs($_POST['n4'] - 75);         // Kelembaban Udara
                if($kelembaban >= 0 && $kelembaban <= 5){
                    $eks->n4 = 5;
                }
                else if($kelembaban >= 6 && $kelembaban <= 10){
                    $eks->n4 = 4;
                }
                else if($kelembaban >= 11 && $kelembaban <= 15){
                    $eks->n4 = 3;
                }
                else if($kelembaban >= 16 && $kelembaban <= 20){
                    $eks->n4 = 2;
                }
                else if($kelembaban >= 21 && $kelembaban <= 25){
                    $eks->n4 = 1;
                }
                else {
                    $eks->n4 = 1;
                }
                //----------------------------------------------------------------
                $curah = abs($_POST['n5'] - (1075/12));         // Curah Hujan
                if($curah >= 0 && $curah <= 29){
                    $eks->n5 = 5;
                }
                else if($curah >= 30 && $curah <= 59){
                    $eks->n5 = 4;
                }
                else if($curah >= 60 && $curah <= 89){
                    $eks->n5 = 3;
                }
                else if($curah >= 90 && $curah <= 119){
                    $eks->n5 = 2;
                }
                else if($curah >= 120 && $curah <= 149){
                    $eks->n5 = 1;
                }
                else {
                    $eks->n5 = 1;
                }
                //----------------------------------------------------------------
                $ketinggian = abs($_POST['n6'] - 1800);         // Ketinggian Tempat
                if($ketinggian >= 0 && $ketinggian <= 299){
                    $eks->n6 = 5;
                }
                else if($ketinggian >= 300 && $ketinggian <= 599){
                    $eks->n6 = 4;
                }
                else if($ketinggian >= 600 && $ketinggian <= 899){
                    $eks->n6 = 3;
                }
                else if($ketinggian >= 900 && $ketinggian <= 1199){
                    $eks->n6 = 2;
                }
                else if($ketinggian >= 1200 && $ketinggian <= 1499){
                    $eks->n6 = 1;
                }
                else {
                    $eks->n6 = 1;
                }
                //----------------------------------------------------------------
            }
            else if($min['MinID'] == 16){               // TANAMAN KEDELAI
                $suhu = abs($_POST['n1'] - 24.5);         // Suhu
                if($suhu >= 0 && $suhu <= 0.99){
                    $eks->n1 = 5;
                }
                else if($suhu >= 1 && $suhu <= 1.99){
                    $eks->n1 = 4;
                }
                else if($suhu >= 2 && $suhu <= 2.99){
                    $eks->n1 = 3;
                }
                else if($suhu >= 3 && $suhu <= 3.99){
                    $eks->n1 = 2;
                }
                else if($suhu >= 4 && $suhu <= 4.99){
                    $eks->n1 = 1;
                }
                else {
                    $eks->n1 = 1;
                }
                //---------------------------------------------------------------
                $tekanan = abs($_POST['n2'] - 1011.035);      // Tekanan Udara
                if($tekanan >= 0 && $tekanan <= 0.4){
                    $eks->n2 = 5;
                }
                else if($tekanan >= 0.5 && $tekanan <= 0.8){
                    $eks->n2 = 4;
                }
                else if($tekanan >= 0.9 && $tekanan <= 1.2){
                    $eks->n2 = 3;
                }
                else if($tekanan >= 1.3 && $tekanan <= 1.6){
                    $eks->n2 = 2;
                }
                else if($tekanan >= 1.7 && $tekanan <= 2){
                    $eks->n2 = 1;
                }
                else {
                    $eks->n2 = 1;
                }
                //----------------------------------------------------------------
                $kecepatan = abs($_POST['n3'] - 7.22);         // Kecepatan Angin
                if($kecepatan >= 0 && $kecepatan <= 2){
                    $eks->n3 = 5;
                }
                else if($kecepatan >= 3 && $kecepatan <= 4){
                    $eks->n3 = 4;
                }
                else if($kecepatan >= 5 && $kecepatan <= 6){
                    $eks->n3 = 3;
                }
                else if($kecepatan >= 7 && $kecepatan <= 8){
                    $eks->n3 = 2;
                }
                else if($kecepatan >= 9 && $kecepatan <= 10){
                    $eks->n3 = 1;
                }
                else {
                    $eks->n3 = 1;
                }
                //----------------------------------------------------------------
                $kelembaban = abs($_POST['n4'] - 75);         // Kelembaban Udara
                if($kelembaban >= 0 && $kelembaban <= 5){
                    $eks->n4 = 5;
                }
                else if($kelembaban >= 6 && $kelembaban <= 10){
                    $eks->n4 = 4;
                }
                else if($kelembaban >= 11 && $kelembaban <= 15){
                    $eks->n4 = 3;
                }
                else if($kelembaban >= 16 && $kelembaban <= 20){
                    $eks->n4 = 2;
                }
                else if($kelembaban >= 21 && $kelembaban <= 25){
                    $eks->n4 = 1;
                }
                else {
                    $eks->n4 = 1;
                }
                //----------------------------------------------------------------
                $curah = abs($_POST['n5'] - (675/12));         // Curah Hujan
                if($curah >= 0 && $curah <= 29){
                    $eks->n5 = 5;
                }
                else if($curah >= 30 && $curah <= 59){
                    $eks->n5 = 4;
                }
                else if($curah >= 60 && $curah <= 89){
                    $eks->n5 = 3;
                }
                else if($curah >= 90 && $curah <= 119){
                    $eks->n5 = 2;
                }
                else if($curah >= 120 && $curah <= 149){
                    $eks->n5 = 1;
                }
                else {
                    $eks->n5 = 1;
                }
                //----------------------------------------------------------------
                $ketinggian = abs($_POST['n6'] - 750);         // Ketinggian Tempat
                if($ketinggian >= 0 && $ketinggian <= 299){
                    $eks->n6 = 5;
                }
                else if($ketinggian >= 300 && $ketinggian <= 599){
                    $eks->n6 = 4;
                }
                else if($ketinggian >= 600 && $ketinggian <= 899){
                    $eks->n6 = 3;
                }
                else if($ketinggian >= 900 && $ketinggian <= 1199){
                    $eks->n6 = 2;
                }
                else if($ketinggian >= 1200 && $ketinggian <= 1499){
                    $eks->n6 = 1;
                }
                else {
                    $eks->n6 = 1;
                }
                //----------------------------------------------------------------
            }
            else if($min['MinID'] == 17){               // TANAMAN UBI JALAR
                $suhu = abs($_POST['n1'] - 22.5);         // Suhu
                if($suhu >= 0 && $suhu <= 0.99){
                    $eks->n1 = 5;
                }
                else if($suhu >= 1 && $suhu <= 1.99){
                    $eks->n1 = 4;
                }
                else if($suhu >= 2 && $suhu <= 2.99){
                    $eks->n1 = 3;
                }
                else if($suhu >= 3 && $suhu <= 3.99){
                    $eks->n1 = 2;
                }
                else if($suhu >= 4 && $suhu <= 4.99){
                    $eks->n1 = 1;
                }
                else {
                    $eks->n1 = 1;
                }
                //----------------------------------------------------------------
                $tekanan = abs($_POST['n2'] - 1011.035);      // Tekanan Udara
                if($tekanan >= 0 && $tekanan <= 0.4){
                    $eks->n2 = 5;
                }
                else if($tekanan >= 0.5 && $tekanan <= 0.8){
                    $eks->n2 = 4;
                }
                else if($tekanan >= 0.9 && $tekanan <= 1.2){
                    $eks->n2 = 3;
                }
                else if($tekanan >= 1.3 && $tekanan <= 1.6){
                    $eks->n2 = 2;
                }
                else if($tekanan >= 1.7 && $tekanan <= 2){
                    $eks->n2 = 1;
                }
                else {
                    $eks->n2 = 1;
                }
                //----------------------------------------------------------------
                $kecepatan = abs($_POST['n3'] - 7.22);         // Kecepatan Angin
                if($kecepatan >= 0 && $kecepatan <= 2){
                    $eks->n3 = 5;
                }
                else if($kecepatan >= 3 && $kecepatan <= 4){
                    $eks->n3 = 4;
                }
                else if($kecepatan >= 5 && $kecepatan <= 6){
                    $eks->n3 = 3;
                }
                else if($kecepatan >= 7 && $kecepatan <= 8){
                    $eks->n3 = 2;
                }
                else if($kecepatan >= 9 && $kecepatan <= 10){
                    $eks->n3 = 1;
                }
                else {
                    $eks->n3 = 1;
                }
                //----------------------------------------------------------------
                $kelembaban = abs($_POST['n4'] - 80);         // Kelembaban Udara
                if($kelembaban >= 0 && $kelembaban <= 5){
                    $eks->n4 = 5;
                }
                else if($kelembaban >= 6 && $kelembaban <= 10){
                    $eks->n4 = 4;
                }
                else if($kelembaban >= 11 && $kelembaban <= 15){
                    $eks->n4 = 3;
                }
                else if($kelembaban >= 16 && $kelembaban <= 20){
                    $eks->n4 = 2;
                }
                else if($kelembaban >= 21 && $kelembaban <= 25){
                    $eks->n4 = 1;
                }
                else {
                    $eks->n4 = 1;
                }
                //----------------------------------------------------------------
                $curah = abs($_POST['n5'] - (1125/12));         // Curah Hujan
                if($curah >= 0 && $curah <= 29){
                    $eks->n5 = 5;
                }
                else if($curah >= 30 && $curah <= 59){
                    $eks->n5 = 4;
                }
                else if($curah >= 60 && $curah <= 89){
                    $eks->n5 = 3;
                }
                else if($curah >= 90 && $curah <= 119){
                    $eks->n5 = 2;
                }
                else if($curah >= 120 && $curah <= 149){
                    $eks->n5 = 1;
                }
                else {
                    $eks->n5 = 1;
                }
                //----------------------------------------------------------------
                $ketinggian = abs($_POST['n6'] - 1000);         // Ketinggian Tempat
                if($ketinggian >= 0 && $ketinggian <= 299){
                    $eks->n6 = 5;
                }
                else if($ketinggian >= 300 && $ketinggian <= 599){
                    $eks->n6 = 4;
                }
                else if($ketinggian >= 600 && $ketinggian <= 899){
                    $eks->n6 = 3;
                }
                else if($ketinggian >= 900 && $ketinggian <= 1199){
                    $eks->n6 = 2;
                }
                else if($ketinggian >= 1200 && $ketinggian <= 1499){
                    $eks->n6 = 1;
                }
                else {
                    $eks->n6 = 1;
                }
                //----------------------------------------------------------------
            }
            else if($min['MinID'] == 18){               // TANAMAN UBI KAYU
                $suhu = abs($_POST['n1'] - 21);         // Suhu
                if($suhu >= 0 && $suhu <= 0.99){
                    $eks->n1 = 5;
                }
                else if($suhu >= 1 && $suhu <= 1.99){
                    $eks->n1 = 4;
                }
                else if($suhu >= 2 && $suhu <= 2.99){
                    $eks->n1 = 3;
                }
                else if($suhu >= 3 && $suhu <= 3.99){
                    $eks->n1 = 2;
                }
                else if($suhu >= 4 && $suhu <= 4.99){
                    $eks->n1 = 1;
                }
                else {
                    $eks->n1 = 1;
                }
                //----------------------------------------------------------------
                $tekanan = abs($_POST['n2'] - 1011.035);      // Tekanan Udara
                if($tekanan >= 0 && $tekanan <= 0.4){
                    $eks->n2 = 5;
                }
                else if($tekanan >= 0.5 && $tekanan <= 0.8){
                    $eks->n2 = 4;
                }
                else if($tekanan >= 0.9 && $tekanan <= 1.2){
                    $eks->n2 = 3;
                }
                else if($tekanan >= 1.3 && $tekanan <= 1.6){
                    $eks->n2 = 2;
                }
                else if($tekanan >= 1.7 && $tekanan <= 2){
                    $eks->n2 = 1;
                }
                else {
                    $eks->n2 = 1;
                }
                //----------------------------------------------------------------
                $kecepatan = abs($_POST['n3'] - 7.22);         // Kecepatan Angin
                if($kecepatan >= 0 && $kecepatan <= 2){
                    $eks->n3 = 5;
                }
                else if($kecepatan >= 3 && $kecepatan <= 4){
                    $eks->n3 = 4;
                }
                else if($kecepatan >= 5 && $kecepatan <= 6){
                    $eks->n3 = 3;
                }
                else if($kecepatan >= 7 && $kecepatan <= 8){
                    $eks->n3 = 2;
                }
                else if($kecepatan >= 9 && $kecepatan <= 10){
                    $eks->n3 = 1;
                }
                else {
                    $eks->n3 = 1;
                }
                //----------------------------------------------------------------
                $kelembaban = abs($_POST['n4'] - 80);         // Kelembaban Udara
                if($kelembaban >= 0 && $kelembaban <= 5){
                    $eks->n4 = 5;
                }
                else if($kelembaban >= 6 && $kelembaban <= 10){
                    $eks->n4 = 4;
                }
                else if($kelembaban >= 11 && $kelembaban <= 15){
                    $eks->n4 = 3;
                }
                else if($kelembaban >= 16 && $kelembaban <= 20){
                    $eks->n4 = 2;
                }
                else if($kelembaban >= 21 && $kelembaban <= 25){
                    $eks->n4 = 1;
                }
                else {
                    $eks->n4 = 1;
                }
                //----------------------------------------------------------------
                $curah = abs($_POST['n5'] - (1630/12));         // Curah Hujan
                if($curah >= 0 && $curah <= 29){
                    $eks->n5 = 5;
                }
                else if($curah >= 30 && $curah <= 59){
                    $eks->n5 = 4;
                }
                else if($curah >= 60 && $curah <= 89){
                    $eks->n5 = 3;
                }
                else if($curah >= 90 && $curah <= 119){
                    $eks->n5 = 2;
                }
                else if($curah >= 120 && $curah <= 149){
                    $eks->n5 = 1;
                }
                else {
                    $eks->n5 = 1;
                }
                //----------------------------------------------------------------
                $ketinggian = abs($_POST['n6'] - 800);         // Ketinggian Tempat
                if($ketinggian >= 0 && $ketinggian <= 299){
                    $eks->n6 = 5;
                }
                else if($ketinggian >= 300 && $ketinggian <= 599){
                    $eks->n6 = 4;
                }
                else if($ketinggian >= 600 && $ketinggian <= 899){
                    $eks->n6 = 3;
                }
                else if($ketinggian >= 900 && $ketinggian <= 1199){
                    $eks->n6 = 2;
                }
                else if($ketinggian >= 1200 && $ketinggian <= 1499){
                    $eks->n6 = 1;
                }
                else {
                    $eks->n6 = 1;
                }
                //----------------------------------------------------------------
            }
            
            $eks->insert();
            
            $min['MinID']++;
            
        }
        
        if($eks->insert()){
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Gagal Proses Data!</strong> Terjadi kesalahan, coba sekali lagi.
    </div>
    <?php
            echo("<meta http-equiv='refresh' content='1; URL=laporan.php'>");
            }

            else{
    ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Berhasil Proses Data!</strong>
    </div>
    <?php
            echo("<meta http-equiv='refresh' content='1; URL=laporan.php'>");
            }
}
?>

<script type="text/javascript" >
    function konfirmasi(){
        var msg;
        msg = "Apakah Anda Yakin Ingin Mereset Data ?";
        var agree = confirm(msg);
        
        if(agree == true){
            return true;
        } else{
            return false;
        }
    }
</script>

<?php
        include_once "includes/config.php";
        $database = new Config();
        $db = $database->getConnection();   
        
        //        menampilkan pesan jika ada pesan RESET
        if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
            echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>'. $_SESSION['pesan'] .'</strong>
                  </div>';
            echo("<meta http-equiv='refresh' content='1; URL=rangking.php'>");
        }
        //        mengatur session pesan menjadi kosong
        $_SESSION['pesan'] = '';
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
                                <div class="text-center" style="padding-bottom: 0px"><h4>Masukkan Nilai Parameter</h4></div>
                                <div class="text-center" style="padding-bottom: 10px"><h7>Gunakan tanda titik (.) untuk nilai pecahan desimal</h7></div>
                                <form method="post">

				    	<?php
                                        
                                        
						$stmt3 = $pgn2->readAll();
                                                $no = 1;
						while ($row2 = $stmt3->fetch(PDO::FETCH_ASSOC)){
							extract($row2); ?>
                                                        <div class="form-group">
                                                            <label for="ik"><h6>(<?php echo $no ?>) <?php echo "{$nama_kriteria}" ?></h6></label>
                                                            <input type="hidden" name="ik<?php echo $no ?>" id="ik<?php echo $no ?>" value="<?php echo "{$id_kriteria}" ?>">
                                                            <?php if ($stmtz->rowCount() == 0){ ?> 
                                                            <input type="text" class="form-control" id="n<?php echo $no ?>" name="n<?php echo $no ?>" placeholder="Nilai <?php echo "{$nama_kriteria}" ?>" required>
                                                            <?php } else { ?>
                                                            <input type="text" class="form-control" placeholder="Klik Reset" readonly>
                                                            <?php } ?>
                                                        </div>
                                        <?php 
                                                $no++;
						}
					    ?>
                                    <?php if ($stmtz->rowCount() == 0){ ?> 
                                    <button style="width: 100%" type="submit" class="btn btn-success">Proses</button>
                                    <?php } else { ?>
                                    <a href="rangking-hapus-all.php" onclick="return konfirmasi()">
                                    <button style="width: 100%" type="button" class="btn btn-danger" onclick="">Reset</button>
                                    </a>
                                    <?php } ?>
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
								echo $nor = @($rowr['nilai_rangking']/$maxnr['mnr1']);
							} else{
								$stmtmin = $pro->readMin($b);
								$minnr = $stmtmin->fetch(PDO::FETCH_ASSOC);
								echo $nor = @($minnr['mnr2']/$rowr['nilai_rangking']);
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