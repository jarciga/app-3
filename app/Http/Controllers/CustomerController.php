<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Validator
use Validator;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use App\Customer;
use App\Mortgage;
use App\Pawn;
//use Validator;




class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.template-parts.page.create_sangla');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'last_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/create_sangla')
                        ->withErrors($validator)
                        ->withInput();
        } else {


            $customer_arr = array(
                'customer_number' => request()->input('customer_number'),
                'honorifics' => request()->input('honorifics'),
                'first_name' => request()->input('first_name'),
                'last_name' => request()->input('last_name'),
                'middle_name' => request()->input('middle_name'),
                'suffix' => request()->input('suffix'),
                'address_line_1' => request()->input('address_line_1'),
                'address_line_2' => request()->input('address_line_2'),
                'address_line_3' => request()->input('address_line_3'),
                'street' => request()->input('street'),
                'subdivision' => request()->input('subdivision'),
                'barangay' => request()->input('barangay'),
                'city' => request()->input('city'),
                'province' => request()->input('province'),
                'identification_card' => request()->input('identification_card'),
                'contact_number' => request()->input('contact_number')
            );


            $customer_id = DB::table('customers')->insertGetId($customer_arr);


            if($customer_id) {

                //Mortgage Insert
                //echo date('Y-m-d', strtotime('09/05/2017'));
                $mortgage_arr = array(
                    'customer_id' => $customer_id,
                    'pawn_ticket_number' => request()->input('pawn_ticket_no'),
                    'old_pawn_ticket_number' => request()->input('tracking_no'),
                    'date_loan_granted' => date('Y-m-d', strtotime(request()->input('date_loan_granted'))),
                    'maturity_date' => date('Y-m-d', strtotime(request()->input('maturity_date'))),
                    'expirty_date_of_redemption_period' => date('Y-m-d', strtotime(request()->input('expirty_date_of_redemption_period'))),
                    'loan_amount_in_words' => request()->input('loan_amount_in_words'),
                    'loan_amount_in_numbers' => request()->input('loan_amount_in_numbers'),
                    'interest_rate_in_words' => request()->input('interest_rate_in_words'),
                    'interest_rate_in_numbers' => request()->input('interest_rate_in_numbers'),
                    'effective_interest_rate_in_percent' => request()->input('effective_interest_rate_in_percent'),
                    'pledge_time_period' => request()->input('pledge_time_period'),
                    'pledge_time_period_type' => request()->input('pledge_time_period_type'),
                    'appraised_value_in_words' => request()->input('appraised_value_in_words'),
                    'appraised_value_in_numbers' => request()->input('appraised_value_in_numbers'),
                    'penalty_interest' => request()->input('penalty_interest'),
                    'principal' => request()->input('principal'),
                    'interest_in_absolute_amount' => request()->input('interest_in_absolute_amount'),
                    'service_charge_in_amount' => request()->input('service_charge_in_amount'),
                    'net_proceeds' => request()->input('net_proceeds'),
                    'loan_status' => request()->input('loan_status')
                );

                $mortgage_id = DB::table('mortgages')->insertGetId($mortgage_arr);

                if($mortgage_id) {

                    $pawn_arr = array(
                        'mortgage_id' => $mortgage_id,
                        'customer_id' => $customer_id,
                        'description_of_the_pawn' => request()->input('description_of_the_pawn'),
                        'pawn_status' => request()->input('pawn_status'),
                    );

                    $pawn_id = DB::table('pawns')->insertGetId($pawn_arr); 

                    if($pawn_id) {

                        //return redirect('/edit_sangla')
                            //->with('status', 'Sangla Transaction Inserted!') 
                            //->withInput();

                        return redirect()->action('CustomerController@edit_sangla', ['customer_id' => $customer_id])
                                ->with('status', 'Sangla Transaction Inserted!')
                                ->withInput(); 

                    }      

                }

            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit()
    public function edit($id)
    {
        //
        //return view('layouts.template-parts.page.edit_sangla');
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


    public function edit_sangla($id)
    {
        //
        $customer = Customer::find($id);
        $mortgages = Customer::find($id)->mortgages()->first();
        $pawn = Mortgage::find($id)->pawn;
        //dd($pawn->id);
        //dd($customer->id);

        return view('layouts.template-parts.page.edit_sangla', compact('customer'));


    }


    public function update_sangla(Request $request, $id)
    {
        //

        //dd($request->all());
        //exit;
        $customer = Customer::find($id);
        $mortgages = Customer::find($id)->mortgages()->first();
        $pawn = Mortgage::find($id)->pawn;
        //dd($customer->id);

        $validator = Validator::make($request->all(), [
            'last_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/edit_sangla/'.$customer->id)
                        ->withErrors($validator)
                        ->withInput();

            //return redirect()->action('CustomerController@edit_sangla', ['customer_id' => request()->input('id')])
                    //->withErrors($validator)
                    //->withInput(); 

        } else {

           $customer_arr = array(
                'customer_number' => request()->input('customer_number'),
                'honorifics' => request()->input('honorifics'),
                'first_name' => request()->input('first_name'),
                'last_name' => request()->input('last_name'),
                'middle_name' => request()->input('middle_name'),
                'suffix' => request()->input('suffix'),
                'address_line_1' => request()->input('address_line_1'),
                'address_line_2' => request()->input('address_line_2'),
                'address_line_3' => request()->input('address_line_3'),
                'street' => request()->input('street'),
                'subdivision' => request()->input('subdivision'),
                'barangay' => request()->input('barangay'),
                'city' => request()->input('city'),
                'province' => request()->input('province'),
                'identification_card' => request()->input('identification_card'),
                'contact_number' => request()->input('contact_number')
            );

           $customer_update = DB::table('customers')
            ->where('id', $customer->id)
            ->update($customer_arr);

            return redirect('/edit_sangla/'.$customer->id)
                    ->with('status', 'Sangla Transaction Updated!')
                    ->withInput(); 

            //return redirect()->action('CustomerController@edit_sangla', ['customer_id' => request()->input('id')])
                    //->with('status', 'Sangla Transaction Updated!')
                    //->withInput(); 

            if($customer_update) {

                //Mortgage Insert
                //echo date('Y-m-d', strtotime('09/05/2017'));
                $mortgage_arr = array(
                    'customer_id' => $customer->id,
                    'pawn_ticket_number' => request()->input('pawn_ticket_no'),
                    'old_pawn_ticket_number' => request()->input('tracking_no'),
                    'date_loan_granted' => date('Y-m-d', strtotime(request()->input('date_loan_granted'))),
                    'maturity_date' => date('Y-m-d', strtotime(request()->input('maturity_date'))),
                    'expirty_date_of_redemption_period' => date('Y-m-d', strtotime(request()->input('expirty_date_of_redemption_period'))),
                    'loan_amount_in_words' => request()->input('loan_amount_in_words'),
                    'loan_amount_in_numbers' => request()->input('loan_amount_in_numbers'),
                    'interest_rate_in_words' => request()->input('interest_rate_in_words'),
                    'interest_rate_in_numbers' => request()->input('interest_rate_in_numbers'),
                    'effective_interest_rate_in_percent' => request()->input('effective_interest_rate_in_percent'),
                    'pledge_time_period' => request()->input('pledge_time_period'),
                    'pledge_time_period_type' => request()->input('pledge_time_period_type'),
                    'appraised_value_in_words' => request()->input('appraised_value_in_words'),
                    'appraised_value_in_numbers' => request()->input('appraised_value_in_numbers'),
                    'penalty_interest' => request()->input('penalty_interest'),
                    'principal' => request()->input('principal'),
                    'interest_in_absolute_amount' => request()->input('interest_in_absolute_amount'),
                    'service_charge_in_amount' => request()->input('service_charge_in_amount'),
                    'net_proceeds' => request()->input('net_proceeds'),
                    'loan_status' => request()->input('loan_status')
                );

                $mortgage_update = DB::table('mortgages')
                        ->where('id', $customer->id)
                        ->update($mortgage_arr);

                if($mortgage_update) {

                    $pawn_arr = array(
                        'mortgage_id' => $mortgages->id,
                        'description_of_the_pawn' => request()->input('description_of_the_pawn'),
                        'pawn_status' => request()->input('pawn_status'),
                    );

                    $pawn_update = DB::table('mortgages')
                        ->where('id', $pawn->id)
                        ->where('mortgage_id', $mortgages->id)
                        ->update($pawn_arr);

                    if($pawn_update) {

                        //return redirect('/edit_sangla')
                            //->with('status', 'Sangla Transaction Inserted!') 
                            //->withInput();

                        return redirect()->action('CustomerController@edit_sangla', ['customer_id' => $customer_id])
                                ->with('status', 'Sangla Transaction Inserted!')
                                ->withInput(); 

                    }      

                }

            }


        }     

        //return view('layouts.template-parts.page.edit_sangla')->with('id', 'Sangla Transaction Updated!');

    }






    public function create_renew_sangla()
    {

        return view('layouts.template-parts.page.create_renew_sangla');
    }

    public function store_renew_sangla(Request $request)
    {

        return view('layouts.template-parts.page.store_renew_sangla');  
    }


    public function edit_renew_sangla($id)
    {
        $customer = Customer::find($id);
        $mortgages = Customer::find($id)->mortgages()->first();
        $pawn = Mortgage::find($id)->pawn;    

        //dd($customer);

        return view('layouts.template-parts.page.edit_renew_sangla', ['customer' => $customer, 'mortgages' => $mortgages, 'pawn' => $pawn]);
    }

    public function update_renew_sangla(Request $request, $id)
    {
    

        return view('layouts.template-parts.page.create_renew_sangla');  
    }    



}
