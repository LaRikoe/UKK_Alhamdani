<h1 class="display-5 mt-4 text-center">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="card">
    <div class="card-body">
<div class="rows">
    <div class="col-md-12">
        <a href="?page=peminjaman_tambah"  class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Peminjaman</a><br>
        <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status Peminjaman</th>
            </tr>
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on peminjaman.id_buku = peminjaman.id_buku WHERE peminjaman.id_user=" . $_SESSION['user']['id_user'] );
                while($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['tanggal_peminjaman']; ?></td>
                <td><?php echo $data['tanggal_pengembalian']; ?></td>
                <td><?php echo $data['status_peminjaman']; ?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
</div>
    </div>
</div>
    </div>
</div>