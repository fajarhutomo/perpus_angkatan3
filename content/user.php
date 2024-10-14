<?php
$user = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id Desc")
?>


<div class="container">
    <div class="row-sm-12">
        <fieldset class="border border-black border-2 p-3">
            <legend class="float-none w-auto px-3">Data</legend>
            <div class="box mt-5">
                <div class="box-title">Table Anggota</div>

                <div align ="right">
                    <a href="?pg=tambah-user" class="btn btn-primary">Tambah Data</a>
                </div>

                <!-- <div class="div mt-3 mb-4">
                    <button type="button" class="btn" style="background-color: #bee1fa;">ADD</button>
                    <button type="button" class="btn" style="background-color: #bee1fa;">RECYCLE</button>
                </div> -->

                <div class="table-responsive">

                    <table class="table table-bordered border-dark ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">TLP</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">Email</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($rowUser = mysqli_fetch_assoc($user)):
    
                            ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $rowUser['HP'] ?></td>
                                    <td><?php echo $rowUser['Nama'] ?> </td>
                                    <td><?php echo $rowUser['email'] ?> </td>
                                    <td><?php echo $rowUser['Jenis_Kelamin'] ?> </td>
                                    <td>
                                        <a href="?pg=tambah-user&edit=<?php echo $rowUser['ID']?>" class="btn btn-success btn-sm">Edit

                                        </a> |
                                        <a href="?pg=tambah-user&delete=<?php echo $rowUser['ID']?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda akan menghapus data ini ??')">
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