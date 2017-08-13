<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\KetTidakMampu;
use App\ProfilDesa;
use DB;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class KetTidakMampuController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
    $this->title = 'Surat Keterangan Tidak Mampu';
  }

  public function Index(Request $request) {
    $profil_desa = $this->getProfilDesa();
    $ket_tidak_mampu = KetTidakMampu::where('nomor', 'like', $request->nomor.'%')
    ->where('keperluan', 'like', $request->keperluan.'%')->where('tempat_lahir', 'like', $request->tempat_lahir.'%')
    ->where('nama', 'like', $request->nama.'%')->orderBy('id')->paginate();
    $tanggal = Carbon::now();
    return view('ket_tidak_mampu.index', ['title'=>$this->title, 'data'=>$ket_tidak_mampu, 'date'=>$tanggal]);
  }

  public function Create() {
    return view('ket_tidak_mampu.create', ['title'=>$this->title]);
  }

  public function Store(Request $request) {
    $this->validator($request->all())->validate();
    $ket_tidak_mampu = new KetTidakMampu;
    $ket_tidak_mampu->nomor = $request->get('nomor');
    $ket_tidak_mampu->nama = $request->get('nama');
    $ket_tidak_mampu->nilk = $request->get('nilk');
    $ket_tidak_mampu->tempat_lahir = $request->get('tempat_lahir');
    $ket_tidak_mampu->tanggal_lahir = Carbon::parse($request->get('tanggal_lahir'))->format('Y/m/d');
    $ket_tidak_mampu->kelamin = $request->get('kelamin');
    $ket_tidak_mampu->kewarganegaraan = $request->get('kewarganegaraan');
    $ket_tidak_mampu->agama = $request->get('agama');
    $ket_tidak_mampu->pekerjaan = $request->get('pekerjaan');
    $ket_tidak_mampu->status = $request->get('status');
    $ket_tidak_mampu->alamat = $request->get('alamat');
    $ket_tidak_mampu->keperluan = $request->get('keperluan');
    $ket_tidak_mampu->masa_berlaku_start = Carbon::parse($request->get('masa_berlaku_start'))->format('Y/m/d');
    $ket_tidak_mampu->masa_berlaku_end = Carbon::parse($request->get('masa_berlaku_end'))->format('Y/m/d');
    $saved = $ket_tidak_mampu->save();

    Session::flash('success_message', "Data Surat Keterangan Tidak Mampu Berhasil Direkam");
    return redirect('ket_tidak_mampu');
  }

  public function Edit($id) {
    $ket_tidak_mampu = KetTidakMampu::find($id);
    $this->getFormatedDate($ket_tidak_mampu);
    return view('ket_tidak_mampu.edit', ['title'=>$this->title, 'data'=>$ket_tidak_mampu, 'type'=>'edit']);
  }

  public function Update(Request $request, $id) {
    $this->validator($request->all())->validate();
    $ket_tidak_mampu = KetTidakMampu::find($id);
    $ket_tidak_mampu->nama = $request->get('nama');
    $ket_tidak_mampu->nilk = $request->get('nilk');
    $ket_tidak_mampu->tempat_lahir = $request->get('tempat_lahir');
    $ket_tidak_mampu->tanggal_lahir = Carbon::parse($request->get('tanggal_lahir'))->format('Y/m/d');
    $ket_tidak_mampu->kelamin = $request->get('kelamin');
    $ket_tidak_mampu->kewarganegaraan = $request->get('kewarganegaraan');
    $ket_tidak_mampu->agama = $request->get('agama');
    $ket_tidak_mampu->pekerjaan = $request->get('pekerjaan');
    $ket_tidak_mampu->status = $request->get('status');
    $ket_tidak_mampu->alamat = $request->get('alamat');
    $ket_tidak_mampu->keperluan = $request->get('keperluan');
    $ket_tidak_mampu->masa_berlaku_start = Carbon::parse($request->get('masa_berlaku_start'))->format('Y/m/d');
    $ket_tidak_mampu->masa_berlaku_end = Carbon::parse($request->get('masa_berlaku_end'))->format('Y/m/d');
    $saved = $ket_tidak_mampu->save();
    Session::flash('success_message', "Data Surat Keterangan Tidak Mampu Berhasil Diubah");
    return redirect('ket_tidak_mampu');
  }

  public function Destroy($id) {
    $ket_tidak_mampu = KetTidakMampu::findOrFail($id);
    $ket_tidak_mampu->delete();
    Session::flash('failed_message', "Data Surat Keterangan Tidak Mampu Berhasil Dihapus");
    return redirect('ket_tidak_mampu');
  }

  public function getView($id) {
    $profil_desa = ProfilDesa::first();
    $ket_tidak_mampu = KetTidakMampu::find($id);
    $this->getFormatedDate($ket_tidak_mampu);
    return view('ket_tidak_mampu.view', ['title'=>$this->title, 'data'=>$ket_tidak_mampu, 'profil_desa'=>$profil_desa]);
  }

  public function getPrint($id) {
    $profil_desa = $this->getProfilDesa();
    $ket_tidak_mampu = KetTidakMampu::find($id);
    $this->getFormatedDate($ket_tidak_mampu);
    return view('ket_tidak_mampu.print', ['title' => $this->title, 'data' => $ket_tidak_mampu, 'profil_desa'=>$profil_desa]);
  }

  public function getDownload($id) {
    $profil_desa = $this->getProfilDesa();
    $ket_tidak_mampu = KetTidakMampu::find($id);
    $this->getFormatedDate($ket_tidak_mampu);
    $pdf = PDF::loadView('ket_tidak_mampu.download', ['data'=>$ket_tidak_mampu, 'title'=>$this->title, 'profil_desa'=>$profil_desa]);
    return $pdf->download('ket_tidak_mampu.pdf');
  }

  public function getWord($id) {
    $profil_desa = $this->getProfilDesa();
    $ket_tidak_mampu = KetTidakMampu::find($id);
    $this->getFormatedDate($ket_tidak_mampu);

    $phpWord = new \PhpOffice\PhpWord\PhpWord();


    $para_judul_surat = 'pStyle';
    $phpWord->addParagraphStyle($para_judul_surat, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));


    $section = $phpWord->addSection();
    // Simple text
    // Inline font style
    $phpWord->setDefaultFontName('Times New Roman');
    $phpWord->setDefaultFontSize(12);
    $table_style = new \PhpOffice\PhpWord\Style\Table;
    $table_style->setUnit(\PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT);
    $table_style->setWidth(50 * 100);
    $table_style->setBorderBottomColor('black');
    $table_style->setBorderBottomSize(2);
    $table = $section->addTable($table_style);
    $table->addRow();
    $table->addCell(70, array('vMerge' => 'restart', 'valign'=>'center'))->addImage('images/uploads/'.$profil_desa->logo, array(
        'width'         => 90,
        'height'        => 90,
        'marginTop'     => 0,
        'marginLeft'    => 0,
        'wrappingStyle' => 'square'
    ));
    $row = $table->addRow();
    $row->addCell(200, array('vMerge' => 'continue'));
    $row->addCell(1500)->addText('PEMERINTAH KABUPATEN '. $profil_desa->kota, array('bold'=>true, 'size'=>16, 'allCaps'=>true), $para_judul_surat);
    $row = $table->addRow();
    $row->addCell(null, array('vMerge' => 'continue'));
    $row->addCell()->addText('KECAMATAN '. $profil_desa->kecamatan, array('bold'=>true, 'size'=>15, 'allCaps'=>true), $para_judul_surat);
    $row = $table->addRow();
    $row->addCell(null, array('vMerge' => 'continue'));
    $row->addCell()->addText('DESA '. $profil_desa->desa, array('bold'=>true, 'size'=>14, 'allCaps'=>true), $para_judul_surat);
    $alamat = "Alamat ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->alamat)))
               . ". Desa ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->desa)))
               . ". Kecamatan ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->kecamatan)))
               . ". Kabupaten ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->kota)))
               . ". Kode Pos ".$profil_desa->kode_pos.".";
    $row = $table->addRow();
    $row->addCell(null, array('vMerge' => 'continue'));
    $row->addCell()->addText($alamat, array('size'=>12), $para_judul_surat);

    $section->addTextBreak(1);
    $section->addText('Surat Keterangan Tidak Mampu', array('bold' => true, 'size' => 15), $para_judul_surat);
    $section->addText('Nomor :'.$ket_tidak_mampu->nomor, null, $para_judul_surat);
    // Two text break
    $section->addTextBreak(1);
    $section->addText('Yang bertanda tangan di bawah ini :');
    $section->addTextBreak(1);
    $textrun = $section->addTextRun();
    $textrun->addText('    Nama                         : ');
    $textrun->addText($ket_tidak_mampu->nama);
    $textrun = $section->addTextRun();
    $textrun->addText('    NILK                         : ');
    $textrun->addText($ket_tidak_mampu->nilk);
    $textrun = $section->addTextRun();
    $textrun->addText('    Tempat Lahir             : ');
    $textrun->addText($ket_tidak_mampu->tempat_lahir);
    $textrun = $section->addTextRun();
    $textrun->addText('    Tanggal Lahir            : ');
    $textrun->addText($ket_tidak_mampu->tanggal_lahir);
    $textrun = $section->addTextRun();
    $textrun->addText('    Kelamin                     : ');
    $textrun->addText($ket_tidak_mampu->kelamin);
    $textrun = $section->addTextRun();
    $textrun->addText('    Kewarganegaraan      : ');
    $textrun->addText($ket_tidak_mampu->kewarganegaraan);
    $textrun = $section->addTextRun();
    $textrun->addText('    Agama                       : ');
    $textrun->addText($ket_tidak_mampu->agama);
    $textrun = $section->addTextRun();
    $textrun->addText('    Pekerjaan                   : ');
    $textrun->addText($ket_tidak_mampu->pekerjaan);
    $textrun = $section->addTextRun();
    $textrun->addText('    Status                         : ');
    $textrun->addText($ket_tidak_mampu->status);
    $textrun = $section->addTextRun();
    $textrun->addText('    Alamat                       : ');
    $textrun->addText($ket_tidak_mampu->alamat);
    $textrun = $section->addTextRun();
    $textrun->addText('    Keperluan                  : ');
    $textrun->addText($ket_tidak_mampu->keperluan);
    $textrun = $section->addTextRun();
    $textrun->addText('    Masa Berlaku            : ');
    $textrun->addText($ket_tidak_mampu->masa_berlaku_start);
    $textrun->addText(' s/d ');
    $textrun->addText($ket_tidak_mampu->masa_berlaku_end);
    $section->addTextBreak(1);
    $textrun = $section->addTextRun();
    $section->addText('Adalah benar nama tersebut diatas penduduk Desa Suka Mulya Kecamatan Batu Ceper Kabupaten Banten dengan ini menerangkan bahwa $$.');
    $section->addText('Demikian surat keterangan ini untuk dipergunakan sebagaimana mestinya.');
    $phpWord->setDefaultFontName('Times New Roman');
    $phpWord->setDefaultFontSize(12);
    $table_style = new \PhpOffice\PhpWord\Style\Table;
    $table_style->setUnit(\PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT);
    $table_style->setWidth(100 * 50);
    $section->addTextBreak(2);
    $table = $section->addTable($table_style);
    $table->addRow();
    $table->addCell(1500 , array('vMerge' => 'restart', 'valign'=>'center'))->addText();
    $table->addCell(500, array('vMerge' => 'restart', 'valign'=>'center'))->addText(preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->desa))).", ".date('d-m-Y', strtotime($ket_tidak_mampu->updated_at)));
    $row = $table->addRow();
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'));
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'))->addText("Kepala Desa ".preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', ucfirst(camel_case($profil_desa->desa))));
    $row = $table->addRow();
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'));
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'));
    $row = $table->addRow();
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'));
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'));
    $row = $table->addRow();
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'));
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'));
    $row = $table->addRow();
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'));
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'));
    $row = $table->addRow();
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'));
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'));
    $row = $table->addRow();
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'));
    $table->addCell(null, array('vMerge' => 'restart', 'valign'=>'center'))->addText($profil_desa->kepala_desa);

    // Image
    // $section->addImage('resources/_earth.jpg', array('width'=>18, 'height'=>18));
    // Save file
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save('ket_tidak_mampu.docx');
    return response()->download('ket_tidak_mampu.docx');
  }

  protected function getFormatedDate($ket_tidak_mampu) {
    $ket_tidak_mampu->tanggal_lahir = Carbon::parse($ket_tidak_mampu->tanggal_lahir)->format('d-m-Y');
    $ket_tidak_mampu->masa_berlaku_start = Carbon::parse($ket_tidak_mampu->masa_berlaku_start)->format('d-m-Y');
    $ket_tidak_mampu->masa_berlaku_end = Carbon::parse($ket_tidak_mampu->masa_berlaku_end)->format('d-m-Y');
    return $ket_tidak_mampu;
  }

  protected function getProfilDesa() {
    $profil_desa = ProfilDesa::first();
    if (empty($profil_desa)) {
      Session::flash('failed_message', "Profil Desa Belum Terisi");
      return redirect('profil_desa');
    }
    return $profil_desa;
  }

  protected function validator(array $ket_tidak_mampu)
  {
      return Validator::make($ket_tidak_mampu, [
          'nomor' => 'required',
          'nama' => 'required|string',
          'nilk' => 'nullable',
          'tempat_lahir' => 'required',
          'tanggal_lahir' => 'required|date',
          'kelamin' => 'required',
          'kewarganegaraan' => 'required',
          'agama' => 'required',
          'pekerjaan' => 'required',
          'status' => 'required',
          'alamat' => 'required',
          'keperluan' => 'required',
          'masa_berlaku_start' => 'required|date',
          'masa_berlaku_end' => 'required|date',
      ], [
          'required' => 'Kolom :attribute wajib diisi.',
          'date' => 'Kolom :attribute diisi dengan format hh/bb/tttt.',
          'digits' => 'Kolom :attribute diisi dengan 4 karakter numerik.',
          'string' => 'Kolom :attribute diisi dengan alfanumerik'
      ]);
  }
}
