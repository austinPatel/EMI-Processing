<?php

namespace App\Repositories;

use App\Interface\LoanDetailsInterface;
use Illuminate\Support\Facades\DB;

class LoanDetailsRepository implements LoanDetailsInterface
{
    public function getAllLoanDetails()
    {
        return DB::table('loan_details')->get();
    }

    public function getMinAndMaxDates()
    {
        return DB::table('loan_details')
            ->selectRaw('MIN(first_payment_date) as min_payment_date, MAX(last_payment_date) as max_payment_date')
            ->first();
    }
    
    public function dropEmiDetailsTable()
    {
        DB::statement('DROP TABLE IF EXISTS emi_details');
    }

    public function createEmiDetailsTable(array $columns)
    {
        // Create emi_details Table
        DB::statement("CREATE TABLE emi_details (clientid BIGINT PRIMARY KEY)");

        // Add dynamic columns
        foreach ($columns as $column) {
            DB::statement("ALTER TABLE emi_details ADD COLUMN `$column` DECIMAL(10,2) DEFAULT 0");
        }
    }

    /*
        Insert EMI Process Data into EMI_DETAILS
    */
    public function insertEmiData(array $data)
    {
        DB::table('emi_details')->insert($data);
    }

    /*
        Get EMI Process Data
    */
    public function getEmiDetails()
    {
        return DB::table('emi_details')->get();
    }

     /*
        Get EMI Columns
    */
    public function getEmiColumns()
    {
        return DB::getSchemaBuilder()->getColumnListing('emi_details');
    }
}
