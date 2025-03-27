<?php
include("../controllers/Sewa.php");
include("../controllers/Sewadetail.php");
include("../lib/functions.php");

$obj = new SewaController();
$detail = new SewadetailController();
$rows = $obj->getSewaList();
$theme = setTheme();
getHeader($theme);
?>

<div class="header icon-and-heading">
    <i class="zmdi zmdi-view-dashboard zmdi-hc-4x custom-icon"></i>
    <h2><strong>Sewa</strong> <small>List All Data</small></h2>
</div>
<hr style="margin-bottom:-2px;"/>
<a style="margin:10px 0px;" class="btn btn-large btn-info" href="add.php"><i class="fa fa-plus"></i> Create New Data</a>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="30">id</th>
            <th width="50">kode_sewa</th>
            <th width="50">nomor_pelanggan</th>
            <th>Nama</th>
            <th width="150">Tanggal Sewa</th>
            <th width="50">Total Sewa</th>
            <th width="150">Tanggal Kembali</th>
            <th width="140">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($rows as $row){
                $total= $detail->countSewaDetail($row['id']);
            ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["kode_sewa"]; ?></td>
            <td><?php echo $row["nomor_pelanggan"]; ?></td>
            <td><?php echo $row["nama"]; ?></td>
            <td><?php echo $row["tanggal_sewa"]; ?></td>
            <td><?php echo $total; ?></td>
            <td><?php echo $row["tanggal_kembali"]; ?></td>
            <td class="text-center" width="200">
                <?php if($total == 0){ ?>
                    <a class="btn btn-warning btn-sm" href="edit.php?id=<?php echo $row['id']; ?>">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a class="btn btn-success btn-sm" href="detail.php?id=<?php echo $row['id']; ?>">
                        <i class="fa fa-briefcase"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $row['id']; ?>">
                        <i class="fa fa-trash"></i>
                    </a>
                <?php } else { 
                    if($row["tanggal_kembali"] == "0000-00-00"){
                        if($row['disewa'] == 1){
                    ?>
                        <a class="btn btn-warning btn-sm" href="detail.php?id=<?php echo $row['id']; ?>">
                            <i class="fa fa-paper-plane"></i>
                        </a>
                    <?php } else { ?>
                        <a class="btn btn-success btn-sm" href="detail.php?id=<?php echo $row['id']; ?>">
                            <i class="fa fa-briefcase"></i>
                        </a>
                    <?php } ?>
                <?php } else { ?>
                    <a class="btn btn-info btn-sm" href="detail.php?id=<?php echo $row['id']; ?>">
                        <i class="fa fa-eye"></i>
                    </a>
                <?php 
                    }
                }
                ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php
getFooter($theme, "");
?>
