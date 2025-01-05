<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\Mortgage;
use App\Pawn;

Auth::routes(); //Enable this to use the authentication

/*
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
*/

Route::get('/', 'HomeController@index')->name('dashboard');


//Start: New Pawn Transaction

Route::get('/newpawntransaction', 'NewPawnTransactionController@index');

Route::get('/newpawntransaction/getdatatablesobjectdatanewpawn', 'NewPawnTransactionController@getDataTablesObjectData')->name('getdatatablesobjectdatanewpawn');

Route::get('/newpawntransaction/create', 'NewPawnTransactionController@create');

Route::post('/newpawntransaction/store', 'NewPawnTransactionController@store');


Route::get('/newpawntransaction/edit/{id}', 'NewPawnTransactionController@edit');

Route::post('/newpawntransaction/update/{id}', 'NewPawnTransactionController@update');


Route::get('/newpawntransaction/show/{id}', 'NewPawnTransactionController@show');

//End: New Pawn Transaction


//Start: Renew Pawn Transaction

Route::get('/renewpawntransaction', 'RenewPawnTransactionController@index');

Route::get('/renewpawntransaction/getdatatablesobjectdatarenewpawn', 'RenewPawnTransactionController@getDataTablesObjectData')->name('getdatatablesobjectdatarenewpawn');

Route::get('/renewpawntransaction/create', 'RenewPawnTransactionController@create');

Route::post('/renewpawntransaction/store', 'RenewPawnTransactionController@store');


Route::get('/renewpawntransaction/edit/{id}', 'RenewPawnTransactionController@edit');

Route::post('/renewpawntransaction/update/{id}', 'RenewPawnTransactionController@update');


Route::get('/renewpawntransaction/show/{id}', 'RenewPawnTransactionController@show');

//End: Renew Pawn Transaction


//Start: Redeem Pawn Transaction

Route::get('/redeempawntransaction', 'RedeemPawnTransactionController@index');

Route::get('/redeempawntransaction/getdatatablesobjectdatarenewpawn', 'RedeemPawnTransactionController@getDataTablesObjectData')->name('getdatatablesobjectdataredeempawn');

Route::get('/redeempawntransaction/create', 'RedeemPawnTransactionController@create');

Route::post('/redeempawntransaction/store', 'RedeemPawnTransactionController@store');


Route::get('/redeempawntransaction/edit/{id}', 'RedeemPawnTransactionController@edit');

Route::post('/redeempawntransaction/update/{id}', 'RedeemPawnTransactionController@update');


Route::get('/redeempawntransaction/show/{id}', 'RedeemPawnTransactionController@show');

//End: Redeem Pawn Transaction


//Start: Redeem/Renew Pawn Transaction

Route::get('/redeemrenewpawntransaction', 'RedeemRenewPawnTransactionController@index');

Route::get('/redeemrenewpawntransaction/getdatatablesobjectdataredeemrenewpawn', 'RedeemRenewPawnTransactionController@getDataTablesObjectData')->name('getdatatablesobjectdataredeemrenewpawn');

Route::get('/redeemrenewpawntransaction/create/{transaction_type}', 'RedeemRenewPawnTransactionController@create');

Route::post('/redeemrenewpawntransaction/store/{transaction_type}', 'RedeemRenewPawnTransactionController@store');


Route::get('/redeemrenewpawntransaction/edit/{id}', 'RedeemRenewPawnTransactionController@edit');

Route::post('/redeemrenewpawntransaction/update/{id}', 'RedeemRenewPawnTransactionController@update');


Route::get('/redeemrenewpawntransaction/show/{id}', 'RedeemRenewPawnTransactionController@show');

//End: Redeem/Renew Pawn Transaction


//Start: All Pawn Transaction
Route::get('/pawntransaction/all', function (Request $request) {
    return view('layouts.template-parts.page.datatables_pawn_transaction');
})->name('allpawntransaction');

