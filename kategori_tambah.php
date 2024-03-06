<h1 class="display-5 mt-4 text-center">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="rows">
    <div class="col-md-12">
        <form method="post">
        <?php
            if(isset($_POST['submit'])) {
                $kategori = $_POST['kategori'];
                $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) values('$kategori')");

                if($query) {
                    echo '<script>alert("Added data successfully.");</script>';
                }else{
                    echo '<script>alert("Added data failed!");</script>';
                }
            }
        ?>
            <div class="rows mb-3">
                <div class="col-md-4">Nama Kategori</div>
                <div class="col-md-8-right"><input type="text" class="form-control" name="kategori"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <br>
            <button type="submit" class="btn btn-info" name="submit" value="submit">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <a href="?page=kategori" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
    </div>
</div>