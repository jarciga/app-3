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
                <strong>Reporting</strong>
                <a href="/pawnshopsystem/public/index.php/create_customer_pawn" id="btn-create-customer-and-pawn-transaction" class="btn btn-sm btn-outline-primary pull-right invisible">Add New Customer &amp; Pawn Transaction</a>
            </h4>

            <div class="card-block">


                <?php //echo $_GET["status"]; ?>
                <div class="row">

                    <div class="col-md-6">
						<form method="post" action="/pawnshopsystem/public/index.php/reporting" class="form-horizontal">
						        {{ csrf_field() }}

						<?php 
						//$id_type = isset($date_range_reporting_from) ? $branch : old('date_range_reporting_from');
						?>

						<div class="form-group col-sm-12">


						    <label for="branchreporting">Branch</label>
						    <div class="input-group">
						        <select name="branch_reporting" class="form-control" id="branch_reporting">
										<option value="all">All Branch</option>
						            <optgroup label="Santolan Pawnshop Inc.">
						                <option value="01">Head Office</option>
						                
						                <option value="06">Angono Branch 1</option>

						                <option value="07">Taytay Branch 2</option>

						                <option value="08">Binangonan Branch 1</option>

						                 <option value="09">Angono Branch 2</option>

						                <option value="10">Concepcion Branch</option> 

						                <option value="13">Ampid Branch</option>

						                <option value="14">Antipolo Branch 2</option>

						                <option value="15">Taytay Branch 3</option>

						                <option value="16">Montalban Branch</option>

						                <option value="19">Binangonan Branch 2</option>

						                <option value="23">Antipolo Branch 4</option>

						                <option value="24">Parang Branch</option>

						                <option value="25">Tanay Branch 1</option>

						                <option value="26">Pasig Branch</option>

						                <option value="27">Tanay Branch 2</option>
						            </optgroup>

						            <optgroup label="Mama's Pawnshop">
						                <option value="AA">Taytay Branch</option>
						                
						                <option value="AB">Marikina Branch</option>

						                <option value="AC">Dapitan Branch</option>

						                <option value="AD">Antipolo Branch</option>
						            </optgroup>
						        </select>
						    </div>

						    <label for="daterangereporting">Date From:</label>
						    <div class="input-group">                                                        
						        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						        <input type="text" name="date_range_reporting_from" value="{{ old('date_range_reporting_from') }}" class="form-control" id="date-range-reporting-from" placeholder="Date range reporting from">
						    </div>

						    <label for="daterangereporting">Date To:</label>
						    <div class="input-group">                                                        
						        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						        <input type="text" name="date_range_reporting_to" value="{{ old('date_range_reporting_to') }}" class="form-control" id="date-range-reporting-to" placeholder="Date range reporting to">
						    </div>

						</div>
						        
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
						<!--button type="reset" class="btn btn-default">Reset</button-->
						</form>

                    </div>

					<div class="col-md-6">
						@if ( !empty($data) && sizeof($data) > 0 )

						<div class="alert alert-success">
						    {{-- $data --}}
						    <p><strong>Success:</strong> Total Record Found: {{ $data_count }}</p>
						</div>


						<?php 
							$branch = isset($branch) ? $branch : '';  
						 	$date_from = isset($date_from) ? $date_from : '';
						 	$date_to = isset($date_to) ? $date_to : '';  
							?>


							@if ( ( isset($date_from) && isset($date_from) != '' )  && 
								  ( isset($date_to) && isset($date_to) != '' ) )

							<form method="post" action="/pawnshopsystem/public/index.php/generate_report">
						        {{ csrf_field() }}

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