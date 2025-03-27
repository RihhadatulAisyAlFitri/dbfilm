<?php
include("../controllers/Sewa.php");
include("../controllers/Pelanggan.php");
include("../lib/functions.php");
$obj = new SewaController();
$pelanggan = new PelangganController();
$list = $pelanggan->getPelangganList();
$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $kode_sewa = $_POST['kode_sewa'];
    $nomor_pelanggan = $_POST['nomor_pelanggan'];
    $tanggal_sewa = $_POST['tanggal_sewa'];

    // Insert the database record using your controller's method
    $dat = $obj->addSewa($kode_sewa, $nomor_pelanggan, $tanggal_sewa);
    $msg = getJSON($dat);
}

$theme = setTheme();
getHeader($theme);
$kode_sewa = generateRandomString(); // Random kode_sewa generation
?>

<?php 
if($msg === true){ 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Insert Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'sewa/">';
} elseif($msg === false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Insert Gagal</div>'; 
} else {
    // Handle other messages
}

?>
<div class="header icon-and-heading fs-1">
    <i class="zmdi zmdi-view-dashboard zmdi-hc-4x"></i>
    <h2><strong>Sewa</strong> <small>Add New Data</small> </h2>
</div>
<hr/>
<form name="formAdd" method="POST" action="">
    
    <div class="form-group col-md-3">
        <label>Kode Sewa:</label>
        <div class="input-group">
            <input type="text" class="form-control" name="kode_sewa" value="<?php echo $kode_sewa; ?>" readonly="readonly"/>
        </div>
    </div>

    <div class="form-group mt-3">
        <label>Nomor Pelanggan:</label>
        <select class="form-control" name="nomor_pelanggan" id="nomor_pelanggan">
            <option value="">Pilih Pelanggan...</option>
            <?php foreach($list as $pel): ?>
                <option value="<?php echo htmlspecialchars($pel['nomor_pelanggan']); ?>">
                    <?php echo htmlspecialchars($pel['nomor_pelanggan']) . ' - ' . htmlspecialchars($pel['nama']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group mt-3">
        <label>Tanggal Sewa:</label>
        <input type="date" class="form-control" name="tanggal_sewa" />
    </div>

    <button class="save btn btn-large btn-info" type="submit">Save</button>
    <a href="#index" class="btn btn-large btn-default">Cancel</a>
</form>

<?php
getFooter($theme,"<script src='../lib/forms.js'></script>");
?>
</body>
</html>
