<!--
 * GenesisUI - Bootstrap 4 Admin Template
 * @version v1.8.4
 * @link https://genesisui.com
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license Commercial
 -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Santolan Pawnshop System">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <title>Santolan Pawnshop System</title>

    <!-- Icons -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Premium Icons -->
    <link href="{{ asset('css/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glyphicons-filetypes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glyphicons-social.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <link href="{{ asset('css/libs/flatpickr.min.css') }}" rel="stylesheet">

</head>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'					- Fixed Header

// Sidebar options
1. '.sidebar-fixed'					- Fixed Sidebar
2. '.sidebar-hidden'				- Hidden Sidebar
3. '.sidebar-off-canvas'		- Off Canvas Sidebar
4. '.sidebar-compact'				- Compact Sidebar Navigation (Only icons)

// Aside options
1. '.aside-menu-fixed'			- Fixed Aside Menu
2. '.aside-menu-hidden'			- Hidden Aside Menu
3. '.aside-menu-off-canvas'	- Off Canvas Aside Menu

// Footer options
1. 'footer-fixed'						- Fixed footer

-->

<body class="app header-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
        <a class="navbar-brand" href="#" style="font-size: 18px; font-weight: bold; text-align: center; color: #dddddd; line-height: 1.0em; background-color:#000000; cursor: default;">Santolan Pawnshop<br />System</a>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item">
                <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
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
                        <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-info">NEW</span></a>
                    </li>

                    <li class="divider"></li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Sangla</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="components-buttons.html"><i class="icon-puzzle"></i> All Sangla</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="components-social-buttons.html"><i class="icon-puzzle"></i> Add New</a>
                            </li>                          
                        </ul>
                    </li>

                    <li class="divider"></li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Renewal</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="components-buttons.html"><i class="icon-puzzle"></i> All Renewal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="components-social-buttons.html"><i class="icon-puzzle"></i> Add New</a>
                            </li>                          
                        </ul>
                    </li>

                    <li class="divider"></li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Redeem</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="components-buttons.html"><i class="icon-puzzle"></i>All Redeem</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="components-social-buttons.html"><i class="icon-puzzle"></i> Add New</a>
                            </li>
                        </ul>
                    </li>


                    <li class="divider"></li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> Reports </a>
                    </li>
                    
                    <li class="nav-item nav-dropdown" style="display: none;">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Report</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="components-buttons.html"><i class="icon-puzzle"></i>All Report</a>
                            </li>
                        </ul>
                    </li>                                           

                </ul>
            </nav>
        </div>

        <!-- Main content -->
        <main class="main">


            <div class="container-fluid">

                @include('layouts.inc.search')


                <div id="no-record-found" style="display: none;">
                    <!--button id="btn-create-customer-and-pawn-transaction" class="btn btn-primary" type="button">Create Customer and Pawn Transaction</button-->

                    <a href="" id="btn-create-customer-and-pawn-transaction" class="btn btn-primary">Create Customer and Pawn Transaction</a>
                </div>

                <div id="record-found" style="display: none;"></div>

                <div class="pagination" style="display: none;"></div>

                <ul id="pagination" class="pagination-sm" style="display: none;"></ul>

                <!--a class="btn-preview-pawn btn btn-success" href="http://127.0.0.1:8000/preview_pawn" data-toggle="modal" data-target="#myModal"><i class="fa fa-file-o"></i></a-->

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



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
 
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Profile</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            </div>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>








    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('js/libs/popper.min.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/libs/pace.min.js') }}"></script>



    <!-- GenesisUI main scripts -->
    <script src="{{ asset('js/libs/bootstrap.js') }}"></script>
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
        $('.datepicker, input[name="date_loan_granted"], input[name="maturity_date"], input[name="expiry_date_of_redemption_period"]').daterangepicker({
            dateFormat: 'yy/m/d',
            singleDatePicker: true,
            showDropdowns: true
        }, 
        function(start, end, label) {
            var years = moment().diff(start, 'years');
            //alert("You are " + years + " years old.");
        });


        /*$('.btnNext').click(function(){
            $('.nav-tabs > .active').next('li').find('a').trigger('click');
        });

        $('.btnPrevious').click(function(){
            $('.nav-tabs > .active').prev('li').find('a').trigger('click');
        });*/


        $('.btnNext, .btnSave').click(function(){
             $('.nav-tabs a:last').removeClass('disabled');
            $('.nav-tabs a:first').addClass('disabled');           
            $('.nav-tabs a:last').tab('show');

        });

        $('.btnPrevious').click(function(){
            $('.nav-tabs a:first').removeClass('disabled');
            $('.nav-tabs a:last').addClass('disabled');
            $('.nav-tabs a:first').tab('show');
            
        });


    });
    </script>

    <script type="text/javascript">

    $(function() {



        $("#btn-search").click(function(e){



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();
            var token = $('input[name=_token]').val();
            //var dataString = $(this).serialize();
            var verification = $("input[name=verification]").val();

            $.ajax({
              method: "POST",
              url: "/dashboard",
              dataType: "json",
              data: {_token: token, verification: verification } //data:$("#form").serialize(),
            })
            .done(function(data) {

                if(data.success === 'success') {

                    var output = '';
                    //check length
                    //console.log(data.data[0]);
                    //console.log(data.data[1]);

                    console.log(data.data);
                    //console.log(data.data.data);

                    //console.log(data.success);

                    /*$.each(data.data, function(k, v) {
                        console.log(v.customer_number);
                    });*/


                    $('#verification').css('border', '');
                    $('#record-found').html('');
                    $('#no-record-found').hide();

                    var output = '';

                    output = '<table id="record-found" class="table table-bordered table-striped table-condensed">';
                    output += '<thead>'; 
                    output += '    <tr>';
                    output += '        <th>ID</th>';
                    output += '        <th>Customer Number</th>';
                    output += '        <th>Name</th>';
                    output += '        <th>Status</th>';
                    output += '        <th>Actions</th>';
                    output += '    </tr>';
                    output += '</thead>';
                    output += '<tbody>';

                    $.each(data.data.data, function(k, v) {
                    output += '    <tr>';
                    output += '        <td>' + v.id + '</td>';
                    output += '        <td>' + v.customer_number + '</td>';
                    output += '        <td>' + v.first_name + ' ' + v.last_name + '</td>';
                    output += '        <td>';
                    output += '            <span class="badge badge-success">Active</span>';
                    output += '        </td>';
                    output += '        <td>';
                    //output += '<a class="btn btn-success" href="http://127.0.0.1:8000/preview_pawn?customer_id=' + v.id + '"><i class="fa fa-file-o"></i></a> ';
                    output += '<a class="btn-preview-pawn btn btn-success" href="http://127.0.0.1:8000/dashboard" data-toggle="modal" data-target="#myModal"><i class="fa fa-file-o"></i></a> ';

                    //output += '<button type="button" class="btn-preview-pawn btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-file-o"></i></button>';

                    output += '<a class="btn-edit-pawn btn btn-info" href="http://127.0.0.1:8000/edit_pawn?customer_id=' + v.id + '"><i class="fa fa-edit"></i></a> ';
                    output += '<a class="btn btn-danger" href="http://127.0.0.1:8000/dashboard?page=' + v.id + '"><i class="fa fa-trash-o"></i></a> ';
                    output += '</td>';
                    output += '    </tr>';

                        /*$(document).on('click','.btn-preview-pawn', function(e)
                        {
                            e.preventDefault();
                            console.log('preview-pawn');

                           $('#myModal .modal-title').html('Transaction 1'); 
                           $('#myModal .modal-body').html(v.customer_number+ '<br />' + v.first_name + ' ' + v.last_name); 
                           $('#myModal').modal('show');


                        });*/

                        $('#myModal .modal-title').html('Transaction 2'); 
                        //$('#myModal .modal-body').html(v.customer_number+ '<br />' + v.first_name + ' ' + v.last_name); 

                        $('#myModal #home').html(v.customer_number+ '<br />' + v.first_name + ' ' + v.last_name); 
                        $('#myModal #profile').html(v.customer_number); 


                    });

                    output += '</tbody>';

                    output += '</table>';


                    console.log(data.data.total);

                    //output += '<a href="' + data.data.next_page_url + '&verification=' + verification + '" id="next">next page</a>';

                    $('#error-verification').html(output);

                    if(parseInt(data.data.total) != 1)
                    {
                        //paginate(data.data, verification);

                        var page = 1;
                        var current_page = 1;
                        var total_page = 0;
                        var is_ajax_fire = 0;

                        //total_page = data.data.last_page;
                        total_page = data.data.total;
                        current_page = data.data.current_page;

                        $('#pagination').show();
                        $('#pagination').twbsPagination({
                            totalPages: total_page,
                            visiblePages: current_page,
                            onPageClick: function (event, pageL) {
                                page = pageL;
                                //$('#page-content').text('Page ' + page);
                                console.log(data.data.data);
                                console.log(pageL);
                                console.log('current page ' + current_page);

                                $.ajax({
                                  method: "GET",
                                  url: "/dashboard?page=" + parseInt(pageL),
                                  dataType: "json",
                                  //data: {_token: token, verification: verification } //data:$("#form").serialize(),
                                  data: {_token: token, verification: verification } //data:$("#form").serialize(),
                                })
                                .done(function(data) {

                                    console.log('Data:', data.data);

                                    var output = '';

                                    output = '<table id="record-found" class="table table-bordered table-striped table-condensed">';
                                    output += '<thead>'; 
                                    output += '    <tr>';
                                    output += '        <th>ID</th>';
                                    output += '        <th>Customer Number</th>';
                                    output += '        <th>Name</th>';
                                    output += '        <th>Status</th>';
                                    output += '        <th>Actions</th>';
                                    output += '    </tr>';
                                    output += '</thead>';
                                    output += '<tbody>';

                                    $.each(data.data.data, function(k, v) {
                                    output += '    <tr>';
                                    output += '        <td>' + v.id + '</td>';
                                    output += '        <td>' + v.customer_number + '</td>';
                                    output += '        <td>' + v.first_name + ' ' + v.last_name + '</td>';
                                    output += '        <td>';
                                    output += '            <span class="badge badge-success">Active</span>';
                                    output += '        </td>';
                                    output += '        <td>';
                                    //output += '<a class="btn btn-success" href="http://127.0.0.1:8000/preview_pawn?customer_id=' + v.id + '"><i class="fa fa-file-o"></i></a> ';
                                    output += '<a class="btn-preview-pawn btn btn-success" href="http://127.0.0.1:8000/dashboard"  data-toggle="modal" data-target="#myModal"><i class="fa fa-file-o"></i></a> ';

                                    //output += '<button type="button" class="btn-preview-pawn btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-file-o"></i></button>';


                                    output += '<a class="btn btn-info" href="http://127.0.0.1:8000/edit_pawn?customer_id=' + v.id + '"><i class="fa fa-edit"></i></a> ';
                                    output += '<a class="btn btn-danger" href="http://127.0.0.1:8000/dashboard?page=' + v.id + '"><i class="fa fa-trash-o"></i></a> ';
                                    output += '</td>';
                                    output += '    </tr>';
                                        
                                        //$(document).on('click','.btn-preview-pawn', function(e)
                                        //{
                                            //e.preventDefault();
                                            //console.log('preview-pawn');

                                            $('#myModal .modal-title').html('Transaction 2'); 
                                            //$('#myModal .modal-body').html(v.customer_number+ '<br />' + v.first_name + ' ' + v.last_name); 

                                                $('#myModal #home').html(v.customer_number+ '<br />' + v.first_name + ' ' + v.last_name); 
                                                $('#myModal #profile').html(v.customer_number); 

                                             //$('#myModal').find('.modal-body').html(v.customer_number+ '<br />' + v.first_name + ' ' + v.last_name);
                                           //$('#myModal').modal('show');


                                        //});

                                    });

                                    output += '</tbody>';

                                    output += '</table>';


                                    $('#error-verification').html(output);


                                });


                            }
                        });

                    } else {

                        $('#pagination').hide();    

                    }


                } else {

                    if(typeof data.error.verification === 'undefined' || data.error.verification === null){ 

                        //No Record found
                        console.log(data.error); 
                        console.log(Object.keys(data).length);
                        $('#verification').css('border', '#FF0000 solid 1px');
                        $('#error-verification').html('').prepend( '<span id="error-verification" style="color:red;">' + data.error + '</span>' );

                        $('#no-record-found').show();
                        $('#pagination').hide();

                    } else {

                       //console.log(data.error.verification[0]); 

                       $('#myModal .modal-title').html('Verification Error'); 
                       $('#myModal .modal-body').html(data.error.verification[0]); 
                       $('#myModal').modal('show');


                       $('#verification').css('border', '#FF0000 solid 1px');
                       $('#error-verification').html('').prepend( '<span id="error-verification" style="color:red;">' + data.error.verification[0] + '</span>' );

                       $('#no-record-found').hide();
                       //$('#pagination').hide();

                    }

                }

            });

        });

    });
    </script>

</body>

</html>