Route::get('/pawntransaction/getdatatablesobjectdataallpawn', function (Request $request, Datatables $datatables) {

        $query = DB::table('customers')
                       ->join('mortgages', 'customers.id', '=', 'mortgages.customer_id')
                       ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
                       ->select('customers.id AS renew_pawn_transaction_id', 'customers.*', 'mortgages.*', 'pawns.*');
                       //->where('loan_status', 'renew-pawn-transaction');

        //dd($query);

        return Datatables::of($query)
        ->filter(function ($query) use ($request) {

	       if ($request->input('full_name')) 
	       {
	       		$query->orWhere('customers.full_name', 'like', "%{$request->get('full_name')}%");
	       }

	       if ($request->input('pawn_ticket_number')) 
	       {
	       		//$query->orWhere('mortgages.pawn_ticket_number', '=', $request->get('pawn_ticket_number'));
	       		$query->orWhere('mortgages.pawn_ticket_number', 'like', "%{$request->get('pawn_ticket_number')}%");
           }

	       if ($request->input('ref_pawn_ticket_number')) 
	       {
	       		//$query->orWhere('mortgages.old_pawn_ticket_number', '=', $request->get('old_pawn_ticket_number'));
	       		$query->orWhere('mortgages.ref_pawn_ticket_number', 'like', "%{$request->get('ref_pawn_ticket_number')}%");
           }

	       if ($request->input('contact_number')) 
	       {
	       		//$query->orWhere('mortgages.contact_number', '=', $request->get('contact_number'));
	       		$query->orWhere('customers.contact_number', 'like', "%{$request->get('contact_number')}%");
           }

	       if ($request->input('identification_card')) 
	       {
	       		//$query->orWhere('mortgages.identification_card', '=', $request->get('identification_card'));
	       		$query->orWhere('customers.identification_card', 'like', "%{$request->get('identification_card')}%");
           }


        })
        ->addColumn('action', function ($query) {
            //return '<button type="button" class="btn-preview-pawn btn btn-primary" data-customer_id="'. $query->customer_id .'" data-mortgage_id="' . $query->mortgage_id . '" data-pawn_id="' . $query->id . '"><i class="fa fa-file-o"></i></button>';

			if($query->loan_status == 'new-pawn-transaction') {

            return '<a href="'.url('/newpawntransaction/show').'/'.$query->customer_id.'" title="View">View</a> | <a href="'.url('/newpawntransaction/edit').'/'.$query->customer_id.'" title="Edit">Edit </a> | Delete';

            } elseif($query->loan_status == 'renew-pawn-transaction') {

				return '<a href="'.url('/redeemrenewpawntransaction/show').'/'.$query->customer_id.'" title="View">View</a> | <a href="'.url('/redeemrenewpawntransaction/edit').'/'.$query->customer_id.'" title="Edit">Edit </a> | Delete';

            } elseif($query->loan_status == 'redeem-pawn-transaction') {

				return '<a href="'.url('/redeemrenewpawntransaction/show').'/'.$query->customer_id.'" title="View">View</a> | <a href="'.url('/redeemrenewpawntransaction/edit').'/'.$query->customer_id.'" title="Edit">Edit </a> | Delete';

            }

        })->make();

})->name('getdatatablesobjectdataallpawn');

//End: All Pawn Transaction




//Start: Report Pawn Transaction
Route::get('/pawntransaction/report', function (Request $request) {
    return view('layouts.template-parts.page.report_pawn_transaction');
})->name('reportpawntransaction');

