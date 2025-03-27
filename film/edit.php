<?php
include("../controllers/Film.php");
include("../lib/functions.php");
$obj = new FilmController();
if(isset($_GET["id"])){
    $id=$_GET["id"];
}

$msg=null;
if (isset($_POST["submitted"])==1 && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST['id'];
    $kode_film = $_POST['kode_film'];
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $harga = $_POST['harga'];
    // Update the database record using your controller's method
$dat = $obj->updatefilm($id, $kode_film, $judul, $genre, $tahun_rilis, $harga);
$msg = getJSON($dat);
}
$rows = $obj->getFilm($id);
$theme=setTheme();
getHeader($theme);
?>

    <?php 
    if($msg===true){ 
        echo '<div class="alert alert-success" style="display: block" id="message_success">Update Data Berhasil</div>';
        echo '<meta http-equiv="refresh" content="2;url='.base_url().'film/">';
    } elseif($msg===false) {
        echo '<div class="alert alert-danger" style="display: block" id="message_error">Update Gagal</div>'; 
    } else {

    }
    
    ?>
        <div class="header icon-and-heading">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
        <h2><strong>film</strong> <small>Edit Data</small> </h2>
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
                        <label>kode_film:</label>
                        <input type="text" class="form-control" id="kode_film" name="kode_film" 
                            value="<?php echo $row['kode_film']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>judul:</label>
                        <input type="text" class="form-control" id="judul" name="judul" 
                            value="<?php echo $row['judul']; ?>" />
                    </div>
                
                <div class="form-group">
                    <label>Genre:</label>
                    <select id="genre" name="genre" style="width:150px" 
                        class="form-control show-tick" required>
                    <option value="<?php echo $row['genre']; ?>">
                    <?php echo $row['genre']; ?></option>
                        <option value="Action">Action</option><option value="Comedy">Comedy</option><option value="Drama">Drama</option><option value="Horror">Horror</option><option value="Romance">Romance</option><option value="Sci-Fi">Sci-Fi</option><option value="Thriller">Thriller</option><option value="Fantasy">Fantasy</option><option value="Documentary">Documentary</option><option value="Adventure">Adventure</option>
                    </select>
                </div>
            
                    <div class="form-group">
                        <label>tahun_rilis:</label>
                        <input type="text" class="form-control" id="tahun_rilis" name="tahun_rilis" 
                            value="<?php echo $row['tahun_rilis']; ?>" />
                    </div>
                
                    <div class="form-group">
                        <label>harga:</label>
                        <input type="text" class="form-control" id="harga" name="harga" 
                            value="<?php echo $row['harga']; ?>" />
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
