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

                                    <li class="breadcrumb-item"><a href="{{route('assignment.solution',$solution->assignment_id)}}">Submit Solution</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('allocation.create')}}">View My Submission</a></li>
                                    {{-- <li class="breadcrumb-item"><a href="{{route('solution.index')}}">View solution</a></li> --}}

                                    @if (auth()->user()->hasPermissionTo('Restore Solution') OR
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('solution.restore')}}">Restore Deleted Solution</a></li>
                                    @endif
                                    @if (auth()->user()->hasRole('Student'))
                                        <li class="breadcrumb-item active" aria-current="page">{{auth()->user()->name}} Assignment Solution </li>

                                    @endif
                                </ol>

                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->hasRole('Student'))
                        <!-- Card -->
                        <div class="dt-card">

                            <!-- Card Header -->
                            <div class="dt-card__header">

                                <!-- Card Heading -->
                                <div class="dt-card__heading">
                                    <h3 class="dt-card__title">solution Solution Form</h3>
                                </div>
                                <!-- /card heading -->

                            </div>

                            <!-- Card Body -->
                            <div class="dt-card__body">

                                <form action="{{route('solution.save')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-row">
                                        <div class="col-sm-3 mb-3">
                                            <label for="validationDefault02">Course Title</label>
                                            <input type="text" class="form-control" id="validationDefault01"
                                             value="{{$solution->course->course_title}}" readonly>

                                        </div>
                                        <div class="col-sm-2 mb-3">
                                            <label for="validationDefault02"> Code</label>
                                            <input type="text" class="form-control" id="validationDefault01"
                                                value="{{$solution->course->course_code}}" readonly>

                                        </div>
                                        <div class="col-sm-3 mb-3">
                                            <label for="validationDefault02">Lecturer Name</label>
                                            <input type="text" class="form-control" id="validationDefault01"
                                                name="" value="{{Auth::user()->name}}" readonly>

                                        </div>
                                        <input type="hidden" name="allocation_id" value="{{$solution->allocation_id}}" >
                                        <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}" >
                                        <input type="hidden" name="level" value="{{$solution->level}}" >
                                        <input type="hidden" name="program" value="{{$solution->program}}" >
                                        <input type="hidden" name="course_id" value="{{$solution->course_id}}" >
                                        <input type="hidden" name="assignment_id" value="{{$solution->assignment_id}}" >
                                        <input type="hidden" name="staff_id" value="{{$solution->user_id}}" >

                                        <div class="col-sm-2 mb-3">
                                            <label for="validationDefault01"> Score</label>
                                            <input type="number" class="form-control" id="validationDefault01"
                                                placeholder="Enter Marks" max="30"  value="{{$solution->marks}}" readonly name="marks">

                                        </div>
                                        <div class="col-sm-2 mb-3">
                                            <label for="validationDefault02">Submission Date</label>

                                            <div class="input-group date" id="date-time-picker-1"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#date-time-picker-1"/ name="submission_date" readonly value="{{$solution->submission_date}}">
                                                <div class="input-group-append" data-target="#date-time-picker-1"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="icon icon-calendar"></i></div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-sm-12 mb-12">
                                            <label for="validationDefault01">Assignment Question</label>
                                            <input  id="" class="form-control" name="question" value="{{$solution->question}}" readonly>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label for="validationDefault01">Assignment Solution</label>
                                            <textarea class="" id="summernote" name="solution" required placeholder="Add Your Solution   Here" style="height:50px">
                                                {{old('solution')}}
                                            </textarea>

                                            @if ($errors->has('solution'))
                                                <div class="alert alert-danger alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <div class="alert-icon contrast-alert">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="alert-message">
                                                        <span><strong>Error!</strong> {{ $errors->first('solution') }} !</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <button class="btn btn-primary btn-lg btn-block text-uppercase" type="submit">Add The Solution</button>
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


        </div>
        <!-- /site content -->

        <!-- Footer -->
        <footer class="dt-footer">
           <a href=""> Powered By Glorious Empire Technologies </a> © {{date('Y')}}
        </footer>
<!-- /footer -->
</div>
@endsection
