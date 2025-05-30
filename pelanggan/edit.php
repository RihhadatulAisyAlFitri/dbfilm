<?php
include("../controllers/Pelanggan.php");
include("../lib/functions.php");
$obj = new PelangganController();
if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$msg=null;
if (isset($_POST["submitted"])==1 && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST['id'];
    $nomor_pelanggan = $_POST['nomor_pelanggan'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    // Update the database record using your controller's method
$dat = $obj->updatepelanggan($id, $nomor_pelanggan, $nama, $email, $no_telepon);
$msg = getJSON($dat);
}
$rows = $obj->getPelanggan($id);
$theme=setTheme();
getHeader($theme);
?>

    <?php 
    if($msg===true){ 
        echo '<div class="alert alert-success" style="display: block" id="message_success">Update Data Berhasil</div>';
        echo '<meta http-equiv="refresh" content="2;url='.base_url().'pelanggan/">';
    } elseif($msg===false) {
        echo '<div class="alert alert-danger" style="display: block" id="message_error">Update Gagal</div>'; 
    } else {

    }
    
    ?>
        <div class="header icon-and-heading">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
        <h2><strong>pelanggan</strong> <small>Edit Data</small> </h2>
        </div>
        <hr style="margin-bottom:-2px;"/>
        <form name="formEdit" method="POST" action="">
            <input type="hidden" class="form-control" name="submitted" value="1"/>
            <?php foreach ($rows as $row): ?>
            
                    <div class="form-group">
                        <label>id:</label>
                        <input type="text" class="form-control" id="id" name="id" 
                            value="<?php echo $row['id']; ?>" readonly/>
                    </div>
                
                    <div class="form-group">
                        <label>nomor_pelanggan:</label>
                        <input type="text" class="form-control" id="nomor_pelanggan" name="nomor_pelanggan" 
                            value="<?php echo $row['nomor_pelanggan']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" 
                            value="<?php echo $row['nama']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>email:</label>
                        <input type="text" class="form-control" id="email" name="email" 
                            value="<?php echo $row['email']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>no_telepon:</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" 
                            value="<?php echo $row['no_telepon']; ?>" />
                    </div>
                
            
            <?php endforeach; ?>
            <button class="save btn btn-large btn-info" type="submit">Save</button>
            <a href="#index" class="btn btn-large btn-default">Cancel</a>
        </form>
                                        
<?php
getFooter($theme,"<script src='../lib/forms.js'></script>");
?>
</body>
</html>
