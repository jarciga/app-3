@extends('layouts.app')

@section('content')




            <div class="row" style="margin-top:30px;">

                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <strong>Add New Sangla Transaction</strong>
                            <small class="float-right"><strong>Customer No.:</strong> <?php echo 'SPC'.date('Yzn'); ?></small>
                        </div>
                        <div class="card-block">
                            <form method="" action="">

                                <div class="row">

                                    <div class="form-group col-sm-4">

										<div class="row">

										    <div class="form-group col-sm-12">
										        <label for="dateloangranted">Date loan Granted</label>
										        <input type="text" name="date_loan_granted" class="form-control" id="date-loan-granted" placeholder="Date loan Granted">
										    </div>                           

										    <div class="form-group col-sm-12">
										        <label for="maturitydate">Maturity Date</label>
										        <input type="text" name="maturity_date" class="form-control" id="maturity-date" placeholder="Maturity Date
">
										    </div>

										    <div class="form-group col-sm-12">
										        <label for="expirydateofredemptionperiod">Expiry Date of Redemption Period</label>
										        <input type="text" name="expiry_date_of_redemption_period" class="form-control" id="expiry-date-of-redemption-period" placeholder="Expiry Date of Redemption Period">
										    </div>                           

										</div>
										<!--/.row-->

                                    </div>  


                                    <div class="form-group col-sm-4 ml-sm-auto">

										<div class="row">

										    <div class="form-group col-sm-12">
										        <label for="pawnticketno">Pawn Ticket No.</label>
										        <input type="text" name="pawn_ticket_no" class="form-control" id="pawn-ticket-no" placeholder="Pawn Ticket No.">
										    </div>                           

										    <div class="form-group col-sm-12">
										        <label for="trackingno">Redeem No.</label>
										        <input type="text" name="tracking_no" class="form-control" id="tracking-no" placeholder="Redeem No.">
										    </div>

										</div>
										<!--/.row-->

                                    </div>  

                                </div>
                                <!--/.row-->



                                <div class="row">

                                    <div class="form-group col-sm-4">
                                        <label for="loanamountinnumbers">Loan Amount In Numbers</label>
                                        <input type="text" name="loan_amount_in_numbers" class="form-control" id="loan-amount-in-numbers" placeholder="Loan Amount In Numbers">
                                    </div>                        

                                    <div class="form-group col-sm-4">
                                        <label for="interestrateinnumbers">Interest Rate In Numbers</label>
                                        <input type="text" name="interest_rate_in_numbers" class="form-control" id="interest-rate-in-numbers" placeholder="Interest Rate In Numbers">
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="pledge-time-in-period">Pledge Time Period</label>
                                        <input type="text" name="pledge_time_in_period" class="form-control" id="pledge-time-inperiod" placeholder="Pledge Time Period">
                                    </div>

                                </div>
                                <!--/.row-->  

                                 <div class="row">

                                    <div class="form-group col-sm-4">
                                        <label for="appraisedvalueinnumbers">Appraised Value In Numbers</label>
                                        <input type="text" name="appraised_value_in_numbers" class="form-control" id="appraisedvalueinnumbers" placeholder="Appraised Value In Numbers">
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="penaltyinterest">Penalty Interest</label>
                                        <input type="text" name="penalty_interest" class="form-control" id="province" placeholder="penalty-interest">
                                    </div>

                                </div>
                                <!--/.row--> 

                                 <div class="row">

                                    <div class="form-group col-sm-6">
                                        <label for="appraisedvalueinnumbers">Appraised Value In Numbers</label>
                                       <textarea id="textarea-input" name="textarea-input" rows="15" class="form-control" placeholder="Content.."></textarea>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="penaltyinterest">Penalty Interest</label>
                                        <input type="text" name="penalty_interest" class="form-control" id="province" placeholder="penalty-interest">


                                        <label for="penaltyinterest">Penalty Interest</label>
                                        <input type="text" name="penalty_interest" class="form-control" id="province" placeholder="penalty-interest">


                                        <label for="penaltyinterest">Penalty Interest</label>
                                        <input type="text" name="penalty_interest" class="form-control" id="province" placeholder="penalty-interest">


                                        <label for="penaltyinterest">Penalty Interest</label>
                                        <input type="text" name="penalty_interest" class="form-control" id="province" placeholder="penalty-interest">

                                        <label for="penaltyinterest">Penalty Interest</label>
                                        <input type="text" name="penalty_interest" class="form-control" id="province" placeholder="penalty-interest">

                                        <label for="penaltyinterest">Penalty Interest</label>
                                        <input type="text" name="penalty_interest" class="form-control" id="province" placeholder="penalty-interest">


                                    </div>

                                </div>
                                <!--/.row-->

                                <div class="row">

                                    <div class="form-group col-sm-12">

                                        <div class="form-actions float-right">
                                            
                                            <button type="submit" class="btn btn-primary">Add Sangla Transaction</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>

                                    </div>

                                </div>
                                <!--/.row-->                                 



                                
                            </form>
                        </div>
                    </div>

                </div>
                <!--/.col-->

            </div>

@endsection