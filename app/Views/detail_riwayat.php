<div class="container-fluid">
    <h4>Detail Invoice #<?= $invoice['id_invoice'] ?></h4>
    <ul>
        <li><strong>Nama Pemesan:</strong> <?= esc($invoice['nama_pemesan']) ?></li>
        <li><strong>Alamat:</strong> <?= esc($invoice['alamat']) ?></li>
        <li><strong>Tanggal Pesan:</strong> <?= esc($invoice['tgl_pesan']) ?></li>
        <li><strong>Batas Bayar:</strong> <?= esc($invoice['batas_bayar']) ?></li>
    </ul>

    <h5>Rincian Pesanan:</h5>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; foreach ($pesanan as $item): ?>
            <?php $subtotal = $item->jumlah * $item->harga; $total += $subtotal; ?>
            <tr>
                <td><?= esc($item->nama_produk) ?></td>
                <td><?= $item->jumlah ?></td>
                <td>Rp <?= number_format($item->harga, 0, ',', '.') ?></td>
                <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3" class="text-end"><strong>Total</strong></td>
                <td><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
            </tr>
        </tbody>
    </table>
</div>

