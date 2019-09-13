<aside id="main-sidebar" class="dt-sidebar">
        <div class="dt-sidebar__container">

            <!-- Sidebar Navigation -->
            <ul class="dt-side-nav">

                <!-- Menu Header -->
                <li class="dt-side-nav__item dt-side-nav__header">
                    <span class="dt-side-nav__text">NAVIGATIONS</span>
                </li>
                @if(( Auth::user()->email_verified_at) == "")

                    <li class="dt-side-nav__item">
                        <a href="{{ route('verification.resend') }}" class="dt-side-nav__link" title="Resend Link">
                            <i class="icon icon-mail icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Resend Link</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href="{{ route('admin.logout') }}" class="dt-side-nav__link" title="Log Out">
                            <i class="icon icon-user icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Log Out</span>
                        </a>
                    </li>


                @else
                    @if (auth()->user()->hasPermissionTo('Add User') OR (Gate::allows('Administrator', auth()->user())))
                        <li class="dt-side-nav__item">
                            <a href="{{route('user.create')}}" class="dt-side-nav__link" title="Metrics">
                                <i class="icon icon-users icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Users</span>
                            </a>
                        </li>
                    @endif

                    <li class="dt-side-nav__item">
                        <a href="{{route('course.create')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="fa fa-building icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Dept Courses</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="{{route('staff.create')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-user icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">
                                @if (auth()->user()->hasPermissionTo('Add Staff') OR
                                    (Gate::allows('Administrator', auth()->user())))
                                   Add Staffs
                                @elseif(auth()->user()->hasRole('Staff'))
                                    My Details
                                @else
                                    Dept Staffs List
                                @endif

                            </span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="{{route('allocation.create')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="fa fa-list fa-fw fa-lg"></i>
                            <span class="dt-side-nav__text">
                                @if (auth()->user()->hasPermissionTo('Add Staff') OR
                                    (Gate::allows('Administrator', auth()->user())))
                                   Allocate Course
                                @elseif(auth()->user()->hasRole('Staff'))
                                    My Courses
                                @else
                                    Lecturer Courses
                                @endif

                            </span>
                        </a>
                    </li>


                    <li class="dt-side-nav__item">
                        <a href="{{route('student.create')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-users icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Students</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="{{route('assignment.index')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="fa fa-certificate fa-fw fa-lg"></i>
                            <span class="dt-side-nav__text">Assignments</span>
                        </a>
                    </li>

                    <li class="dt-side-nav__item">
                        <a href="{{route('submissions.index')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-users icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Assignment Submissions</span>
                        </a>
                    </li>
                    <li class="dt-side-nav__item">
                        <a href="{{route('result.index')}}" class="dt-side-nav__link" title="Metrics">
                            <i class="icon icon-users icon-fw icon-lg"></i>
                            <span class="dt-side-nav__text">Assignment Results</span>
                        </a>
                    </li>


                @endif


            </ul>
            <!-- /sidebar navigation -->

        </div>
    </aside>
