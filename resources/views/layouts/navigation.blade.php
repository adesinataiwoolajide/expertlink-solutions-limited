<nav id="sidebar" class="sidebar-wrapper">

    <!-- App brand starts -->
    <div class="app-brand">
		<a href="{{ route('dashboard')}}">
			<img src="{{ asset('elsAdmin/images/els.png')}}" class="logo" alt="" style="width: ; height:;">
		</a>
    </div>
    <!-- App brand ends -->

    <!-- Sidebar menu starts -->
    <div class="sidebarMenuScroll">
		<ul class="sidebar-menu">
			<li class="{{ request()->routeIs('dashboard') ? 'active current-page' : '' }}">
				<a href="{{ route('dashboard') }}">
					<i class="ri-home-8-line"></i>
					<span class="menu-text">Dashboard</span>
				</a>
			</li>

			<li class="treeview {{ request()->routeIs('user.*') ? 'active current-page' : '' }}">
				<a href="#!">
					<i class="ri-user-line"></i>
					<span class="menu-text">Users</span>
				</a>
				<ul class="treeview-menu">
					<li class="{{ request()->routeIs('user.create') ? 'active' : '' }}">
						<a href="{{ route('user.create') }}">Create a User</a>
					</li>
					<li class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
						<a href="{{ route('user.index') }}">View All Users</a>
					</li>
				</ul>
			</li>

			<li class="{{ request()->routeIs('program.index') ? 'active current-page' : '' }}">
				<a href="{{ route('program.index') }}">
					<i class="ri-list-settings-line"></i>
					<span class="menu-text"> Course Program</span>
				</a>
			</li>
	
			<li class="treeview">
				<a href="#!">
					<i class="ri-file-list-3-line"></i>
					<span class="menu-text">Courses</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="{{ route('course.create') }}">Add New Course</a></li>
					<li><a href="{{ route('course.create') }}">View All Courses</a></li>
					
				</ul>
			</li>

			<li class="{{ request()->routeIs('allocation.index') ? 'active current-page' : '' }}">
				<a href="{{ route('allocation.index') }}">
					<i class="ri-list-settings-line"></i>
					<span class="menu-text">Course Allocations</span>
				</a>
			</li>

			<li class="treeview ">
				<a href="#!">
					<i class="ri-table-line"></i>
					<span class="menu-text">Tables</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="basic-tables.html">Bootstrap Tables</a></li>
					<li><a href="data-tables.html">Data Tables</a></li>
				</ul>
			</li>

			<li class="{{ request()->routeIs('signout') ? 'active current-page' : '' }}">
				<a href="{{ route('signout') }}">
					<i class="ri-logout-box-line"></i>
					<span class="menu-text">Logout</span>
				</a>
			</li>
		</ul>
	</div>
    <!-- Sidebar menu ends -->

</nav>