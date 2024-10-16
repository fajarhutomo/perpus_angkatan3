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

$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");


?>


<div class="container">
    <div class="row-sm-12">
        <fieldset class="border border-black border-2 p-3">
            <legend class="float-none w-auto px-3"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Buku</legend>
            <div class="box mt-5">
                <div class="box-title"></div>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="formk-label">Nama Kategori</label>
                        <select name="id_category" id="" class="form-control">
                            <option value="">Pilih Kategori</option>
                            
                            <!-- option yang datanya diambil dari table kategori -->
                             <?php while ($rowKategori = mysqli_fetch_assoc($queryKategori)):?>
                            <option <?php echo isset($_GET['edit']) ? ($rowKategori['id'] == $rowEdit['id_category'] ? 'selected ':'') : ''?>value="<?php echo $rowKategori['id']?>"><?php echo $rowKategori['nama_kategori']?></option>
                            <?php endwhile?>
                        </select>
                            

                    </div>
                    <div class="mb-3">
                        <label for="" class="formk-label">Nama Buku</label>
                        <input type="text" class="form-control" name="nama_buku" placeholder="masukan nama buku" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_buku'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="formk-label">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" placeholder="masukan nama penerbit" value="<?php echo isset($_GET['edit']) ? $rowEdit['penerbit'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="formk-label">Tahun Terbit</label>
                        <input type="text" class="form-control" name="tahun_terbit" placeholder="masukan tahun penerbit" value="<?php echo isset($_GET['edit']) ? $rowEdit['tahun_terbit'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="formk-label">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" placeholder="masukan nama pengarang" value="<?php echo isset($_GET['edit']) ? $rowEdit['pengarang'] : '' ?>">
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