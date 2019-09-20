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
                                    <li class="breadcrumb-item"><a href="{{route('submissions.marked')}}">Marked Assignment</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('submissions.index')}}">New Submission</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('submissions.list')}}">All Submission</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List of All Assignment Submission </li>
                                </ol>

                            </div>
                        </div>
                    </div>

                    <div class="dt-card">

                        <!-- Card Body -->
                        <div class="dt-card__body">
                            @if(count($solution) ==0)
                                <p align="center" style="color: red"><i class="icon icon-table"></i>
                                    No Assignment Was Found
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


                                                </tr>
                                            </thead>

                                            <tbody>
                                                    <?php
                                                $y=1; ?>
                                                @foreach ($solution as $solutions)
                                                    <tr class="gradeX">
                                                        <td>{{$y}}


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

                                                    </tr>
                                                </tr>
                                            </tfoot>
                                        </table>


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
