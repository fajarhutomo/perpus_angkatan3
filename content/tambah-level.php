<?php
if (isset($_POST['tambah'])) {
    $nama_level = $_POST['nama_level'];
    
    // sql = struktur query languange atau DDL = data manipulation language
    # code...

    $insert = mysqli_query($koneksi, "INSERT INTO nama_level (nama_level) VALUES ('$nama_level')");
    header("location:?pg=level&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editlevel = mysqli_query($koneksi, "SELECT * FROM nama_level WHERE id = '$id'");
$rowEdit = mysqli_fetch_assoc($editlevel);

if (isset($_POST['edit'])) {
    $nama_level = $_POST['nama_level']; //ambil inputan dari user
    
    //ubah user kolom apa yang mau diubah (SET), yang mau diubah id ke berapa
    $update = mysqli_query($koneksi, "UPDATE nama_level SET nama_level='$nama_level' WHERE id='$id'");
    header("location:?pg=level&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM nama_level WHERE id='$id'");
    header("location:?pg=level&hapus=berhasil");
}


?>


<div class="container">
    <div class="row-sm-12">
        <fieldset class="border border-black border-2 p-3">
            <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Level</legend>
            <div class="box mt-5">
                <div class="box-title"></div>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="formk-label">Level</label>
                        <input type="text" class="form-control" name="nama_level" placeholder="masukan level" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_level'] : '' ?>">
                    </div>
            </div>
            <div class="mb-3">
                <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Simpan</button>
            </div>
            </form>

    </div>
    </fieldset>
</div>
</div>