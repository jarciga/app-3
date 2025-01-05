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

    <title>Santolan Pawnshop System</title>

    <!--title>{{-- config('app.name', 'Santolan Pawnshop System') --}}</title-->

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

<body class="app header-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>

        <!-- Branding Image -->
        <!--a class="navbar-brand" href="{{-- url('/') --}}">
            {{-- config('app.name', 'Laravel') --}}
        </a-->

        <a class="navbar-brand" href="#" style="font-size: 18px; font-weight: normal; text-align: center; color: #ffffff; line-height: 1.0em; background-color:#20a8d8; cursor: default;">Santolan Pawnshop<br />System</a>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item">
                <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
            </li>

        </ul>

        <ul class="nav navbar-nav ml-auto" style="padding-right:20px;">


            <li class="nav-item dropdown d-md-down-none">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-emotsmile icons font-2xl d-block mt-0"></i>
                </a>

            <li class="nav-item dropdown d-md-down-none">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <!--img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com"-->
                    @guest
                        <span class="d-md-down-none">Guest</span>
                    @else
                        <span class="d-md-down-none">{{ Auth::user()->name }}</span>
                    @endguest
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <!--div class="dropdown-header text-center">
                        <strong>Account</strong>
                    </div-->


                    <!-- Authentication Links -->
                    @guest
                        <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                    @else
                        <!--a class="dropdown-item" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{-- Auth::user()->name --}} <span class="caret"></span>
                        </a-->

                        <!--div class="dropdown-header text-center">
                            <strong>Settings</strong>
                        </div-->


                        <a class="dropdown-item" class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> 
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    @endguest




                </div>
            </li>

        </ul>

    </header>

    <div class="app-body">
        <div class="sidebar">

            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">
                        Dashboard
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pawnshopsystem/public/index.php/"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-info invisible">NEW</span></a>
                    </li>

                   <li class="nav-title">
                        Type of Transaction
                    </li>
                    <li class="nav-item nav-dropdown open">
                        <!--a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-note"></i> Type of Transaction</a-->
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="forms-basic-forms.html"><i class="icon-note"></i> New Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="forms-advanced-forms.html"><i class="icon-note"></i>Renew Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="forms-validation.html"><i class="icon-note"></i> Redeem Transaction</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-title">
                        Reporting
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/pawnshopsystem/public/index.php/reporting"><i class="icon-puzzle"></i> Reporting</a>
                    </li>

                </ul>
            </nav>
        </div>

        <!-- Main content -->
        <main class="main">


            <div class="container-fluid">

                @yield('content')

            </div>  
            <!-- /.conainer-fluid -->
        </main>

    </div>

    <footer class="app-footer">
        <a href="https://genesisui.com">Santolan Pawnshop System</a> © 2017.
        <span class="float-right">
            Powered by <a href="https://genesisui.com">Jay-ar A. Arciga Jr.</a>
        </span>
    </footer>



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


@if(Route::current()->getName() != 'create_customer_pawn')
<script>

    $(function () {


        //Activate a textbox on selecting other option from dropdown list only else it remains inactive.
        //identification-card-type, identification-card

        if ($("#identification-card-type").find("option:selected").val() != "") {
            $("#identification-card").removeAttr("disabled")
        }

        $("#identification-card-type").change(function () {
            console.log($(this).find("option:selected").val());
            if ($(this).find("option:selected").val() != "") {
                $("#identification-card").removeAttr("disabled");
            } else {
                $("#identification-card").attr("disabled","disabled");
            }
        });


        //loan-status, pawn_ticket_no, tracking-no
       /* if ($("#loan-status").find("option:selected").val() != "" && 
            $("#loan-status").find("option:selected").val() != "") {

            $("#pawn_ticket_no").removeAttr("disabled")

        }

        $("#loan-status").change(function () {
            console.log($(this).find("option:selected").val());
            if ($(this).find("option:selected").val() == "New Sangla") {
                $("#pawn_ticket_no").removeAttr("disabled");
            } else if ($(this).find("option:selected").val() == "Renew Sangla") {
                $("#pawn_ticket_no").removeAttr("disabled");
            } else if ($(this).find("option:selected").val() == "Redeem Sangla") {
                $("#pawn_ticket_no").removeAttr("disabled");            
            } else {
                $("#identification-card").attr("disabled","disabled");
            }
        });*/

    });

</script>
@endif




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
                    url: '/pawnshopsystem/public/index.php/eloquent/object-data',
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
              url: "/pawnshopsystem/public/index.php/details",
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



                modalFooterOutput += '<a href="/pawnshopsystem/public/index.php/edit_customer_pawn?customer_id=' + data.data.customer_id + '&mortgage_id=' + data.data.mortgage_id + '&pawn_id=' + data.data.id + '" class="btn btn-primary">Edit this customer and pawn transaction</a>';
                modalFooterOutput += '        <a href="/pawnshopsystem/public/index.php/create_pawn_customer/customer/' + data.data.customer_id + '" class="btn btn-primary">Add pawn transaction to this customer</a>';


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
