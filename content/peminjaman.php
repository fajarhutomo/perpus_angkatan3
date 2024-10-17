<?php
$query = mysqli_query($koneksi, "SELECT anggota.nama_anggota, peminjaman.* FROM peminjaman LEFT JOIN anggota on anggota.id = peminjaman.id_anggota ORDER BY id Desc")
?>


<div class="container">
    <div class="row-sm-12">
        <fieldset class="border border-black border-2 p-3">
            <legend class="float-none w-auto px-3">Data Peminjaman</legend>
            <div class="box mt-5">
                <!-- <div class="box-title">Table Buku</div> -->
                <div align="right">
                    <a href="?pg=tambah-peminjaman" class="btn btn-primary">Tambah</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered border-dark ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Anggota</th>
                                <th scope="col">No Peminjaman</th>
                                <th scope="col">Tanggal Peminjaman</th>
                                <th scope="col">Tanggal Pengembalian</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($query)):

                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nama_anggota'] ?></td>
                                    <td><?php echo $row['no_peminjaman'] ?></td>
                                    <td><?php echo $row['tgl_peminjaman'] ?></td>
                                    <td><?php echo $row['tgl_pengembalian'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                        <a href="?pg=tambah-peminjaman&detail=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">Detail

                                        </a> |
                                        <a href="?pg=tambah-peminjaman&delete=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda akan menghapus data ini ??')">
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