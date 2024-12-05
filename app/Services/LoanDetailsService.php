<?php

namespace App\Services;

use App\Interface\LoanDetailsInterface;

class LoanDetailsService
{
    protected $loanDetailsRepo;

    public function __construct(LoanDetailsInterface $loanDetailsRepo)
    {
        $this->loanDetailsRepo = $loanDetailsRepo;
    }

    public function processData()
    {
        //  Drop and recreate the table
        $this->loanDetailsRepo->dropEmiDetailsTable();

        $dateRange = $this->loanDetailsRepo->getMinAndMaxDates();

        if (!$dateRange->min_payment_date || !$dateRange->max_payment_date) {
            return false;
        }

        $startDate = new \DateTime($dateRange->min_payment_date);
        $endDate = new \DateTime($dateRange->max_payment_date);
        $columns = [];

        while ($startDate <= $endDate) {
            $columns[] = $startDate->format('Y_M');
            $startDate->modify('+1 month');
        }

        $this->loanDetailsRepo->createEmiDetailsTable($columns);

        // Process loan details and insert into the EMI table
        $loanDetails = $this->loanDetailsRepo->getAllLoanDetails();

        foreach ($loanDetails as $loan) {
            $numOfPayments = $loan->num_of_payment;
            $remainingAmount = $loan->loan_amount;
            // get the start date = first Payment date
            $startDate = new \DateTime($loan->first_payment_date);

            // get the end date = last payment date
            $endDate = new \DateTime($loan->last_payment_date);
            $emiAmount = $loan->loan_amount / $loan->num_of_payment;

            $emiData = ['clientid' => $loan->clientid];
            $i = 1;
            $defaultAmount = 0.00;
            while ($startDate <= $endDate) {
                $monthColumn = $startDate->format('Y_M');
                $allocatedAmount = ($i == $numOfPayments) ? $remainingAmount : round($emiAmount, 2);
                // dd($monthColumn);
                $emiData[$monthColumn]= $defaultAmount + $allocatedAmount;
                $remainingAmount -= $allocatedAmount;

                $startDate->modify('+1 month'); // for next month EMI
                $i++;
            }

            // Insert EmI Data into emi_details Table
            $this->loanDetailsRepo->insertEmiData($emiData);
        }

        return true;
    }

    public function getEmiDetails()
    {
        return [
            'data' => $this->loanDetailsRepo->getEmiDetails(),
            'columns' => $this->loanDetailsRepo->getEmiColumns()
        ];
    }
    
    public function getAllLoanDetails(){
        
        return $this->loanDetailsRepo->getAllLoanDetails();

    }
}
