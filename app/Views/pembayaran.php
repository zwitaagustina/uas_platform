<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="btn btn-sm btn-success">
            <?php
            $grand_total = 0;
            if (!empty($cart)) {
                foreach ($cart as $item) {
                    $grand_total += $item['price'] * $item['qty'];
                }
                echo "<h4>Total Belanja Anda: Rp. " . number_format($grand_total, 0, ',', '.');
            } else {
                echo "<h4>Keranjang Anda Masih Kosong.</h4>";
            }?>
        </div><br><br>
        <h3>Input Alamat Pengiriman dan Pembayaran</h3>
            <form method="post" action="<?= base_url('dasboard/proses_pesanan') ?>">
                <div class="form-group">
                    <label>NAMA LENGKAP</label>
                    <input type="text" name="nama" placeholder="NAMA LENGKAP ANDA" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>ALAMAT</label>
                    <input type="text" name="alamat" placeholder="ALAMAT LENGKAP ANDA" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>NO.TELPON</label>
                    <input type="text" name="no_telp" placeholder="NOMOR TELPON ANDA" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>JASA PENGIRIMAN</label>
                    <select class="form-control" name="jasa_pengiriman" required>
                        <option value="">-- Pilih Jasa Pengiriman --</option>
                        <option>JNE</option>
                        <option>TIKI</option>
                        <option>POS INDONESIA</option>
                        <option>GOJEK</option>
                        <option>GRAB</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Pilih BANK</label>
                    <select class="form-control" name="bank" required>
                        <option value="">-- Pilih Bank --</option>
                        <option>BCA - 4234567898</option>
                        <option>BRI - 913456789821342</option>
                        <option>MANDIRI - 8634567898786</option>
                        <option>BNI - 5334567898</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

