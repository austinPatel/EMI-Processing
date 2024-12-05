<?php

namespace App\Http\Controllers;

use App\Models\LoanDetails;
use App\Services\LoanDetailsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LoanDetailsController extends Controller
{
    protected $loanDetailsService;

    public function __construct(LoanDetailsService $loanDetailsService)
    {
        $this->loanDetailsService = $loanDetailsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loanDetails = $this->loanDetailsService->getAllLoanDetails();
        // $loanDetails = LoanDetails::all(); // Fetch all loan details
        return view('loan_details.index', compact('loanDetails'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Schema::hasTable('emi_details')){
            $emiDetails = $this->loanDetailsService->getEmiDetails();
        }
        // $emiDetails = $this->loanDetailsService->getEmiDetails();
        // dd($emiDetails);
        return view('emi_process.process_data', $emiDetails);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->loanDetailsService->processData();
        $emiDetails = $this->loanDetailsService->getEmiDetails();
        // dd($emiDetails);
        // return redirect()->route('emiprocess.data.show',compact('emiDetails'))->withSuccess(['EMI details processed successfully!']);

        return view('emi_process.process_data', ['data'=>$emiDetails['data'],'columns'=>$emiDetails['columns'],'success'=>'EMI details processed successfully!']);
        // return redirect()->back()->with();

    }

    /**
     * Display the specified resource.
     */
    public function show(LoanDetails $loanDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanDetails $loanDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoanDetails $loanDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanDetails $loanDetails)
    {
        //
    }
    public function processData(Request $request){
               
    }
}
