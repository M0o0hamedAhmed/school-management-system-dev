<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{trans('main.main')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>

                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main.mora_soft')}} </li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{trans('main.Grades')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Grades.index')}}">{{trans('grades.list_of_academic_levels')}}</a></li>

                        </ul>
                    </li>
                    <!-- menu item classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{trans('main.classes')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes" class="collapse" data-parent="#sidebarnav">
                            <li><a href="calendar.html">First </a></li>
                        </ul>
                    </li>


                    <!-- menu item todo-->
                    <li>
                        <a data-toggle="collapse" data-target="#sections">
                            <div class="pull-left"><i class="ti-menu-alt"></i><span
                                    class="right-nav-text">{{trans('main.sections')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">First </a></li>
                        </ul>
                    </li>


                    <!-- menu item todo-->
                    <li>
                        <a data-toggle="collapse" data-target="#students">
                            <div class="pull-left"><i class="ti-layers"></i><span
                                    class="right-nav-text">{{trans('main.students')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">First </a></li>
                        </ul>
                    </li>

                    <!-- menu item todo-->
                    <li>
                        <a data-toggle="collapse" data-target="#teachers">
                            <div class="pull-left"><i class="ti-panel"></i><span
                                    class="right-nav-text">{{trans('main.teachers')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="teachers" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">First </a></li>
                        </ul>
                    </li>

                    <!-- menu item todo-->
                    <li>
                        <a data-toggle="collapse" data-target="#parents">
                            <div class="pull-left"><i class="ti-location-pin"></i><span
                                    class="right-nav-text">{{trans('main.parents')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parents" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">First </a></li>
                        </ul>
                    </li>


                    <!-- menu item todo-->
                    <li>
                        <a data-toggle="collapse" data-target="#calculations">
                            <div class="pull-left"><i class="ti-id-badge"></i><span
                                    class="right-nav-text">{{trans('main.calculations')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calculations" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">First </a></li>
                        </ul>
                    </li>


                    <!-- menu item todo-->
                    <li>
                        <a data-toggle="collapse" data-target="#attendance">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span
                                    class="right-nav-text">{{trans('main.attendance')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attendance" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">First </a></li>
                        </ul>
                    </li>


                    <!-- menu item todo-->
                    <li>
                        <a data-toggle="collapse" data-target="#exams">
                            <div class="pull-left"><i class="ti-files"></i><span
                                    class="right-nav-text">{{trans('main.exams')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exams" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">First </a></li>
                        </ul>
                    </li>


                    <!-- menu item todo-->
                    <li>
                        <a data-toggle="collapse" data-target="#library">
                            <div class="pull-left"><i class="ti-blackboard"></i><span
                                    class="right-nav-text">{{trans('main.library')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">First </a></li>
                        </ul>
                    </li>


                    <!-- menu item todo-->
                    <li>
                        <a data-toggle="collapse" data-target="#online_classes">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{trans('main.online_classes')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="online_classes" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">First </a></li>
                        </ul>
                    </li>


                    <!-- menu item todo-->
                    <li>
                        <a data-toggle="collapse" data-target="#setting">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">{{trans('main.setting')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="setting" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">First </a></li>
                        </ul>
                    </li>


                    <!-- menu item todo-->
                    <li>
                        <a data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="ti-email"></i><span
                                    class="right-nav-text">{{trans('main.users')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">First </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

