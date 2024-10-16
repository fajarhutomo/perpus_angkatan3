<?php
$level = mysqli_query($koneksi, "SELECT * FROM nama_level ORDER BY id Desc")
?>


<div class="container">
    <div class="row-sm-12">
        <fieldset class="border border-black border-2 p-3">
            <legend class="float-none w-auto px-3">Level</legend>
            <div class="box mt-5">
                <div class="box-title">Table Level</div>
                <div align="right">
                    <a href="?pg=tambah-level" class="btn btn-primary">Tambah Level</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered border-dark ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama level</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($level)):
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nama_level'] ?></td>
                                    <td>
                                        <a href="?pg=tambah-level&edit=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">Edit
                                        </a> |
                                        <a href="?pg=tambah-level&delete=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda akan menghapus data ini ??')">
                                            Delete
                                        </a>


                                    </td>

                                    <!-- <td>
                                        <button type="button" class="btn btn-danger icon-button">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td> -->

                                </tr>
                            <?php endwhile ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </fieldset>
    </div>
</div>