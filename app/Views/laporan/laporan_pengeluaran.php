<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-transform: capitalize;
    }

    .container {
      max-width: 8000px;
      margin: 0 auto;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header img {
      width: 100%;
      height: auto;
    }

    .table-container {
      margin-top: 20px;
    }

    table {
      width: 100%; 
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    td:nth-child(4) {
      text-align: center;
      text-transform: capitalize;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Laporan Pengeluaran</h1>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Total Pengeluaran</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $totalOut = 0; 

          foreach ($data as $dataa) {
            ?>
            <tr>
              <td class="text-capitalize text-center"><?php echo $dataa->taggal_laporan?></td>
              <td class="text-capitalize text-center"><?php echo $dataa->nama_pb?></td>
              <td class="text-capitalize text-center">Rp. <?php echo number_format($dataa->nominal_pb, 2, ',', '.') ?></td>
            </tr>

            <?php
            $totalOut += $dataa->nominal_pb; 
          }
          ?>
          
          <tr>
            <td colspan="1"></td>
            <td><b>TOTAL :</b></td>
            <td style="color: seagreen;"><b>Rp. <?php echo number_format($totalOut, 2, ',', '.') ?></b></td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>

  <script>
    window.print();
  </script>
</body>
</html>
