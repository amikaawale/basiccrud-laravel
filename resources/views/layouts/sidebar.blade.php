<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="active"><a href="{{ route('home') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    <li>
                        <a href="#"><i class="icon-stack2"></i> <span>Roles</span></a>
                        <ul>
                            <li><a href="{{ route('roles.index') }}">List</a></li>
                            <li><a href="{{ route('roles.create') }}">New</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-stack2"></i> <span>Users</span></a>
                        <ul>
                            <li><a href="{{ route('user.index') }}">List</a></li>
                            <li><a href="{{ route('user.create') }}">New</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-stack2"></i> <span>Todos</span></a>
                        <ul>
                            <li><a href="{{ route('todo.index') }}">List</a></li>
                            <li><a href="{{ route('todo.create') }}">New</a></li>
                        </ul>
                    </li>
                    <!-- /main -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
