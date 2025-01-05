@extends('layouts.app')           

@section('content')

                @include('layouts.inc.search')

                <div id="loading" style="display: none;"></div>

                <div id="no-record-found" style="display: none;">
                    <a href="/pawnshopsystem/public/index.php/create_customer_pawn" id="btn-create-customer-and-pawn-transaction" class="btn btn-primary">Create Customer and Pawn Transaction</a>
                </div>

                <div id="record-found" style="display: none;"></div>

                <!--div class="pagination" style="display: none;"></div-->

                <ul id="pagination" class="pagination-sm" style="display: none;"></ul>

@endsection