Route::post('/pawntransaction/report', function (Request $request) {

	$loan_status = trim($request->loan_status);
	$branch = trim($request->branch);
	$date_from = date('Y-m-d', strtotime(trim($request->date_range_reporting_from)));
	$date_to = date('Y-m-d', strtotime(trim($request->date_range_reporting_to)));

	//$branch_flag = false;

	/*$query = DB::table('mortgages')
		            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
		            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
		            ->select('mortgages.*', 'customers.*', 'pawns.*')
					->whereBetween('mortgages.date_loan_granted', [$date_from, $date_to]);*/

	if ( empty($branch) || $branch == 'all' ) {
		$query = DB::table('mortgages')
			            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
			            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
			            ->select('mortgages.*', 'customers.*', 'pawns.*')
						->whereBetween('mortgages.date_loan_granted', [$date_from, $date_to]);

		$query_count = DB::table('mortgages')
			            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
			            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
			            ->select(DB::raw('count(*) as total_count'))
						->whereBetween('mortgages.date_loan_granted', [$date_from, $date_to]);

		$branch_flag = true;				
	} else {
		$query = DB::table('mortgages')
			            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
			            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
			            ->select('mortgages.*', 'customers.*', 'pawns.*')
			            ->where('mortgages.branch', '=', $branch)
						->whereBetween('mortgages.date_loan_granted', [$date_from, $date_to]);


		$query_count = DB::table('mortgages')
			            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
			            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
			            ->select(DB::raw('count(*) as total_count'))
			            ->where('mortgages.branch', '=', $branch)
						->whereBetween('mortgages.date_loan_granted', [$date_from, $date_to]);

		$branch_flag = true;
	}

	/*if ( !empty($branch) ) {
		$query->where('mortgages.branch', '=', $branch);
	}*/

	//if($branch_flag) {

		if ( ((!empty($loan_status) && $loan_status == 'new-pawn-transaction')) ) {
			//dd('1 ' . $pawntransactionstatus . ' && ' . $loan_status);
			//$loan_status = 'new-pawn-transaction';
			$query->where('mortgages.loan_status', '=', 'new-pawn-transaction');
			$query_count->where('mortgages.loan_status', '=', 'new-pawn-transaction');
			

		} elseif ( ((!empty($loan_status) && $loan_status == 'renew-pawn-transaction')) ) {
			//dd('2 ' . $pawntransactionstatus . ' && ' . $loan_status);
			//$loan_status = 'new-pawn-transaction';
			$query->where('mortgages.loan_status', '=', 'renew-pawn-transaction');
			$query_count->where('mortgages.loan_status', '=', 'renew-pawn-transaction');

		} elseif ( ((!empty($loan_status) && $loan_status == 'redeem-pawn-transaction')) ) {
			//dd('3 ' . $pawntransactionstatus . ' && ' . $loan_status);
			//$loan_status = 'new-pawn-transaction';
			$query->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
			$query_count->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
			
		}

		//dd($loan_status);

		//$data_count = $query->count();

		//$data_count = $query_count->count();

		$data_count = count($query_count->groupBy('mortgages.pawn_ticket_number')->get());

		//dd($data_count);

		$data = $query->groupBy('mortgages.pawn_ticket_number')->get();


	//}
	//dd($data);

	return view('layouts.template-parts.page.report_pawn_transaction', ['data_count' => $data_count, 'data' => $data, 'loan_status' => $loan_status, 'branch' => $branch, 'date_from' => $date_from, 'date_to' => $date_to]);

});
//End: Report Pawn Transaction

