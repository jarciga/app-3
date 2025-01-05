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
                <strong>New Pawn Transaction</strong>
                <a href="{{ url('/newpawntransaction/create') }}" id="btn-create-customer-and-pawn-transaction" class="btn btn-sm btn-outline-primary pull-right">Add New</a>
            </h4>

            <div class="card-block">

                <table id="new-pawn-transaction-table" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
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

</form>
</div>



@endsection