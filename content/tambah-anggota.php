<?php
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_anggota'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    

    // sql = struktur query languange atau DDL = data manipulation language
    # code...

    $insert = mysqli_query($koneksi, "INSERT INTO anggota (nama_anggota, hp, email, alamat) VALUES ('$nama','$hp','$email','$alamat')");
    header("location:?pg=anggota&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editAnggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE ID = '$id'");
$rowEdit = mysqli_fetch_assoc($editAnggota);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama_anggota'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    //ubah user kolom apa yang mau diubah (SET), yang mau diubah id ke berapa
    $update = mysqli_query($koneksi, "UPDATE anggota SET nama_anggota='$nama', hp='$hp', email='$email', alamat='$alamat' WHERE ID='$id'");
    header("location:?pg=anggota&ubah=berhasil");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM anggota WHERE ID='$id'");
    header("location:?pg=anggota&hapus=berhasil");
}


?>


<div class="container">
    <div class="row-sm-12">
        <fieldset class="border border-black border-2 p-3">
            <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Anggota</legend>
            <div class="box mt-5">
                <div class="box-title"></div>


                <!-- <div class="div mt-3 mb-4">
                    <button type="button" class="btn" style="background-color: #bee1fa;">ADD</button>
                    <button type="button" class="btn" style="background-color: #bee1fa;">RECYCLE</button>
                </div> -->
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="formk-label">Nama Anggota</label>
                        <input type="text" class="form-control" name="nama_anggota" placeholder="masukan nama anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_anggota'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="formk-label">HP</label>
                        <input type="number" class="form-control" name="hp" placeholder="masukan hp anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['hp'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="formk-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="masukan email anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                    </div>                    
                    <div class="mb-3">
                        <label for="" class="formk-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="masukan alamat anda" value="<?php echo isset($_GET['edit']) ? $rowEdit['alamat'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>

            </div>
        </fieldset>
    </div>
</div>