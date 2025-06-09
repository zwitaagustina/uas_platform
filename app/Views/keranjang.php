<div class="container-fluid">
    <h4>Keranjang Belanja</h4>

    <?php if (!empty($cart)) : ?>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub-Total</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; $total = 0; ?>
        <?php foreach ($cart as $id => $item) : 
            $subtotal = $item['price'] * $item['qty'];
            $total += $subtotal;
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($item['name']) ?></td>
                <td><?= $item['qty'] ?></td>
                <td align="right">Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                <td align="right">Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                <td>
                    <a href="<?= base_url('dasboard/tambah_ke_keranjang/' . $id) ?>" class="btn btn-sm btn-success">+</a>
                    <a href="<?= base_url('dasboard/kurangi_dari_keranjang/' . $id) ?>" class="btn btn-sm btn-danger">-</a>
                </td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td colspan="4" align="right"><strong>Total</strong></td>
            <td align="right"><strong>Rp <?= number_format($total, 0, ',', '.') ?></strong></td>
            <td></td>
        </tr>
    </table>
 
    <div align="right">
        <a href="<?= base_url('dasboard/hapus_keranjang') ?>" class="btn btn-sm btn-danger">Hapus Keranjang</a>
        <a href="<?= base_url('dasboard') ?>" class="btn btn-sm btn-primary">Lanjutkan Belanja</a>
        <a href="<?= base_url('dasboard/pembayaran') ?>" class="btn btn-sm btn-success">Pembayaran</a>
    </div>

    <?php else : ?>
        <p>Keranjang Anda kosong.</p>
    <?php endif; ?>
</div>



