<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                <?php
// Periksa jika tombol submit telah ditekan
if(isset($_POST['submit'])){
    // Pastikan variabel koneksi sudah didefinisikan
    // Ganti nama host, nama pengguna, kata sandi, dan nama database sesuai dengan konfigurasi Anda
    $koneksi = mysqli_connect("localhost", "root", "", "alhamdani_ukk");

    // Periksa koneksi database
    if(mysqli_connect_errno()){
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }

    // Ambil nilai dari form
    $id_buku = mysqli_real_escape_string($koneksi, $_POST['id_buku']);
    $id_user = mysqli_real_escape_string($koneksi, $_SESSION['user']['id_user']);
    $tanggal_peminjaman = mysqli_real_escape_string($koneksi, $_POST['tanggal_peminjaman']);
    $tanggal_pengembalian = mysqli_real_escape_string($koneksi, $_POST['tanggal_pengembalian']);
    $status_peminjaman = mysqli_real_escape_string($koneksi, $_POST['status_peminjaman']); // Sudah diperbaiki

    // Lakukan penambahan data ke database
    $query = mysqli_query($koneksi, "INSERT INTO peminjaman (id_buku, id_user, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman) VALUES ('$id_buku', '$id_user', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')");

    // Periksa apakah penambahan data berhasil atau tidak
    if ($query) {
        echo '<script>alert("Data berhasil ditambahkan."); location.href="?page=home"</script>';
    } else {
        echo '<script>alert("Gagal menambahkan data.");</script>';
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>

                    
                    <div class="row">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-8 mb-4">
                            <select name="id_buku" class="form-control">
                                <?php 
                                $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                while($buku = mysqli_fetch_array($buk)) {
                                    ?>
                                    <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                                    <?php
                                }                
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">Tanggal Peminjaman</div>
                        <div class="col-md-8 mb-4">
                            <input type="date" class="form-control" name="tanggal_peminjaman">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Tanggal Pengembalian</div>
                        <div class="col-md-8 mb-4">
                            <input type="date" class="form-control" name="tanggal_pengembalian">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Status Peminjaman</div>
                        <div class="col-md-8 mb-4">
                            <select name="status_peminjaman" class="form-control"> <!-- Sudah diperbaiki -->
                                <option value="dipinjam">Dipinjam</option>
                                <option value="dikembalikan">Dikembalikan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 mb-4">
                            <button type="submit" class="btn btn-primary" name="submit">Simpan</button> <!-- Hapus value="submit" -->
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=peminjaman" class="btn btn-danger">Kembali</a> <!-- Sudah diperbaiki -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
