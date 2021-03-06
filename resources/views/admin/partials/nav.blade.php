<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('pages.index') }}"><i class="fa fa-file"></i> Pages</a></li>
            <li><a><i class="fa fa-file-text"></i> Posts <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#"><i class="fa fa-file-text"></i> Posts</a></li>
                    <li><a href="#"><i class="fa fa-folder"></i> Categories</a></li>
                    <li><a href="#"><i class="fa fa-tags"></i> Tags</a></li>
                    <li><a href="#"><i class="fa fa-comment"></i> Comments</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-file-image-o"></i> Media</a></li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Settings</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> Users</a></li>
                    <li><a href="{{ route('roles.index') }}"><i class="fa fa-group"></i> Roles</a></li>
                    <li><a href="#"><i class="fa fa-warning"></i> Permissions</a></li>
                </ul>
            </li>
            <li><a href="{{ route('settings.index') }}"><i class="fa fa-gears"></i> Settings</a></li>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->

