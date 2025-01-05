<!--
 * GenesisUI - Bootstrap 4 Admin Template
 * @version v1.8.4
 * @link https://genesisui.com
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license Commercial
 -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Santolan Pawnshop System">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,jQuery,CSS,HTML,RWD,Dashboard">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <!--title>Santolan Pawnshop System</title-->

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Icons -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Premium Icons -->
    <link href="{{ asset('css/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glyphicons-filetypes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glyphicons-social.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    


    <link href="{{ asset('css/libs/flatpickr.min.css') }}" rel="stylesheet">

    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/responsive/2.2.0/css/responsive.bootstrap4.min.css" rel="stylesheet">

</head>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'                  - Fixed Header

// Sidebar options
1. '.sidebar-fixed'                 - Fixed Sidebar
2. '.sidebar-hidden'                - Hidden Sidebar
3. '.sidebar-off-canvas'        - Off Canvas Sidebar
4. '.sidebar-compact'               - Compact Sidebar Navigation (Only icons)

// Aside options
1. '.aside-menu-fixed'          - Fixed Aside Menu
2. '.aside-menu-hidden'         - Hidden Aside Menu
3. '.aside-menu-off-canvas' - Off Canvas Aside Menu

// Footer options
1. 'footer-fixed'                       - Fixed footer

-->

<body class="app flex-row align-items-center">

    <div class="app-body">

        <!-- Main content -->
        <main class="main">

            <div class="container-fluid">

                @yield('content')

            </div>  
            <!-- /.conainer-fluid -->
        </main>

    </div>
    
    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('js/libs/popper.min.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/libs/pace.min.js') }}"></script>



    <!-- GenesisUI main scripts -->
    <script src="{{ asset('js/libs/bootstrap.js') }}"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    <!-- Plugins and scripts required by this views -->
    <script src="{{ asset('js/libs/toastr.min.js') }}"></script>
    <script src="{{ asset('js/libs/gauge.min.js') }}"></script>
     <script src="{{ asset('js/libs/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('js/libs/moment.min.js') }}"></script>
    <script src="{{ asset('js/libs/select2.min.js') }}"></script>
    <script src="{{ asset('js/libs/daterangepicker.js') }}"></script>
    <!--script src="{{ asset('js/libs/flatpickr.min.js') }}"></script-->  

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
    <!-- Custom scripts required by this view -->
    <!--script src="js/libs/main.js"></script-->


    <!-- Plugins and scripts required by this views -->
    <script src="{{ asset('js/libs/jquery.validate.js') }}"></script>


    <!-- Custom scripts required by this view -->
    <script src="{{ asset('js/views/validation.js') }}"></script>



    <script type="text/javascript">
    $(function() {
        $('.datepicker, input[name="date_loan_granted"], input[name="maturity_date"], input[name="expiry_date_of_redemption_period"], input[name="date_range_reporting_from"], input[name="date_range_reporting_to"]').daterangepicker({
            showDropdowns: true,
            dateFormat: 'yy/m/d',
            singleDatePicker: true,
            showDropdowns: true
        }, 
        function(start, end, label) {
            var years = moment().diff(start, 'years');

        });


        $('.btnNext, .btnSave').click(function(){
             //$('.nav-tabs a:last').removeClass('disabled');
            //$('.nav-tabs a:first').addClass('disabled');           
            $('.nav-tabs a:last').tab('show');

        });

        $('.btnBack').click(function(){
            //$('.nav-tabs a:first').removeClass('disabled');
            //$('.nav-tabs a:last').addClass('disabled');
            $('.nav-tabs a:first').tab('show');
            
        });

    });
    </script>

<!-- Scripts -->
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.0/js/responsive.bootstrap4.min.js"></script>

