@extends('layouts.app')           

@section('content')


                <!--div class="row" style="margin-top:30px;">
                    <div class="col-md-12">
                        <h1 class="pull-left">Add</h1>
                    </div>
                </div-->

<div class="row">

    <div class="col-md-12">

        <div class="card">
            <h4 class="card-header">
                <strong>Add New Customer &amp; Pawn Transaction</strong>
                <a href="/pawnshopsystem/public/index.php/create_customer_pawn" id="btn-create-customer-and-pawn-transaction" class="btn btn-sm btn-outline-primary pull-right">Add New Customer &amp; Pawn Transaction</a>
            </h4>

            <div class="card-block">


                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif   


                <?php //echo $_GET["status"]; ?>
                <div class="row">


                    <div class="col-md-12">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#customer-details" role="tab" aria-controls="customer-details">Customer Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#pawn-transaction" role="tab" aria-controls="pawn-transaction">Pawn Transaction</a>
                            </li>
                        </ul>
                        <form method="post" action="/pawnshopsystem/public/index.php/store_customer_pawn" class="form-horizontal">
                            {{ csrf_field() }}
                            
                            <!--input type="hidden" name="loan_status" value="initial-pawn-transaction"-->
                            <input type="hidden" name="country" value="ph">

                            <div class="tab-content">
                                <div class="tab-pane active" id="customer-details" role="tabpanel">
                                        
                                        <!--div class="row invisible">
                                            <div class="form-group col-md-12">

                                      
                                                <small><strong>Customer No.:</strong> <?php //echo 'SPC-'.date('Ymd').'-'.(customer_count() + 1); ?></small>
                                                <br />
                                                <small><strong>Customer No.:</strong> <?php //echo 'SPC-'.date('Yzn').'-'.(customer_count() + 1); ?></small>
                                                <input type="hidden" name="customer_number" value="<?php // echo 'SPC-'.date('Ymd').'-'.(customer_count() + 1); ?>">

                                            </div>
                                        </div-->
                                        <!--/.row-->

                                    <!--form method="" action=""-->
                                        <div class="row">

                                            <div class="form-group col-md-3">
                                                <label for="firstname">First Name</label>
                                                <input type="text" name="first_name" value="{{ ucwords(old('first_name')) }}" class="form-control" id="first-name" placeholder="First Name">
                                            </div>
                                            

                                            <div class="form-group col-md-3">
                                                <label for="lastname">Last Name</label>
                                                <input type="text" name="last_name" value="{{ ucwords(old('last_name')) }}" class="form-control" id="last-name" placeholder="Last Name">
                                            </div>                           

                                            <div class="form-group col-md-3">
                                                <label for="middlename">Middle Name</label>
                                                <input type="text" name="middle_name" value="{{ ucwords(old('middle_name')) }}" class="form-control" id="middle-name" placeholder="Middle Name">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="suffix">Suffix</label>
                                                <input type="text" name="suffix" value="{{ ucwords(old('suffix')) }}" class="form-control" id="suffix" placeholder="Suffix">
                                            </div>

                                        </div>
                                        <!--/.row-->


                                        <div class="row">

                                            <div class="form-group col-md-3">
                                                <label for="completeaddress">(House Number, Building and Street Name)</label>

                                                 <textarea name="complete_address" class="form-control" rows="2" id="complete-address">{{ ucwords(old('complete_address')) }}</textarea>
                                            </div>


                                            <div class="form-group col-md-3">
                                                <label for="barangaydistrictlocality">Barangay/District/Locality</label>
                                                <input type="text" name="barangay_district_locality" value="{{ ucwords(old('barangay_district_locality')) }}" class="form-control" id="barangay-district-locality" placeholder="Barangay/District/Locality">

                                                <!--select name="barangay_district_locality" class="form-control" id="barangay-district-locality"></select-->

                                            </div>                           

                                            <div class="form-group col-md-3">
                                                <label for="citymunicipality">City/Municipality</label>
                                                <input type="text" name="city_municipality" value="{{ ucwords(old('city_municipality')) }}" class="form-control" id="city-municipality" placeholder="City/Municipality">

                                                <!--select name="city_municipality" class="form-control" id="city-municipality"></select-->

                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="province">Province</label>
                                                <input type="text" name="province" value="{{ ucwords(old('province')) }}" class="form-control" id="province" placeholder="Province">

                                                <!--select name="province" class="form-control" id="province"></select-->

                                            </div>

                                        </div>
                                        <!--/.row-->                

                                        <div class="row">

                                            <?php                            
                                            $id_type_arr = array(
                                                'Passport',
                                                'Driver\'s License',
                                                'Professional Regulations Commission (PRC) ID',
                                                'Integrated Bar of the Philippines (IBP) ID',
                                                'National Bureau of Investigation (NBI) Clearance',
                                                'Police Clearance Certificate',
                                                'Postal ID',
                                                'Voter\'s ID',
                                                'Government Service Insurance System e-Card',
                                                'Social Security System (SSS) Card',
                                                'Senior Citizen Card',
                                                'Overseas Workers Welfare Administration (OWWA) ID',
                                                'OFW ID',
                                                'Seaman\'s Book',
                                                'Alien Certificate of Registration',
                                                'Firearm License',
                                                'Employment ID (Government and Private)',
                                                'Student ID',
                                                'Other IDs issued by the Government and its Instrumentalities'
                                            );

                                            //$id_type = old('id_type');
                                            $id_type = isset($identification_card_type) ? $identification_card_type : old('identification_card_type');
                                            ?>

                                            <div class="form-group col-md-6">
                                                <label for="identificationcardtype">Identification Card Type</label>

                                                <select name="identification_card_type" class="form-control" id="identification-card-type">

                                                    <option value="">Identification Card Type</option>

                                                    <?php foreach($id_type_arr as $id_type_val): ?>
                                                    <option value="{{ $id_type_val }}" <?php echo ($id_type == $id_type_val) ? 'selected' : ''; ?>>{{ $id_type_val }}</option>
                                                <?php endforeach; ?>

                                                </select>


                                                <label for="identificationcard">Identification Card</label>
                                                <input type="text" name="identification_card" value="{{ old('identification_card') }}" class="form-control" id="identification-card" placeholder="Identification Card" disabled="disabled">
                                            </div>                           

                                            <div class="form-group col-md-6">
                                                <label for="contactnumber">Contact Number</label>
                                                <input type="text" name="contact_number" value="{{ old('contact_number') }}" class="form-control" id="contact-number" placeholder="Contact Number">
                                            </div>

                                        </div>
                                        <!--/.row--> 

                                        <div class="row">

                                            <div class="form-group col-md-12">

                                                <div class="form-actions float-right">
                                                    <!--button type="submit" class="btn btn-info">Add customer-details & Continue to Add Transaction</button-->
                                                    <!--button type="submit" class="btn btn-primary ">Add customer-details</button-->
                                                    <a class="btn btn-primary btnNext">Continue To Create Pawn Transaction</a>
                                                    <!--button type="reset" class="btn btn-default">Reset</button-->
                                                    <!--a class="btn btn-primary btnNext">Next</a-->
                                                </div>

                                            </div>

                                        </div>
                                        <!--/.row--> 

                                    <!--/form-->

                                </div>
                                <div class="tab-pane" id="pawn-transaction" role="tabpanel">


                                    <!--form method="" action=""-->
                                            <div class="form-group row">

                                                <div class="col-md-3">
                                                    <label for="ornumber">Official Receipt No.</label>
                                                    <input type="text" name="or_number" value="{{ old('or_number') }}" class="form-control" id="or-number" placeholder="Official Receipt No.">
                                                </div>

                                            </div>

                                            <div class="form-group row">
     
                                                <div class="col-md-3">
                                                    <label for="branch">Branch</label>

                                                    <?php
                                                        //$branch = old('branch');
                                                        $branch = isset($branch) ? $branch : old('branch');
                                                    ?>

                                                    <select name="branch" class="form-control" id="branch">

                                                        <option value="">Branch</option>

                                                        <optgroup label="Santolan Pawnshop Inc.">
                                                            <option value="01" <?php echo ($branch == '01') ? 'selected' : ''; ?>>Head Office</option>
                                                            
                                                            <option value="06" <?php echo ($branch == '06') ? 'selected' : ''; ?>>Angono Branch 1</option>

                                                            <option value="07" <?php echo ($branch == '07') ? 'selected' : ''; ?>>Taytay Branch 2</option>

                                                            <option value="08" <?php echo ($branch == '08') ? 'selected' : ''; ?>>Binangonan Branch 1</option>

                                                             <option value="09" <?php echo ($branch == '09') ? 'selected' : ''; ?>>Angono Branch 2</option>

                                                            <option value="10" <?php echo ($branch == '10') ? 'selected' : ''; ?>>Concepcion Branch</option> 

                                                            <option value="13" <?php echo ($branch == '13') ? 'selected' : ''; ?>>Ampid Branch</option>

                                                            <option value="14" <?php echo ($branch == '14') ? 'selected' : ''; ?>>Antipolo Branch 2</option>

                                                            <option value="15" <?php echo ($branch == '15') ? 'selected' : ''; ?>>Taytay Branch 3</option>

                                                            <option value="16" <?php echo ($branch == '16') ? 'selected' : ''; ?>>Montalban Branch</option>

                                                            <option value="19" <?php echo ($branch == '19') ? 'selected' : ''; ?>>Binangonan Branch 2</option>

                                                            <option value="23" <?php echo ($branch == '23') ? 'selected' : ''; ?>>Antipolo Branch 4</option>

                                                            <option value="24" <?php echo ($branch == '24') ? 'selected' : ''; ?>>Parang Branch</option>

                                                            <option value="25" <?php echo ($branch == '25') ? 'selected' : ''; ?>>Tanay Branch 1</option>

                                                            <option value="26" <?php echo ($branch == '26') ? 'selected' : ''; ?>>Pasig Branch</option>

                                                            <option value="27" <?php echo ($branch == '27') ? 'selected' : ''; ?>>Tanay Branch 2</option>
                                                        </optgroup>

                                                        <optgroup label="Mama's Pawnshop">
                                                            <option value="AA" <?php echo ($branch == 'AA') ? 'selected' : ''; ?>>Taytay Branch</option>
                                                            
                                                            <option value="AB" <?php echo ($branch == 'AB') ? 'selected' : ''; ?>>Marikina Branch</option>

                                                            <option value="AC" <?php echo ($branch == 'AC') ? 'selected' : ''; ?>>Dapitan Branch</option>

                                                            <option value="AD" <?php echo ($branch == 'AD') ? 'selected' : ''; ?>>Antipolo Branch</option>
                                                        </optgroup>


                                                    </select>
                                                </div>

                                               <div class="col-md-3">
                                                    <label for="loanstatus">Loan Status</label>

                                                    <?php
                                                        $loan_status = isset($loan_status) ? $loan_status : old('loan_status');
                                                    ?>

                                                    <select name="loan_status" class="form-control" id="loan-status">
                                                        <option value="">Loan Status</option>
                                                        
                                                        <option value="New Sangla" <?php echo ($loan_status == 'New Sangla') ? 'selected' : ''; ?>>New Pawn Transaction</option>

                                                        <option value="Renew Sangla" <?php echo ($loan_status == 'Renew Sangla') ? 'selected' : ''; ?>>Renew Pawn Transaction</option>

                                                        <option value="Redeem Sangla" <?php echo ($loan_status == 'Redeem Sangla') ? 'selected' : ''; ?>>Redeem Pawn Transaction</option>
                                                    </select>

                                               </div>

                                                <div class="col-md-3">
                                                    <label for="pawnticketno">Pawn Ticket No.</label>
                                                    <input type="text" name="pawn_ticket_no" value="{{ old('pawn_ticket_no') }}" class="form-control" id="pawn-ticket-no" placeholder="Pawn Ticket No.">
                                                </div>                           

                                                <div class="col-md-3">
                                                    <label for="redeemno">Redeem No.</label>
                                                    <input type="text" name="tracking_no" value="{{ old('tracking_no') }}" class="form-control" id="tracking-no" placeholder="Redeem No.">
                                                </div>

                                            </div>

                                            <div class="form-group row">

                                                <div class="col-md-4">
                                                    <label for="dateloangranted">Date loan Granted</label>
                                                    <div class="input-group">                                                        
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <input type="text" name="date_loan_granted" value="{{ old('date_loan_granted') }}" class="form-control" id="date-loan-granted" placeholder="Date loan Granted">
                                                    </div>
                                                </div>                           

                                                <div class="col-md-4">
                                                    <label for="maturitydate">Maturity Date</label>
                                                    <div class="input-group">                                                        
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <input type="text" name="maturity_date" value="{{ old('maturity_date') }}" class="form-control" id="maturity-date" placeholder="Maturity Date">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="expirydateofredemptionperiod">Expiry Date of Redemption Period</label>
                                                    <div class="input-group">                                                        
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                        <input type="text" name="expiry_date_of_redemption_period" value="{{ old('expiry_date_of_redemption_period') }}" class="form-control" id="expiry-date-of-redemption-period" placeholder="Expiry Date of Redemption Period">
                                                    </div> 
                                                </div>  

                                            </div>
                                        
                                            <div class="form-group row">
                                            
                                                <div class="col-md-4">
                                                    <label for="loanamountinnumbers">Loan Amount In Numbers</label>
                                                    <input type="text" name="loan_amount_in_numbers" value="{{ old('loan_amount_in_numbers') }}" class="form-control" id="loan-amount-in-numbers" placeholder="Loan Amount In Numbers">
                                                </div>                        

                                                <div class="col-md-4">

                                                    <label for="interestrateinnumbers">Interest Rate In Numbers</label>
                                                    <input type="text" name="interest_rate_in_numbers" value="{{ old('interest_rate_in_numbers') }}" class="form-control" id="interest-rate-in-numbers" placeholder="Interest Rate In Numbers">
                                                </div>

                                                <div class="col-md-4">

                                                    <label for="pledge-time-in-period">Pledge Time Period</label>

                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <!--label for="pledge-time-in-period">Pledge Time Period</label-->
                                                            <input type="text" name="pledge_time_period" value="{{ old('pledge_time_period') }}" class="form-control" id="pledge-time-in-period" placeholder="Pledge Time Period">

                                                        </div>

                                                        <div class="col-md-6">

                                                            <?php
                                                                //$branch = old('branch');
                                                                $pledge_time_period_day_or_month = isset($pledge_time_period_day_or_month) ? $pledge_time_period_day_or_month : old('pledge_time_period_day_or_month');
                                                            ?>


                                                            <select name="pledge_time_period_day_or_month" class="form-control" id="pledge-time-period-day-or-month">
                                                                <option value="Day" <?php echo ($pledge_time_period_day_or_month == 'Day') ? 'selected' : ''; ?>>Day</option>
                                                                
                                                                <option value="Days" <?php echo ($pledge_time_period_day_or_month == 'Days') ? 'selected' : ''; ?>>Days</option>

                                                                <option value="Month" <?php echo ($pledge_time_period_day_or_month == 'Month') ? 'selected' : ''; ?>>Month</option>

                                                                <option value="Months" <?php echo ($pledge_time_period_day_or_month == 'Months') ? 'selected' : ''; ?>>Months</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <!--label for="pledge-time-in-period">Pledge Time Period</label>
                                                    <input type="text" name="pledge_time_period" value="{{ old('pledge_time_period') }}" class="form-control" id="pledge-time-in-period" placeholder="Pledge Time Period"-->
                                                </div>

                                            </div>

                                        <div class="form-group row">

                                            <div class="col-md-4">
                                                <label for="appraisedvalueinnumbers">Appraised Value In Numbers</label>
                                                <input type="text" name="appraised_value_in_numbers" value="{{ old('appraised_value_in_numbers') }}" class="form-control" id="appraisedvalueinnumbers" placeholder="Appraised Value In Numbers">
                                            </div>

                                            <div class="col-md-4">
                                                <label for="penaltyinterest">Penalty Interest</label>
                                                <input type="text" name="penalty_interest" value="{{ old('penalty_interest') }}" class="form-control" id="penalty-interest" placeholder="Penalty Interest">
                                            </div>

                                        </div>

                                        <div class="form-group row">



                                            <div class="col-md-6">  

                                                <label for="descriptionofthepawn">Descripton of the pawn</label>
                                                <textarea id="textarea-input" name="description_of_the_pawn" value="{{ old('description_of_the_pawn') }}" rows="15" class="form-control" placeholder="Descripton of the pawn">{{ ucwords(old('description_of_the_pawn')) }}</textarea>
                                              
                                            </div>
                                            <div class="col-md-6"> 

                                                <div class="col-md-12">
                                                    <label for="principal">Principal</label>
                                                    <input type="text" name="principal" value="{{ old('principal') }}" class="form-control" id="principal" placeholder="Principal">
                                                </div>    

                                                <div class="col-md-12">                                        
                                                    <label for="interestinabsoluteamount">Interest in Absolute Amount</label>
                                                    <input type="text" name="interest_in_absolute_amount" value="{{ old('interest_in_absolute_amount') }}" class="form-control" id="interest-in-absolute-amount" placeholder="Interest in Absolute Amount">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="servicechargeinamount">Service Charge in Amount</label>
                                                    <input type="text" name="service_charge_in_amount" value="{{ old('service_charge_in_amount') }}" class="form-control" id="service-charge-in-amount" placeholder="Service Charge in Amount">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="netproceeds">Net Proceeds</label>
                                                    <input type="text" name="net_proceeds" value="{{ old('net_proceeds') }}" class="form-control" id="net-proceeds" placeholder="Net Proceeds">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="effectiveinterestrate">Effectinve Interest Rate</label>
                                                    <input type="text" name="effective_interest_rate" value="{{ old('effective_interest_rate') }}" class="form-control" id="effective-interest-rate" placeholder="Effectinve Interest Rate">
                                                </div>



                                                
                                                <!--div class="form-group col-md-12">
                                                    <label for="pledgetimeinperiodtype">Please Check:</label>
                                                    <div class="col-md-12">
                                                        <label class="radio-inline" for="perannum">
                                                        Per Annum
                                                            <input type="radio" id="pledge-time-in-period-type" name="pledge_time_period_type" value="Per Annum">
                                                        </label>
                                                        <label class="radio-inline" for="permonth">
                                                        Per Month
                                                            <input type="radio" id="pledge-time-in-period-type" name="pledge_time_period_type" value="Per Month">
                                                        </label>
                                                        <label class="radio-inline" for="others">
                                                        (Others)
                                                            <input type="radio" id="pledge-time-inperiod-type" name="pledge_time_period_type" value="Others">
                                                        </label>
                                                    </div>
                                                </div-->

                                                <?php
                                                $pledge_time_period_type = old('pledge_time_period_type');
                                                ?>

                                                <div class="form-group col-md-12">
                                                    <label for="pledgetimeinperiodtype">Please Check:</label>
                                                    <div class="col-md-12">
                                                        <label class="radio-inline" for="perannum">
                                                        Per Annum
                                                            <input type="radio" id="pledge-time-in-period-type" name="pledge_time_period_type" value="Per Annum" <?php echo ($pledge_time_period_type == 'Per Annum') ? 'checked' : ''; ?>>
                                                        </label>
                                                        <label class="radio-inline" for="permonth">
                                                        Per Month
                                                            <input type="radio" id="pledge-time-in-period-type" name="pledge_time_period_type" value="Per Month" <?php echo ($pledge_time_period_type == 'Per Month') ? 'checked' : ''; ?>>
                                                        </label>
                                                        <label class="radio-inline" for="others">
                                                        (Others)
                                                            <input type="radio" id="pledge-time-inperiod-type" name="pledge_time_period_type" value="Others" <?php echo ($pledge_time_period_type == 'Others') ? 'checked' : ''; ?>>
                                                        </label>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>



                                        <div class="row">

                                            <div class="form-group col-md-6">

                                                <div class="form-actions">
                                                    <a class="btn btn-primary btnBack">Back</a>
                                                </div>

                                            </div>

                                            <div class="form-group col-md-6">

                                                <div class="form-actions float-right">
                                                    
                                                    <button type="submit" class="btn btn-primary btnSave">Save Customer &amp; Pawn Transaction</button>
                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                    
                                                </div>

                                            </div>

                                        </div>
                                        <!--/.row-->                                 

                                </div>                        
                            </div>
                        </form>

                    </div>

                </div>

    
            </div>
        
        </div>

    </div>

</div>



@endsection