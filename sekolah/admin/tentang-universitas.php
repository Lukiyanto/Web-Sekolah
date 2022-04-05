<?php include 'header.php' ?>

    <!-- content -->
    <div class="content">

        <div class="container">

            <div class="box">

                <div class="box-header">
                    Tentang Universitas
                </div>

                <div class="box-body">

                    <?php
                        if(isset($_GET['success'])){
                            echo "<div class='alert alert-success'>".$_GET['success']."</div>";
                        }
                    ?>

                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Tentang Universitas</label>
                            <textarea name="tentang" id="keterangan" placeholder="Tentang Universitas" class="input-control"><?= $d->tentang_universitas ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Foto Universitas</label>
                            <img src="../uploads/identitas/<?= $d->foto_universitas ?>" width="200px" class="image">
                            <input type="hidden" name="foto_lama" value="<?= $d->foto_universitas ?>">
                            <input type="file" name="foto_baru" class="input-control">
                        </div>

                        <input type="submit" name="submit" value="Simpan Perubahan" class="button button-green">
                    </form>

                    <?php 
                    
                        if(isset($_POST['submit'])){

                            $tentang     = addslashes($_POST['tentang']);
                            $currdate   = date('Y-m-d H:i:s');

                            // menampung dan validasi data foto universitas

                            if($_FILES['foto_baru']['name'] != ''){

                                $filename   = $_FILES['foto_baru']['name'];
                                $tmpname    = $_FILES['foto_baru']['tmp_name'];
                                $filesize   = $_FILES['foto_baru']['size'];

                                $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                                $rename     = 'universitas'.time().'.' .$formatfile;

                                $allowedtype = array('png', 'jpg', 'jpeg', 'gif');

                                if(!in_array($formatfile, $allowedtype)) {
                                
                                    echo '<div class="alert alert-error">Format file foto universitas tidak diizinkan.</div>';
                                
                                    return false;

                                }elseif($filesize > 2000000) {

                                    echo '<div class="alert alert-error">Ukuran file foto universitas max. 1 MB.</div>';
    
                                    return false;

                                }else{

                                    if(file_exists("../uploads/identitas/".$_POST['foto_lama'])){

                                        unlink("../uploads/identitas/".$_POST['foto_lama']);
                                    }

                                    move_uploaded_file($tmpname, "../uploads/identitas/".$rename);

                                }
   
                            }else{

                                $rename     = $_POST['foto_lama'];

                            }

                            $update = mysqli_query($koneksi, "UPDATE pengaturan SET
                                    tentang_universitas = '".$tentang."',
                                    foto_universitas    = '".$rename."',
                                    updated_at      = '".$currdate."'
                                    WHERE id        = '".$d->id."'
                                ");

                            if($update){
                                echo "<script>window.location='tentang-universitas.php?success=Edit Data Berhasil'</script>";
                            }else{
                                echo 'Edit Data Gagal'.mysqli_error($koneksi);
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php' ?>