/*
//Start: Report New Pawn Transaction
Route::get('/newpawntransaction/report', function (Request $request) {
    return view('layouts.template-parts.page.report_new_pawn_transaction', ['loan_status' => 'new-pawn-transaction']);
})->name('newpawntransactionreport');

Route::post('/newpawntransaction/report', function (Request $request) {

	$loan_status = trim($request->loan_status);
	$branch = trim($request->branch_reporting);
	$date_from = date('Y-m-d', strtotime(trim($request->date_range_reporting_from)));
	$date_to = date('Y-m-d', strtotime(trim($request->date_range_reporting_to)));

	if ( empty($branch) || $branch == 'all' ) {
		$query = DB::table('mortgages')
			            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
			            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
			            ->select('mortgages.*', 'customers.*', 'pawns.*')
						->whereBetween('mortgages.date_loan_granted', [$date_from, $date_to]);

	} else {
		$query = DB::table('mortgages')
			            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
			            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
			            ->select('mortgages.*', 'customers.*', 'pawns.*')
			            ->where('mortgages.branch', '=', $branch)
						->whereBetween('mortgages.date_loan_granted', [$date_from, $date_to]);
	}

	if ( !empty($loan_status) ) {
		$query->where('loan_status', '=', $loan_status);
	}

	$data_count = $query->count();
	
	$data = $query->get();

	//dd($data);

	return view('layouts.template-parts.page.report_new_pawn_transaction', ['data_count' => $data_count, 'data' => $data, 'loan_status' => $loan_status, 'branch' => $branch, 'date_from' => $date_from, 'date_to' => $date_to]);

});
//End: Report New Pawn Transaction


//Start: Report Renew Pawn Transaction
Route::get('/renewpawntransaction/report', function (Request $request) {
    return view('layouts.template-parts.page.report_renew_pawn_transaction', ['loan_status' => 'renew-pawn-transaction']);
})->name('renewpawntransactionreport');

Route::post('/renewpawntransaction/report', function (Request $request) {

	$loan_status = trim($request->loan_status);
	$branch = trim($request->branch_reporting);
	$date_from = date('Y-m-d', strtotime(trim($request->date_range_reporting_from)));
	$date_to = date('Y-m-d', strtotime(trim($request->date_range_reporting_to)));

	if ( empty($branch) || $branch == 'all' ) {
		$query = DB::table('mortgages')
			            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
			            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
			            ->select('mortgages.*', 'customers.*', 'pawns.*')
						->whereBetween('mortgages.date_loan_granted', [$date_from, $date_to]);

	} else {
		$query = DB::table('mortgages')
			            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
			            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
			            ->select('mortgages.*', 'customers.*', 'pawns.*')
			            ->where('mortgages.branch', '=', $branch)
						->whereBetween('mortgages.date_loan_granted', [$date_from, $date_to]);
	}

	if ( !empty($loan_status) ) {
		$query->where('loan_status', '=', $loan_status);
	}

	$data_count = $query->count();
	
	$data = $query->get();

	//dd($data);

	return view('layouts.template-parts.page.report_renew_pawn_transaction', ['data_count' => $data_count, 'data' => $data, 'loan_status' => $loan_status, 'branch' => $branch, 'date_from' => $date_from, 'date_to' => $date_to]);

});
//End: Report Renew Pawn Transaction


//Start: Report Redeem Pawn Transaction
Route::get('/redeempawntransaction/report', function (Request $request) {
    return view('layouts.template-parts.page.report_redeem_pawn_transaction', ['loan_status' => 'redeem-pawn-transaction']);
})->name('redeempawntransactionreport');

Route::post('/redeempawntransaction/report', function (Request $request) {

	$loan_status = trim($request->loan_status);
	$branch = trim($request->branch_reporting);
	$date_from = date('Y-m-d', strtotime(trim($request->date_range_reporting_from)));
	$date_to = date('Y-m-d', strtotime(trim($request->date_range_reporting_to)));

	if ( empty($branch) || $branch == 'all' ) {
		$query = DB::table('mortgages')
			            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
			            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
			            ->select('mortgages.*', 'customers.*', 'pawns.*')
						->whereBetween('mortgages.date_loan_granted', [$date_from, $date_to]);

	} else {
		$query = DB::table('mortgages')
			            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
			            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
			            ->select('mortgages.*', 'customers.*', 'pawns.*')
			            ->where('mortgages.branch', '=', $branch)
						->whereBetween('mortgages.date_loan_granted', [$date_from, $date_to]);
	}

	if ( !empty($loan_status) ) {
		$query->where('loan_status', '=', $loan_status);
	}

	$data_count = $query->count();
	
	$data = $query->get();

	//dd($data);

	return view('layouts.template-parts.page.report_redeem_pawn_transaction', ['data_count' => $data_count, 'data' => $data, 'loan_status' => $loan_status, 'branch' => $branch, 'date_from' => $date_from, 'date_to' => $date_to]);

});
//End: Report Redeem Pawn Transaction
*/

