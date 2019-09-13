@extends('layouts.app')
    @section('content')

    <div class="dt-content-wrapper custom-scrollbar">

        <!-- Site Content -->
        <div class="dt-content">

            <div class="row">
                
                <!-- Grid Item -->
                <div class="col-12">
                    <div class="row dt-masonry">
                        <div class="col-md-12 dt-masonry__item">
                            <div class="dt-card">
                                
                                <ol class="mb-0 breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('administrator.dashboard')}}">Home</a></li>
                                    @if (auth()->user()->hasPermissionTo('Restore Staff') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('staff.restore')}}">Restore Deleted Staff</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermissionTo('Add Staff') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('staff.create')}}">Add Staff</a></li>
                                    @endif
                                    
                                    
                                    <li class="breadcrumb-item active" aria-current="page">List of Deleted Staff </li>
                                </ol>
                                
                            </div>
                        </div>
                    </div>
                   
                    
                </div>
               

            </div> 
            <!-- /grid -->


            <div class="row">

                <!-- Grid Item -->
                <div class="col-xl-12">

                    <!-- Card -->
                    <div class="dt-card">

                        <!-- Card Body -->
                        <div class="dt-card__body">
                            @if(count($staff) ==0)
                                <p align="center" style="color: red"><i class="icon icon-table"></i> 
                                    The List is Empty
                                </p>
        
                            @else
                                <!-- Tables -->
                                <div class="table-responsive">

                                    <table id="data-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>S/N </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>  
                                            </tr>
                                        </thead>
                                    
                                        <tbody> 
                                                <?php
                                            $y=1; ?>
                                            @foreach ($staff as $staffs)
                                                <tr class="gradeX">
                                                    <td>{{$y}}
                                                        @if (auth()->user()->hasPermissionTo('Restore Staff') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('staff.undelete', $staffs->staff_email)}}" 
                                                                class=""
                                                                onclick="return(confirmToRestore());" >
                                                            <i class="fa fa-trash-o"></i></a>
                                                        @endif
                                                        
                                                    </td>
                                                   
                                                    
                                                    <td>{{$staffs->initial. " " .$staffs->staff_name}}</td> 
                                                    <td>{{$staffs->staff_email}}</td> 
                                                    <td>{{$staffs->phone_number}}</td> 
                                                    
                                                    
                                                </tr><?php 
                                                $y++; ?>
                                                
                                            @endforeach

                                        </tbody>
                                    
                                        <tfoot>
                                            <tr>
                                                <tr>
                                                    <th>S/N </th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>  
                                                </tr>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /tables -->
                            @endif
                        </div>
                        <!-- /card body -->

                    </div>
                    <!-- /card -->

                </div>
                <!-- /grid item -->

            </div>

        </div>
        <!-- /site content -->

        <!-- Footer -->
        <footer class="dt-footer">
           <a href=""> Powered By Glorious Empire Technologies </a> © {{date('Y')}}
        </footer>
<!-- /footer -->
</div>
@endsection