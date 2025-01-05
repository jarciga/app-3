@extends('layouts.app')           

@section('content')

            
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
            <div class="row" style="margin-top:30px;">


                <div class="col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home">Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Sangla</a>
                        </li>
                    </ul>
                    <form method="post" action="/edit_sangla/{{ $customer->id }}">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="loan_status" value="initial-sangla">

                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                    
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <small><strong>Customer No.:</strong> <?php echo 'SPC'.date('Yzn').'-'.(customer_count()); ?></small>
                                            <input type="hidden" name="customer_number" value="<?php echo 'SPC'.date('Yzn').(customer_count()); ?>">

                                        </div>
                                    </div>
                                    <!--/.row-->

                                <!--form method="" action=""-->
                                    <div class="row">

                                        <div class="form-group col-sm-3">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" id="last-name" placeholder="Last Name">
                                        </div>                           

                                        <div class="form-group col-sm-3">
                                            <label for="firstname">First Name</label>
                                            <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" id="first-name" placeholder="First Name">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label for="middlename">Middle Name</label>
                                            <input type="text" name="middle_name" value="{{ old('middle_name') }}" class="form-control" id="middle-name" placeholder="Middle Name">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label for="suffix">Suffix</label>
                                            <input type="text" name="suffix" value="{{ old('suffix') }}" class="form-control" id="suffix" placeholder="Suffix">
                                        </div>

                                    </div>
                                    <!--/.row-->


                                    <div class="row">                                

                                        <div class="form-group col-sm-2">
                                            <label for="rmflrunitno">Rm./Flr./Unit No.</label>
                                            <input type="text" name="rm_flr_unit_no" value="{{ old('rm_flr_unit_no') }}" class="form-control" id="rm-flr-unit-no" placeholder="Rm./Flr./Unit No.">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="bldgname">Bldg. Name</label>
                                            <input type="text" name="bldg_name" value="{{ old('bldg_name') }}" class="form-control" id="bldg-name" placeholder="Bldg. Name">
                                        </div>

                                        <div class="form-group col-sm-2">
                                            <label for="houselotandblkno">House/Lot & Blk. No.</label>
                                            <input type="text" name="house_lot_and_blk_no" value="{{ old('house_lot_and_blk_no') }}" class="form-control" id="house-lot-and-blk-no" placeholder="House/Lot & Blk. No.">
                                        </div>

                                        <div class="form-group col-sm-2">
                                            <label for="streetname">Street Name</label>
                                            <input type="text" name="street_name" value="{{ old('street_name') }}" class="form-control" id="street-name" placeholder="Street Name">
                                        </div>

                                        <div class="form-group col-sm-2">
                                            <label for="subdivision">Subdivision</label>
                                            <input type="text" name="subdivision" value="{{ old('subdivision') }}" class="form-control" id="subdivision" placeholder="Subdivision">
                                        </div>

                                    </div>
                                    <!--/.row-->

                                    <div class="row">

                                        <div class="form-group col-sm-4">
                                            <label for="barangaydistrictlocality">Barangay/District/Locality</label>
                                            <input type="text" name="barangay_district_locality" value="{{ old('barangay_district_locality') }}" class="form-control" id="barangay-district-locality" placeholder="Barangay/District/Locality">
                                        </div>                           

                                        <div class="form-group col-sm-4">
                                            <label for="citymunicipality">City/Municipality</label>
                                            <input type="text" name="city_municipality" value="{{ old('city_municipality') }}" class="form-control" id="city-municipality" placeholder="City/Municipality">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="province">Province</label>
                                            <input type="text" name="province" value="{{ old('province') }}" class="form-control" id="province" placeholder="Province">
                                        </div>

                                    </div>
                                    <!--/.row-->                            

                                    <div class="row">

                                        <div class="form-group col-sm-6">
                                            <label for="identificationcard">Identification Card</label>
                                            <input type="text" name="identification_card" value="{{ old('identification_card') }}" class="form-control" id="identification-card" placeholder="Identification Card">
                                        </div>                           

                                        <div class="form-group col-sm-6">
                                            <label for="contactnumber">Contact Number</label>
                                            <input type="text" name="contact_number" value="{{ old('contact_number') }}" class="form-control" id="contact-number" placeholder="Contact Number">
                                        </div>

                                    </div>
                                    <!--/.row--> 

                                    <div class="row">

                                        <div class="form-group col-sm-12">

                                            <div class="form-actions float-right">
                                                <!--button type="submit" class="btn btn-info">Add Customer & Continue to Add Transaction</button-->
                                                <!--button type="submit" class="btn btn-primary ">Add Customer</button-->
                                                <a class="btn btn-primary btnNext">Continue To Edit Sangla Transaction</a>
                                                <!--button type="reset" class="btn btn-default">Reset</button-->
                                                <!--a class="btn btn-primary btnNext">Next</a-->
                                            </div>

                                        </div>

                                    </div>
                                    <!--/.row--> 

                                <!--/form-->

                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel">


                                <!--form method="" action=""-->

                                    <div class="row">

                                        <div class="form-group col-sm-4">

                                            <div class="row">

                                                <div class="form-group col-sm-12">
                                                    <label for="dateloangranted">Date loan Granted</label>
                                                    <input type="text" name="date_loan_granted" value="{{ old('date_loan_granted') }}" class="form-control" id="date-loan-granted" placeholder="Date loan Granted">
                                                </div>                           

                                                <div class="form-group col-sm-12">
                                                    <label for="maturitydate">Maturity Date</label>
                                                    <input type="text" name="maturity_date" value="{{ old('maturity_date') }}" class="form-control" id="maturity-date" placeholder="Maturity Date
                                ">
                                                </div>

                                                <div class="form-group col-sm-12">
                                                    <label for="expirydateofredemptionperiod">Expiry Date of Redemption Period</label>
                                                    <input type="text" name="expiry_date_of_redemption_period" value="{{ old('expiry_date_of_redemption_period') }}" class="form-control" id="expiry-date-of-redemption-period" placeholder="Expiry Date of Redemption Period">
                                                </div>                           

                                            </div>
                                            <!--/.row-->

                                        </div>  


                                        <div class="form-group col-sm-4 ml-sm-auto">

                                            <div class="row">

                                                <div class="form-group col-sm-12">
                                                    <label for="pawnticketno">Pawn Ticket No.</label>
                                                    <input type="text" name="pawn_ticket_no" value="{{ old('pawn_ticket_no') }}" class="form-control" id="pawn-ticket-no" placeholder="Pawn Ticket No.">
                                                </div>                           

                                                <div class="form-group col-sm-12">
                                                    <label for="trackingno">Redeem No.</label>
                                                    <input type="text" name="tracking_no" value="{{ old('tracking_no') }}" class="form-control" id="tracking-no" placeholder="Redeem No.">
                                                </div>

                                            </div>
                                            <!--/.row-->

                                        </div>  

                                    </div>
                                    <!--/.row-->



                                    <div class="row">

                                        <div class="form-group col-sm-4">
                                            <label for="loanamountinnumbers">Loan Amount In Numbers</label>
                                            <input type="text" name="loan_amount_in_numbers" value="{{ old('loan_amount_in_numbers') }}" class="form-control" id="loan-amount-in-numbers" placeholder="Loan Amount In Numbers">
                                        </div>                        

                                        <div class="form-group col-sm-4">
                                            <label for="interestrateinnumbers">Interest Rate In Numbers</label>
                                            <input type="text" name="interest_rate_in_numbers" value="{{ old('interest_rate_in_numbers') }}" class="form-control" id="interest-rate-in-numbers" placeholder="Interest Rate In Numbers">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="pledge-time-in-period">Pledge Time Period</label>
                                            <input type="text" name="pledge_time_in_period" value="{{ old('pledge_time_in_period') }}" class="form-control" id="pledge-time-in-period" placeholder="Pledge Time Period">
                                        </div>

                                    </div>
                                    <!--/.row-->  

                                     <div class="row">

                                        <div class="form-group col-sm-4">
                                            <label for="appraisedvalueinnumbers">Appraised Value In Numbers</label>
                                            <input type="text" name="appraised_value_in_numbers" value="{{ old('appraised_value_in_numbers') }}" class="form-control" id="appraisedvalueinnumbers" placeholder="Appraised Value In Numbers">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="penaltyinterest">Penalty Interest</label>
                                            <input type="text" name="penalty_interest" value="{{ old('penalty_interest') }}" class="form-control" id="province" placeholder="Penalty Interest">
                                        </div>

                                    </div>
                                    <!--/.row--> 

                                     <div class="row">

                                        <div class="col-sm-12">  

                                             <div class="row">

                                                <div class="col-sm-6">  


                                                    <div class="form-group col-sm-12">
                                                        <label for="descriptionofthepawn">Descripton of the pawn</label>
                                                       <textarea id="description-of-the-pawn" name="description_of_the_pawn" rows="15" class="form-control" placeholder="Descripton of the pawn">{{ old('description_of_the_pawn') }}</textarea>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6"> 

                                                    <div class="form-group col-sm-12">
                                                        <label for="principal">Principal</label>
                                                        <input type="text" name="principal" value="{{ old('principal') }}" class="form-control" id="principal" placeholder="Principal">
                                                    </div>    

                                                    <div class="form-group col-sm-12">                                        
                                                        <label for="interestinabsoluteamount">Interest in Absolute Amount</label>
                                                        <input type="text" name="interest_in_absolute_amount" value="{{ old('interest_in_absolute_amount') }}" class="form-control" id="interest-in-absolute-amount" placeholder="Interest in Absolute Amount">
                                                    </div>

                                                    <div class="form-group col-sm-12">
                                                        <label for="servicechargeinamount">Service Charge in Amount</label>
                                                        <input type="text" name="service_charge_in_amount" value="{{ old('service_charge_in_amount') }}" class="form-control" id="service-charge-in-amount" placeholder="Service Charge in Amount">
                                                    </div>

                                                    <div class="form-group col-sm-12">
                                                        <label for="netproceeds">Net Proceeds</label>
                                                        <input type="text" name="net_proceeds" value="{{ old('net_proceeds') }}" class="form-control" id="net-proceeds" placeholder="Net Proceeds">
                                                    </div>

                                                    <div class="form-group col-sm-12">
                                                        <label for="effectiveinterestrate">Effectinve Interest Rate</label>
                                                        <input type="text" name="effective_interest_rate" value="{{ old('effective_interest_rate') }}" class="form-control" id="effective-interest-rate" placeholder="Effectinve Interest Rate">
                                                    </div>

                                                    <?php
                                                    echo $pledge_time_in_period_type = old('pledge_time_in_period_type');
                                                    ?>

                                                    <div class="form-group col-sm-12">
                                                        <label for="pledgetimeinperiodtype">Please Check:</label>
                                                        <div class="col-md-12">
                                                            <label class="radio-inline" for="perannum">
                                                            Per Annum
                                                                <input type="radio" id="pledge-time-in-period-type" name="pledge_time_in_period_type" value="Per Annum" <?php echo ($pledge_time_in_period_type == 'Per Annum') ? 'checked' : ''; ?>>
                                                            </label>
                                                            <label class="radio-inline" for="permonth">
                                                            Per Month
                                                                <input type="radio" id="pledge-time-in-period-type" name="pledge_time_in_period_type" value="Per Month" <?php echo ($pledge_time_in_period_type == 'Per Month') ? 'checked' : ''; ?>>
                                                            </label>
                                                            <label class="radio-inline" for="others">
                                                            (Others)
                                                                <input type="radio" id="pledge-time-inperiod-type" name="pledge_time_in_period_type" value="Others" <?php echo ($pledge_time_in_period_type == 'Others') ? 'checked' : ''; ?>>
                                                            </label>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>

                                        </div>    

                                    </div>
                                    <!--/.row-->

                                    <div class="row">

                                        <div class="form-group col-sm-6">

                                            <div class="form-actions">
                                                <a class="btn btn-primary btnPrevious">Previous</a>
                                            </div>

                                        </div>


                                        <div class="form-group col-sm-6">

                                            <div class="form-actions float-right">
                                                
                                                <button type="submit" class="btn btn-primary btnSave">Update Sangla Transaction</button>
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
@endsection