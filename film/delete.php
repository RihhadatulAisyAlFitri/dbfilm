<?php
include("../controllers/Film.php");

include("../lib/functions.php");
$obj = new FilmController();

if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$msg=null;
if (isset($_POST['submitted'])==1 && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Form was submitted, process the update here
    $id = $_POST['id'];
    
    // delete the database record using your controller's method
    $dat = $obj->deleteFilm($id);
    $msg = getJSON($dat);
    
}
$rows = $obj->getFilm($id);
$theme=setTheme();
getHeader($theme);
?>

    <?php 
    if($msg===true){ 
        echo '<div class="alert alert-success" style="display: block" id="message_success">Delete Data Berhasil</div>';
        echo '<meta http-equiv="refresh" content="3;url='.base_url().'film/">';
    } elseif($msg===false) {
        echo '<div class="alert alert-danger" style="display: block" id="message_error">Delete Gagal</div>'; 
    } else {

    }
    
    ?>
    <div class="header icon-and-heading">
    <i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
    <h2><strong>film</strong> <small>Delete Data</small> </h2>
    </div>
    <hr/>
    <form name="formDelete" method="POST" action="">
        <input type="hidden" class="form-control" name="submitted" value="1"/>
        <dl class="row mt-1">
        <?php foreach ($rows as $row): ?>
        
        
                            <dt class="col-sm-3">Id:</dt><dd class="col-sm-9"><?php echo $row['id']; ?></dd>
                            <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly />
            
                            <dt class="col-sm-3">Kode_film:</dt><dd class="col-sm-9"><?php echo $row['kode_film']; ?></dd>
            
                            <dt class="col-sm-3">Judul:</dt><dd class="col-sm-9"><?php echo $row['judul']; ?></dd>
            
                            <dt class="col-sm-3">Genre:</dt><dd class="col-sm-9"><?php echo $row['genre']; ?></dd>
            
                            <dt class="col-sm-3">Tahun_rilis:</dt><dd class="col-sm-9"><?php echo $row['tahun_rilis']; ?></dd>
            
                            <dt class="col-sm-3">Harga:</dt><dd class="col-sm-9"><?php echo $row['harga']; ?></dd>
            
            
        </dl>
        <button class="btn btn-large btn-danger" type="submit">Delete</button>
        <a href="#index" class="btn btn-large btn-default">Cancel</a>
        <?php endforeach; ?>
    </form>
                                       
<?php
getFooter($theme,"");
?>
