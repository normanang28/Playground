<?php

namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;

class Laporan extends BaseController
{
    public function laporan_income()
    {
    if(session()->get('level')== 1) {

        $model=new M_model();
        $data['kunci']='view_income';

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('laporan/filter');
        echo view('layout/footer');

        }else{
            return redirect()->to('/');
        }
    }

    public function print_income()
    {
    if(session()->get('level')== 1) {

        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filter_income('playground',$awal,$akhir);
        echo view('laporan/laporan_income',$data);

        }else{
            return redirect()->to('/');
        }
    }

    public function pdf_income()
    {
    if(session()->get('level')== 1) {

        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filter_income('playground',$awal,$akhir);

        $dompdf = new\Dompdf\Dompdf();
        $dompdf->loadHtml(view('laporan/laporan_income',$data));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>false));
        exit();    

        }else{
            return redirect()->to('/');
        }
    }

    public function excel_income()
    {
    if(session()->get('level')== 1) {

        $model = new M_model();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $data = $model->filter_income('playground', $awal, $akhir);

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Tanggal')
            ->setCellValue('B1', 'Nama Permainan')
            ->setCellValue('C1', 'Nama Pemain')
            ->setCellValue('D1', 'Total Pemasukan');

        $styleArrayHeader = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['rgb' => 'C0C0C0'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:D1')->applyFromArray($styleArrayHeader);

        $column = 2;
        $totalIncome = 0;

        foreach ($data as $item) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, ucwords(strtolower($item->tanggal_laporan)))
                ->setCellValue('B' . $column, ucwords(strtolower($item->nama_permainan)))
                ->setCellValue('C' . $column, ucwords(strtolower($item->nama_pemain)))
                ->setCellValue('D' . $column, ucwords(strtolower('Rp ' . $item->total_harga . ',00')));

            $styleArrayData = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ];

            $spreadsheet->getActiveSheet()->getStyle('A' . $column . ':D' . $column)->applyFromArray($styleArrayData);

            $totalIncome += $item->total_harga; 
            $column++;
        }

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('C' . $column, 'TOTAL:')
            ->setCellValue('D' . $column, 'Rp ' . $totalIncome . '.000,00');

        $styleArrayTotal = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['rgb' => 'FFFF00'], 
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('C' . $column . ':D' . $column)->applyFromArray($styleArrayTotal);

        foreach (range('A', 'D') as $col) {
            $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan Income';

        header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');

        }else{
            return redirect()->to('/');
        }
    }

    public function laporan_pengeluaran()
    {
    if(session()->get('level')== 1) {

        $model=new M_model();
        $data['kunci']='view_pengeluaran';

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        $data['foto']=$model->getRow('user',$where);

        echo view('layout/header',$data);
        echo view('layout/menu');
        echo view('laporan/filter');
        echo view('layout/footer');

        }else{
            return redirect()->to('/');
        }
    }

    public function print_pengeluaran()
    {
    if(session()->get('level')== 1) {

        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filter_pengeluaran('pembelian_barang',$awal,$akhir);
        echo view('laporan/laporan_pengeluaran',$data);

        }else{
            return redirect()->to('/');
        }
    }

    public function pdf_pengeluaran()
    {
    if(session()->get('level')== 1) {

        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['data']=$model->filter_pengeluaran('pembelian_barang',$awal,$akhir);

        $dompdf = new\Dompdf\Dompdf();
        $dompdf->loadHtml(view('laporan/laporan_pengeluaran',$data));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>false));
        exit();    

        }else{
            return redirect()->to('/');
        }
    }

    public function excel_pengeluaran()
    {
    if(session()->get('level')== 1) {

        $model = new M_model();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $data = $model->filter_pengeluaran('pembelian_barang', $awal, $akhir);

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Tanggal')
            ->setCellValue('B1', 'Nama Barang')
            ->setCellValue('C1', 'Total Pengeluaran');

        $styleArrayHeader = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['rgb' => 'C0C0C0'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($styleArrayHeader);

        $column = 2;
        $totalIncome = 0;

        foreach ($data as $item) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, ucwords(strtolower($item->taggal_laporan)))
                ->setCellValue('B' . $column, ucwords(strtolower($item->nama_pb)))
                ->setCellValue('C' . $column, ucwords(strtolower('Rp. ' . number_format($item->nominal_pb, 2, ',', '.'))));

            $styleArrayData = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ];

            $spreadsheet->getActiveSheet()->getStyle('A' . $column . ':C' . $column)->applyFromArray($styleArrayData);

            $totalIncome += $item->nominal_pb; 
            $column++;
        }

        $formattedNominalTotal = 'Rp. ' . number_format($totalIncome, 2, ',', '.');
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B' . $column, 'TOTAL:')
            ->setCellValue('C' . $column, $formattedNominalTotal);

        $styleArrayTotal = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['rgb' => 'FFFF00'], 
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('B' . $column . ':C' . $column)->applyFromArray($styleArrayTotal);

        foreach (range('A', 'C') as $col) {
            $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan Pengeluaran';

        header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');

        }else{
            return redirect()->to('/');
        }
    }

    public function print_nota($id_playground) {
        if (session()->get('level') == 1 || session()->get('level') == 2) {
            $model = new M_model();
            $data['data'] = $model->print_nota($id_playground);
            echo view('laporan/print_nota', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
