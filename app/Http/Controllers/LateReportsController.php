<?php

namespace App\Http\Controllers;

use App\Models\AcctCreditsAccount;
use Illuminate\Http\Request;
use App\Imports\AcctCreditsAccountImport;
use App\Models\AcctCreditsMemorandum;
use App\Models\PreferenceCollectibility;
use App\Models\PreferenceCompany;
use DateTime;
use PDF;

use Maatwebsite\Excel\Facades\Excel;

class LateReportsController extends Controller
{

    public function setToken(){
        session()->put('credits_account_token', md5(date("YmdHis")));
    }
    public function getToken(){
        return session()->get('credits_account_token');
    }
    public function getCollectibilityFromCreditsAccount($acct_credits_account, $collectibility){
        $date 	= date('Y-m-d');
        $acct_credits_account = $acct_credits_account;
        $preferencecollectibility = PreferenceCollectibility::get();
        $acct_credits_account_view = $acct_credits_account;
        $acct_credits_account_temp = array();
        foreach($acct_credits_account_view as $row => $credits_account){
            $date1 = new DateTime($date);
            $date2 = new DateTime($credits_account['credits_account_payment_date']);
            $interval    = $date1->diff($date2);
            $tunggakan = $interval->format('%a');
            if($date2 >= $date1){
                $tunggakan2 = 0;
            }else{
                $tunggakan2 = $tunggakan;
            }

           
            foreach ($preferencecollectibility as $k => $v) {
                if($tunggakan2 >= $v['collectibility_bottom'] && $tunggakan2 <= $v['collectibility_top']){
                    $collectibility_name = $v['collectibility_name'];
                    $collectibility_id = $v['collectibility_id'];
                }
            }
            $acct_credits_account[$row]->collectibility_name = $collectibility_name;
            $acct_credits_account[$row]->collectibility_id = $collectibility_id;
            if($acct_credits_account[$row]->collectibility_id == $collectibility){
                $acct_credits_account_temp[$row] = $acct_credits_account[$row];
            }
        } 
        if($collectibility){
            $acct_credits_account = $acct_credits_account_temp;
        }
        return $acct_credits_account;
    }
    public function index()
    {
        $this->setToken(); 
        $acct_credits_account = AcctCreditsAccount::where('data_state', '0')->get();
        $acct_credits_account_view = $this->getCollectibilityFromCreditsAccount($acct_credits_account, '');
        return view('lateReport.lateReport', 
        [
            'first_date'                => '',
            'last_date'                 => '',
            'credits_id'                => '',
            'branch_id'                 => '',
            'business_collector_id'     => '',
            'business_officer_id'       => '',
            'collectibility_id'         => '',
            'acct_credits_account'      => $acct_credits_account_view,
            'core_branch'               => AcctCreditsAccount::getAllBranch(),
            'core_business_collector'   => AcctCreditsAccount::getAllBusinessCollector(),
            'core_business_officer'     => AcctCreditsAccount::getAllBusinessOfficer(),
            'preference_collectibility' => AcctCreditsAccount::getAllPreferenceCollectibility(),
            'acct_credits'              => AcctCreditsAccount::getAllCredits(),
        ]);
    }


    public function filterLateReports(Request $request){
        $this->setToken();

        $acct_credits_account = AcctCreditsAccount::where('data_state', '0');
        if($request->first_date){
            $acct_credits_account->where('credits_account_date', '>=', $request->first_date);
        }
        if($request->last_date){
            $acct_credits_account->where('credits_account_date', '<=', $request->last_date);
        }

        if($request->credits_id){
            $acct_credits_account->where('credits_id', $request->credits_id);
        }

        if($request->branch_id){
            $acct_credits_account->where('branch_id', $request->branch_id);
        }
        if($request->business_collector_id){
            $acct_credits_account->where('business_collector_id', $request->business_collector_id);
        }
        if($request->business_officer_id){
            $acct_credits_account->where('business_officer_id', $request->business_officer_id);
        }
        if($request->collectibility){
            $acct_credits_account = $this->getCollectibilityFromCreditsAccount($acct_credits_account->get(), $request->collectibility);
        }

        return view('lateReport.lateReport', 
        [
            'first_date'                => $request->first_date,
            'last_date'                 => $request->last_date,
            'credits_id'                => $request->credits_id,
            'branch_id'                 => $request->branch_id,
            'business_collector_id'     => $request->business_collector_id,
            'business_officer_id'       => $request->business_officer_id,
            'collectibility_id'         => $request->collectibility,
            'acct_credits_account'      => $acct_credits_account->get(),
            'acct_credits_account_edit' => new AcctCreditsAccount,
            'core_business_collector'   => AcctCreditsAccount::getAllBusinessCollector(),
            'core_business_officer'     => AcctCreditsAccount::getAllBusinessOfficer(),
            'preference_collectibility' => AcctCreditsAccount::getAllPreferenceCollectibility(),
            'core_branch'               => AcctCreditsAccount::getAllBranch(),
            'acct_credits'              => AcctCreditsAccount::getAllCredits(),
        ]);
    }

