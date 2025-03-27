<?php
include("../controllers/Sewadetail.php");
include("../controllers/Film.php");
include("../lib/functions.php");

$obj = new SewadetailController();
$myfilm = new FilmController();
$films = $myfilm->getFilmList();

if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$msg = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id_sewa = $id;
    $kode_film = $_POST['kode_film'];
    $jumlah_hari = $_POST['jumlah_hari'];
    
    // Insert the database record using your controller's method
    $dat = $obj->addSewadetail($id_sewa, $kode_film, $jumlah_hari);
    $msg = getJSON($dat);
}

$theme = setTheme();
getHeader($theme);
?>

<?php 
if($msg === true){ 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Insert Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'sewa/detail.php?id='.$id.'">';
} elseif($msg === false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Insert Gagal</div>'; 
}
?>

<div class="header icon-and-heading fs-1">
    <i class="zmdi zmdi-movie zmdi-hc-4x"></i>
    <h2><strong>Sewa Detail</strong> <small>Add New Data</small> </h2>
</div>

<hr/>

<form name="formAdd" method="POST" action="">
    <div class="form-group">
        <label for="film">Select a Film:</label>
        <select class="form-control mb-3" name="kode_film" id="kode_film" required>
            <option value="">Select a film...</option>
            <?php foreach($films as $film): ?>
                <option value="<?php echo htmlspecialchars($film['kode_film']); ?>">
                    <?php echo htmlspecialchars($film['kode_film']) . ' - ' . htmlspecialchars($film['judul']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="jumlah_hari">Jumlah Hari:</label>
        <input type="number" class="form-control mb-3" name="jumlah_hari" id="jumlah_hari" required min="1">
    </div>
    
    <button class="save btn btn-large btn-info" type="submit">Save</button>
    <a href="#index" class="btn btn-large btn-default">Cancel</a>
</form>

<?php
getFooter($theme, "<script src='../lib/forms.js'></script>");
?>