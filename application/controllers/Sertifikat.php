<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Load library phpspreadsheet
require './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Sertifikat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		$this->load->model('Sertifikat_model', 'Sertifikat');
	}

	public function	index()
	{
		$data = array();
		$kelas = $this->input->get('kelas');
		// if ($kelas == null) {
		// 	$kelas = 'TKRO';
		// }
		$data = [
			'title' => 'sertifikat',
			'kelas' => $kelas,
			'sekolah' => $this->Sertifikat->getDataSekolah(),
			'asesor' => $this->Sertifikat->getDataAsesor($kelas),
			'data' => $this->Sertifikat->getDataSertifikat($kelas),
		];
		$this->load->view('sertifikat/wrapper/head', $data);
		$this->load->view('sertifikat/wrapper/navbar', $data);
		$this->load->view('sertifikat/index', $data);
		$this->load->view('sertifikat/wrapper/footer', $data);
	}

	public function masterSekolah($id)
	{
		$data = [
			'name_ks' => $this->input->post('ks'),
			'nbm' => $this->input->post('nbm'),
			'print_date' => $this->input->post('tgl'),
		];
		$this->db->where('id', $id);
		$this->db->update('master_sekolah', $data);
		return true;
	}

	public function masterAsesor($id)
	{
		$data = [
			'name_assessor' => $this->input->post('asesor'),
			'nopeg' => $this->input->post('nopeg'),
		];
		$this->db->where('id', $id);
		$this->db->update('master_assessor', $data);
		return true;
	}

	public function sertifikatdepan()
	{
		$kelas = $this->input->get('kelas');
		$nisn = $this->input->get('nisn');
		$data = [
			'title' => 'sertifikat',
			'sekolah' => $this->Sertifikat->getDataSekolah(),
			'kelas' => $kelas,
			'nisn' => $nisn,
			'jurusan' => $this->Sertifikat->getJurusan($kelas),
			'data' => $this->Sertifikat->getMasterData($nisn),
			'asesor' => $this->Sertifikat->getDataAsesor($kelas),
		];

		$this->load->view('sertifikat/wrapper/head', $data);
		$this->load->view('sertifikat/wrapper/navbar', $data);
		$this->load->view('sertifikat/sertifikat-depan', $data);
		$this->load->view('sertifikat/wrapper/footer', $data);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => 'utf-8',
			'format' => [210, 297],
			'orientation' => 'L',
			'setAutoTopMargin' => false,
		]);

		// $mpdf->SetHTMLHeader('
		// <div style="text-align: center; font-weight: bold; margin:0px; padding:0px">
		// <img src="assets/img/sertifikat/tkro.png" width="100%" height="100%" />
		// </div>');

		$html = $this->load->view('sertifikat/sertifikat-depan', [], true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('SERTIFIKAT UKK.pdf', \Mpdf\Output\Destination::INLINE);
	}

	public function sertifikatbelakang()
	{
		$kelas = $this->input->get('kelas');
		$nisn = $this->input->get('nisn');
		$data = [
			'title' => 'sertifikat',
			'sekolah' => $this->Sertifikat->getDataSekolah(),
			'kelas' => $kelas,
			'nisn' => $nisn,
			'jurusan' => $this->Sertifikat->getJurusan($kelas),
			'data' => $this->Sertifikat->getMasterData($nisn),
			'asesor' => $this->Sertifikat->getDataAsesor($kelas),
			'nilai' => $this->Sertifikat->getNilai($kelas)
		];

		$this->load->view('sertifikat/wrapper/head', $data);
		$this->load->view('sertifikat/wrapper/navbar', $data);
		$this->load->view('sertifikat/sertifikat-belakang', $data);
		$this->load->view('sertifikat/wrapper/footer', $data);

		$mpdf = new \Mpdf\Mpdf([
			'mode' => 'utf-8',
			'format' => [210, 297],
			'orientation' => 'L',
			'setAutoTopMargin' => false,
		]);
		$html = $this->load->view('sertifikat/sertifikat-belakang', [], true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('SERTIFIKAT UKK.pdf', \Mpdf\Output\Destination::INLINE);
	}

	public function import_excel()
	{
		$data = array();
		$kelas = $this->input->get('kelas');
		if ($kelas == null) {
			$kelas = 'TKRO';
		}
		$data = [
			'title' => 'sertifikat',
			'kelas' => $kelas,
			'sekolah' => $this->Sertifikat->getDataSekolah(),
			'asesor' => $this->Sertifikat->getDataAsesor($kelas),
			'data' => $this->Sertifikat->getDataSertifikat($kelas),
		];

		// Load form validation library
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
		if ($this->form_validation->run() == false) {
			$this->load->view('sertifikat/wrapper/head', $data);
			$this->load->view('sertifikat/wrapper/navbar', $data);
			$this->load->view('sertifikat/index', $data);
			$this->load->view('sertifikat/wrapper/footer', $data);
		} else {
			// If file uploaded
			if (!empty($_FILES['fileURL']['name'])) {
				$kelas = $this->input->get('kelas');
				if ($kelas == null) {
					$kelas = 'TKRO';
				}
				$data = [
					'title' => 'sertifikat',
					'kelas' => $kelas,
					'sekolah' => $this->Sertifikat->getDataSekolah(),
					'asesor' => $this->Sertifikat->getDataAsesor($kelas),
					'data' => $this->Sertifikat->getDataSertifikat($kelas),
				];
				// get file extension
				$extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

				if ($extension == 'csv') {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				} elseif ($extension == 'xlsx') {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				} else {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
				}
				// file path
				$spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
				$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

				// array Count
				$arrayCount = count($allDataInSheet);
				$flag = 0;
				$createArray = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11');
				$makeArray = array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'10' => '10',
					'11' => '11',
				);
				$SheetDataKey = array();
				foreach ($allDataInSheet as $dataInSheet) {
					foreach ($dataInSheet as $key => $value) {
						if (in_array(trim($value), $createArray)) {
							$value = preg_replace('/\s+/', '', $value);
							$SheetDataKey[trim($value)] = $key;
						}
					}
				}
				$dataDiff = array_diff_key($makeArray, $SheetDataKey);
				if (empty($dataDiff)) {
					$flag = 1;
				}
				// match excel sheet column
				if ($flag == 1) {
					for ($i = 5; $i <= $arrayCount; $i++) {
						$addresses = array();
						$nis = $SheetDataKey['1'];
						$nisn = $SheetDataKey['2'];
						$name = $SheetDataKey['3'];
						$kelas = $SheetDataKey['4'];
						$nil1 = $SheetDataKey['5'];
						$nil2 = $SheetDataKey['6'];
						$nil3 = $SheetDataKey['7'];
						$nil4 = $SheetDataKey['8'];
						$nil5 = $SheetDataKey['9'];
						$nil6 = $SheetDataKey['10'];
						$nil7 = $SheetDataKey['11'];

						$nis = filter_var(trim($allDataInSheet[$i][$nis]), FILTER_SANITIZE_STRING);
						$nisn = filter_var(trim($allDataInSheet[$i][$nisn]), FILTER_SANITIZE_STRING);
						$name = filter_var(trim($allDataInSheet[$i][$name]), FILTER_SANITIZE_STRING);
						$kelas = filter_var(trim($allDataInSheet[$i][$kelas]), FILTER_SANITIZE_STRING);
						$nil1 = filter_var(trim($allDataInSheet[$i][$nil1]), FILTER_SANITIZE_STRING);
						$nil2 = filter_var(trim($allDataInSheet[$i][$nil2]), FILTER_SANITIZE_STRING);
						$nil3 = filter_var(trim($allDataInSheet[$i][$nil3]), FILTER_SANITIZE_STRING);
						$nil4 = filter_var(trim($allDataInSheet[$i][$nil4]), FILTER_SANITIZE_STRING);
						$nil5 = filter_var(trim($allDataInSheet[$i][$nil5]), FILTER_SANITIZE_STRING);
						$nil6 = filter_var(trim($allDataInSheet[$i][$nil6]), FILTER_SANITIZE_STRING);
						$nil7 = filter_var(trim($allDataInSheet[$i][$nil7]), FILTER_SANITIZE_STRING);
						$fetchData[] = array(
							'nis' => $nis,
							'nisn' => $nisn,
							'name' => $name,
							'kelas' => $kelas,
							'nil_1' => $nil1,
							'nil_2' => $nil2,
							'nil_3' => $nil3,
							'nil_4' => $nil4,
							'nil_5' => $nil5,
							'nil_6' => $nil6,
							'nil_7' => $nil7,
						);
					}
					$data['dataInfo'] = $fetchData;
					$this->Sertifikat->setBatchImport($fetchData);
					$this->Sertifikat->importData();
				} else {
					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-danger" role="alert">Please import correct file, did not match excel sheet column!!!</div>'
					);
				}
				$data = [
					'title' => 'sertifikat',
					'kelas' => $kelas,
					'sekolah' => $this->Sertifikat->getDataSekolah(),
					'asesor' => $this->Sertifikat->getDataAsesor($kelas),
					'data' => $this->Sertifikat->getDataSertifikat($kelas),
				];
				$this->load->view('sertifikat/wrapper/head', $data);
				$this->load->view('sertifikat/wrapper/navbar', $data);
				$this->load->view('sertifikat/index', $data);
				$this->load->view('sertifikat/wrapper/footer', $data);
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-success" role="alert">Data import successfully!!!</div>'
				);
			}
		}
	}

	// checkFileValidation
	public function checkFileValidation($string)
	{
		$file_mimes = array(
			'text/x-comma-separated-values',
			'text/comma-separated-values',
			'application/octet-stream',
			'application/vnd.ms-excel',
			'application/x-csv',
			'text/x-csv',
			'text/csv',
			'application/csv',
			'application/excel',
			'application/vnd.msexcel',
			'text/plain',
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
		);
		if (isset($_FILES['fileURL']['name'])) {
			$arr_file = explode('.', $_FILES['fileURL']['name']);
			$extension = end($arr_file);
			if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
				return true;
			} else {
				$this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
				return false;
			}
		} else {
			$this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
			return false;
		}
	}
}