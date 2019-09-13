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
                                   
                                    <li class="breadcrumb-item"><a href="{{route('student.create')}}">
                                        @if (auth()->user()->hasPermissionTo('Add Student') OR 
                                            (Gate::allows('Administrator', auth()->user())))
                                            View Students
                                        @else 
                                            My Details
                                        @endif
                                        </a>
                                    </li>
                                    
                                    @if (auth()->user()->hasPermissionTo('Restore Student') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('student.restore')}}">Restore Deleted Student</a></li>
                                    @endif
                                    <li class="breadcrumb-item active" aria-current="page">List of All Students </li>
                                </ol>
                                
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->hasPermissionTo('Add Student') OR 
                        (Gate::allows('Administrator', auth()->user())))
                        <!-- Card -->
                        <div class="dt-card">

                            <!-- Card Header -->
                            <div class="dt-card__header">

                                <!-- Card Heading -->
                                <div class="dt-card__heading">
                                    <h3 class="dt-card__title">Student Registration Form</h3>
                                </div>
                                <!-- /card heading -->

                            </div>
                        
                            <!-- Card Body -->
                            <div class="dt-card__body">

                                <form action="{{route('student.save')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="col-sm-12 mb-3">
                                            <label for="validationDefault02">Upload Student Excel File</label>
                                            <input type="file" class="form-control" id="validationDefault01"
                                                required name="file" value="{{old('file')}}">
                                            @if ($errors->has('file'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('file') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <div class="col-sm-12 mb-3">
                                            <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit">Upload The Students</button>
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
                            @if (auth()->user()->hasRole('Staff') OR 
                                (Gate::allows('Administrator', auth()->user())))
                                @if(count($student) ==0)
                                    <p align="center" style="color: red"><i class="icon icon-table"></i> 
                                        The Student List is Empty
                                    </p>
            
                                @else
                                    <!-- Tables -->
                                    <div class="table-responsive">

                                        <table id="data-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>S/N </th>
                                                    <th>Name</th>
                                                    <th>Matric Number</th>  
                                                    <th>Email</th>
                                                    <th>Phone Number</th>  
                                                    <th>Level</th>
                                                    <th>Programme</th>  
                                                </tr>
                                            </thead>
                                        
                                            <tbody> 
                                                    <?php
                                                $y=1; ?>
                                                @foreach ($student as $students)
                                                    <tr class="gradeX">
                                                        <td>{{$y}}
                                                            @if (auth()->user()->hasPermissionTo('Delete Student') OR 
                                                                (Gate::allows('Administrator', auth()->user())))
                                                                <a href="{{route('student.delete', $students->matric_number)}}" 
                                                                    class=""
                                                                    onclick="return(confirmToDelete());" >
                                                                <i class="fa fa-trash-o"></i></a>
                                                            @endif
                                                            @if (auth()->user()->hasPermissionTo('Edit Student') OR 
                                                                (Gate::allows('Administrator', auth()->user())))
                                                                <a href="{{route('student.edit', $students->matric_number)}}" 
                                                                    class="" onclick="">
                                                                    <i class="fa fa-pencil"></i> 
                                                                </a>
                                                            @endif  
                                                        </td>
                                                    
                                                        
                                                        <td>{{$students->student_name}}</td> 
                                                        <td>{{$students->matric_number}}</td> 
                                                        <td>{{$students->student_email}}</td> 
                                                        <td>{{$students->phone_number}}</td> 
                                                        <td>{{$students->level}}</td> 
                                                        <td>{{$students->program}}</td> 
                                                        
                                                        
                                                    </tr><?php 
                                                    $y++; ?>
                                                    
                                                @endforeach

                                            </tbody>
                                        
                                            <tfoot>
                                                <tr>
                                                    <tr>
                                                        <th>S/N </th>
                                                        <th>Name</th>
                                                        <th>Matric Number</th>  
                                                        <th>Email</th>
                                                        <th>Phone Number</th>  
                                                        <th>Level</th>
                                                        <th>Programme</th>  
                                                    </tr>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                    <!-- /tables -->
                                @endif
                            @else 
                                <div class="table-responsive">

                                    <table id="data-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>S/N </th>
                                                <th>Name</th>
                                                <th>Matric Number</th>  
                                                <th>Email</th>
                                                <th>Phone Number</th>  
                                                <th>Level</th>
                                                <th>Programme</th>  
                                            </tr>
                                        </thead>
                                    
                                        <tbody> 
                                                <?php
                                            $y=1; ?>
                                           
                                            <tr class="gradeX">
                                                <td>{{$y}}
                                                    
                                                   
                                                    <a href="{{route('student.edit', $student->matric_number)}}" 
                                                        class="btn btn-success" onclick="">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </a>
                                                     
                                                </td>
                                            
                                                
                                                <td>{{$student->student_name}}</td> 
                                                <td>{{$student->matric_number}}</td> 
                                                <td>{{$student->student_email}}</td> 
                                                <td>{{$student->phone_number}}</td> 
                                                <td>{{$student->level}}</td> 
                                                <td>{{$student->program}}</td> 
                                                
                                                
                                            </tr><?php 
                                            $y++; ?>
                                                
                                            

                                        </tbody>
                                    
                                        <tfoot>
                                            <tr>
                                                <tr>
                                                    <th>S/N </th>
                                                    <th>Name</th>
                                                    <th>Matric Number</th>  
                                                    <th>Email</th>
                                                    <th>Phone Number</th>  
                                                    <th>Level</th>
                                                    <th>Programme</th>  
                                                </tr>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
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