    public function printLateReportsST($credits_account_id){
        
        $acct_credits_memorandum = AcctCreditsMemorandum::where('credits_account_id', $credits_account_id)->first();
        $this->printTemplateMemorandum('ST', $acct_credits_memorandum);
    }
    public function printLateReportsSP1($credits_account_id){
        
        $acct_credits_memorandum = AcctCreditsMemorandum::where('credits_account_id', $credits_account_id)->first();
        $this->printTemplateMemorandum('SP1', $acct_credits_memorandum);
    }
    public function printLateReportsSP2($credits_account_id){
        
        $acct_credits_memorandum = AcctCreditsMemorandum::where('credits_account_id', $credits_account_id)->first();
        $this->printTemplateMemorandum('SP2', $acct_credits_memorandum);
    }
    public function printLateReportsSP3($credits_account_id){
        
        $acct_credits_memorandum = AcctCreditsMemorandum::where('credits_account_id', $credits_account_id)->first();
        $this->printTemplateMemorandum('SP3', $acct_credits_memorandum);
    }

    public function printTemplateMemorandum($type_memorandum, $data_memorandum){
        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
         
            return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' '. $pecahkan[2];
        }

        $company = PreferenceCompany::first();
        if($type_memorandum == 'ST'){
            $letter_number      =  $data_memorandum->credits_reprimand_letter;
            $letter_reference   =  $data_memorandum->credits_account_serial;
           $regreding           = 'Surat Teguran'; 
           $deadline            = $company->duration_due_date_st;
        }else if($type_memorandum == 'SP1'){
            $letter_number      =  $data_memorandum->credits_warning_letter_1;
            $letter_reference   =  $data_memorandum->credits_reprimand_letter;
            $regreding          = 'Surat Peringatan 1';
            $deadline           = $company->duration_due_date_sp1;
        }else if($type_memorandum == 'SP2'){
            $letter_number      =  $data_memorandum->credits_warning_letter_2;
            $letter_reference   =  $data_memorandum->credits_warning_letter_1;
            $regreding          = 'Surat Peringatan 2';
            $deadline           = $company->duration_due_date_sp2;
        }else if($type_memorandum == 'SP3'){
            $letter_number      =  $data_memorandum->credits_warning_letter_3;
            $letter_reference   =  $data_memorandum->credits_warning_letter_2;
            $regreding          = 'Surat Peringatan 3';
            $deadline           = $company->duration_due_date_sp3;
        }
        
        $credits_interest_acctualy = $data_memorandum->credits_account->credits_account_interest_amount * $data_memorandum->credits_account->credits_account_period;
        $credits_interest = $credits_interest_acctualy - $data_memorandum->credits_account->credits_account_interset_last_balance;

        $total_amount = $data_memorandum->credits_account->credits_account_last_balance + $data_memorandum->credits_account->credits_account_accumulated_fines + $credits_interest;

