<div class="container-fluid">
    <h4><?= $judul ?></h4>
    <div class="row">
        <?php if (empty($barang)): ?>
            <div class="col-12">
                <p>Tidak ada produk dalam kategori ini.</p>
            </div>
        <?php else: ?>
            <?php 
                // Membuat nama folder kategori sesuai struktur folder gambarmu
                $folderKategori = strtolower(str_replace(' & ', '_', $judul)); 
            ?>
            <?php foreach ($barang as $brg): ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img 
                            src="<?= base_url('assets/img/Produk Platform/' . esc($brg['kategori']) . '/' . esc($brg['gambar'])) ?>" 
                            class="card-img-top" 
                            alt="<?= esc($brg['nama_produk']) ?>"
                            style="object-fit: cover; height: 250px;"
                            >
                        <div class="card-body">
                            <h5 class="card-title"><?= $brg['nama_produk'] ?></h5>
                            <p class="card-text">Rp<?= number_format($brg['harga'], 0, ',', '.') ?></p>
                            <a href="<?= base_url('dasboard/tambah_ke_keranjang/' . $brg['product_id']) ?>" class="btn btn-primary btn-sm">Tambah ke Keranjang</a>
                            <a href="<?= base_url('dasboard/detail/' . $brg['product_id']) ?>" class="btn btn-success btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

