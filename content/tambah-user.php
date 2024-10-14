<?php
if (isset($_POST['tambah'])) {
    $nama = $_POST['Nama'];
    $email = $_POST['email'];
    $password = isset($_POST['password']) ? sha1($_POST['password']) : $rowEdit['password'];
    $jenis_kelamin = $_POST['Jenis_Kelamin'];
    $hp = $_POST['HP'];

    // sql = struktur query languange atau DDL = data manipulation language
    # code...

    $insert = mysqli_query($koneksi, "INSERT INTO user (Nama, email, password, Jenis_Kelamin, HP) VALUES ('$nama','$email','$password','$jenis_kelamin','$hp')");
    header("location:?pg=user&tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$editUser = mysqli_query ($koneksi, "SELECT * FROM user WHERE ID = '$id'" );
$rowEdit = mysqli_fetch_assoc($editUser);

if (isset($_POST['edit'])) {
    $nama = $_POST['Nama'];
    $email = $_POST['email'];
    if ($_POST['password']) {$password = sha1($_POST['password']);
    }else {
        $password = $rowEdit['password'];
    }

    //
    $jenis_kelamin = $_POST['Jenis_Kelamin'];
    $hp = $_POST['HP'];

    //ubah user kolom apa yang mau diubah (SET), yang mau diubah id ke berapa
    $update = mysqli_query($koneksi, "UPDATE user SET Nama='$nama', email='$email', password='$password', Jenis_Kelamin='$jenis_kelamin', HP='$hp' WHERE ID='$id'");
    header("location:?pg=user&ubah=berhasil");

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE ID='$id'");
    header("location:?pg=user&hapus=berhasil");
}


?>


<div class="container">
    <div class="row-sm-12">
        <fieldset class="border border-black border-2 p-3">
            <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah'?> User</legend>
            <div class="box mt-5">
                <div class="box-title"></div>


                <!-- <div class="div mt-3 mb-4">
                    <button type="button" class="btn" style="background-color: #bee1fa;">ADD</button>
                    <button type="button" class="btn" style="background-color: #bee1fa;">RECYCLE</button>
                </div> -->
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="formk-label">Nama</label>
                        <input type="text" class="form-control" name="Nama" placeholder="masukan nama anda" value="<?php echo isset($_GET['edit'])? $rowEdit['Nama'] : ''?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="formk-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="masukan email anda" value="<?php echo isset($_GET['edit'])? $rowEdit['email'] : ''?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="formk-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="masukan password anda">
                    </div>
                    <div class="mb-3">
                        <label for="" class="formk-label">Jenis Kelamin</label> <br>
                        <input type="radio" name="Jenis_Kelamin" value="Laki-Laki" <?php echo isset($_GET['edit'])? ($rowEdit['Jenis_Kelamin'] == 'Laki-Laki' ? 'checked' : ''):''?>>Laki-Laki <br>
                        <input type="radio" name="Jenis_Kelamin" value="Perempuan" <?php echo isset($_GET['edit'])? ($rowEdit['Jenis_Kelamin'] == 'Perempuan' ? 'checked' : ''):''?>> Perempuan
                    </div>
                    <div class="mb-3">
                        <label for="" class="formk-label">HP</label>
                        <input type="number" class="form-control" name="HP" placeholder="masukan HP anda" value="<?php echo isset($_GET['edit'])? $rowEdit['HP'] : ''?>">
                    </div>
                    <div class="mb-3">
                        <button name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah'?>" class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>

            </div>
        </fieldset>
    </div>
</div>