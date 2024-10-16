<?php
$kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id Desc")
?>


<div class="container">
    <div class="row-sm-12">
        <fieldset class="border border-black border-2 p-3">
            <legend class="float-none w-auto px-3">Data Kategori</legend>
            <div class="box mt-5">
                <div class="box-title">Table Anggota</div>
                <div align="right">
                    <a href="?pg=tambah-kategori" class="btn btn-primary">Tambah kategori</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered border-dark ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kategori</th>                                
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($rowKategori = mysqli_fetch_assoc($kategori)):

                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rowKategori['nama_kategori'] ?></td>                                    
                                    <td>
                                        <a href="?pg=tambah-kategori&edit=<?php echo $rowKategori['id'] ?>" class="btn btn-success btn-sm">Edit

                                        </a> |
                                        <a href="?pg=tambah-kategori&delete=<?php echo $rowKategori['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda akan menghapus data ini ??')">
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