<div class="container-fluid">
    <h4>Detail Pesanan - Invoice #<?= esc($invoice['id_invoice']) ?></h4>

    <ul>
        <li><strong>Nama:</strong> <?= esc($invoice['nama_pemesan']) ?></li>
        <li><strong>Alamat:</strong> <?= esc($invoice['alamat']) ?></li>
        <li><strong>Tanggal Pesan:</strong> <?= esc($invoice['tgl_pesan']) ?></li>
        <li><strong>Bank:</strong> <?= esc($invoice['bank']) ?></li>
        <li><strong>Jasa Pengiriman:</strong> <?= esc($invoice['jasa_pengiriman']) ?></li>
    </ul>

    <h5>Rincian Produk:</h5>
    <table class="table table-bordered">
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
        <?php $total = 0; foreach ($pesanan as $p): ?>
        <?php $subtotal = $p->jumlah * $p->harga; $total += $subtotal; ?>
        <tr>
            <td><?= esc($p->nama_produk) ?></td>
            <td><?= $p->jumlah ?></td>
            <td>Rp <?= number_format($p->harga, 0, ',', '.') ?></td>
            <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3" class="text-end"><strong>Total</strong></td>
            <td><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
        </tr>
    </table>

    <a href="<?= base_url('/riwayat') ?>" class="btn btn-sm btn-primary">Kembali</a>
</div>

