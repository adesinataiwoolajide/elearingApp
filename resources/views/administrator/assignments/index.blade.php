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
                                    <li class="breadcrumb-item"><a href="{{route('assignment.index')}}">View Assignments</a></li>

                                    <li class="breadcrumb-item"><a href="{{route('allocation.create')}}">View Course Allocation</a></li>

                                    @if (auth()->user()->hasPermissionTo('Restore Assignment') OR
                                        (Gate::allows('Administrator', auth()->user())))
                                        <li class="breadcrumb-item"><a href="{{route('assignment.restore')}}">Restore Deleted Assignment</a></li>
                                    @endif

                                    @if (auth()->user()->hasRole('Staff'))
                                        <li class="breadcrumb-item active" aria-current="page">{{auth()->user()->name}} Assignment List </li>
                                    @else
                                        <li class="breadcrumb-item active" aria-current="page">List of Course Assignment </li>
                                    @endif
                                </ol>

                            </div>
                        </div>
                    </div>

                    <div class="dt-card">

                            <!-- Card Body -->
                            <div class="dt-card__body">
                                @if(count($allocation) ==0)
                                    <p align="center" style="color: red"><i class="icon icon-table"></i>
                                        The Assignment List is Empty
                                    </p>

                                @else
                                    <!-- Tables -->
                                    <div class="table-responsive">

                                        <table id="data-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>S/N </th>
                                                    <th>Course Title</th>
                                                    <th>Question</th>
                                                    <th>Mark</th>
                                                    <th>Submission Date</th>
                                                    <th>Lecturer</th>
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
                                                            @if (auth()->user()->hasPermissionTo('Delete Assignment') OR
                                                                (Gate::allows('Administrator', auth()->user())))
                                                                <a href="{{route('assignment.delete', $allocations->assignment_id)}}"
                                                                    class=""
                                                                    onclick="return(confirmToDelete());" >
                                                                <i class="fa fa-trash-o"></i></a>
                                                            @endif
                                                            @if (auth()->user()->hasRole('Staff'))
                                                                <a href="{{route('assignment.edit', $allocations->assignment_id)}}"
                                                                    class="" onclick="">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a href="{{route('assignment.edit', $allocations->assignment_id)}}"
                                                                    class="" onclick="">
                                                                    <i class="fa fa-list"></i>
                                                                </a>
                                                            @endif
                                                            @if (auth()->user()->hasRole('Student'))
                                                                <a href="{{route('assignment.solution', $allocations->assignment_id)}}"
                                                                    class="" onclick="">
                                                                    <i class="fa fa-book"></i>
                                                                </a>
                                                            @endif
                                                        </td>

                                                        <td>{{$allocations->course->course_title}}</td>
                                                        <td>{{$allocations->question}}</td>
                                                        <td>{{$allocations->marks}}</td>
                                                        <td>{{$allocations->submission_date}}</td>
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
                                                        <th>Question</th>
                                                        <th>Mark</th>
                                                        <th>Submission Date</th>
                                                        <th>Lecturer</th>
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
