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
                <strong>Look Up</strong>
            </h4>

            <div class="card-block">
                <form method="POST" id="search-form" class="form-horizontal" role="form">

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="Full Name">Full Name</label>
                            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name">
                        </div>

                        <div class="col-md-2">
                            <label for="Pawn Ticket Number">Pawn Ticket Number</label>
                            <input type="text" class="form-control" name="pawn_ticket_number" id="pawn_ticket_number" placeholder="Pawn Ticket Number">
                        </div>

                        <div class="col-md-2">
                            <label for="Reference Pawn Ticket Number">Ref Pawn Ticket Number</label>
                            <input type="text" class="form-control" name="ref_pawn_ticket_number" id="ref_pawn_ticket_number" placeholder="Ref Pawn Ticket Number">
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
                            <button type="submit" class="btn btn-primary pull-right">Search</button>
                        </div>
                    </div></form>
            </div>
        </div>


        <div class="card">
            <h4 class="card-header">
                <strong>Pawn Transaction</strong>
                <!--a href="{{ url('/renewpawntransaction/create') }}" id="btn-create-customer-and-pawn-transaction" class="btn btn-sm btn-outline-primary pull-right">Create Renew Pawn Transaction</a-->
            </h4>

            <div class="card-block">

                <table id="pawn-transaction-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>OR Number</th>
                            <th>Full Name</th>
                            <th>Type</th>
                            <th>Pawn Ticket Number</th>
                            <th>Ref Pawn Ticket Number</th>
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