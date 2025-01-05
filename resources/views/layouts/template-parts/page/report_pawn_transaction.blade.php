@extends('layouts.app')           

@section('content')

<?php
//$branch = old('branch');
$branch = isset($_POST['branch']) ? $_POST['branch'] : '';
$loan_status = isset($_POST['loan_status']) ? $_POST['loan_status'] : '';
$date_range_reporting_from = isset($_POST['date_range_reporting_from']) ? $_POST['date_range_reporting_from'] : '';

$date_range_reporting_to = isset($_POST['date_range_reporting_to']) ? $_POST['date_range_reporting_to'] : '';
?>

<div class="row">

    <div class="col-md-12">

        <div class="card">
            <h4 class="card-header">
                <strong>Report Pawn Transaction</strong>
                <a href="/pawnshopsystem/public/index.php/create_customer_pawn" id="btn-create-customer-and-pawn-transaction" class="btn btn-sm btn-outline-primary pull-right invisible">Add New Customer &amp; Pawn Transaction</a>
            </h4>

            <div class="card-block">


                <?php //echo $_GET["status"]; ?>
                <div class="row">

                    <div class="col-md-6">
						<form method="post" action="{{ url('pawntransaction/report') }}" class="form-horizontal">
						        {{ csrf_field() }}

						<?php
						/*
						@if ( isset($loan_status) && $loan_status == 'new-pawn-transaction' )
						<input type="hidden" name="loan_status" value="new-pawn-transaction">

						@elseif ( isset($loan_status) && $loan_status == 'renew-pawn-transaction' )
						<input type="hidden" name="loan_status" value="renew-pawn-transaction">

						@elseif ( isset($loan_status) && $loan_status == 'redeem-pawn-transaction' )
						<input type="hidden" name="loan_status" value="redeem-pawn-transaction">

						@else
						<input type="hidden" name="loan_status" value="">
						
						@endif
						*/
						?>

						<?php 
						//$id_type = isset($date_range_reporting_from) ? $branch : old('date_range_reporting_from');
						?>

						<div class="form-group col-sm-12">


 							<label for="loan_status">Pawn Transaction</label>



						    <div class="input-group">
						        <select name="loan_status" class="form-control" id="loan_status">
									<option value="" <?php echo ($loan_status == '') ? 'selected' : ''; ?>>All Pawn Transaction</option>
					                <option value="new-pawn-transaction" <?php echo ($loan_status == 'new-pawn-transaction') ? 'selected' : ''; ?>>New Pawn Transaction</option>						                
					                <option value="renew-pawn-transaction" <?php echo ($loan_status == 'renew-pawn-transaction') ? 'selected' : ''; ?>>Renew Pawn Transaction</option>
					                <option value="redeem-pawn-transaction" <?php echo ($loan_status == 'redeem-pawn-transaction') ? 'selected' : ''; ?>>Redeem Pawn Transaction</option>
						        </select>
						    </div>

						    <label for="branchreporting">Branch</label>

                           <?php
                                //$branch = old('branch');
                                $branch = isset($branch) ? $branch : old('branch');
                            ?>

						    <div class="input-group">
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

						    <label for="daterangereporting">Date From:</label>
						    <div class="input-group">                                                        
						        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						        <input type="text" name="date_range_reporting_from" value="<?php echo ($date_range_reporting_from); ?>" class="form-control" id="date-range-reporting-from" placeholder="Date range reporting from">
						    </div>

						    <label for="daterangereporting">Date To:</label>
						    <div class="input-group">                                                        
						        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						        <input type="text" name="date_range_reporting_to" value="<?php echo ($date_range_reporting_to); ?>" class="form-control" id="date-range-reporting-to" placeholder="Date range reporting to">
						    </div>

						</div>

						    
						<div class="form-group">
							 
								<button type="submit" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-primary">Reset</button>
								<!--button type="reset" class="btn btn-default">Reset</button-->
							
						</div>
						</form>

                    </div>

					<div class="col-md-6">
						@if ( !empty($data) && sizeof($data) > 0 )

						<div class="alert alert-success">
						    {{-- $data --}}
						    <p><strong>Success:</strong> Total Record Found: {{ $data_count }}</p>
						</div>


						<?php 
							$loan_status = isset($loan_status) ? $loan_status : '';
							$branch = isset($branch) ? $branch : '';  
						 	$date_from = isset($date_from) ? $date_from : '';
						 	$date_to = isset($date_to) ? $date_to : '';  
							?>

							@if ( ( isset($date_from) && isset($date_from) != '' )  && 
								  ( isset($date_to) && isset($date_to) != '' ) )

							<form method="post" action="{{ url('generate_report') }}">
						        {{ csrf_field() }}

						        
								<input type="hidden" class="form-control" name="loan_status" value="{{ $loan_status }}">


						        <input type="hidden" class="form-control" name="branch" value="{{ $branch }}">
						     	

						     	<input type="hidden" class="form-control" name="date_from" value="{{ $date_from }}">
						     	<input type="hidden" class="form-control" name="date_to" value="{{ $date_to }}">

						     	<label>Orientation</label>
								<select class="form-control" name="orientation" id="orientation">
									<option value="portrait">Portrait</option>
									<option value="landscape">Landscape</option>
								</select>
								<br />
						        <button type="submit" class="btn btn-primary btn-block">Generate</button>
						        <!--button type="reset" class="btn btn-default">Reset</button-->
								</form>
							
							@endif

						@else

						<div class="alert alert-info">
						    <p><strong>Info:</strong> Please generate a report using the left side pane</p>
						</div>

						@endif


					</div>	

				</div><!--/.row-->


    
            </div>
        
        </div>

    </div>

</div>

@endsection