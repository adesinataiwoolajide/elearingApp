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
                                     @if (auth()->user()->hasPermissionTo('Edit Allocate Course') OR
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('allocation.edit', $allo->allocation_id)}}">Edit Allocated Course</a></li>
                                    @endif
                                    <li class="breadcrumb-item"><a href="{{route('allocation.create')}}">View Course Allocate</a></li>

                                    @if (auth()->user()->hasPermissionTo('Restore Allocate Course') OR
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('allocation.restore')}}">Restore Deleted Allocated Courses</a></li>
                                    @endif
                                    <li class="breadcrumb-item active" aria-current="page">List of Saved Departmental Allocated Courses </li>
                                </ol>

                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->hasPermissionTo('Edit Allocate Course') OR
                        (Gate::allows('Administrator', auth()->user())))
                        <!-- Card -->
                        <div class="dt-card">

                            <!-- Card Header -->
                            <div class="dt-card__header">

                                <!-- Card Heading -->
                                <div class="dt-card__heading">
                                    <h3 class="dt-card__title">Course Allocation Form</h3>
                                </div>
                                <!-- /card heading -->

                            </div>

                            <!-- Card Body -->
                            <div class="dt-card__body">

                                <form action="{{route('allocation.update', $allo->allocation_id)}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="col-sm-4 mb-4">

                                            <label for="validationDefault02">Course Code</label>
                                            <select name="course_id" class="form-control" required>
                                                <option value="{{$allo->course_id}}"> {{$allo->course->course_code . " ". $allo->course->course_title}} </option>
                                                <option value=""></option>
                                                @foreach($course as $courses)
                                                    <option value="{{$courses->course_id}}"> {{$courses->allocation_id .
                                                     " ". $courses->course_title}}  </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('course_id'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('course_id') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                       <div class="col-sm-4 mb-4">
                                            <label for="validationDefault02">Lecturer</label>
                                            <select name="user_id" class="form-control" required>
                                                <option value="{{$allo->user->user_id}}"> {{$allo->user->name}} </option>
                                                <option value=""></option>
                                                @foreach($user as $users)
                                                    <option value="{{$users->user_id}}"> {{$users->name}}  </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('user_id'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('user_id') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-sm-4 mb-4">
                                            <label for="validationDefault02">Program</label>
                                            <select name="program" class="form-control" required>
                                                <option value="{{$allo->program}}"> {{$allo->program}} </option>
                                                < <option value=""></option><?php
                                                $status = array('Full Time', 'Part Time'); ?>
                                                @foreach($status as $positions)
                                                    <option value="{{$positions}}"> {{$positions}}  </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('program'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('program') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-4 mb-4">
                                            <label for="validationDefault02">Level</label>
                                            <select name="level" class="form-control" required>
                                                <option value="{{$allo->level}}"> {{$allo->level}} </option>
                                                <option value=""></option><?php
                                                $level = array('OND 1', 'OND 2', 'HND 1', 'HND 2'); ?>
                                                @foreach($level as $levels)
                                                    <option value="{{$levels}}"> {{$levels}}  </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('level'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('level') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-4 mb-4">
                                            <label for="validationDefault02">Academic Session</label>
                                            <select name="session" class="form-control" required>
                                                <option value="{{$allo->session}}"> {{$allo->session}} </option>
                                                <option value=""></option><?php
                                                $session = array('2017/2018', '2018/2019', '2019/2020', '2020/2021'); ?>
                                                @foreach($session as $sessions)
                                                    <option value="{{$sessions}}"> {{$sessions}}  </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('session'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('session') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <input type="hidden" name="allocation_id" value="{{$allo->allocation_id}}">
                                        <div class="col-sm-4 mb-4">
                                            <label for="validationDefault02">Allocate Course</label>
                                            <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit">Update Allocated Course</button>
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
                                                <th>Session</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                                <?php
                                            $y=1; ?>
                                            @foreach ($allocation as $allocations)
                                                <tr class="gradeX">
                                                    <td>{{$y}}
                                                        @if (auth()->user()->hasPermissionTo('Delete Allocate Course') OR
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('allocation.delete', $allocations->allocation_id)}}"
                                                                class=""
                                                                onclick="return(confirmToDelete());" >
                                                            <i class="fa fa-trash-o"></i></a>
                                                        @endif
                                                        @if (auth()->user()->hasPermissionTo('Edit Allocate Course') OR
                                                            (Gate::allows('Administrator', auth()->user())))
                                                            <a href="{{route('allocation.edit', $allocations->allocation_id)}}"
                                                                class="" onclick="">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                        @endif
                                                    </td>

                                                    <td>{{$allocations->course->course_title}}</td>
                                                    <td>{{$allocations->course->course_code}}</td>
                                                    <td>{{$allocations->course->course_unit}}</td>
                                                    <td>{{$allocations->course->course_status}}</td>
                                                    <td>{{$allocations->user->name}}</td>
                                                    <td>{{$allocations->program}}</td>
                                                    <td>{{$allocations->level}}</td>
                                                    <td>{{$allocations->session}}</td>

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
                                                    <th>Session</th>
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
