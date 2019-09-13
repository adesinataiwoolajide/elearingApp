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
                                    <li class="breadcrumb-item"><a href="{{route('submissions.index')}}">View Submission</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List of Course Assignment Submission </li>
                                </ol>

                            </div>
                        </div>
                    </div>

                    <div class="dt-card">

                        <!-- Card Body -->
                        <div class="dt-card__body">
                            @if(count($solution) ==0)
                                <p align="center" style="color: red"><i class="icon icon-table"></i>
                                    The Solution List is Empty
                                </p>

                            @else
                                <!-- Tables -->
                                <form action="{{route('result.save')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="table-responsive">

                                        <table id="data-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>S/N </th>
                                                    <th>Student Matric</th>
                                                    <th>Course Title</th>
                                                    <th>Question</th>
                                                    <th>Mark</th>
                                                    <th>Submission Date</th>
                                                    <th>Solution</th>
                                                    @if (auth()->user()->hasRole('Staff'))
                                                        <th>Grade</th>
                                                    @endif

                                                </tr>
                                            </thead>

                                            <tbody>
                                                    <?php
                                                $y=1; ?>
                                                @foreach ($solution as $solutions)
                                                    <tr class="gradeX">
                                                        <td>{{$y}}
                                                            @if (auth()->user()->hasRole('Staff'))
                                                            <input type="checkbox" name="mark<?php echo $y; ?>"  value="1" required>
                                                                Add
                                                            @endif

                                                        </td>
                                                        <td>{{$solutions->student->matric_number}}</td>
                                                        <td>

                                                            @foreach (seeCourse($solutions->assignments->course_id) as $listCourse)
                                                                {{$listCourse->course_title}}
                                                            @endforeach
                                                        </td>
                                                        <td>{{$solutions->assignments->question}}</td>
                                                        <td>{{$solutions->assignments->marks}}</td>
                                                        <td>{{$solutions->assignments->submission_date}}</td>
                                                        <td>{{$solutions->solution}}</td>
                                                        @if (auth()->user()->hasRole('Staff'))
                                                            <td>
                                                                <?php
                                                                $sub = $solutions->assignments->marks - 1; ?>

                                                                    <select name="score{{$y}}" style="width:50px" required>
                                                                    <?php
                                                                    for ($x = 0; $x <= $solutions->assignments->marks; $x++) { ?>
                                                                        <option value="{{$x}}">{{$x}} </option><?php
                                                                    } ?>

                                                                    </select>
                                                            </td>
                                                            <input type="hidden" name="assignment_id<?php echo $y; ?>" value="{{$solutions->assignment_id}}" >
                                                            <input type="hidden" name="solution_id<?php echo $y; ?>" value="{{$solutions->solution_id}}" >
                                                            <input type="hidden" name="student_id<?php echo $y; ?>" value="{{$solutions->student->student_id}}" >
                                                            <input type="hidden" name="grade<?php echo $y; ?>" value="{{$solutions->assignments->marks}}" >
                                                            <input type="hidden" name="user_id<?php echo $y; ?>" value="{{$solutions->assignments->user_id}}" >
                                                        @endif
                                                   </tr><?php
                                                    $y++; ?>

                                                @endforeach

                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <tr>
                                                        <th>S/N </th>
                                                        <th>Student Matric</th>
                                                        <th>Course Title</th>
                                                        <th>Question</th>
                                                        <th>Mark</th>
                                                        <th>Submission Date</th>
                                                        <th>Solution</th>
                                                        @if (auth()->user()->hasRole('Staff'))
                                                            <th>Grade</th>
                                                        @endif
                                                    </tr>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        @if (auth()->user()->hasRole('Staff'))
                                            <div class="col-sm-12" align="center">
                                                <div class="md-form-group">
                                                    <input type="hidden" name="show" value="<?php echo $y; ?>">
                                                    <button type="submit" class="btn btn-primary" name="check">SUBMIT RESULT</button>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                    <!-- /tables -->
                                </form>
                            @endif
                        </div>
                        <!-- /card body -->

                    </div>


                </div>


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
