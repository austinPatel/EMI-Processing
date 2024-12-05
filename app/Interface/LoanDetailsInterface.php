<?php

namespace App\Interface;

interface LoanDetailsInterface
{
    public function getMinAndMaxDates();
    public function getAllLoanDetails();
    public function dropEmiDetailsTable();
    public function createEmiDetailsTable(array $columns);
    public function insertEmiData(array $data);
    public function getEmiDetails();
    public function getEmiColumns();
}
