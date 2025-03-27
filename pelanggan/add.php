<?php
include("../controllers/Pelanggan.php");
include("../lib/functions.php");
$obj = new PelangganController();
$msg=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $nomor_pelanggan = $_POST['nomor_pelanggan'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    // Insert the database record using your controller's method
$dat = $obj->addpelanggan($nomor_pelanggan, $nama, $email, $no_telepon);
$msg = getJSON($dat);
}
$theme=setTheme();
getHeader($theme);
?>

<?php 
if($msg===true){ 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Insert Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'pelanggan/">';
} elseif($msg===false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Insert Gagal</div>'; 
} else {

}

?>
        <div class="header icon-and-heading fs-1">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x"></i>
            <h2><strong>pelanggan</strong> <small>Add New Data</small> </h2>
        </div>
        <hr/>
        <form name="formAdd" method="POST" action="">
            
                <div class="form-group">
                    <label>Nomor_pelanggan:</label>
                    <input type="text" class="form-control" name="nomor_pelanggan"  />
                </div>
            
                <div class="form-group">
                    <label>Nama:</label>
                    <input type="text" class="form-control" name="nama"  />
                </div>
            
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control" name="email"  />
                </div>
            
                <div class="form-group">
                    <label>No_telepon:</label>
                    <input type="text" class="form-control" name="no_telepon"  />
                </div>
            
            <button class="save btn btn-large btn-info" type="submit">Save</button>
            <a href="#index" class="btn btn-large btn-default">Cancel</a>
        </form>

<?php
getFooter($theme,"<script src='../lib/forms.js'></script>");
?>
</body>
</html>
