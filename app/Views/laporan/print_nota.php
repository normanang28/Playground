<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }
        h1, h2, p {
            margin: 0;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details h2 {
            margin-bottom: 5px;
        }
        .items-table {
            width: 80%; /* Mengatur lebar tabel menjadi 80% */
            margin: 0 auto; /* Memusatkan tabel di dalam container */
            border-collapse: collapse;
        }
        .items-table th, .items-table td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }

        .text-capitalize {
            text-transform: capitalize;
        }
    </style>
</head>
<body>
  <?php
  $no=1;
  foreach ($data as $dataa){?>
    <div class="container">
        <div class="invoice-details">
            <h2>Nota Pembelian</h2>
            <p>Nomor Nota: <?php echo $dataa->id_playground?><?php echo $dataa->id_permainan_playground?><?php echo $dataa->durasi?></p>
            <p>Tanggal: <?php echo $dataa->tanggal_laporan?></p>
        </div>
        <table class="items-table">
            <thead>
                <tr>
                    <th>Nama Pemain</th>
                    <th>Durasi Permainan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->nama_pemain?></td>
                    <td style="text-align: center;" class="text-capitalize"><?php echo $dataa->durasi?> Jam</td>
                    <td style="text-align: center;" class="text-capitalize">Rp <?php echo number_format($dataa->total_harga, 3, '.', '.') ?>,00</td>
                </tr>
            </tbody>
        </table>
          <?php }?>

        <div class="total">
            <p>Total Pembelian: Rp <?php echo number_format($dataa->total_harga, 3, '.', '.') ?>,00</p>
        </div>
    </div>
</body>
</html>
