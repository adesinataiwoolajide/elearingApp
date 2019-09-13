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
                                    @if (auth()->user()->hasPermissionTo('Edit Staff') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('staff.edit', $sta->staff_email)}}">Edit Staff</a></li>
                                    @endif
                                    @if (auth()->user()->hasPermissionTo('Add Staff') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('staff.create')}}">Add Staff</a></li>
                                    @endif
                                    
                                    @if (auth()->user()->hasPermissionTo('Restore Staff') OR 
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('staff.restore')}}">Restore Deleted Staff</a></li>
                                    @endif
                                    <li class="breadcrumb-item active" aria-current="page">List of Saved Staff </li>
                                </ol>
                                
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->hasPermissionTo('Edit Staff') OR 
                        (Gate::allows('Administrator', auth()->user())))
                        <!-- Card -->
                        <div class="dt-card">

                            <!-- Card Header -->
                            <div class="dt-card__header">

                                <!-- Card Heading -->
                                <div class="dt-card__heading">
                                    <h3 class="dt-card__title">Edit Staff Biodata Form</h3>
                                </div>
                                <!-- /card heading -->

                            </div>
                        
                            <!-- Card Body -->
                            <div class="dt-card__body">

                                <form action="{{route('staff.update', $sta->staff_email)}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="col-sm-3 mb-3">
                                            <label for="validationDefault02">Full Name</label>
                                            <input type="text" class="form-control" id="validationDefault01"
                                                placeholder="Enter Staff Title" required name="staff_name" value="{{$sta->staff_name}}">
                                            @if ($errors->has('staff_name'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('staff_name') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <label for="validationDefault02">Lecturer Category</label>
                                            <select name="initial" class="form-control" required>
                                                <option value="{{$sta->initial}}"> {{$sta->initial}}</option>
                                                <option></option><?php 
                                                $status = array('Mr.', 'Mrs.', 'Dr.', 'Prof.'); ?>
                                                @foreach($status as $positions)
                                                    <option value="{{$positions}}"> {{$positions}}  </option> 
                                                @endforeach
                                            </select>
                                            @if ($errors->has('initial'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('initial') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <label for="validationDefault02">E-Mail</label>
                                            <input type="text" class="form-control" id="validationDefault01"
                                                placeholder="Enter Lecturer E-Mail" required name="staff_email" value="{{$sta->staff_email}}">
                                            @if ($errors->has('staff_email'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('staff_email') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <label for="validationDefault02">Phone Number</label>
                                            <input type="number" class="form-control" id="validationDefault01"
                                                placeholder="Enter Phone Number" required name="phone_number" value="{{$sta->phone_number}}">
                                            @if ($errors->has('phone_number'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('phone_number') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <input type="hidden" name="user_id" value="{{$used->user_id}}">
                                        <input type="hidden" name="staff_id" value="{{$sta->staff_id}}">
                                       
                                        
                                        <div class="col-sm-12 mb-3">
                                            <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit">Update The Staff</button>
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
                                @if(auth()->user()->hasRole('Staff'))
                                    <p align="center" style="color: red"><i class="icon icon-user"></i>    {{auth()->user()->name}} Details </p>
    
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
                                                
                                                <tr class="gradeX">
                                                    <td>{{$y}}
                                                        @if (auth()->user()->hasPermissionTo('Delete Staff') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('staff.delete', $sta->staff_email)}}" 
                                                                class="btn btn-danger"
                                                                onclick="return(confirmToDelete());" >
                                                            <i class="fa fa-trash-o"></i></a>
                                                        @endif
                                                        @if (auth()->user()->hasPermissionTo('Edit Staff') OR 
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('staff.edit', $sta->staff_email)}}" 
                                                                class="btn btn-success" onclick="">
                                                                <i class="fa fa-pencil"></i> 
                                                            </a>
                                                        @endif  
                                                    </td>
                                                    
                                                    
                                                    <td>{{$sta->initial. " " .$sta->staff_name}}</td> 
                                                    <td>{{$sta->staff_email}}</td> 
                                                    <td>{{$sta->phone_number}}</td> 
                                                    
                                                    
                                                </tr><?php 
                                                $y++; ?>
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
                                @else
                            
                                    @if(count($staff) ==0)
                                        <p align="center" style="color: red"><i class="icon icon-table"></i> 
                                            The Staff List is Empty
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
                                                                @if (auth()->user()->hasPermissionTo('Delete Staff') OR 
                                                                    (Gate::allows('Administrator', auth()->user())))
                                                                    <a href="{{route('staff.delete', $staffs->staff_email)}}" 
                                                                        class="btn btn-danger"
                                                                        onclick="return(confirmToDelete());" >
                                                                    <i class="fa fa-trash-o"></i></a>
                                                                @endif
                                                                @if (auth()->user()->hasPermissionTo('Edit Staff') OR 
                                                                    (Gate::allows('Administrator', auth()->user())))
                                                                    <a href="{{route('staff.edit', $staffs->staff_email)}}" 
                                                                        class="btn btn-success" onclick="">
                                                                        <i class="fa fa-pencil"></i> 
                                                                    </a>
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