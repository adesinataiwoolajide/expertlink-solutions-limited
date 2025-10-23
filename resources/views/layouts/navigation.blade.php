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

			<li class="{{ request()->routeIs('signout') ? 'active current-page' : '' }}">
				<a href="{{ route('signout') }}">
					<i class="ri-list-settings-line"></i>
					<span class="menu-text">Programs</span>
				</a>
			</li>

			<li class="treeview">
				<a href="#!">
					<i class="ri-file-list-3-line"></i>
					<span class="menu-text">Forms</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="basic-inputs.html">Basic Inputs</a></li>
					<li><a href="checkbox-radio.html">Checkbox & Radio</a></li>
					<li><a href="date-time-picker.html">Date & Time Picker</a></li>
					<li><a href="file-upload.html">File Upload</a></li>
					<li><a href="form-layouts.html">Form Layouts</a></li>
					<li><a href="form-mask.html">Form Mask</a></li>
					<li><a href="form-quill-editor.html">Quill Editor</a></li>
					<li><a href="form-steppers.html">Form Steppers</a></li>
					<li><a href="input-groups.html">Input Groups</a></li>
					<li><a href="range-slider.html">Range Slider</a></li>
					<li><a href="select-dropdowns.html">Select & Dropdowns</a></li>
					<li><a href="validations.html">Validations</a></li>
					<li><a href="wizard.html">Wizard</a></li>
				</ul>
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