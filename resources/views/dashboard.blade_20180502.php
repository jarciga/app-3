@extends('layouts.app')           

@section('content')

<div class="row">

	<div class="col-md-12">

		<div class="card">
			<h4 class="card-header">
				<strong>Dashboard</strong>
			</h4>

			<div class="card-block">
				<div class="row">
					<div class="col-lg-4">
						<div class="card">
						  <div class="card-header">
						   <h4>New Sangla Transaction</h4>
						  </div>
						  <ul class="list-group list-group-flush">
						    <li class="list-group-item"><a href="{{ url('/newpawntransaction') }}" class="">All New Sangla Transaction</a></li>
						    <li class="list-group-item"><a href="{{ url('/newpawntransaction/create') }}" class="">Create New Sangla Transaction</a></li>
						    <li class="list-group-item d-none"><a href="" class="">New Sangla Transaction Report</a></li>
						  </ul>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card">
						  <div class="card-header">
						  <h4>Renew Sangla Transaction</h4>
						  </div>
						  <ul class="list-group list-group-flush">
						    <li class="list-group-item"><a href="{{ url('/renewpawntransaction') }}" class="">All Renew Sangla Transaction</a></li>
						    <li class="list-group-item"><a href="{{ url('/renewpawntransaction/create') }}" class="">Create Renew Sangla Transaction</a></li>
						    <li class="list-group-item d-none"><a href="" class="">Renew Sangla Transaction Report</a></li>
						  </ul>
						</div>	
					</div>
					<div class="col-lg-4">
						<div class="card">
						  <div class="card-header">
						  <h4>Redeem Sangla Transaction</h4>
						  </div>
						  <ul class="list-group list-group-flush">
						    <li class="list-group-item"><a href="{{ url('/redeempawntransaction') }}" class="">All Redeem Sangla Transaction</a></li>
						    <li class="list-group-item"><a href="{{ url('/redeempawntransaction/create') }}" class="">Create Redeem Sangla Transaction</a></li>
						    <li class="list-group-item d-none"><a href="" class="">Redeem Sangla Transaction Report</a></li>
						  </ul>
						</div>
					</div>				
				</div>
			</div>
		</div>

	</div>

</div>


<div class="row">

		<div class="col-md-6">

			<div class="card">
				<h4 class="card-header">
					<strong>Report</strong>
				</h4>

				<div class="card-block">
					<a href="{{ url('/pawntransaction/report') }}" id="btn-create-customer-and-pawn-transaction" class="btn btn-primary"><strong>Pawn Transaction Report</strong></a>
				</div>
			</div>		

		</div>


		<div class="col-md-6">

			<div class="card">
				<h4 class="card-header">
					<strong>Look Up</strong>
				</h4>

				<div class="card-block">
					<a href="{{ url('/pawntransaction/all') }}" id="btn-create-customer-and-pawn-transaction" class="btn btn-primary"><strong>Pawn Transaction Look Up</strong></a>
				</div>
			</div>		

		</div>

</div>








@endsection