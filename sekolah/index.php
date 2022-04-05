    <?php include 'header.php' ?>

    <!-- bagian banner -->
    <div class="banner" style="background-image: url('uploads/identitas/<?= $d->foto_universitas ?>');">
        <div class="banner-text">
            <div class="container">
                <h3>Selamat Datang di Website <?= $d->nama ?></h3>
                <p>Universitas yang mengedepankan sains dan teknologi melalui penelitian dan pengabdian masyarakat sesuai kebutuhannya.</p>
            </div>
        </div>
    </div>

    <!-- bagian sambutan -->
    <div class="section">
        
        <div class="container text-center">
            <h3>Sambutan Rektor</h3>
            <img src="uploads/identitas/<?= $d->foto_rektor ?>" width="150px">
            <h4><?= $d->nama_rektor ?></h4>
            <p><?= $d->sambutan_rektor ?></p>
        </div>

    </div>

    <!-- bagian sambutan -->
    <div class="section" id="jurusan">
        
        <div class="container text-center">
            <h3>Jurusan</h3>

            <?php
                $jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan ORDER BY id DESC");
                if(mysqli_num_rows($jurusan) > 0){
                    while($j = mysqli_fetch_array($jurusan)){
            ?>

                <div class="col-4">
                    <a href="detail-jurusan.php?id=<?= $j['id'] ?> " class="thumbnail-link">
                    <div class="thumbnail-box">
                        <div class="thumbnail-img" style="background-image: url('uploads/jurusan/<?= $j['gambar'] ?> ');">
                            
                        </div>
                        <div class="thumbnail-text">
                            <?= $j['nama'] ?>
                        </div>
                    </div>
                    </a>
                </div>

            <?php }}else{ ?>

                Tidak ada data
            
            <?php } ?>

        </div>
    </div>
    <div class="section">
        
        <div class="container text-center">
            <h3>Informasi Terbaru</h3>

            <?php
                $informasi = mysqli_query($koneksi, "SELECT * FROM informasi ORDER BY id DESC LIMIT 8");
                if(mysqli_num_rows($informasi) > 0){
                    while($p = mysqli_fetch_array($informasi)){
            ?>

                <div class="col-4">
                    <a href="detail-informasi.php?id=<?= $p['id'] ?>" class="thumbnail-link">
                    <div class="thumbnail-box">
                        <div class="thumbnail-img" style="background-image: url('uploads/informasi/<?= $p['gambar'] ?> ');">
                            
                        </div>
                        <div class="thumbnail-text">
                            <?= substr($p['judul'], 0, 50) ?>
                        </div>
                    </div>
                    </a>
                </div>

            <?php }}else{ ?>

                Tidak ada data
            
            <?php } ?>
        </div>
    </div>
    <div class="section" id="galeri">
        
        <div class="container text-center">
            <h3>Galeri</h3>

            <?php
                $galeri = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id DESC LIMIT 8");
                if(mysqli_num_rows($galeri) > 0){
                    while($s = mysqli_fetch_array($galeri)){
            ?>

                <div class="col-4">
                    <a href="detail-galeri.php?id=<?= $s['id'] ?>" class="thumbnail-link">
                    <div class="thumbnail-box">
                        <div class="thumbnail-img" style="background-image: url('uploads/galeri/<?= $s['foto'] ?> ');">
                            
                        </div>
                        <div class="thumbnail-text">
                            <?= substr($s['keterangan'], 0, 50) ?>
                        </div>
                    </div>
                    </a>
                </div>

            <?php }}else{ ?>

                Tidak ada data
            
            <?php } ?>
        </div>
    </div>
    
    <?php include 'footer.php' ?>