<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>ID Invoice</th>
            <th>Nama Pemesan</th>
            <th>Alamat</th>
            <th>Tanggal Pesan</th>
            <th>Batas Bayar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($riwayat as $inv): ?>
        <tr>
            <td><?= esc($inv['id_invoice']) ?></td>
            <td><?= esc($inv['nama_pemesan']) ?></td>
            <td><?= esc($inv['alamat']) ?></td>
            <td><?= esc($inv['tgl_pesan']) ?></td>
            <td><?= esc($inv['batas_bayar']) ?></td>
            <td>
                <a href="<?= base_url('riwayat/detail/' . $inv['id_invoice']) ?>" class="btn btn-sm btn-primary">Detail</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

