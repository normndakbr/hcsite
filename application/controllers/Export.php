<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Daerah extends My_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->is_logout();
     }

     public function export_kary($authmprs)
     {
          $spreadsheet = new Spreadsheet();
          $sheet = $spreadsheet->getActiveSheet();
          // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
          $style_col = [
               'font' => ['bold' => true], // Set font nya jadi bold
               'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
               ],
               'borders' => [
                    'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                    'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                    'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                    'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
               ]
          ];
          // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
          $style_row = [
               'alignment' => [
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
               ],
               'borders' => [
                    'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                    'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                    'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                    'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
               ]
          ];
          $sheet->setCellValue('A1', "Data Karyawan"); // Set kolom A1 dengan tulisan "DATA SISWA"
          $sheet->mergeCells('A1:D1'); // Set Merge Cell pada kolom A1 sampai E1
          $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
          // Buat header tabel nya pada baris ke 3
          $sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
          $sheet->setCellValue('B3', "EMAIL"); // Set kolom B3 dengan tulisan "NIS"
          $sheet->setCellValue('C3', "IP ADDRESS"); // Set kolom C3 dengan tulisan "NAMA"
          $sheet->setCellValue('D3', "TANGGAL"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
          // Apply style header yang telah kita buat tadi ke masing-masing kolom header
          $sheet->getStyle('A3')->applyFromArray($style_col);
          $sheet->getStyle('B3')->applyFromArray($style_col);
          $sheet->getStyle('C3')->applyFromArray($style_col);
          $sheet->getStyle('D3')->applyFromArray($style_col);
          // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
          $hasil_dt = $this->hsl->get_data();
          $no = 1; // Untuk penomoran tabel, di awal set dengan 1
          $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
          foreach ($hasil_dt as $data) { // Lakukan looping pada variabel siswa
               $sheet->setCellValue('A' . $numrow, strval($no));
               $sheet->setCellValue('B' . $numrow, $data->email_data);
               $sheet->setCellValue('C' . $numrow, $data->ip_add_data);
               $sheet->setCellValue('D' . $numrow, date('Y-m-d H:i:s', $data->time_data));

               // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
               $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
               $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
               $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
               $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);

               $no++; // Tambah 1 setiap kali looping
               $numrow++; // Tambah 1 setiap kali looping
          }
          // Set width kolom
          $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
          $sheet->getColumnDimension('B')->setWidth(50); // Set width kolom B
          $sheet->getColumnDimension('C')->setWidth(30); // Set width kolom C
          $sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D

          // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
          $sheet->getDefaultRowDimension()->setRowHeight(-1);
          // Set orientasi kertas jadi LANDSCAPE
          $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
          // Set judul file excel nya
          $sheet->setTitle("Laporan Hasil Phishing");
          // Proses file excel
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="Hasil Phishing Email.xlsx"'); // Set nama file excel nya
          header('Cache-Control: max-age=0');
          $writer = new Xlsx($spreadsheet);
          $writer->save('php://output');
     }
}
