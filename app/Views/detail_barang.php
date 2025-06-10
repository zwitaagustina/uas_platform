<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Detail Produk</h5>
        <div class="card-body">
            <div class="row">
                <!-- Gambar Produk -->
                <div class="col-md-4"> 
                    <img src="<?= base_url('assets/img/Produk Platform/' . esc($barang['kategori']) . '/' . esc($barang['gambar'])) ?>" 
                         class="card-img-top" 
                         alt="<?= esc($barang['nama_produk']) ?>">
                </div>

                <!-- Informasi Produk -->
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>Nama Produk</td>
                            <td><strong><?= esc($barang['nama_produk']) ?></strong></td>
                        </tr>
                        <tr>
                            <td>Deskripsi Produk</td>
                            <td><strong><?= esc($barang['deskripsi']) ?></strong></td>
                        </tr>
                        <tr>
                            <td>Kategori Produk</td>
                            <td><strong><?= esc($barang['kategori']) ?></strong></td>
                        </tr>
                        <tr>
                            <td>Stok Produk</td>
                            <td><strong><?= esc($barang['stok']) ?></strong></td>
                        </tr>
                        <tr>
                            <td>Harga Produk</td>
                            <td><strong>Rp <?= number_format($barang['harga'], 0, ',', '.') ?></strong></td>
                        </tr>
                    </table>

                    <!-- Tombol Aksi -->
                    <a href="<?= base_url('dasboard/tambah_ke_keranjang/' . $barang['product_id']) ?>" class="btn btn-sm btn-success">Tambah ke Keranjang</a>
                    <a href="<?= base_url('dasboard') ?>" class="btn btn-sm btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
