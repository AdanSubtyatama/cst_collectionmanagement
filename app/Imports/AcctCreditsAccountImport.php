<?php

namespace App\Imports;

use App\Models\AcctCreditsAccount;
use Maatwebsite\Excel\Concerns\ToModel;

class AcctCreditsAccountImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AcctCreditsAccount([
            'credits_id'                            => $row[1],
            'business_officer_id'                   => $row[2],
            'province_id'                           => $row[3],
            'city_id'                               => $row[4],
            'kecamatan_id'                          => $row[5],
            'source_fund_id'                        => $row[6],
            'branch_id'                             => $row[7],
            'credits_account_name'                  => $row[8],
            'credits_account_address'               => $row[9],
            'credits_account_no'                    => $row[10],
            'credits_account_date'                  => $row[11],
            'credits_account_due_date'              => $row[12],
            'credits_account_period'                => $row[13],
            'credits_account_method'                => $row[14],
            'credits_account_total_amount'          => $row[15],
            'credits_account_payment_amount'        => $row[16],
            'credits_account_last_balance'          => $row[17],
            'credits_account_payment_to'            => $row[18],
            'credits_account_payment_date'          => $row[19],
            'credits_account_payment_date_last'     => $row[20],
            'credits_account_accumulated_fines'     => $row[21],
            'credits_account_collection_status'     => $row[22],
            'credits_account_collection_status_id'  => $row[23],
            'credits_account_collection_status_at'  => $row[24],
            'credits_account_token'                 => $row[25],
            'data_state'                            => $row[26],
            'updated_id'                            => $row[27],
            'updated_at'                            => $row[28],
            'created_id'                            => $row[29],
            'created_at'                            => $row[30],
            'deleted_id'                            => $row[31],
            'deleted_at'                            => $row[32],
            'last_update'                           => $row[33],
           
        ]);
    }
}
