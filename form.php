
<?php

if(isset($_POST["urutkan"])){
    $data = array(
        "UTS Teori" => $_POST['utsteori'],
        "UAS Teori" => $_POST['uasteori'],
        "Quiz" => $_POST['quiz'],
        "UTS Praktikum" => $_POST['utspraktikum'],
        "UAS Praktikum" => $_POST['uaspraktikum'],
        "Tugas Word" => $_POST['tugasword'],
        "Tugas PPT" => $_POST['tugasppt'],
        "Muatan Lokal" => $_POST['mulok']
    );
    asort($data);
    
}

if(isset($_POST["pdf"])){
    
// memanggil library FPDF
require('Library/FPDF/fpdf.php');
$pdf = new FPDF('l','mm','A5');
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial','B',16);
// Membuat string
$pdf->Cell(190,7,'Nilai Aplikasi Komputer '.$_POST['nama'],0,1,'C');
$pdf->SetFont('Arial','B',9);

// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(80,6,'Komponen Penilaian',1,0);
$pdf->Cell(50,6,'Nilai',1,1);
//
$pdf->Cell(80,6,'UTS Teori',1,0);
$pdf->Cell(50,6,$_POST['utsteori'],1,1);

$pdf->Cell(80,6,'UAS Teori',1,0);
$pdf->Cell(50,6,$_POST['uasteori'],1,1);

$pdf->Cell(80,6,'Quiz',1,0);
$pdf->Cell(50,6,$_POST['quiz'],1,1);

$pdf->Cell(80,6,'UTS Praktikum',1,0);
$pdf->Cell(50,6,$_POST['utspraktikum'],1,1);

$pdf->Cell(80,6,'UAS Praktikum',1,0);
$pdf->Cell(50,6,$_POST['uaspraktikum'],1,1);

$pdf->Cell(80,6,'Tugas Word',1,0);
$pdf->Cell(50,6,$_POST['tugasword'],1,1);

$pdf->Cell(80,6,'Tugas PPT',1,0);
$pdf->Cell(50,6,$_POST['tugasppt'],1,1);

$pdf->Cell(80,6,'Muatan Lokal',1,0);
$pdf->Cell(50,6,$_POST['mulok'],1,1);


$pdf->Output();


}
?>

<!DOCTYPE html>
<html>
<head>
<style>
.item1 { grid-area: header; }

.item3 { grid-area: main; }


.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
    'menu main main main right right'
    'menu footer footer footer footer footer';
  grid-gap: 10px;
  background-color: white;
  padding: 10px;
  border-style: solid;
}

.grid-container > .item1 {
  background-color: white;
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
  border-style: solid;
}
#tanggal{
    float: right;
    margin-top:-16px;
    font-size: 15px;
}
.item3{
    
    float: center;
    margin-left: 30%;
}
.tabelData {
  border: 1px solid black;
}
</style>
<script src="Library/ChartJS/chart.js"></script>
</head>
<body>


