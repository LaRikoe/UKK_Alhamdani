<h1 class="display-5 mt-4 text-center">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
       <form method="post">
    <?php
    $id = $_GET['id'];    
    if(isset($_POST['submit'])){
        $id_buku = $_POST['id_buku'];
        $id_user = $_SESSION['user']['id_user'];
        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
        $status_peminjaman = $_POST['status_peminjaman']; // nama variabel sudah diperbaiki
        $query = mysqli_query($koneksi, "UPDATE peminjaman set id_buku='$id_buku', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman' WHERE id_peminjaman=$id");
    
        if ($query) {
            echo '<script>alert("Change data successfully."); location.href="?page=buku"</script>';
            # code...
        }  else {
            echo '<script>alert("Change data failed!!!.");"</script>';
        }
    }    
    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman where id_peminjaman=$id");
    $data = mysqli_fetch_array($query);
    ?>


        <div class="row">
            <div class="col-md-2">Buku</div>
            <div class="col-md-8 mb-4">
                <select name="id_buku" class="form-control">
                <?php 
                    $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                    while($buku = mysqli_fetch_array($buk)) {
                        ?>
                        <option <?php if($buku['id_buku'] == $data['id_buku']) echo 'selected'; ?> value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                        <?php
                    }                
                ?>
                </select>
            
            
        </div>

        <div class="row">
            <div class="col-md-2">Tanggal Peminjaman</div>
            <div class="col-md-8 mb-4">
               <input type="date" class="form-control" value="<?php echo $data['tanggal_peminjaman']; ?>" name="tangggal_peminjaman">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">Tanggal Pengembalian</div>
            <div class="col-md-8 mb-4">
               <input type="date" class="form-control" value="<?php echo $data['tanggal_pengembalian']; ?>" name="tangggal_pengembalian">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">Status Peminjaman</div>
            <div class="col-md-8 mb-4">
               <select name="status_peminjamana" class="form-control">
               <option value="dipinjam" <?php if($buku['status_peminjaman'] == 'dipinjam') echo 'selected'; ?>>Dipinjam</option>
               <option value="dikembalikan" <?php if($buku['status_peminjaman'] == 'dikembalikan') echo 'selected'; ?>>Dikembalikan</option>
               </select>
            </div>
        </div>
       </form>

    </div>
</div>
    </div>
</div>