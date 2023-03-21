<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterInput4;
use App\Models\MasterInput4Parameter;

use App\Models\KategoriInput;

class MasterInputController4 extends Controller
{

  public function index(Request $request)
  {
    try {

      $query_master = MasterInput4::where('tahun', '!=', '');

      if ($request->tahun != '') {
        $query_master->where('tahun', $request->tahun);
      }
      if ($request->txt_cari != '') {
        $query_master->where('key_performance', 'like', '%' . $request->txt_cari . '%');
      }

      $data = $query_master->get();

      $pasienid = MasterInput4Parameter::get();

      return view('pages.admin.master-input-4', [
        "datamasterinput" => $data,
        "data_tahun" => DaftarTahun(),
        "data_pasien_id" => $pasienid,
        "txt_cari" => $request->txt_cari
      ]);

    } catch (\Exception $e) {
      return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }
  public function add(Request $request)
  {
    try {

      $datakategori = KategoriInput::where('input', 'input_4')->get();
      $pasienid = MasterInput4Parameter::get();
      $pasienidfirst = MasterInput4Parameter::where('pasien_id', 'pasien_lama')->first();

      return view('pages.admin.master-input-4-add', [
        "data_kategori" => $datakategori,
        "data_pasien_id" => $pasienid,
        "data_pasien_first" => $pasienidfirst,
        "data_tahun" => DaftarTahun(),
      ]);
    } catch (\Exception $e) {
      return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }

  public function process(Request $request)
  {
    try {
      $payload = $request->all();
      $payload['kode'] = rand(0000, 9999);
      $payload['bpjs'] = $request->total_bl * $request->bpjs_par;
      $payload['tunai'] = $request->total_bl * $request->tunai_par;
      $payload['kredit'] = $request->total_bl * $request->kredit_par;

      MasterInput4::create($payload);
      return redirect()->route('adm-master-input-4-add')->with('message', "Data Berhasil di update")->with('color-alert', "success");
    } catch (\Exception $e) {
      return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }

  public function edit(Request $request, $id)
  {
    try {
      $datakategori = KategoriInput::where('input', 'input_4')->get();
      $dataedit = MasterInput4::find(Dec($id));
      $pasienid = MasterInput4Parameter::get();

      return view('pages.admin.master-input-4-edit', [
        "data_kategori" => $datakategori,
        "data_tahun" => DaftarTahun(),
        "data_pasien_id" => $pasienid,
        "data_edit" => $dataedit
      ]);
    } catch (\Exception $e) {
      return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }


  public function update(Request $request, $id)
  {
    try {
      $update = MasterInput4::find(Dec($id));
      
      $payload = $request->all();
      $payload['kode'] = rand(0000, 9999);
      $payload['bpjs'] = $request->total_bl * $request->bpjs_par;
      $payload['tunai'] = $request->total_bl * $request->tunai_par;
      $payload['kredit'] = $request->total_bl * $request->kredit_par;

      $update->update($payload);

      return redirect()->route('adm-master-input-4')->with('message', "Data Berhasil di update")->with('color-alert', "success");
    } catch (\Exception $e) {
      return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }

  }

  public function delete(Request $request)
  {
    try {
      $delete = MasterInput4::find(Dec($request->delete_menu));
      $delete->delete();
      return redirect()->back()->with('message', "Data Berhasil di Hapus")->with('color-alert', "success");

    } catch (\Exception $e) {
      return back()->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }
}