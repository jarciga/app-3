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
                <strong>Redeem Pawn Transaction</strong>
                <a href="{{ url('/redeempawntransaction/create') }}" id="btn-create-customer-and-pawn-transaction" class="btn btn-sm btn-outline-primary pull-right">Create Redeem Pawn Transaction</a>
            </h4>

            <div class="card-block">

                <table id="redeem-pawn-transaction-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>OR Number</th>
                            <th>Full Name</th>
                            <th>Pawn Ticket Number</th>
                            <th>Contact Number</th>
                            <th>Created Date</th>                    
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>

            </div>
        
        </div>

    </div>


</div>



@endsection