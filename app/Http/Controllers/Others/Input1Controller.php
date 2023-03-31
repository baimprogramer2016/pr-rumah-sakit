<?php

namespace App\Http\Controllers\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterInput1;
use App\Models\PetunjukTeknis;
use App\Models\StatusPerformance;

class Input1Controller extends Controller
{
    public function index(Request $request)
    {
        try{
         
            $query_master = MasterInput1::join('kategori_input','kategori_input.id','=','master_input_1.kategori_input_id')
                                            ->where('tahun', '!=','')->distinct();
            
            $petunjuk = PetunjukTeknis::where('input','input_1')->first();

            $status_performance = StatusPerformance::get();

            if($request->tahun !='')
            {
                $query_master->where('tahun', $request->tahun);
                
            }
            else
            {
                $query_master->where('tahun','');
                
            }
          
            $data = $query_master->get(['kategori_input_id','kategori_input.keterangan']);

            foreach($data as $item_data)
            {
                if($request->tahun !='')
                {  
                    $query_data = MasterInput1::where('tahun', $request->tahun);
                }
                else
                { 
                    $query_data =MasterInput1::where('tahun','');
                }
                
                $item_data['data_input'] = $query_data->where('kategori_input_id',$item_data->kategori_input_id)->get();
                
            }

            
            return view('pages.others.input1',[
                "petunjuk" => $petunjuk,
                "data_input" => $data,
                "data_tahun" => DaftarTahun(),
                "status_performance" => $status_performance
            ]);
           
          } catch (\Exception $e) {
            return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
          }
    }
}
