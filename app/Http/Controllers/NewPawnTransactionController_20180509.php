<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\Mortgage;
use App\Pawn;

class NewPawnTransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // /edit.php?post_type=page

        //return 'NewPawnTransactionController index';
        //return view('layouts.template-parts.page.newpawn.create_new_pawn_transaction');
        return view('layouts.template-parts.page.newpawn.datatables_new_pawn_transaction');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // /post-new.php?post_type=page
        return view('layouts.template-parts.page.newpawn.create_new_pawn_transaction');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save to db
        //make the button save new pawn transaction text - update new pawn transaction text
        //remember the values
        //web_20180313-before_edit.php
        //Route::post('/store_customer_pawn', function (Request $request) {})
        //redirect when validation success edit($id) - Route::get('/edit_customer_pawn', function (Request $request) {

        //dd($request->all());

        // Get the currently authenticated user's ID...
        $user_id = Auth::id();

        //$user_id = 1; //For testing

        //if($request->ajax()){   

            //dd($request->all());

            $messages = [
                //General
                'required' => ':attribute field is required.',

                //Customer Details

                //Pawn Transaction
                'loan_amount_in_numbers.numeric' => ':attribute field should be numeric',
                'interest_rate_in_numbers.numeric' => ':attribute field should be numeric',
                'appraised_value_in_numbers.numeric' => ':attribute field should be numeric',
                'penalty_interest.numeric' => ':attribute field should be numeric',
                'principal.numeric' => ':attribute field should be numeric',
                'interest_in_absolute_amount.numeric' => ':attribute field should be numeric',
                'service_charge_in_amount.numeric' => ':attribute field should be numeric',
                'net_proceeds.numeric' => ':attribute field should be numeric',
                'effective_interest_rate_in_percent.numeric' => ':attribute field should be numeric',
            ];

            $validator = Validator::make($request->all(), [
                //Pawn Transaction

                'full_name' => 'required',
                'complete_address' => 'required',
                'branch' => 'required',
                'pawn_ticket_number' => 'required',
                'loan_amount_in_numbers' => 'required|numeric',
                'interest_rate_in_numbers' => 'nullable|numeric',
                'appraised_value_in_numbers' => 'nullable|numeric',
                'penalty_interest' => 'nullable|numeric',
                'description_of_the_pawn' => 'required',
                'principal' => 'nullable|numeric',
                'interest_in_absolute_amount' => 'nullable|numeric',
                'service_charge_in_amount' => 'nullable|numeric',
                'net_proceeds' => 'nullable|numeric',
                'effective_interest_rate_in_percent' => 'nullable|numeric',
            ], $messages);

            if ($validator->fails())
            {
                return redirect('/newpawntransaction/create')
                            ->withErrors($validator)
                            ->withInput();

                //or

                //return back()->withErrors($validator)->withInput();
            } else {

                $customer = new Customer;

                $customer->user_id = $user_id;
                $customer->full_name = ucwords(trim($request->full_name));
                $customer->complete_address = ucwords(trim($request->complete_address));
                $customer->identification_card_type = ucwords(trim($request->identification_card_type));
                $customer->identification_card = trim($request->identification_card);
                $customer->contact_number = trim($request->contact_number);

                if ( $customer->save() ) {

                    //dd($customer);
                    $mortgage = new Mortgage;

                    $mortgage->customer_id = $customer->id;
                    $mortgage->user_id = $user_id;
                    $mortgage->branch = ucwords($request->branch);
                    //$mortgage->or_number = $request->or_number;
                    $mortgage->pawn_ticket_number = $request->pawn_ticket_number;
                    //$mortgage->ref_pawn_ticket_number = $request->ref_pawn_ticket_number;
                    $mortgage->date_loan_granted = date('Y-m-d', strtotime($request->date_loan_granted));
                    $mortgage->maturity_date = date('Y-m-d', strtotime($request->maturity_date));
                    $mortgage->expiry_date_of_redemption_period = date('Y-m-d',strtotime($request->expiry_date_of_redemption_period));
                    $mortgage->loan_amount_in_numbers = $request->loan_amount_in_numbers;
                    $mortgage->interest_rate_in_numbers = $request->interest_rate_in_numbers;
                    $mortgage->appraised_value_in_numbers = $request->appraised_value_in_numbers;
                    $mortgage->penalty_interest = $request->penalty_interest;
                    $mortgage->principal = $request->principal;
                    $mortgage->interest_in_absolute_amount = $request->interest_in_absolute_amount;
                    $mortgage->service_charge_in_amount = $request->service_charge_in_amount;
                    $mortgage->net_proceeds = $request->net_proceeds;
                    $mortgage->effective_interest_rate_in_percent = $request->effective_interest_rate_in_percent;
                    $mortgage->loan_status = $request->loan_status;

                    if ( isset($request->canceled_transaction) ) {
                        $mortgage->canceled_transaction = 'true';
                    } else {
                        $mortgage->canceled_transaction = 'false';
                    }


                    if ( $mortgage->save() ) {

                        //dd($mortgage);
                        $pawn = new Pawn;

                        $pawn->mortgage_id = $mortgage->id;
                        $pawn->customer_id = $customer->id;
                        $pawn->user_id = $user_id;
                        $pawn->description_of_the_pawn = ucwords($request->description_of_the_pawn);

                        if ( $pawn->save() ) {

                            //dd($pawn);

                            //return redirect()->route('editCustomerPawn', ['customer_id' => $customer->id, 'mortgage_id' => $mortgage->id, 'pawn_id' => $pawn->id])
                                    //->with('status', 'Saved Successfully...')
                                    //->withInput();

                            //return redirect('/newpawntransaction/edit' . $customer->id, ['customer_id' => $customer->id, 'mortgage_id' => $mortgage->id, 'pawn_id' => $pawn->id])
                                //->withInput();

                            return redirect()->action('NewPawnTransactionController@edit', ['id' => $customer->id])->with('status', 'Saved Successfully...')->withInput();

                        }

                    }

                }
            }   

        //}



        //return view('layouts.template-parts.page.newpawn.edit_new_pawn_transaction');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);

        $customer_id = $id;

        $customer = Customer::find($customer_id);
        $mortgages = Customer::find($customer_id)->mortgages()->where('loan_status', 'new-pawn-transaction')->first();
         //$mortgages = DB::table('mortgages')->where('id', $request->mortgage_id)->first();
        //dd($mortgages);
        $pawn = Mortgage::find($mortgages->id)->pawn;

        $data = [
                    'id' => $id,
                    'customer_id' => $customer_id, 
                    'mortgage_id' => $mortgages->id, 
                    'pawn_id' => $pawn->id,

                    'full_name' => $customer->full_name,
                    'complete_address' => $customer->complete_address,
                    'identification_card_type' => $customer->identification_card_type,
                    'identification_card' => $customer->identification_card,
                    'contact_number' => $customer->contact_number,

                    'branch' => $mortgages->branch,
                    //'or_number' => $mortgages->or_number,
                    'pawn_ticket_number' => $mortgages->pawn_ticket_number,
                    //'ref_pawn_ticket_number' => $mortgages->ref_pawn_ticket_number,
                    'date_loan_granted' => date('m/d/Y', strtotime($mortgages->date_loan_granted)),
                    'maturity_date' => date('m/d/Y', strtotime($mortgages->maturity_date)),
                    'expiry_date_of_redemption_period' => date('m/d/Y', strtotime($mortgages->expiry_date_of_redemption_period)),

                    'loan_amount_in_numbers' => $mortgages->loan_amount_in_numbers,
                    'interest_rate_in_numbers' => $mortgages->interest_rate_in_numbers,

                    'appraised_value_in_numbers' => $mortgages->appraised_value_in_numbers,
                    'penalty_interest' => $mortgages->penalty_interest,
                    
                    'principal' => $mortgages->principal,
                    'interest_in_absolute_amount' => $mortgages->interest_in_absolute_amount,
                    'service_charge_in_amount' => $mortgages->service_charge_in_amount,
                    'net_proceeds' => $mortgages->net_proceeds,
                    'effective_interest_rate_in_percent' => $mortgages->effective_interest_rate_in_percent,
                    //'pledge_time_period_type' => $mortgages->pledge_time_period_type,
                    'loan_status' => $mortgages->loan_status,

                    'canceled_transaction' => $mortgages->canceled_transaction,

                    'description_of_the_pawn' => $pawn->description_of_the_pawn
                ];


        return view('layouts.template-parts.page.newpawn.show_new_pawn_transaction', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //dd($id);

        $customer_id = $id;

        $customer = Customer::find($customer_id);
        $mortgages = Customer::find($customer_id)->mortgages()->where('loan_status', 'new-pawn-transaction')->first();
         //$mortgages = DB::table('mortgages')->where('id', $request->mortgage_id)->first();
        //dd($mortgages);
        $pawn = Mortgage::find($mortgages->id)->pawn;

        $data = [
                    'id' => $id,
                    'customer_id' => $customer_id, 
                    'mortgage_id' => $mortgages->id, 
                    'pawn_id' => $pawn->id,

                    'full_name' => $customer->full_name,
                    'complete_address' => $customer->complete_address,
                    'identification_card_type' => $customer->identification_card_type,
                    'identification_card' => $customer->identification_card,
                    'contact_number' => $customer->contact_number,

                    'branch' => $mortgages->branch,
                    //'or_number' => $mortgages->or_number,
                    'pawn_ticket_number' => $mortgages->pawn_ticket_number,
                    //'ref_pawn_ticket_number' => $mortgages->ref_pawn_ticket_number,
                    'date_loan_granted' => date('m/d/Y', strtotime($mortgages->date_loan_granted)),
                    'maturity_date' => date('m/d/Y', strtotime($mortgages->maturity_date)),
                    'expiry_date_of_redemption_period' => date('m/d/Y', strtotime($mortgages->expiry_date_of_redemption_period)),

                    'loan_amount_in_numbers' => $mortgages->loan_amount_in_numbers,
                    'interest_rate_in_numbers' => $mortgages->interest_rate_in_numbers,

                    'appraised_value_in_numbers' => $mortgages->appraised_value_in_numbers,
                    'penalty_interest' => $mortgages->penalty_interest,
                    
                    'principal' => $mortgages->principal,
                    'interest_in_absolute_amount' => $mortgages->interest_in_absolute_amount,
                    'service_charge_in_amount' => $mortgages->service_charge_in_amount,
                    'net_proceeds' => $mortgages->net_proceeds,
                    'effective_interest_rate_in_percent' => $mortgages->effective_interest_rate_in_percent,
                    //'pledge_time_period_type' => $mortgages->pledge_time_period_type,
                    'loan_status' => $mortgages->loan_status,

                    'canceled_transaction' => $mortgages->canceled_transaction,

                    'description_of_the_pawn' => $pawn->description_of_the_pawn
                ];


        return view('layouts.template-parts.page.newpawn.edit_new_pawn_transaction', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //dd($id);
        $customer_id = $id;

        $customer = Customer::find($request->customer_id);
         $mortgages = Customer::find($customer_id)->mortgages()->where('loan_status', 'new-pawn-transaction')->first();
        //dd($mortgages);
        $pawn = Mortgage::find($mortgages->id)->pawn;


        //dd($request->all());

        // Get the currently authenticated user's ID...
        //$user_id = Auth::id();

        $user_id = $customer->user_id;

        //$user_id = 1; //For testing

        //if($request->ajax()){   

            //dd($request->all());

            $messages = [
                //General
                'required' => ':attribute field is required.',

                //Customer Details

                //Pawn Transaction
                'loan_amount_in_numbers.numeric' => ':attribute field should be numeric',
                'interest_rate_in_numbers.numeric' => ':attribute field should be numeric',
                'appraised_value_in_numbers.numeric' => ':attribute field should be numeric',
                'penalty_interest.numeric' => ':attribute field should be numeric',
                'principal.numeric' => ':attribute field should be numeric',
                'interest_in_absolute_amount.numeric' => ':attribute field should be numeric',
                'service_charge_in_amount.numeric' => ':attribute field should be numeric',
                'net_proceeds.numeric' => ':attribute field should be numeric',
                'effective_interest_rate_in_percent.numeric' => ':attribute field should be numeric',
            ];

            $validator = Validator::make($request->all(), [
                //Pawn Transaction

                'full_name' => 'required',
                'complete_address' => 'required',
                'branch' => 'required',
                'pawn_ticket_number' => 'required',
                'loan_amount_in_numbers' => 'required|numeric',
                'interest_rate_in_numbers' => 'nullable|numeric',
                'appraised_value_in_numbers' => 'nullable|numeric',
                'penalty_interest' => 'nullable|numeric',
                'description_of_the_pawn' => 'required',
                'principal' => 'nullable|numeric',
                'interest_in_absolute_amount' => 'nullable|numeric',
                'service_charge_in_amount' => 'nullable|numeric',
                'net_proceeds' => 'nullable|numeric',
                'effective_interest_rate_in_percent' => 'nullable|numeric',
            ], $messages);

            if ($validator->fails())
            {
                return redirect('/newpawntransaction/edit')
                            ->withErrors($validator)
                            ->withInput();

                //or

                //return back()->withErrors($validator)->withInput();
            } else {

                $customer->user_id = $user_id;
                $customer->full_name = ucwords(trim($request->full_name));
                $customer->complete_address = ucwords(trim($request->complete_address));
                $customer->identification_card_type = ucwords(trim($request->identification_card_type));
                $customer->identification_card = trim($request->identification_card);
                $customer->contact_number = trim($request->contact_number);

                if ( $customer->save() ) {

                    //dd($customer);

                    $mortgages->customer_id = $customer->id;
                    $mortgages->user_id = $user_id;
                    $mortgages->branch = ucwords($request->branch);
                    //$mortgages->or_number = $request->or_number;
                    $mortgages->pawn_ticket_number = $request->pawn_ticket_number;
                    //$mortgages->ref_pawn_ticket_number = $request->ref_pawn_ticket_number;
                    $mortgages->date_loan_granted = date('Y-m-d', strtotime($request->date_loan_granted));
                    $mortgages->maturity_date = date('Y-m-d', strtotime($request->maturity_date));
                    $mortgages->expiry_date_of_redemption_period = date('Y-m-d',strtotime($request->expiry_date_of_redemption_period));
                    $mortgages->loan_amount_in_numbers = $request->loan_amount_in_numbers;
                    $mortgages->interest_rate_in_numbers = $request->interest_rate_in_numbers;
                    $mortgages->appraised_value_in_numbers = $request->appraised_value_in_numbers;
                    $mortgages->penalty_interest = $request->penalty_interest;
                    $mortgages->principal = $request->principal;
                    $mortgages->interest_in_absolute_amount = $request->interest_in_absolute_amount;
                    $mortgages->service_charge_in_amount = $request->service_charge_in_amount;
                    $mortgages->net_proceeds = $request->net_proceeds;
                    $mortgages->effective_interest_rate_in_percent = $request->effective_interest_rate_in_percent;
                    $mortgages->loan_status = $request->loan_status;

                    if ( isset($request->canceled_transaction) ) {
                        $mortgages->canceled_transaction = 'true';
                    } else {
                        $mortgages->canceled_transaction = 'false';
                    }


                    if ( $mortgages->save() ) {

                        //dd($mortgage);

                        $pawn->mortgage_id = $mortgages->id;
                        $pawn->customer_id = $customer->id;
                        $pawn->user_id = $user_id;
                        $pawn->description_of_the_pawn = ucwords($request->description_of_the_pawn);

                        if ( $pawn->save() ) {

                            //dd($pawn);

                            //return redirect()->route('editCustomerPawn', ['customer_id' => $customer->id, 'mortgage_id' => $mortgage->id, 'pawn_id' => $pawn->id])
                                    //->with('status', 'Saved Successfully...')
                                    //->withInput();

                            //return redirect('/newpawntransaction/edit' . $customer->id, ['customer_id' => $customer->id, 'mortgage_id' => $mortgage->id, 'pawn_id' => $pawn->id])
                                //->withInput();

                            return redirect()->action('NewPawnTransactionController@edit', ['id' => $customer->id])->with('status', 'Updated Successfully...')->withInput();

                        }

                    }

                }
            }   

        //}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function getDataTablesObject()
    {
        return view('layouts.template-parts.page.newpawn.create_new_pawn_transaction');
    }

    public function getDataTablesObjectData(Request $request, Datatables $datatables)
    {

        //dd($request);

        /*$query = DB::table('customers')
                       ->join('mortgages', 'customers.id', '=', 'mortgages.customer_id')
                       ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
                       ->select('customers.id AS new_pawn_transaction_id', 'customers.*', 'mortgages.*', 'pawns.*');*/

        $query = DB::table('customers')
                       ->join('mortgages', 'customers.id', '=', 'mortgages.customer_id')
                       ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
                       ->select('customers.id AS new_pawn_transaction_id', 'customers.*', 'mortgages.*', 'pawns.*')
                       //->select('customers.*', 'mortgages.*', 'pawns.*')
                       ->where('loan_status', 'new-pawn-transaction');

        //dd($query->get());

        return Datatables::of($query)->addColumn('action', function ($query) {
                    //return '<button type="button" class="btn-preview-pawn btn btn-primary" data-customer_id="'. $query->customer_id .'" data-mortgage_id="' . $query->mortgage_id . '" data-pawn_id="' . $query->id . '"><i class="fa fa-file-o"></i></button>';


                    return '<a href="'.url('/newpawntransaction/show').'/'.$query->customer_id.'" title="View">View</a> | <a href="'.url('/newpawntransaction/edit').'/'.$query->customer_id.'" title="Edit">Edit </a> | Delete';

                })->make();

    }


}