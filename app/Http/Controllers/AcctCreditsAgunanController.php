<?php

namespace App\Http\Controllers;

use App\Models\AcctCreditsAgunan;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AcctCreditsAgunanController extends Controller
{
    public function setToken(){
        session()->put('credits_agunan_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('credits_agunan_token');
    }
    
    public function index()
    {
        
        $this->setToken();
        $acct_credits_agunan = AcctCreditsAgunan::where('data_state', '0')->get();
        return view('agunan.agunan', ['acct_credits_agunan' => $acct_credits_agunan]);
    }

    public function processAddTempCreditsAgunanBPKB(Request $request){
       
        $credits_agunan_temp = [
            'type'          => $request->type,
            'keterangan'    => ' Nomor : '. $request->credits_agunan_bpkb_nomor . 
                               ' Nama : ' . $request->credits_agunan_bpkb_nomor .
                               ' No Nopol : ' . $request->credits_agunan_bpkb_nopol .
                               ' No Mesin : ' . $request->credits_agunan_bpkb_no_mesin .
                               ' No Rangka : ' . $request->credits_agunan_bpkb_no_rangka .
                               ' Taksiran : ' . $request->credits_agunan_bpkb_taksiran .
                               ' Keterangan : ' . $request->credits_agunan_bpkb_keterangan 
        ];
        $credits_agunan_to_database = [
            'credits_agunan_type'               => 1,
            'credits_agunan_date_in'            => date("Y-m-d"),
            'credits_agunan_bpkb_nomor'         => $request->credits_agunan_bpkb_nomor, 
            'credits_agunan_bpkb_nama'          => $request->credits_agunan_bpkb_nama, 
            'credits_agunan_bpkb_nopol'         => $request->credits_agunan_bpkb_nopol, 
            'credits_agunan_bpkb_no_mesin'      => $request->credits_agunan_bpkb_no_mesin, 
            'credits_agunan_bpkb_no_rangka'     => $request->credits_agunan_bpkb_no_rangka, 
            'credits_agunan_bpkb_taksiran'      => $request->credits_agunan_bpkb_taksiran, 
            'credits_agunan_bpkb_keterangan'    => $request->credits_agunan_bpkb_keterangan,
        ];
        session()->push('credits_agunan', $credits_agunan_to_database);
        return $credits_agunan_temp;
    }

    public function processAddTempCreditsAgunanSHM(Request $request){
        $credits_agunan_temp = [
            'type'          => $request->type,
            'keterangan'    => ' Nomor : '. $request->credits_agunan_shm_no_sertifikat . 
                               ' Luas : ' . $request->credits_agunan_shm_luas .
                               ' Nama : ' . $request->credits_agunan_shm_atas_nama .
                               ' Kedudukan : ' . $request->credits_agunan_shm_kedudukan .
                               ' Taksiran : ' . $request->credits_agunan_shm_taksiran .
                               ' Keterangan : ' . $request->credits_agunan_shm_keterangan 
        ];

        $credits_agunan_to_database = [
            'credits_agunan_type'                       => 2,
            'credits_agunan_date_in'                    => date("Y-m-d"),
            'credits_agunan_shm_no_sertifikat'          => $request->credits_agunan_shm_no_sertifikat, 
            'credits_agunan_shm_atas_nama'              => $request->credits_agunan_shm_atas_nama, 
            'credits_agunan_shm_luas'                   => $request->credits_agunan_shm_luas, 
            'credits_agunan_shm_kedudukan'              => $request->credits_agunan_shm_kedudukan, 
            'credits_agunan_shm_taksiran'               => $request->credits_agunan_shm_taksiran, 
            'credits_agunan_shm_keterangan'             => $request->credits_agunan_shm_keterangan, 
        
        ];

        session()->push('credits_agunan', $credits_agunan_to_database);
        return $credits_agunan_temp;
    }
    // public function processUpdateStatus($credits_agunan_id){
    //     $credits_agunan               = AcctCreditsAgunan::findOrFail($credits_agunan_id);
    //     $credits_agunan->credits_token = $this->getToken();
    //     $credits_agunan->credits_agunan_type   = 1;
    //     if(AcctCreditsAgunan::checkToken($this->getToken())){
    //         return redirect('/agunan')->with('success', 'Data sudah dihapus Sebelumnya !');            
    //     };
    //     $credits_agunan->save() ? $msg = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

    //     return redirect('/agunan')->with('success',$msg);
    // }
}
