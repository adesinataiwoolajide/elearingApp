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
                                    @if (auth()->user()->hasPermissionTo('Edit Course') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('course.edit', $cour->course_code)}}">Edit Course</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermissionTo('Add Course') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('course.create')}}">Add Course</a></li>
                                    @endif
                                    
                                    @if (auth()->user()->hasPermissionTo('Restore Course') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('course.restore')}}">Restore Deleted Courses</a></li>
                                    @endif
                                    <li class="breadcrumb-item active" aria-current="page">List of Saved Departmental Courses </li>
                                </ol>
                                
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->hasRole('Staff') OR 
                        (Gate::allows('Administrator', auth()->user())))
                        <!-- Card -->
                        <div class="dt-card">

                            <!-- Card Header -->
                            <div class="dt-card__header">

                                <!-- Card Heading -->
                                <div class="dt-card__heading">
                                    <h3 class="dt-card__title">Course Update Form</h3>
                                </div>
                                <!-- /card heading -->

                            </div>
                        
                            <!-- Card Body -->
                            <div class="dt-card__body">

                                <form action="{{route('course.update', $cour->course_code)}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="col-sm-4 mb-3">
                                            <label for="validationDefault02">Course Title</label>
                                            <input type="text" class="form-control" id="validationDefault01"
                                                placeholder="Enter Course Title" required name="course_title" value="{{$cour->course_title}}">
                                            @if ($errors->has('course_title'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('course_title') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <label for="validationDefault02">Course Code</label>
                                            <input type="text" class="form-control" id="validationDefault01"
                                                placeholder="Enter Course Code" required name="course_code" value="{{$cour->course_code}}">
                                            @if ($errors->has('course_code'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('course_code') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <label for="validationDefault02">Course Unit</label>
                                            <input type="number" class="form-control" id="validationDefault01"
                                                placeholder="Enter Course Unit" required name="course_unit" value="{{$cour->course_unit}}">
                                            @if ($errors->has('course_unit'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('course_unit') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <div class="col-sm-6 mb-3">
                                            <label for="validationDefault02">Course Status</label>
                                            <select name="course_status" class="form-control" required>
                                                <option value="{{$cour->course_status}}"> {{$cour->course_status}} </option>
                                                <option></option><?php 
                                                $status = array('Compulsory', 'Required', 'Elective'); ?>
                                                @foreach($status as $positions)
                                                    <option value="{{$positions}}"> {{$positions}}  </option> 
                                                @endforeach
                                            </select>
                                            @if ($errors->has('course_status'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('course_status') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="validationDefault02">Course File</label>
                                            <input type="file" class="form-control" id="validationDefault01"
                                                placeholder="" name="course_file">
                                            @if ($errors->has('course_file'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('course_file') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <input type="hidden" name="course_id" value="{{$cour->course_id}}">
                                        <div class="col-sm-12 mb-3">
                                            <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit">Update The Course</button>
                                        </div>
                                    </div>
                                    
                                    
                                </form>
                                <!-- /form -->

                            </div>
                            <!-- /card body -->

                        </div>
                    @endif
                    
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
                            @if(count($course) ==0)
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
                                                <th>Material</th>
                                                    
                                            </tr>
                                        </thead>
                                    
                                        <tbody> 
                                                <?php
                                            $y=1; ?>
                                            @foreach ($course as $courses)
                                                <tr class="gradeX">
                                                    <td>{{$y}}
                                                        @if (auth()->user()->hasPermissionTo('Delete Course') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('course.delete', $courses->course_code)}}" 
                                                                class=""
                                                                onclick="return(confirmToDelete());" >
                                                            <i class="fa fa-trash-o"></i></a>
                                                        @endif
                                                        @if (auth()->user()->hasPermissionTo('Edit Course') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('course.edit', $courses->course_code)}}" 
                                                                class="" onclick="">
                                                                <i class="fa fa-pencil"></i> 
                                                            </a>
                                                        @endif  
                                                    </td>
                                                   
                                                    <td>{{$courses->course_title}}</td> 
                                                    <td>{{$courses->course_code}}</td> 
                                                    <td>{{$courses->course_unit}}</td> 
                                                    <td>{{$courses->course_status}}</td> 
                                                    <td>
                                                        <a href="{{asset('course-materials/'.$courses->course_file)}}" 
                                                            target="_blank" class="btn btn-success">
                                                        <i class="fa fa-download"></i> 
                                                        DOWNLOAD
                                                    </td> 
                                                    
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
                                                    <th>Material</th>
                                                    
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