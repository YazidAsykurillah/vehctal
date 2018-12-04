<div class="col-xs-4 col-md-2">
    <div class="dashboard-sidebar">
        <div class="dashboard-userpic">
            <center>
                @if(Auth::user()->profile_picture == NULL)
                    <img src="{{ url('images/noprofile.png')}}" />
                @else
                    <?php $profile_picture_path = Auth::user()->id.'/images/'.Auth::user()->profile_picture;?>
                    <img src="{{ url('files/'.$profile_picture_path.'')}}" />
                @endif
            </center>
        </div>
        <!-- SIDEBAR USER TITLE -->
        <div class="dashboard-usertitle">
            <div class="dashboard-usertitle-name">
                {{ Auth::user()->name }}
            </div>
            <div class="dashboard-usertitle-job">
                {{ Auth::user()->email }}
            </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR MENU -->
        <div class="dashboard-usermenu">
            <ul class="nav">
                <li class="active">
                    <a href="{{ url('home') }}">
                        <i class="fa fa-home"></i>Overview
                    </a>
                </li>
                <li>
                    <a href="{{ url('vehicle') }}">
                        <i class="fa fa-list"></i>My Vehicle 
                    </a>
                </li>
                <li>
                    <a href="{{ url('media') }}">
                        <i class="fa fa-envelope"></i>Media
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-user"></i>Account Settings
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-flag"></i>Help
                    </a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>