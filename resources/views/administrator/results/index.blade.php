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
                                    <li class="breadcrumb-item"><a href="{{route('result.index')}}">View Results</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List of Assignment Result </li>
                                </ol>

                            </div>
                        </div>
                    </div>

                    <div class="dt-card">

                        <!-- Card Body -->
                        <div class="dt-card__body">
                            @if(count($results) ==0)
                                <p align="center" style="color: red"><i class="icon icon-table"></i>
                                    The Result List is Empty
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
                                                    <th>Course Code</th>
                                                    <th>Mark</th>
                                                    <th>Grade</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                    <?php
                                                $y=1; ?>
                                                @foreach ($results as $solutions)
                                                    <tr class="gradeX">
                                                        <td>{{$y}}</td>
                                                        <td>{{$solutions->learner->matric_number}}</td>
                                                        @foreach (seeCourse($solutions->assignmen->course_id) as $listCourse)
                                                            <td> {{$listCourse->course_title}}</td>
                                                            <td>{{$listCourse->course_code}}</td>
                                                        @endforeach

                                                        <td>{{$solutions->assignmen->marks}}</td>
                                                        <td>{{$solutions->score}}</td>
                                                        <td>@if($solutions->score > 5)
                                                                <p style="color:green">Passed </p>
                                                            @else
                                                                <p style="color:red"> Failed </p>
                                                            @endif
                                                        </td>

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
                                                        <th>Course Code</th>
                                                        <th>Mark</th>
                                                        <th>Grade</th>
                                                        <th>Status</th>
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
