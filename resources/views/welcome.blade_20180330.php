@extends('layouts.app')           

@section('content')

<div class="row">

	<div class="col-md-12">

		<div class="card">
			<h4 class="card-header">
				<strong>Look Up</strong>
			</h4>

			<div class="card-block">
				<form method="POST" id="search-form" class="form-horizontal" role="form">

					<div class="form-group row">
					    <div class="col-md-2">
					        <label for="First Name">First Name</label>
					        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
					    </div>

					    <div class="col-md-2">
					        <label for="Last Name">Last Name</label>
					        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
					    </div>

					    <div class="col-md-2">
					        <label for="Pawn Ticket Number">Pawn Ticket Number</label>
					        <input type="text" class="form-control" name="pawn_ticket_number" id="pawn_ticket_number" placeholder="Pawn Ticket Number">
					    </div>

					    <div class="col-md-2">
					        <label for="Redeem Number">Redeem Number</label>
					        <input type="text" class="form-control" name="old_pawn_ticket_number" id="old_pawn_ticket_number" placeholder="Redeem Number">
					    </div>

					    <div class="col-md-2">
					        <label for="Contact Number">Contact Number</label>
					        <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number">
					    </div>

					    <div class="col-md-2">
					        <label for="Identification Card">Identification Card</label>
					        <input type="text" class="form-control" name="identification_card" id="identification_card" placeholder="Identification Card">
					    </div>
				    </div>

				    <div class="form-group row">
					    <div class="col-md-12">
					        <button type="submit" class="btn btn-outline-secondary pull-right">Search</button>
					    </div>
				    </div></form>
			</div>
		</div>

		<div class="card">
			<h4 class="card-header">
					<strong>Pawn Transaction</strong>
					<a href="/pawnshopsystem/public/index.php/create_customer_pawn" id="btn-create-customer-and-pawn-transaction" class="btn btn-sm btn-outline-primary pull-right">Add New Customer &amp; Pawn Transaction</a>
			</h4>

			<div class="card-block">
		        
				
		        <!--table id="users-table" class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed"-->
		        	<table id="users-table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
		            <thead>
		                <tr>
		                    <th>First Name</th>
		                    <th>Last Name</th>
		                    <th>Pawn Ticket Number</th>
		                    <th>Redeem Number</th>
		                    <th>Contact Number</th>
		                    <th>Identification Card</th>                    
		                    <th>Action</th>
		                </tr>
		            </thead>
		        </table>

		        <!--div id="record-found"></div>
		        <ul id="pagination" class="pagination-sm"></ul-->
			</div>
	    </div>

	</div>

</div>


@endsection