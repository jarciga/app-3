@extends('layouts.app')           

@section('content')


                <!--div class="row" style="margin-top:30px;">
                    <div class="col-md-12">
                        <h1 class="pull-left">Add</h1>
                    </div>
                </div-->

<div id="redeem-renew-pawn-transaction" class="row">

    <div class="col-md-10 offset-md-1">

        <div class="card">
            <h4 class="card-header">
                <strong>Edit | Redeem/Renew Pawn Transaction</strong>
                <a href="{{ url('/redeemrenewpawntransaction/create') }}" id="btn-create-customer-and-pawn-transaction" class="btn btn-sm btn-outline-primary pull-right">Create Renew Pawn Transaction</a>
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

                <div class="row">


                    <div class="col-md-12">
                        
                        <form method="post" action="{{ url('/redeemrenewpawntransaction/update') }}/{{$id}}" class="form-horizontal">
                            {{ csrf_field() }}
                            
                            <input type="hidden" name="customer_id" value="{{ $customer_id }}">
                            <input type="hidden" name="mortgage_id" value="{{ $mortgage_id }}">
                            <input type="hidden" name="pawn_id" value="{{ $pawn_id }}">

                            <input type="hidden" name="loan_status" value="redeem-renew-pawn-transaction">
                            

                            <div class="form-group row">
                                <div class="col-md-4">
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


                                <div class="col-md-4">
                                    <label for="dateloangranted">Date loan Granted</label>
                                    <div class="input-group">                                                        
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" name="date_loan_granted" value="{{ $date_loan_granted }}" class="form-control" id="date-loan-granted" placeholder="Date loan Granted">
                                    </div>
                                </div> 

                                <div class="col-md-4">

                                    <?php
                                        //$canceled_transaction = old('canceled_transaction');
                                        echo $canceled_transaction = isset($canceled_transaction) ? $canceled_transaction : old('canceled_transaction');
                                    ?>

                                    <!--label for="canceledtransaction">Cancel Transaction</label-->
                                    <span style="display:block; margin-bottom: .5rem;">Canceled Transaction</span>
                                    <label class="switch switch-lg switch-icon switch-info">
                                        <input type="checkbox" name="canceled_transaction" class="switch-input" <?php echo ($canceled_transaction == 'true') ? 'checked=""' : ''; ?>>
                                        <span class="switch-label" data-on="" data-off=""></span>
                                        <span class="switch-handle"></span>
                                    </label>

                                </div>


                            </div>

                            <div class="form-group row">

                                <div class="col-md-4">
                                    <label for="ornumber">Official Receipt No.</label>
                                    <input type="text" name="or_number" value="{{ $or_number }}" class="form-control" id="or-number" placeholder="Official Receipt No.">
                                </div>

                                <div class="col-md-4">
                                    <label for="pawnticketnumber">Pawn Ticket No.</label>
                                    <input type="text" name="pawn_ticket_number" value="{{ $pawn_ticket_number }}" class="form-control" id="pawn-ticket-no" placeholder="Pawn Ticket No.">
                                </div>                           

                                <div class="col-md-4">
                                    <label for="refpawnticketnumber">Ref Pawn Ticket No. <small class=" text-muted"><i>(For renewal used only)</i></small></label>
                                    <input type="text" name="ref_pawn_ticket_number" value="{{ $ref_pawn_ticket_number }}" class="form-control" id="ref-pawn-ticket-number" placeholder="Reference Pawn Ticket Number">
                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="firstname">Full name</label>
                                    <input type="text" name="full_name" value="{{ ucwords(strtolower($full_name)) }}" class="form-control" id="full-name" placeholder="Full Name">
                                </div>
                                
                            </div>

                            <!--div class="row">

                                <div class="form-group col-md-12 d-none">
                                    <label for="completeaddress">Complete Address</label>

                                     <textarea name="complete_address" class="form-control" rows="2" id="complete-address">{{-- ucwords(strtolower($complete_address)) --}}</textarea>
                                </div>

                            </div-->
                          

                                <div class="form-group row">
                                
                                    <div class="col-md-4">
                                        <label for="loanamountinnumbers">Loan Amount</label>
                                        <input type="text" name="loan_amount_in_numbers" value="{{ $loan_amount_in_numbers }}" class="form-control" id="loan-amount-in-numbers" placeholder="Loan Amount">
                                    </div>                        

                                    <div class="col-md-4">

                                        <label for="interestrateinnumbers">Interest Rate</label>
                                        <input type="text" name="interest_rate_in_numbers" value="{{ $interest_rate_in_numbers }}" class="form-control" id="interest-rate-in-numbers" placeholder="Interest Rate">
                                    </div>

                                

                                <!--div class="col-md-3">
                                    <label for="appraisedvalueinnumbers">Appraised Value</label>
                                    <input type="text" name="appraised_value_in_numbers" value="{{-- $appraised_value_in_numbers --}}" class="form-control" id="appraisedvalueinnumbers" placeholder="Appraised Value">
                                </div-->

                                <div class="col-md-4">
                                    <label for="penaltyinterest">Penalty Interest</label>
                                    <input type="text" name="penalty_interest" value="{{ $penalty_interest }}" class="form-control" id="penalty-interest" placeholder="Penalty Interest">
                                </div>

                            </div>

                            <div class="form-group row">



                                <!--div class="col-md-6 d-none">  

                                    <label for="descriptionofthepawn">Descripton of the pawn</label>
                                    <textarea id="textarea-input" name="description_of_the_pawn" value="{{-- $description_of_the_pawn --}}" rows="15" class="form-control" placeholder="Descripton of the pawn">{{-- ucwords(strtolower($description_of_the_pawn)) --}}</textarea>
                                  
                                </div-->
                                <div class="col-md-4"> 

                                    <div class="col-md-12 pr-0 pl-0">
                                        <label for="principal">Principal</label>
                                        <input type="text" name="principal" value="{{ $principal }}" class="form-control" id="principal" placeholder="Principal">
                                    </div>    

                                    <div class="col-md-12 pr-0 pl-0">                                        
                                        <label for="interestinabsoluteamount">Interest in Absolute Amount</label>
                                        <input type="text" name="interest_in_absolute_amount" value="{{ $interest_in_absolute_amount }}" class="form-control" id="interest-in-absolute-amount" placeholder="Interest in Absolute Amount">
                                    </div>

                                    <!--div class="col-md-12 pr-0 pl-0 d-none">
                                        <label for="servicechargeinamount">Service Charge in Amount</label>
                                        <input type="text" name="service_charge_in_amount" value="{{-- $service_charge_in_amount --}}" class="form-control" id="service-charge-in-amount" placeholder="Service Charge in Amount">
                                    </div-->

                                    <div class="col-md-12 pr-0 pl-0">
                                        <label for="liquidateddamages">Liquidated Damages</label>
                                        <input type="text" name="liquidated_damages" value="{{ $liquidated_damages }}" class="form-control" id="liquidated-damages" placeholder="Liquidated Damages">
                                    </div>


                                    <div class="col-md-12 pr-0 pl-0">
                                        <label for="netproceeds">Net Proceeds</label>
                                        <input type="text" name="net_proceeds" value="{{ $net_proceeds }}" class="form-control" id="net-proceeds" placeholder="Net Proceeds">
                                    </div>

                                    <!--div class="col-md-12 pr-0 pl-0 d-none">
                                        <label for="effectiveinterestrate">Effectinve Interest Rate</label>
                                        <input type="text" name="effective_interest_rate_in_percent" value="{{-- $effective_interest_rate_in_percent --}}" class="form-control" id="effective-interest-rate" placeholder="Effectinve Interest Rate">
                                    </div-->

                                </div>

                            </div>



                            <!--div class="row">

                                <?php 
                                /*                           
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

                                //$id_type = $identification_card_type;
                                $id_type = isset($identification_card_type) ? $identification_card_type : old('identification_card_type');
                                */
                                ?>

                                <div class="form-group col-md-6 d-none">
                                    <label for="identificationcardtype">Identification Card Type</label>

                                    <select name="identification_card_type" class="form-control" id="identification-card-type">

                                        <option value="">Identification Card Type</option>

                                        <?php //foreach($id_type_arr as $id_type_val): ?>
                                        <option value="{{-- $id_type_val --}}" <?php //echo ($id_type == $id_type_val) ? 'selected' : ''; ?>>{{-- $id_type_val --}}</option>
                                    <?php //endforeach; ?>

                                    </select>


                                    <label for="identificationcard">Identification Card</label>
                                    <input type="text" name="identification_card" value="{{-- $identification_card --}}" class="form-control" id="identification-card" placeholder="Identification Card" disabled="disabled">
                                </div>                           

                                <div class="form-group col-md-6 d-none">
                                    <label for="contactnumber">Contact Number</label>
                                    <input type="text" name="contact_number" value="{{-- $contact_number --}}" class="form-control" id="contact-number" placeholder="Contact Number">
                                </div>

                            </div-->

                        

                    </div>

                </div>

    
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary pull-right">Update New Pawn Transaction</button>
            </div>

        
        </div>

    </div>

    <!--div class="col-md-3">
        <div class="card">
            <div class="card-block">
                    <button type="submit" class="btn btn-block btn-primary btnSave">Update New Pawn Transaction</button>
            </div>
        </div>
    </div-->

</form>
</div>



@endsection