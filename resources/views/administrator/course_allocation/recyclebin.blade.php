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
                                    @if (auth()->user()->hasPermissionTo('Restore Allocate Course') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('allocation.restore')}}">Restore Deleted Allocated Courses</a></li>
                                    @endif
                                    
                                    @if (auth()->user()->hasPermissionTo('Allocate Course') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('allocation.create')}}">Allocate Course</a></li>
                                    @endif
                                    
                                    
                                    <li class="breadcrumb-item active" aria-current="page">List of Deleted Departmental Allocated Courses </li>
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
                            @if(count($allocation) ==0)
                                <p align="center" style="color: red"><i class="icon icon-table"></i> 
                                    The Course List is Empty
                                </p>
        
                            @else
                                <!-- Tables -->
                                <div class="table-responsive">

                                    <table id="data-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>S/N </th>
                                                <th>Course Title</th>
                                                <th>Course Code</th>
                                                <th>Course Unit</th>
                                                <th>Course Status</th>
                                                <th>Staff Name</th>
                                                <th>Program</th>
                                                <th>Level</th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody> 
                                                <?php
                                            $y=1; ?>
                                            @foreach ($allocation as $allocations)
                                                <tr class="gradeX">
                                                    <td>{{$y}}
                                                        @if (auth()->user()->hasPermissionTo('Restore Allocate Course') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('allocation.undelete', $allocations->allocation_id)}}" 
                                                                class=""
                                                                onclick="return(confirmToRestore());" >
                                                            <i class="fa fa-trash-o"></i></a>
                                                        @endif
                                                        
                                                    </td>
                                                   
                                                    <td>{{$allocations->course->course_title}}</td> 
                                                    <td>{{$allocations->course->course_code}}</td> 
                                                    <td>{{$allocations->course->course_unit}}</td> 
                                                    <td>{{$allocations->course->course_status}}</td> 
                                                    <td>{{$allocations->user->name}}</td> 
                                                    <td>{{$allocations->program}}</td> 
                                                    <td>{{$allocations->level}}</td> 
                                                   
                                                </tr><?php 
                                                $y++; ?>
                                                
                                            @endforeach

                                        </tbody>
                                    
                                        <tfoot>
                                            <tr>
                                                <tr>
                                                    <th>S/N </th>
                                                    <th>Course Title</th>
                                                    <th>Course Code</th>
                                                    <th>Course Unit</th>
                                                    <th>Course Status</th>
                                                    <th>Staff Name</th>
                                                    <th>Program</th>
                                                    <th>Level</th>
                                                        
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