Route::post('/generate_report', function (Request $request) {

	$transaction_date = ( strtotime($request->date_from) === strtotime($request->date_to) ) ? $request->date_to : $request->date_from . ' - ' .$request->date_to;

	$report_parameters = array(
		'loan_status' => $request->loan_status,
		'branch' => $request->branch,
		'date_from' => date("Y/m/d", strtotime($request->date_from)), 
		'date_to' => date("Y/m/d", strtotime($request->date_to)),
		'orientation' => $request->orientation,
		'page_margin_top' => 0.25,
		'page_margin_right' => 0.30,
		'page_margin_bottom' => 0.25,
		'page_margin_left' => 0.30,
		'transaction_date' => $transaction_date,
		'run_datetime' => date("l, j F Y - g:i A")

	);

	//dd($request);

	//$report_filename = 'Daily Listing of Loans Extended'. ' - ' . strtotime(date("Ymd-His"));
	$report_filename = 'Daily Listing of Loans Extended';

    Excel::create($report_filename, function($excel) use($report_parameters) {

        $excel->sheet('Sheetname', function($sheet) use($report_parameters) {


		/*$sheet->setOrientation('landscape');
		
		// Set top, right, bottom, left
		$sheet->setPageMargin(array(
		    0.25, 0.30, 0.25, 0.30
		));*/


		$sheet->setOrientation($report_parameters['orientation']);

		// Set top, right, bottom, left
		$sheet->setPageMargin(array(
		    $report_parameters['page_margin_top'],
		    $report_parameters['page_margin_right'],
		    $report_parameters['page_margin_bottom'],
		    $report_parameters['page_margin_left']
		));

		if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

			$query = DB::table('mortgages')
			            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
			            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
			            ->select('mortgages.*', 'customers.*', 'pawns.*')
						->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]);

		} else {

			$query = DB::table('mortgages')
			            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
			            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
			            ->select('mortgages.*', 'customers.*', 'pawns.*')
			            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
						->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]);

		}

		if ( $report_parameters['loan_status'] == 'new-pawn-transaction' ) {
			$query->where('mortgages.loan_status', '=', 'new-pawn-transaction');

		} 

		if ( $report_parameters['loan_status'] == 'renew-pawn-transaction' ) {
			$query->where('mortgages.loan_status', '=', 'renew-pawn-transaction');

		} 

		if ( $report_parameters['loan_status'] == 'redeem-pawn-transaction' ) {
			$query->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
		}

		$query_data = $query->orderBy('mortgages.pawn_ticket_number', 'ASC')->groupBy('mortgages.pawn_ticket_number')->get();

		//$query_data = $query->get();

		//dd($query_data);

		//dd($report_parameters['loan_status']);

		$data = array();
		$total = 0;
		$amount_paid = array();
		$principal_column_format = array();
		$principal_row_count = 8;

		foreach($query_data as $q) {

			if( $q->principal <= '500' || $q->principal <= '500.00' ) {
				//$amount_paid[0] = number_format((float)$q->principal, 2, '.', '');
				$amount_paid[0] = $q->principal;
			} else {
				$amount_paid[0] = '';	
			}

			if( ($q->principal >= '501' || $q->principal >= '501.00') && 
				($q->principal <= '2000' || $q->principal <= '2000.00') ) {
				//$amount_paid[1] = number_format((float)$q->principal, 2, '.', '');
				$amount_paid[1] = $q->principal;
			} else {
				$amount_paid[1] = '';	
			}

			if( ($q->principal >= '2001' || $q->principal >= '2001.00') ) {
				//$amount_paid[2] = number_format((float)$q->principal, 2, '.', '');
				$amount_paid[2] = $q->principal;
			} else {
				$amount_paid[2] = '';
			}

			$net_proceed = $q->principal - $q->service_charge_in_amount;

			$data[] = array(
				//"O.R #" => $q->or_number,
				"P.T. No" => $q->pawn_ticket_number,
				"Customer Name" => $q->full_name,
				"Description of Item(s)" => $q->description_of_the_pawn,
				"App. Value" => (float) number_format((float) $q->appraised_value_in_numbers, 2, '.', ''),
				//"Amount Paid" => (float) number_format((float) $q->principal, 2, '.', ''),
				"nil-500" => (float) number_format((float) $amount_paid[0], 2, '.', ''),
				"501-2000" => (float) number_format((float) $amount_paid[1], 2, '.', ''),
				"2001-" => (float) number_format((float) $amount_paid[2], 2, '.', ''),

				"Charge" => (float) number_format((float) $q->service_charge_in_amount, 2, '.', ''),
				//Net proceed = Principal - Service charge
				//"Net Proc." => (float) (number_format((float) $q->principal, 2, '.', '') - number_format((float) $q->service_charge_in_amount, 2, '.', ''))

				"Net Proc." => $net_proceed
			);

			$principal_column_format['A'.$principal_row_count.':'.'I'.$principal_row_count] = '@';

			//$principal_column_format['C'.$principal_row_count.':'.'G'.$principal_row_count] = '0.00';
			$principal_column_format['D'.$principal_row_count.':'.'I'.$principal_row_count] = '#,##0.00';

			$principal_row_count++;

		}

		$page_total_row_count = (sizeof($data) + 9);
		$branch_total_row_count = (sizeof($data) + 10);

		//$principal_column_format['C'.$page_total_row_count.':'.'G'.$page_total_row_count] = '0.00';
		$principal_column_format['E'.$page_total_row_count.':'.'I'.$page_total_row_count] = '#,##0.00';

		//$principal_column_format['C'.$branch_total_row_count.':'.'G'.$branch_total_row_count] = '0.00';
		$principal_column_format['E'.$branch_total_row_count.':'.'I'.$branch_total_row_count] = '#,##0.00';

		$sheet->setColumnFormat($principal_column_format);

		//$sheet->fromArray($data);
		//$sheet->fromArray($data, null, 'A7', false, false);
		$sheet->fromArray($data, null, 'A7');

			$sheet->mergeCells('A1:I1');
			$sheet->mergeCells('A2:I2');
			$sheet->mergeCells('A3:I3');
			$sheet->mergeCells('A4:I4');
			$sheet->mergeCells('A5:I5');

			$sheet->cell('A1', function($cell) {

			    // manipulate the cell
			    $cell->setFontWeight('bold');
			    $cell->setAlignment('center'); 
			    $cell->setValue("SANTOLAN PAWNSHOP");

			});

			$sheet->cell('A2', function($cell) {

			    // manipulate the cell
			    $cell->setAlignment('center');
			    $cell->setValue('DAILY LISTING OF LOANS Extended');

			});

			$sheet->cell('A3', function($cell) use($report_parameters) {

			    // manipulate the cell
			    $cell->setAlignment('center'); 
			    $cell->setValue('For Branch: ' . ucfirst($report_parameters['branch']));

			});

			$sheet->cell('A4', function($cell) use($report_parameters) {

			    // manipulate the cell
			    $cell->setAlignment('center'); 
			    //$cell->setValue('For transaction date 12/28/10');
			    $cell->setValue('For transaction date ' . $report_parameters['transaction_date']);
			});

			$sheet->cell('A5', function($cell) use($report_parameters) {

				//$run_datetime = date("l, j F Y - g:i A");
			    // manipulate the cell
			    $cell->setAlignment('center'); 
			    //$cell->setValue('Run Date: 01/10/11 Page: 3');
			    $cell->setValue('Run Date ' . $report_parameters['run_datetime'] );

			});

			$sheet->cell('A'.(sizeof($data)+9), function($cell) {

			    // manipulate the cell
			    $cell->setValue('PAGE TOTALS');

			});

			$sheet->cell('A'.(sizeof($data)+10), function($cell) use($data) {

			    // manipulate the cell
			    $cell->setValue('BRANCH TOTALS');

			});


			//https://stackoverflow.com/questions/21184877/phpexcel-make-difference-in-1-10-and-1-1-while-extract
			//https://stackoverflow.com/questions/29852124/how-to-pre-format-a-cell-to-date-on-laravel-excel/42197420#42197420

			//http://www.maatwebsite.nl/laravel-excel/docs/export#format
			/*$sheet->setColumnFormat(array(
					'C8' => '0.00',
					'D8' => '0.00',
					'E8' => '0.00',
					'F8' => '0.00',
					'G8' => '0.00'
			));*/

			/*$sheet->setColumnFormat(array(
			    'C8:G8' => '0.00', 'C9:G9' => '0.00'
			));*/


			/*$principal_column_format = array();
			for($i = 0; $i <= sizeof($data); $i++) {

				$principal_column_format['C'.$i.':'.'G'.$i] = '0.00';
			}*/

			//$principal_column_format['C8:G8'] = '0.00';
			//$principal_column_format['C9:G9'] = '0.00';

			//$sheet->setColumnFormat($principal_column_format);


			//PAGE TOTALS

			//Amount Paid
			/*$sheet->cell('D'.(sizeof($data)+9), function($cell) use($report_parameters) {

			    // manipulate the cell
			    if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']])
					            ->sum('mortgages.principal'); //Amount Paid

				} else {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']])
					            ->sum('mortgages.principal'); //Amount Paid

				}
			
				$page_totals = $query;
			    $cell->setValue($page_totals);

			});*/

			//nil-500
			$sheet->cell('E'.(sizeof($data)+9), function($cell) use($report_parameters) {

			    // manipulate the cell

			    if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
					            ->where('mortgages.principal', '<=', '500')
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				} else {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->where('mortgages.principal', '<=', '500')
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				}

				if ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'new-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'new-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'renew-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'renew-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'redeem-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
				}

				$query_data = $query->sum('mortgages.principal');

				$page_totals = $query_data;
			    $cell->setValue($page_totals);

			});

			//501-2000
			$sheet->cell('F'.(sizeof($data)+9), function($cell) use($report_parameters) {

			    // manipulate the cell
			    if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
					            ->whereBetween('mortgages.principal', ['501', '2000'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				} else {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->whereBetween('mortgages.principal', ['501', '2000'])
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				}

				if ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'new-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'new-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'renew-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'renew-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'redeem-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
				}

				$query_data = $query->sum('mortgages.principal');
			
				$page_totals = $query_data;
			    $cell->setValue($page_totals);

			});

			//501-2000
			$sheet->cell('G'.(sizeof($data)+9), function($cell) use($report_parameters) {

			    // manipulate the cell
			    if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
					            ->where('mortgages.principal', '>=', '2001')
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				} else {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->where('mortgages.principal', '>=', '2001')
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				}

				if ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'new-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'new-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'renew-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'renew-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'redeem-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
				}

				$query_data = $query->sum('mortgages.principal');
			
				$page_totals = $query_data;
			    $cell->setValue($page_totals);

			});


			//Charge
			$sheet->cell('H'.(sizeof($data)+9), function($cell) use($report_parameters) {

			    // manipulate the cell

			    if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				} else {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				}

				if ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'new-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'new-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'renew-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'renew-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'redeem-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
				}

				$query_data = $query->sum('mortgages.service_charge_in_amount');
			
				$page_totals = $query_data;
			    $cell->setValue($page_totals);

			});

			//Net Proc.
			$sheet->cell('I'.(sizeof($data)+9), function($cell) use($report_parameters) {

			    // manipulate the cell

			    if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

					$query1 = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid


					$query2 = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid


				} else {

					$query1 = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

					$query2 = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid


				}

				if ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'new-pawn-transaction' ) {
					$query1->where('mortgages.loan_status', '=', 'new-pawn-transaction');
					$query2->where('mortgages.loan_status', '=', 'new-pawn-transaction');


				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'renew-pawn-transaction' ) {
					$query1->where('mortgages.loan_status', '=', 'renew-pawn-transaction');
					$query2->where('mortgages.loan_status', '=', 'renew-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'redeem-pawn-transaction' ) {
					$query1->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
					$query2->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
				}

				$query_data1 = $query1->sum('mortgages.principal');
				$query_data2 = $query2->sum('mortgages.service_charge_in_amount');

			
				$page_totals = ((float) $query_data1 - (float) $query_data2);
			    $cell->setValue($page_totals);

			});

			//BRANCH TOTAL

			//Amount Paid
			/*$sheet->cell('D'.(sizeof($data)+9), function($cell) use($report_parameters) {

			    // manipulate the cell
			    if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']])
					            ->sum('mortgages.principal'); //Amount Paid

				} else {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']])
					            ->sum('mortgages.principal'); //Amount Paid

				}
			
				$page_totals = $query;
			    $cell->setValue($page_totals);

			});*/

			//nil-500
			$sheet->cell('E'.(sizeof($data)+10), function($cell) use($report_parameters) {

			    // manipulate the cell

			    if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
					            ->where('mortgages.principal', '<=', '500')
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				} else {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->where('mortgages.principal', '<=', '500')
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				}

				if ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'new-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'new-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'renew-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'renew-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'redeem-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
				}				

				$query_data = $query->sum('mortgages.principal');

				$page_totals = $query_data;
			    $cell->setValue($page_totals);

			});

			//501-2000
			$sheet->cell('F'.(sizeof($data)+10), function($cell) use($report_parameters) {

			    // manipulate the cell
			    if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
					            ->whereBetween('mortgages.principal', ['501', '2000'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				} else {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->whereBetween('mortgages.principal', ['501', '2000'])
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				}
			
				if ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'new-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'new-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'renew-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'renew-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'redeem-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
				}

				$query_data = $query->sum('mortgages.principal');

				$page_totals = $query_data;
			    $cell->setValue($page_totals);

			});

			//501-2000
			$sheet->cell('G'.(sizeof($data)+10), function($cell) use($report_parameters) {

			    // manipulate the cell
			    if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
					            ->where('mortgages.principal', '>=', '2001')
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				} else {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->where('mortgages.principal', '>=', '2001')
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				}

				if ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'new-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'new-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'renew-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'renew-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'redeem-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
				}		

				$query_data = $query->sum('mortgages.principal');		
			
				$page_totals = $query_data;
			    $cell->setValue($page_totals);

			});


			//Charge
			$sheet->cell('H'.(sizeof($data)+10), function($cell) use($report_parameters) {

			    // manipulate the cell

			    if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				} else {

					$query = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

				}

				if ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'new-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'new-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'renew-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'renew-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'redeem-pawn-transaction' ) {
					$query->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
				}

				$query_data = $query->sum('mortgages.service_charge_in_amount');
			
				$page_totals = $query_data;
			    $cell->setValue($page_totals);

			});

			//Net Proc.
			$sheet->cell('I'.(sizeof($data)+10), function($cell) use($report_parameters) {

			    // manipulate the cell

			    if ( empty($report_parameters['branch']) || $report_parameters['branch'] == 'all' ) {

					$query1 = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid


					$query2 = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')  
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid


				} else {

					$query1 = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid

					$query2 = DB::table('mortgages')
					            ->join('customers', 'mortgages.customer_id', '=', 'customers.id')
					            ->join('pawns', 'mortgages.id', '=', 'pawns.mortgage_id')
					            ->select('mortgages.*', 'customers.*', 'pawns.*')
					            ->where('mortgages.branch' ,'=', $report_parameters['branch'])
								->whereBetween('mortgages.date_loan_granted', [$report_parameters['date_from'], $report_parameters['date_to']]); //Amount Paid


				}

				if ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'new-pawn-transaction' ) {
					$query1->where('mortgages.loan_status', '=', 'new-pawn-transaction');
					$query2->where('mortgages.loan_status', '=', 'new-pawn-transaction');


				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'renew-pawn-transaction' ) {
					$query1->where('mortgages.loan_status', '=', 'renew-pawn-transaction');
					$query2->where('mortgages.loan_status', '=', 'renew-pawn-transaction');

				} elseif ( !empty($report_parameters['loan_status']) && $report_parameters['loan_status'] == 'redeem-pawn-transaction' ) {
					$query1->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
					$query2->where('mortgages.loan_status', '=', 'redeem-pawn-transaction');
				}

				$query_data1 = $query1->sum('mortgages.principal');
				$query_data2 = $query2->sum('mortgages.service_charge_in_amount');

				$page_totals = ((float) $query_data1 - (float) $query_data2);
			    $cell->setValue($page_totals);

			});

			
        });
    })->download('xlsx');

});