@extends('layouts.app')           

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> <h4 style="display: inline;">Customers</h4>

                            <button type="button" class="btn btn-outline-primary float-right">Add New</button>                            
                        </div>
                        <div class="card-block">

                            <div class="form-group row">
                                <div class="col-md-6 ml-sm-auto">
                                    <div class="input-group">
                                        <input type="search" id="input2-group2" name="s" class="form-control" placeholder="">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary">Search Customers</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--/.row-->  

                            <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>Customer No.</th>                                        
                                        <th>Name</th>                                        
                                        <th>Pawn Ticket No.</th>                                        
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Vishnu Serghei</td>
                                        <td>2012/01/01</td>
                                        <td>Member</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="#" style="display: none;">
                                                <i class="fa fa-search-plus " style="display: none;"></i>

                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="fa fa-edit "></i>
                                            </a>
                                            <a class="btn btn-danger" href="#" style="display: none;">
                                                <i class="fa fa-trash-o " style="display: none;"></i>
                                            </a>
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td>Zbyněk Phoibos</td>
                                        <td>2012/02/01</td>
                                        <td>Staff</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="badge badge-danger">Banned</span>
                                        </td>
                                        <td>
                                            <a class="btn btn-success" href="#" style="display: none;">
                                                <i class="fa fa-search-plus " style="display: none;"></i>

                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="fa fa-edit "></i>
                                            </a>
                                            <a class="btn btn-danger" href="#" style="display: none;">
                                                <i class="fa fa-trash-o " style="display: none;"></i>
                                            </a>
                                        </td>                                   
                                    </tr>
                                    <tr>
                                        <td>Einar Randall</td>
                                        <td>2012/02/01</td>
                                        <td>Admin</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="badge badge-default">Inactive</span>
                                        </td>                                        
                                        <td>
                                            <a class="btn btn-success" href="#" style="display: none;">
                                                <i class="fa fa-search-plus " style="display: none;"></i>

                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="fa fa-edit "></i>
                                            </a>
                                            <a class="btn btn-danger" href="#" style="display: none;">
                                                <i class="fa fa-trash-o " style="display: none;"></i>
                                            </a>
                                        </td>                                       
                                    </tr>
                                    <tr>
                                        <td>Félix Troels</td>
                                        <td>2012/03/01</td>
                                        <td>Member</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="badge badge-warning">Pending</span>
                                        </td>                                        
                                        <td>
                                            <a class="btn btn-success" href="#" style="display: none;">
                                                <i class="fa fa-search-plus " style="display: none;"></i>

                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="fa fa-edit "></i>
                                            </a>
                                            <a class="btn btn-danger" href="#" style="display: none;">
                                                <i class="fa fa-trash-o " style="display: none;"></i>
                                            </a>
                                        </td>                                     
                                    </tr>
                                    <tr>
                                        <td>Aulus Agmundr</td>
                                        <td>2012/01/21</td>
                                        <td>Staff</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="badge badge-success">Active</span>
                                        </td>                                        
                                        <td>
                                            <a class="btn btn-success" href="#" style="display: none;">
                                                <i class="fa fa-search-plus " style="display: none;"></i>

                                            </a>
                                            <a class="btn btn-info" href="#">
                                                <i class="fa fa-edit "></i>
                                            </a>
                                            <a class="btn btn-danger" href="#" style="display: none;">
                                                <i class="fa fa-trash-o " style="display: none;"></i>
                                            </a>
                                        </td>                                      
                                    </tr>
                                </tbody>
                            </table>
                            <nav>
                                <ul class="pagination float-right">
                                    <li class="page-item"><a class="page-link" href="#">Prev</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">4</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>





            <div class="row" style="margin-top:30px;">

                <div class="col-sm-12">

                    <div class="card">
                        <div class="card-header">
                            <strong>Add New Customer</strong>
                            <button type="button" class="btn btn-outline-primary float-right">Add New</button>                            
                        </div>
                        <div class="card-block">

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <small><strong>Customer No.:</strong> <?php echo 'SPC'.date('Yzn'); ?></small>
                                    </div>
                                </div>
                                <!--/.row-->

                            <form method="" action="">
                                <div class="row">

                                    <div class="form-group col-sm-3">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" id="last-name" placeholder="Last Name">
                                    </div>                           

                                    <div class="form-group col-sm-3">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="first_name" class="form-control" id="first-name" placeholder="First Name">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="middlename">Middle Name</label>
                                        <input type="text" name="middle_name" class="form-control" id="middle-name" placeholder="Middle Name">
                                    </div>

                                    <div class="form-group col-sm-3">
                                        <label for="suffix">Suffix</label>
                                        <input type="text" name="suffix" class="form-control" id="suffix" placeholder="Suffix">
                                    </div>

                                </div>
                                <!--/.row-->


                                <div class="row">                                

                                    <div class="form-group col-sm-2">
                                        <label for="rmflrunitno">Rm./Flr./Unit No.</label>
                                        <input type="text" name="rm_flr_unit_no" class="form-control" id="rm-flr-unit-no" placeholder="Rm./Flr./Unit No.">
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="bldgname">Bldg. Name</label>
                                        <input type="text" name="bldg_name" class="form-control" id="bldg-name" placeholder="Bldg. Name">
                                    </div>

                                    <div class="form-group col-sm-2">
                                        <label for="houselotandblkno">House/Lot & Blk. No.</label>
                                        <input type="text" name="house_lot_and_blk_no" class="form-control" id="house-lot-and-blk-no" placeholder="House/Lot & Blk. No.">
                                    </div>

                                    <div class="form-group col-sm-2">
                                        <label for="streetname">Street Name</label>
                                        <input type="text" name="street_name" class="form-control" id="street-name" placeholder="Street Name">
                                    </div>

                                    <div class="form-group col-sm-2">
                                        <label for="subdivision">Subdivision</label>
                                        <input type="text" name="subdivision" class="form-control" id="subdivision" placeholder="Subdivision">
                                    </div>

                                </div>
                                <!--/.row-->

                                <div class="row">

                                    <div class="form-group col-sm-4">
                                        <label for="barangaydistrictlocality">Barangay/District/Locality</label>
                                        <input type="text" name="barangay_district_locality" class="form-control" id="barangay-district-locality" placeholder="Barangay/District/Locality">
                                    </div>                           

                                    <div class="form-group col-sm-4">
                                        <label for="citymunicipality">City/Municipality</label>
                                        <input type="text" name="city_municipality" class="form-control" id="city-municipality" placeholder="City/Municipality">
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="province">Province</label>
                                        <input type="text" name="province" class="form-control" id="province" placeholder="Province">
                                    </div>

                                </div>
                                <!--/.row-->                            

                                <div class="row">

                                    <div class="form-group col-sm-6">
                                        <label for="identificationcard">Identification Card</label>
                                        <input type="text" name="identification_card" class="form-control" id="identification-card" placeholder="Identification Card">
                                    </div>                           

                                    <div class="form-group col-sm-6">
                                        <label for="contactnumber">Contact Number</label>
                                        <input type="text" name="contact_number" class="form-control" id="contact-number" placeholder="Contact Number">
                                    </div>

                                </div>
                                <!--/.row--> 

                                <div class="row">

                                    <div class="form-group col-sm-12">

                                        <div class="form-actions float-right">
                                            <!--button type="submit" class="btn btn-info">Add Customer & Continue to Add Transaction</button-->
                                            <button type="submit" class="btn btn-primary">Add Customer</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>

                                    </div>

                                </div>
                                <!--/.row--> 

                            </form>
                        </div>
                    </div>

                </div>
                <!--/.col-->

            </div>
@endsection