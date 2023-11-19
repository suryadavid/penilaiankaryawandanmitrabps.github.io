<?php 

  if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $sql = "DELETE from mitra where NIP='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {
      echo "<script>alert('Data berhasil dihapus!');window.location.href='index.php?p=mitra&ta=$ta'</script>";
    } else {
      echo mysqli_error($con);
    }
  }

 ?>

<div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data mitra </h3><h3 class="box-title pull-right"><a href="?p=mitra&act=create" class="btn btn-success"><i class="fa fa-user"></i> Tambah Data mitra</a></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>NIP</th>
              <th>Nama mitra</th>
              <th>Jabatan</th>

              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            	<?php 
            		$sql = "select * from mitra";
            		$query = mysqli_query($con, $sql);
            		while ($row = mysqli_fetch_assoc($query)):
                  $jabat=mysqli_query($con,"SELECT * from jabatan where id='$row[Jabatan]'");
                  $jab=mysqli_fetch_array($jabat);
            	 ?>
            	 <tr>
            	 	<td><?= $row['NIP'] ?></td>
            	 	<td><?= $row['nama_mitra'] ?></td>
                <td><?= $jab['nama_jabatan'] ?></td>
                <td>
                  <a href="index.php?p=mitra&act=edit&id=<?= $row['NIP'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                  <a href="index.php?p=mitra&delete&id=<?= $row['NIP'] ?>" class="btn btn-danger" onclick="return confirm('Apakah data akan dihapus?')"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            	 </tr>
            	<?php endwhile; ?>
            </tbody>
            <tfoot>
            <tr>
              <th colspan="3">Index mitra May Various</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
