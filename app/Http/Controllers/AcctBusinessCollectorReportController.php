<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcctBusinessCollectorReportRequest;
use App\Models\AcctBusinessCollectorReport;
use App\Models\PreferenceCollectibility;
use DateTime;
use Illuminate\Http\Request;

class AcctBusinessCollectorReportController extends Controller
{

    public function setToken(){
        session()->put('business_collection_report_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('business_collection_report_token');
    }
  
    public function index()
    {
        $this->setToken(); 
        
        $acct_business_collector_report = AcctBusinessCollectorReport::where('data_state', '0')->get();
        return view('collectibiltyCollectorReport.collectibiltyCollectorReport', 
        [
            'first_date'                             => '',
            'last_date'                              => '',
            'business_collector_id'                  => '',
            'branch_id'                              => '',
            'core_business_collector_report'         => $acct_business_collector_report,
            'acct_credits_account_collector'         => AcctBusinessCollectorReport::getCreditsAccountCollector(),
            'acct_credits_account'                   => AcctBusinessCollectorReport::getAllCreditsAccount(),
            'business_collector_report_edit'         => new AcctBusinessCollectorReport,
            'core_business_collector'                => AcctBusinessCollectorReport::getAllBusinessCollector(),
            'core_branch'                            => AcctBusinessCollectorReport::getAllBranch(),
        ]);

    }

    public function filterCollectorReport(Request $request){
        $this->setToken();
        $business_collector_report = new AcctBusinessCollectorReport;
        // dd($business_collector_report);
        if($request->business_collector){
           $business_collector_report = $business_collector_report->checkBusinessCollectorFromCreditsAccountColelctor($request->business_collector);
            // $business_collector_report->creditsAccountCollector->is($request->business_collector);
            // $business_collector_report->where('business_collector', $request->business_collector);

        }

        if($request->first_date){
            $business_collector_report->where('business_collector_report_date', '>=', $request->first_date);
        }
        if($request->last_date){
            $business_collector_report->where('business_collector_report_date', '<=', $request->last_date);
        }
       
        if($request->branch_id){
            $business_collector_report->where('branch_id', $request->branch_id);
        }
        return view('collectibiltyCollectorReport.collectibiltyCollectorReport', 
        [
            'first_date'                        => $request->first_date,
            'last_date'                         => $request->last_date,
            'business_collector_id'             => $request->business_collector,
            'branch_id'                         => $request->branch_id,
            'core_business_collector_report'    => $business_collector_report->get(),
            'business_collector_report_edit'    => new AcctBusinessCollectorReport,
            'core_business_collector'           => AcctBusinessCollectorReport::getAllBusinessCollector(),
            'core_branch'                       => AcctBusinessCollectorReport::getAllBranch(),

        ]);
    }

    public function processAddCollectorReport(AcctBusinessCollectorReportRequest $request)
    {   
        $data = [
            'credits_account_collector_id'                  => $request->credits_account_collector_id,
            'branch_id'                                     => $request->branch_id,
            'user_group_id'                                 => $request->user_group_id,
            'business_collector_report_date'                => $request->business_collector_report_date,
            'business_collector_report_meeting_date'        => $request->business_collector_report_meeting_date,
            'business_collector_report_description'         => $request->business_collector_report_description,
            'business_collector_report_picture'             => 'none.png',
            'business_collector_report_date'                => Date('Y-m-d'),
            'business_collector_report_others_contact'      => $request->business_collector_report_others_contact,
            'business_collector_report_meeting_with'        => $request->business_collector_report_meeting_with,
            'business_collector_report_token'               => $this->getToken(),
            'business_collector_credit_account_status'      => $request->business_collector_credit_account_status,
            'created_id'                                    => auth()->id()
           ];
        if($request->business_collector_report_picture != "") {
            $request->validate([
                'business_collector_report_picture' => 'image|max:2048|mimes:png,jpg,jpeg',
            ]);
            $file = $request->business_collector_report_picture;
            $filename = 'k-' . $request->credits_account_collector_id.'.'.$file->extension();
            $file->move(public_path('img/keadaantempat'), $filename);
            $data['business_collector_report_picture'] = $filename;
        }

        if(AcctBusinessCollectorReport::checkToken( $this->getToken())){
            return redirect('/collector-report')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        AcctBusinessCollectorReport::create($data) ? $msg = 'Data Berhasil Ditambahkan !' : $msg = 'Data gagal Ditambahkan !';
        
        return redirect('/collector-report')->with('success', $msg);            
    }

    public function editCollectorReport(AcctBusinessCollectorReport $business_collector_report_edit)
    {
        $acct_business_collector_report = AcctBusinessCollectorReport::where('data_state', '0')->get();
        return view('collectibiltyCollectorReport.edit',  [
            'first_date'                             => '',
            'last_date'                              => '',
            'business_collector_id'                  => '',
            'branch_id'                              => '',
            'core_business_collector_report'         => $acct_business_collector_report,
            'acct_credits_account_collector'         => AcctBusinessCollectorReport::getCreditsAccountCollector(),
            'acct_credits_account'                   => AcctBusinessCollectorReport::getAllCreditsAccount(),
            'business_collector_report_edit'         => $business_collector_report_edit,
            'core_business_collector'                => AcctBusinessCollectorReport::getAllBusinessCollector(),
            'core_branch'                            => AcctBusinessCollectorReport::getAllBranch(),
        ]);
    }


    public function processEditCollectorReport(AcctBusinessCollectorReportRequest $request, $business_collector_report_id)
    {
        $data = [
            'credits_account_collector_id'                  => $request->credits_account_collector_id,
            'branch_id'                                     => auth()->user()->branch_id,
            'user_group_id'                                 => $request->user_group_id,
            'business_collector_report_date'                => $request->business_collector_report_date,
            'business_collector_report_meeting_date'        => $request->business_collector_report_meeting_date,
            'business_collector_report_description'         => $request->business_collector_report_description,
            'business_collector_report_date'                => Date('Y-m-d'),
            'business_collector_report_others_contact'      => $request->business_collector_report_others_contact,
            'business_collector_report_meeting_with'        => $request->business_collector_report_meeting_with,
            'business_collector_report_token'               => $this->getToken(),
            'business_collector_credit_account_status'      => $request->business_collector_credit_account_status,
            'created_id'                                    => auth()->id()
           ];
        if($request->business_collector_report_picture != "") {
            $request->validate([
                'business_collector_report_picture' => 'image|max:2048|mimes:png,jpg,jpeg',
            ]);
            $file = $request->business_collector_report_picture;
            $filename = 'k-' . $request->credits_account_collector_id.'.'.$file->extension();
            $file->move(public_path('img/keadaantempat'), $filename);
            $data['business_collector_report_picture'] = $filename;
        }

        if(AcctBusinessCollectorReport::checkToken( $this->getToken())){
            return redirect('/collector-report')->with('success', 'Data ditambahkan Sebelumnya !');            
        };
        
        AcctBusinessCollectorReport::find($business_collector_report_id)->update($data) ?
        $msg = 'Data berhasil Diubah !' :$msg = 'Data gagal diubah !';
        return redirect('/collector-report')->with('success', $msg); 
             
    }

    public function processDeleteCollectorReport($business_collector_report_id)
    {
        $business_collector                                   = AcctBusinessCollectorReport::findOrFail($business_collector_report_id);
        $business_collector->business_collector_report_token  = $this->getToken();
        $business_collector->data_state                       = 1;
        $business_collector->deleted_id                       = auth()->id();
        $business_collector->deleted_at                       = date("Y-m-d H:i:s");
        $business_collector->save() ? $msg                    = 'Data Berhasil Dihapus !' : $msg = 'Data Gagal Dihapus !';

        return redirect('/collector-report')->with('success',$msg);
    }

   public function processMarkDoneCollectorReport($business_collector_report_id){
    if(AcctBusinessCollectorReport::checkToken( $this->getToken())){
        return redirect('/collector-report')->with('success', 'Data ditambahkan Sebelumnya !');            
    };
    $business_collector                                             = AcctBusinessCollectorReport::findOrFail($business_collector_report_id);
    $business_collector->business_collector_credit_account_status   = $this->getToken();
    $business_collector->save() ? $msg                              = 'Peminjam ditandai selesai  !' : $msg = 'Gagal Mengubah Status Peminjam ditandai selesai  !';

    return redirect('/collector-report')->with('success',$msg);
    }
   
}