<script>

    $(function () {



        var oTable = $('#users-table').DataTable({
            //dom: "<'row'<'col-md-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
            //    "<'row'<'col-md-12't>>"+
            //    "<'row'<'col-md-12'<'col-xs-6'i><'col-xs-6'p>>>",

                serverSide: true,
                processing: true,
                searching: false,
                pageLength: 50,
                //ajax: '/eloquent/object-data',
                ajax: {
                    url: '/eloquent/object-data',
                    data: function (d) {
                        d.last_name = $('input[name=last_name]').val();
                        d.first_name = $('input[name=first_name]').val();
                        d.pawn_ticket_number = $('input[name=pawn_ticket_number]').val();
                        d.old_pawn_ticket_number = $('input[name=old_pawn_ticket_number]').val();
                        d.contact_number = $('input[name=contact_number]').val();
                        d.identification_card = $('input[name=identification_card]').val();
                    }
                },
                columns: [
                {data: 'first_name'},
                {data: 'last_name'},
                {data: 'pawn_ticket_number'},
                {data: 'old_pawn_ticket_number'},
                {data: 'contact_number'},
                {data: 'identification_card'},
                {data: 'action', orderable: false, searchable: false}
                ]
            });

            $('#search-form').on('submit', function(e) {
                oTable.draw();
                e.preventDefault();
            });


        // Add event listener for opening and closing details
        $('#users-table tbody').on('click', 'td button.btn-preview-pawn', function () {
            //ajax here


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var token = $('input[name=_token]').val();

            //$('#exampleModal').modal();
            
            /*console.log($(this).attr('data-customer_id'));
            console.log($(this).attr('data-mortgage_id'));
            console.log($(this).attr('data-pawn_id'));*/
            
            var customer_id = $(this).attr('data-customer_id'), 
            mortgage_id = $(this).attr('data-mortgage_id'),
            pawn_id = $(this).attr('data-pawn_id');

            $.ajax({
              method: "GET",
              url: "/details",
              dataType: "json",
              //data: {_token: token, verification: verification } //data:$("#form").serialize(),
              //data: {_token: token, pawn_ticket_no: pawn_ticket_no, redeem_no: redeem_no, last_name: last_name, first_name: first_name, middle_name_or_initial: middle_name_or_initial, contact_number: contact_number, valid_id: valid_id } //data:$("#form").serialize(),
              data: {_token: token, customer_id: customer_id, mortgage_id: mortgage_id, pawn_id: pawn_id } 

            })
            .done(function(data) {

                //var obj = jQuery.parseJSON(data.data);
                //console.log(data.data.customer_number);


                $('#exampleModal').on('hidden.bs.modal', function() { 
                    // reset multi-tab modal to initial state 
                    $(this).find('.nav-tabs a:first').tab('show');
  
                });

                var modalBodyOutput = '', modalHeaderOutput = '', modalFooterOutput = '';

                /*output += '<h5>Customer Details</h5>';
                output += '<p>First name: ' + data.data.first_name + '</p>';
                output += 'Last name: ' + data.data.last_name + '</p>';
                output += 'Middle name or Initial: ' + data.data.middle_name + '</p>';
                output += 'Rm./Flr./Unit No.: ' + data.data.address_line_1 + '</p>';
                output += 'Bldg. Name.: ' + data.data.address_line_2 + '</p>';
                output += 'House/Lot & Blk. No.: ' + data.data.address_line_3 + '</p>';
                output += 'Street Name: ' + data.data.street + '</p>';
                output += 'Subdivision: ' + data.data.subdivision + '</p>';
                output += 'Barangay/District/Locality: ' + data.data.barangay + '</p>';
                output += 'City/Municipality: ' + data.data.city + '</p>';
                output += 'Province: ' + data.data.province + '</p>';
                output += 'Country: ' + data.data.country + '</p>';*/


                modalBodyOutput += '<ul class="nav nav-tabs" id="myTab-' + data.data.customer_id + data.data.mortgage_id + data.data.id + '" role="tablist">';
                modalBodyOutput += '  <li class="nav-item">';
                modalBodyOutput += '    <a class="nav-link active" id="customer-tab-' + data.data.customer_id + data.data.mortgage_id + data.data.id + '" data-toggle="tab" href="#customer-' + data.data.customer_id + data.data.mortgage_id + data.data.id + '" role="tab" aria-controls="customer-' + data.data.customer_id + data.data.mortgage_id + data.data.id + '" aria-selected="true">Customer</a>';
                modalBodyOutput += '  </li>';
                modalBodyOutput += '  <li class="nav-item invisible">';
                modalBodyOutput += '    <a class="nav-link" id="pawn-transaction-tab-' + data.data.customer_id + data.data.mortgage_id + data.data.id + '" data-toggle="tab" href="#pawn-transaction-' + data.data.customer_id + data.data.mortgage_id + data.data.id + '" role="tab" aria-controls="pawn-transaction-' + data.data.customer_id + data.data.mortgage_id + data.data.id + '" aria-selected="false">Pawn Transaction</a>';
                modalBodyOutput += '  </li>';
                modalBodyOutput += '</ul>';
                modalBodyOutput += '<div class="tab-content" id="myTabContent-' + data.data.customer_id + data.data.mortgage_id + data.data.id + '">';
                modalBodyOutput += '  <div class="tab-pane fade show active" id="customer-' + data.data.customer_id + data.data.mortgage_id + data.data.id + '" role="tabpanel" aria-labelledby="customer-tab-' + data.data.customer_id + data.data.mortgage_id + data.data.id + '">';

                modalBodyOutput += '<h5>Customer Details</h5>';
                modalBodyOutput += '<p>First name: ' + data.data.first_name + '</p>';
                modalBodyOutput += 'Last name: ' + data.data.last_name + '</p>';
                modalBodyOutput += 'Middle name or Initial: ' + data.data.middle_name + '</p>';
                modalBodyOutput += 'Rm./Flr./Unit No.: ' + data.data.address_line_1 + '</p>';
                modalBodyOutput += 'Bldg. Name.: ' + data.data.address_line_2 + '</p>';
                modalBodyOutput += 'House/Lot & Blk. No.: ' + data.data.address_line_3 + '</p>';
                modalBodyOutput += 'Street Name: ' + data.data.street + '</p>';
                modalBodyOutput += 'Subdivision: ' + data.data.subdivision + '</p>';
                modalBodyOutput += 'Barangay/District/Locality: ' + data.data.barangay + '</p>';
                modalBodyOutput += 'City/Municipality: ' + data.data.city + '</p>';
                modalBodyOutput += 'Province: ' + data.data.province + '</p>';
                modalBodyOutput += 'Country: ' + data.data.country + '</p>';

                modalBodyOutput += '</div>';
                modalBodyOutput += '  <div class="tab-pane fade" id="pawn-transaction-' + data.data.customer_id + data.data.mortgage_id + data.data.id + '" role="tabpanel" aria-labelledby="pawn-transaction-tab-' + data.data.customer_id + data.data.mortgage_id + data.data.id + '">profile</div>';
                modalBodyOutput += '</div>';



                modalFooterOutput += '<a href="/edit_customer_pawn?customer_id=' + data.data.customer_id + '&mortgage_id=' + data.data.mortgage_id + '&pawn_id=' + data.data.id + '" class="btn btn-primary">Edit this customer and pawn transaction</a>';
                modalFooterOutput += '        <a href="/create_pawn_customer/customer/' + data.data.customer_id + '" class="btn btn-primary">Add pawn transaction to this customer</a>';


               // $('#exampleModal').modal();
                //$('#exampleModal .modal-body').appendTo(data);

                   //$('#exampleModal .modal-title').html('Customer Pawn Transaction'); 
                   $('#exampleModal .modal-body').html(modalBodyOutput);
                   $('#exampleModal .modal-footer').html(modalFooterOutput); 
                   $('#exampleModal').modal('show');



            });

  

        });



    });


</script>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Pawn Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">





      </div>
      <div class="modal-footer">
        <!--button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button-->
      </div>
    </div>
  </div>
</div>













</body>

</html>
