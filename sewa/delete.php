<?php
include("../controllers/Sewa.php"); // Assuming you have a SewaController
include("../lib/functions.php");

$obj = new SewaController();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$msg = null;
if (isset($_POST['submitted']) == 1 && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Hapus data di tabel sewa
    $dat = $obj->deleteSewa($id);
    $msg = getJSON($dat);
}

$rows = $obj->getSewa($id);
$theme = setTheme();
getHeader($theme);
?>

<?php 
if ($msg === true) { 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Delete Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="3;url='.base_url().'sewa/">';
} elseif ($msg === false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Delete Gagal: Data terkait masih ada di tabel lain.</div>'; 
} else {
    // No message
}
?>

<div class="header icon-and-heading">
    <i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
    <h2><strong>Sewa</strong> <small>Delete Data</small></h2>
    </div>
    <hr/>
    <form name="formDelete" method="POST" action="">
        <input type="hidden" class="form-control" name="submitted" value="1"/>
     <dl class="row mt-1">
    <?php foreach ($rows as $row): ?>
        <dt class="col-sm-3">Id:</dt><dd class="col-sm-9"><?php echo $row['id']; ?></dd>
        <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly />
        <dt class="col-sm-3">Kode_sewa:</dt><dd class="col-sm-9"><?php echo $row['kode_sewa']; ?></dd>
        <dt class="col-sm-3">Nomor_pelanggan:</dt><dd class="col-sm-9"><?php echo $row['nomor_pelanggan']; ?></dd>
        <dt class="col-sm-3">Tanggal_sewa:</dt><dd class="col-sm-9"><?php echo $row['tanggal_sewa']; ?></dd>
        <dt class="col-sm-3">Tanggal_kembali:</dt><dd class="col-sm-9"><?php echo $row['tanggal_kembali']; ?></dd>
    </dl>
    <button class="btn btn-large btn-danger" type="submit">Delete</button>
    <a href="#index" class="btn btn-large btn-default">Cancel</a>
    <?php endforeach; ?>
</form>

<?php
getFooter($theme, "");
?>