        //Tunggakan
        $date1 = new DateTime(date('Y-m-d'));
        $date2 = new DateTime($data_memorandum->credits_account->credits_account_payment_date);
        $interval    = $date1->diff($date2);
        $tunggakan = $interval->format('%a');
        if($date2 >= $date1){
            $tunggakan2 = 0;
        }else{
            $tunggakan2 = $tunggakan;
        }
        PDF::SetPrintHeader(false);
		PDF::SetPrintFooter(false);
        PDF::SetMargins(20, 30, 20, 20); // put space of 10 on top
        PDF::SetFont('helvetica', '', 10);
        $html = '
        <table>
            <tr>
                <td width="50%">Nomor :  '.$letter_number.' </td>
                <td width="50%" style="text-align:right">'.$data_memorandum->branch->branch_address.', '.tgl_indo(date('d-m-Y')).' </td>
            </tr>
        </table>
        <span>Kepada</span><br><span>Yth. Bp/ Ibu/ Sdr / Sdri</span><br><span><b><u>'.$data_memorandum->credits_account->credits_account_name.'</u></b></span><br><span>'.$data_memorandum->credits_account->credits_account_address.'</span><br><br><br><span>Perihal : '.$regreding.'</span><br><br><span><i>Assalamualaikum Warahmatullahi Wabarakatuh</i></span><br><span>Dengan Hormat,</span><br><p>Menunjuk : Perjanjian Kredit Nomor : '.$letter_reference.' '.$data_memorandum->credits_account->credits_account_date.' 
        </p>
        <p style="text-align:justify">Bersama ini kami memberitahukan dan mengingatkan bahwa saudara telah melakukan wanprestasi, sehingga terdapat keterlambatan pembayaran kewajiban pokok dan/atau bunga, denda keterlambatan dan kewajiban lainnya yang timbul atas fasilitas kredit Saudara di KOPERASI '.$company->company_name.', '.$data_memorandum->branch->branch_name.'. Fasilitas Pinjaman '.$data_memorandum->credits_account->credits->credits_name.'. Selama : 3 hari sampai dengan tanggal Surat Teguran ini di cetak
        </p>

        <table width="100%" border="1px" style="text-align:center">
            <tr>
                <td>Tunggakan Hari</td>
                <td>Angsuran Pokok</td>
                <td>Tunggakan Bunga</td>
                <td>Denda s/d Tgl '.date('d-m-Y').'</td>
                <td>Total kewajiban yang wajib dibayarkan s/d Tgl '.date('d-m-Y').'</td>
            </tr>
            <tr>
                <td height="25px">'.$tunggakan2.'</td>
                <td>Rp. '.number_format($data_memorandum->credits_account->credits_account_last_balance, 2).'</td>
                <td>Rp. '.number_format($credits_interest, 2).'</td>
                <td>Rp. '.number_format($data_memorandum->credits_account->credits_account_accumulated_fines, 2).'</td>
                <td>Rp. '.number_format($total_amount , 2).'</td>
            </tr>
        </table>
        <p>Kami harapkan kerjasama yang baik dari Saudara untuk menyelesaikan seluruh kewajiban tersebut selambat-lambatnya pada '.$deadline.' hari Kerja sejak tanggal surat ini tercetak
        </p>
        <p>hal tersebut guna menjaga <b>kredibilitas</b> dan <b>track record</b> pinjaman Saudara di PT Madani Indonesia</p>
        <p>Demikian kami sampaikan, atas perhatian dan kerjasama yang baik, kami ucapkan terima kasih.<br><i>Wassalamu’alaikum Warahmatullahi Wabarakatuh</i></p>
        <span style="text-align:center"><b>KSPS .<br> '.$data_memorandum->branch->branch_name.'</b></span>
        <br><br>
        <br><br>
        <br><br>
        <table>
            <tr>
            <td style="text-align:right"><b><u>Rochmad Judianto</u></b></td>
            <td width="20%"></td>
            <td style="text-align:left"><b><u>Tonny Agus Satono Daniel</u></b></td>
            </tr>
            <tr>
            <td style="text-align:right">Cluster Manager</td>
            <td width="20%"></td>
            <td style="text-align:left">Wakil. Koordinator Task Force</td>
            </tr>
        </table>
        ';
      
        PDF::SetTitle($type_memorandum.$data_memorandum->credits_account->credits_account_name);
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output($type_memorandum.$data_memorandum->credits_account->credits_account_name.'.pdf');
    }

}
