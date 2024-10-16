<?php
if (isset($_POST['tambah'])) {
    $nama_buku = $_POST['nama_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $pengarang = $_POST['pengarang'];
    $id_category = $_POST['id_category'];


    // sql = struktur query languange atau DDL = data manipulation language
    # code...

    $insert = mysqli_query($koneksi, "INSERT INTO buku (nama_buku, penerbit, tahun_terbit, pengarang, id_category) VALUES ('$nama_buku','$penerbit','$tahun_terbit','$pengarang','$id_category')");
    header("location:?pg=buku&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$edibuku = mysqli_query($koneksi, "SELECT * FROM buku WHERE ID = '$id'");
$rowEdit = mysqli_fetch_assoc($edibuku);

if (isset($_POST['edit'])) {
    $nama_buku = $_POST['nama_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $pengarang = $_POST['pengarang'];
    $id_category = $_POST['id_category'];


    //ubah user kolom apa yang mau diubah (SET), yang mau diubah id ke berapa
    $update = mysqli_query($koneksi, "UPDATE buku SET nama_buku='$nama_buku', penerbit='$penerbit', tahun_terbit='$tahun_terbit', pengarang='$pengarang', id_category='$id_category' WHERE id='$id'");
    header("location:?pg=buku&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM buku WHERE id='$id'");
    header("location:?pg=buku&hapus=berhasil");
}

$queryBuku = mysqli_query($koneksi, "SELECT * FROM buku");


?>


<div class="container">
    <div class="row-sm-12">
        <fieldset class="border border-black border-2 p-3">
            <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Buku</legend>
            <div class="box mt-5">
                <div class="box-title"></div>
            <form action="" method="post">
                <div class="mb-3 row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="" class="form-label">No Peminjaman</label>
                            <input type="text" class="form-control" name="no_peminjaman" value="" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" name="tgl_peminjaman" value="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Buku</label>
                            <select name="" id="id_buku" class="form-control">
                                <option value="">Pilih Buku</option>
                                <!-- ambil data buku dari dari table buku -->
                                 <?php while ($rowBuku = mysqli_fetch_assoc($queryBuku)):?>
                                    <option value="<?php echo $rowBuku['id']?>">
                                        <?php echo $rowBuku['nama_buku'];?>
                                    </option>
                                <?php endwhile ?>
                            </select>
                        </div>
                    </div>                  
                    
                    <div class="col-sm-4">
                        <div class="mb-3">
                                <label for="" class="form-label">Nama Anggota</label>
                                <select name="id_anggota" id="" class="form-control">
                                    <option value=""></option>
                                </select>                            
                        </div>
                        <div class="mb-3">
                                <label for="" class="form-label">Tanggal pengembalian</label>
                                <input type="date" class="form-control" name="tgl_pengembalian" value="">
                        </div>
                    </div>
                </div>
                <div align="right" class="mb-3">
                    <button type="button" id="add-row" class="btn btn-primary">Tambah Row</button>
                </div>
                <table id="table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Buku</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-row">


                    </tbody>
                </table> 
            </form>



    </div>
    </fieldset>
</div>
</div>