<?php
include("../controllers/Film.php");
include("../lib/functions.php");
$obj = new FilmController();
$rows = $obj->getfilmList();
$theme = setTheme();
getHeader($theme);
?>

<div class="header icon-and-heading">
<i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
<h2><strong>film</strong> <small>List All Data</small> </h2>
</div>
<hr style="margin-bottom:-2px;"/>
<a style="margin:10px 0px;" class="btn btn-large btn-info" href="add.php"><i class="fa fa-plus"></i> Create New Data</a>
<a style="margin:10px 0px;" class="btn btn-large btn-danger" href="cetak.php"><i class="fa fa-print"></i> Cetak PDF</a>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>id</th>
<th>kode_film</th>
<th>judul</th>
<th>genre</th>
<th>tahun_rilis</th>
<th>harga</th>
            <th width="140">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rows as $row){ ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
<td><?php echo $row["kode_film"]; ?></td>
<td><?php echo $row["judul"]; ?></td>
<td><?php echo $row["genre"]; ?></td>
<td><?php echo $row["tahun_rilis"]; ?></td>
<td><?php echo $row["harga"]; ?></td>
            <td class="text-center" width="200">
                <a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $row['id']; ?>">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $row['id']; ?>">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php
getFooter($theme, "");
?>
