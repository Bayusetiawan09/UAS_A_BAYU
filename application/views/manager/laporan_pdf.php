<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan - PT Maju Jaya</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            color: #000;
        }
        .company-name {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .report-title {
            text-align: center;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .period {
            text-align: center;
            font-size: 12px;
            margin-bottom: 20px;
        }
        p.intro {
            text-align: justify;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px 8px;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
        }
        .text-right {
            text-align: right;
        }
        .footer {
            margin-top: 40px;
            font-size: 12px;
            text-align: right;
        }
    </style>
</head>
<body>

    <div class="company-name">
        PT MAJU JAYA
    </div>

    <div class="report-title">
        Laporan Penjualan
    </div>

    <div class="period">
        <?php
            $start = $this->input->get('start_date');
            $end = $this->input->get('end_date');
            if ($start && $end):
                $start_fmt = date('d M Y', strtotime($start));
                $end_fmt = date('d M Y', strtotime($end));
        ?>
            Periode: <?= $start_fmt ?> - <?= $end_fmt ?>
        <?php endif; ?>
    </div>

    <p class="intro">
        Berikut ini adalah ringkasan data penjualan berdasarkan filter periode yang telah ditentukan. Laporan ini dibuat sebagai bahan evaluasi kinerja penjualan serta pemantauan perkembangan distribusi produk di PT Maju Jaya.
    </p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Sales</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total_harga_semua = 0;
            if (!empty($laporan)):
                $no = 1;
                foreach ($laporan as $row):
                    $total_harga_semua += $row->harga_total;
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d-m-Y', strtotime($row->created_at)); ?></td>
                <td><?= htmlspecialchars($row->nama_sales); ?></td>
                <td><?= htmlspecialchars($row->nama_produk); ?></td>
                <td><?= $row->jumlah; ?></td>
                <td>Rp <?= number_format($row->harga_total, 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">Tidak ada data ditemukan untuk filter yang dipilih.</td>
            </tr>
            <?php endif; ?>
        </tbody>
        <?php if (!empty($laporan)): ?>
        <tfoot>
            <tr>
                <th colspan="5" class="text-right">TOTAL PENJUALAN</th>
                <th>Rp <?= number_format($total_harga_semua, 0, ',', '.'); ?></th>
            </tr>
        </tfoot>
        <?php endif; ?>
    </table>

    <div class="footer">
        Dicetak pada: <?= date('d-m-Y'); ?>
    </div>

</body>
</html>
