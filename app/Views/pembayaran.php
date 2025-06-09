<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success"></div>
            <?php
            $grand_total = 0;
            if ($keranjang = $this->cart->contents())
            {
                foreach ($keranjaang as $item)
                {
                    $grand_total = $grand_total + $item['subtotal'];
                }
            echo "<h4>Total Belanja Anda: Rp. ".number_format($grand_total,0,',','.');
            } ?>
        </div><br><br>

        <h3>Input Alamat Pengiriman dan Pembayaran</h3>
        <form method="post" action="<?php echo base_url() ?> dashboard/proses_pesanan">
            <div class="form-group">
                <label>NAMA LENGKAP</label>
                <input type="text" name="nama" placeholder="NAMA LENGKAP ANDA">
            </div>

            <div class="form-group">
                <label>ALAMAT</label>
                <input type="text" name="alamat" placeholder="ALAMAT LENGKAP ANDA">
            </div>

            <div class="form-group">
                <label>NO.TELPON</label>
                <input type="text" name="no_telp" placeholder="NOMOR TELPON LENGKAP ANDA">
            </div>

            <div class="form-group">
                <label>JASA PENGIRIMAN</label>
                <select>
                    <option>JNE</option>
                    <option>TIKI</option>
                    <option>POS INDONESIA</option>
                    <option>GOJEK</option>
                    <option>GRAB</option>
        </select>
    </div>
    </div>

        <div class="col-md-2"></div>
    </div>
</div>
