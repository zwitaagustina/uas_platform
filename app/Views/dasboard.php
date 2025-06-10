<div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="<?= base_url('assets/img/carousel1.jpg') ?>" class="d-block w-100" alt="...">
        </div>   
        <div class="carousel-item">
        <img src="<?= base_url('assets/img/carousel2.jpg') ?>" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

  <div class="row text-center mt-4">

  <?php if (!empty($barang)) : ?>
    <?php foreach ($barang as $brg) : ?>
      <div class="col-md-4 col-sm-6 mb-4">
        <div class="card h-100">
          <img 
            src="<?= base_url('assets/img/Produk Platform/' . esc($brg['kategori']) . '/' . esc($brg['gambar'])) ?>" 
            class="card-img-top" 
            alt="<?= esc($brg['nama_produk']) ?>"
            style="object-fit: cover; height: 250px;"
          >
          <div class="card-body">
            <h5 class="card-title"><?= esc($brg['nama_produk']) ?></h5>
            <p class="card-text"><?= esc($brg['deskripsi']) ?></p>
            <p class="card-text"><strong>Harga:</strong> Rp <?= number_format($brg['harga'], 0, ',', '.') ?></p>
            <a href="<?= base_url('dasboard/detail/' . $brg['product_id']) ?>" class="btn btn-primary">Lihat Detail</a>
            <a href="<?= base_url('dasboard/tambah_ke_keranjang/' . $brg['product_id']) ?>" class="btn btn-sm btn-success">Tambah ke Keranjang</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else : ?>
  <p class="text-center mt-4">Tidak ada produk yang tersedia saat ini.</p>
<?php endif; ?>
  </div>
</div>