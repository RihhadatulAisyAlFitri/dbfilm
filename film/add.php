<?php
include("../controllers/Film.php");
include("../lib/functions.php");
$obj = new FilmController();
$msg=null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $kode_film = $_POST['kode_film'];
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $harga = $_POST['harga'];
    // Insert the database record using your controller's method
$dat = $obj->addfilm($kode_film, $judul, $genre, $tahun_rilis, $harga);
$msg = getJSON($dat);
}
$theme=setTheme();
getHeader($theme);
?>

<?php 
if($msg===true){ 
    echo '<div class="alert alert-success" style="display: block" id="message_success">Insert Data Berhasil</div>';
    echo '<meta http-equiv="refresh" content="2;url='.base_url().'film/">';
} elseif($msg===false) {
    echo '<div class="alert alert-danger" style="display: block" id="message_error">Insert Gagal</div>'; 
} else {

}

?>
        <div class="header icon-and-heading fs-1">
        <i class="zmdi zmdi-view-dashboard zmdi-hc-4x"></i>
            <h2><strong>film</strong> <small>Add New Data</small> </h2>
        </div>
        <hr/>
        <form name="formAdd" method="POST" action="">
            
                <div class="form-group">
                    <label>Kode_film:</label>
                    <input type="text" class="form-control" name="kode_film"  />
                </div>
            
                <div class="form-group">
                    <label>Judul:</label>
                    <input type="text" class="form-control" name="judul"  />
                </div>
            
                <div class="form-group">
                    <label>genre:</label>
                    <select id="genre" name="genre" style="width:150px" class="form-control">
                        <option value="">--pilih--</option>
                        <option value="Action">Action</option><option value="Comedy">Comedy</option><option value="Drama">Drama</option><option value="Horror">Horror</option><option value="Romance">Romance</option><option value="Sci-Fi">Sci-Fi</option><option value="Thriller">Thriller</option><option value="Fantasy">Fantasy</option><option value="Documentary">Documentary</option><option value="Adventure">Adventure</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <label>Tahun_rilis:</label>
                    <input type="text" class="form-control" name="tahun_rilis"  />
                </div>
            
                <div class="form-group">
                    <label>Harga:</label>
                    <input type="text" class="form-control" name="harga"  />
                </div>
            
            <button class="save btn btn-large btn-info" type="submit">Save</button>
            <a href="#index" class="btn btn-large btn-default">Cancel</a>
        </form>

<?php
getFooter($theme,"<script src='../lib/forms.js'></script>");
?>
</body>
</html>
