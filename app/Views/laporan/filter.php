<div class="col-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>
        <?php if ($kunci=='view_income') {
        }else if ($kunci=='view_pengeluaran') {
        }else{
        }
        ?>
      </h2>

      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <form class="form-horizontal form-label-left" novalidate

      action="
      <?php if ($kunci=='view_income') {
        echo base_url('Laporan/print_income');
      }else if ($kunci=='view_pengeluaran') {
        echo base_url('Laporan/print_pengeluaran');
        }else{
        }
      ?>" method="post">

      <div class="item form-group">
        <label class="control-label col-12">Start Date<span style="color: red;">*</span>
        </label>
        <div class="col-12">
          <input id="name" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="awal" placeholder="" required="required" type="date">
        </div>
      </div>
      <div class="item form-group">
        <label class="control-label col-12">End Date<span style="color: red;">*</span>
        </label>
        <div class="col-12">
          <input type="date" id="kode" name="akhir" required="required" placeholder="" class="form-control col-12">
        </div>
      </div>
      <div class="form-group">
        <div class="col-12">
          <button id="send" type="submit" class="btn btn-warning"><i class="fa fa-print"></i> Print</button>
        </div>
      </div>
    </form>

    <div class="ln_solid"></div>

    <form class="form-horizontal form-label-left" novalidate

    action="
    <?php if ($kunci=='view_income') {
      echo base_url('Laporan/pdf_income');
      }else if ($kunci=='view_pengeluaran') {
        echo base_url('Laporan/pdf_pengeluaran');
      }else{
      }
    ?>" method="post" target="_blank">

    <div class="item form-group">
      <label class="control-label col-12">Start Date<span style="color: red;">*</span>
      </label>
      <div class="col-12">
        <input id="name" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="awal" placeholder="" required="required" type="date">
      </div>
    </div>
    <div class="item form-group">
      <label class="control-label col-12">End Date<span style="color: red;">*</span>
      </label>
      <div class="col-12">
        <input type="date" id="kode" name="akhir" required="required" placeholder="" class="form-control col-12">
      </div>
    </div>
    <div class="form-group">
      <div class="col-12">
        <button type="submit" class="btn btn-danger"><i class="fa fa-print"></i> PDF</button>
      </div>
    </div>
  </form>

  <div class="ln_solid"></div>

  <form class="form-horizontal form-label-left" novalidate

  action="
  <?php if ($kunci=='view_income') {
    echo base_url('Laporan/excel_income');
    }else if ($kunci=='view_pengeluaran') {
    echo base_url('Laporan/excel_pengeluaran');
    }else{
    }
  ?>" method="post">

  <div class="item form-group">
    <label class="control-label col-12">Start Date<span style="color: red;">*</span> 
    </label>
    <div class="col-12">
      <input id="name" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="awal" placeholder="" required="required" type="date">
    </div>
  </div>
  <div class="item form-group">
    <label class="control-label col-12">End Date<span style="color: red;">*</span>
    </label>
    <div class="col-12">
      <input type="date" id="kode" name="akhir" required="required" placeholder="" class="form-control col-12">
    </div>
  </div>
  <div class="form-group">
    <div class="col-12">
      <button type="submit" class="btn btn-success"><i class="fa fa-print"></i> Excel</button>
    </div>
  </div>
</form>
<div class="ln_solid"></div>
<form class="form-horizontal form-label-left" novalidate
action="
<?php if ($kunci=='view_income') {
  echo base_url('Playground/pembelian_tiket');
}else if ($kunci=='view_pengeluaran') {
  echo base_url('Playground/pembelian_barang');
  }else{
  }
?>" method="post">
</div>
</div>
</div>