<div class="grid-container">

    <div class="item1">
        <div id="tanggal">
            <script type="text/javascript">
                    var day = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
                    var month = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
                    day = day.split(" ");
                    month = month.split(" ");
                    var tgl = new Date();
                    var hari = tgl.getDay();
                    var tanggal = tgl.getDate();
                    var bulan = tgl.getMonth();
                    var tahun = tgl.getFullYear();
                    var time = new String();
                    time = day[hari] + ", " +tanggal + " " + month[bulan] + " " + tahun;
                    document.write(time);
            </script>
        </div>
        Header
    </div>
  
    <div class="item3">
        <div class="formulir">
        <h3>Input Nilai Mahasiswa Mata Kuliah Aplikasi Komputer</h1>
        <form action="" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <input type="radio" name="jk" id="jk" value="L">Laki-Laki
                    <input type="radio" name="jk" id="jk2" value="P">Perempuan
                </td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td><input type="text" name="prodi" id="prodi" value="Manajemen Informatika" readonly></td>
            </tr>
            <tr>
                <td>UTS Teori</td>
                <td>:</td>
                <td><input type="text" name="utsteori" id="utsteori"></td>
            </tr>
            <tr>
                <td>UAS Teori</td>
                <td>:</td>
                <td><input type="text" name="uasteori" id="uasteori"></td>
            </tr>
            <tr>
                <td>Quiz</td>
                <td>:</td>
                <td><input type="number" name="quiz" id="quiz"></td>
            </tr>
            <tr>
                <td>UTS Praktikum</td>
                <td>:</td>
                <td><input type="number" name="utspraktikum" id="utspraktikum"></td>
            </tr>
            <tr>
                <td>UAS Praktikum</td>
                <td>:</td>
                <td><input type="number" name="uaspraktikum" id="uaspraktikum"></td>
            </tr>
            <tr>
                <td>Tugas Word</td>
                <td>:</td>
                <td><input type="number" name="tugasword" id="tugasword"></td>
            </tr>
            <tr>
                <td>Tugas PPT</td>
                <td>:</td>
                <td><input type="number" name="tugasppt" id="tugasppt"></td>
            </tr>
            <tr>
                <td>Muatan Lokal</td>
                <td>:</td>
                <td><input type="number" name="mulok" id="mulok"></td>
            </tr>
            <tr>
                <td><input type="submit" name="urutkan" id="urutkan" value="Urutkan Data"></td>
                <td></td>
                
                <td><button type="button" onclick="hapusForm();">Hapus m</button></td>
            </tr>
            <tr>
                <td><input type="submit" name="grafik" id="grafik" value="Tampilkan Grafik"></td>
                <td></td>
                <td><input type="submit" name="pdf" id="pdf" value="Tampilkan PDF"></td>
            </tr>
           
        </table>
        </form>    
        
            
             
            
        </div>
    </div>  

</div>

<hr>
<?php if(isset($_POST['urutkan'])):?>
<h3>Data Urutan : </h3>  <br>

    
    <table class="tabelData">
        <tr class="tabelData">
            <td class="tabelData">Komponen Penilaian</td>
            <td class="tabelData">Nilai</td>
        </tr>
        <?php foreach($data as $d=>$value):?>
        <tr class="tabelData">
            <td class="tabelData"><?= $d;?></td>
            <td class="tabelData"><?= $value;?></td>
        </tr>
        <?php endforeach;?>
    </table>
    
<?php endif; ?>

<hr>

<?php if(isset($_POST['grafik'])):?>

<input type="number" id="nilai1" value="<?=$_POST['utsteori']?>" hidden>
<input type="number" id="nilai2" value="<?=$_POST['uasteori']?>" hidden>
<input type="number" id="nilai3" value="<?=$_POST['quiz']?>" hidden>
<input type="number" id="nilai4" value="<?=$_POST['utspraktikum']?>" hidden>
<input type="number" id="nilai5" value="<?=$_POST['uaspraktikum']?>" hidden>
<input type="number" id="nilai6" value="<?=$_POST['tugasword']?>" hidden>
<input type="number" id="nilai7" value="<?=$_POST['tugasppt']?>" hidden>
<input type="number" id="nilai8" value="<?=$_POST['mulok']?>" hidden>



<h2 style="text-align:center;">Nilai Aplikom</h2>
<br>
<div class="container">
    <canvas id="myChart"></canvas>
</div>
<?php endif;?>

</body> 

<script>
function hapusForm(){
    document.getElementById("nama").value= "";
    document.getElementById("utsteori").value= "";
    document.getElementById("uasteori").value= "";
    document.getElementById("quiz").value= "";
    document.getElementById("utspraktikum").value= "";
    document.getElementById("uaspraktikum").value= "";
    document.getElementById("tugasword").value= "";
    document.getElementById("tugasppt").value= "";
    document.getElementById("mulok").value= "";
}
</script>

<script>

var ctx = document.getElementById('myChart');
var nilai1 = document.getElementById('nilai1').value;
var nilai2 = document.getElementById('nilai2').value;
var nilai3 = document.getElementById('nilai3').value;
var nilai4 = document.getElementById('nilai4').value;
var nilai5 = document.getElementById('nilai5').value;
var nilai6 = document.getElementById('nilai6').value;
var nilai7 = document.getElementById('nilai7').value;
var nilai8 = document.getElementById('nilai8').value;
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['UTS Teori', 'UAS Teori', 'Quiz', 'UTS Praktikum', 'UAS Praktikum', 'Tugas Word', 'Tugas PPT', 'Muatan lokal'],
        datasets: [{
            label: 'Nilai',
            data: [nilai1, nilai2, nilai3, nilai4, nilai5, nilai6, nilai7, nilai8],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'

            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
</html>
