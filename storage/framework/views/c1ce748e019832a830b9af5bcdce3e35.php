<nav id="sidebar" class="sidebar-wrapper">

    <!-- App brand starts -->
    <div class="app-brand">
		<a href="<?php echo e(route('dashboard')); ?>">
			<img src="<?php echo e(asset('elsAdmin/auth-access/els-logo.png')); ?>" class="logo" alt="" style="width: 200px ; height:;">
		</a>
    </div>
    <!-- App brand ends -->

    <!-- Sidebar menu starts -->
    <div class="sidebarMenuScroll">
		<ul class="sidebar-menu">
			<li class="<?php echo e(request()->routeIs('dashboard') ? 'active current-page' : ''); ?>">
				<a href="<?php echo e(route('dashboard')); ?>">
					<i class="ri-home-8-line"></i>
					<span class="menu-text">Dashboard</span>
				</a>
			</li>
			<?php if(Auth::user()->email_verified_at != ""): ?>
				<?php if(Auth::user()->hasAnyRole(['Administrator', 'Admin'])): ?>
					<li class="treeview <?php echo e(request()->routeIs('user.*') ? 'active current-page' : ''); ?>">
						<a href="#!">
							<i class="ri-user-line"></i>
							<span class="menu-text">Users</span>
						</a>
						<ul class="treeview-menu">
							<li class="<?php echo e(request()->routeIs('user.create') ? 'active' : ''); ?>">
								<a href="<?php echo e(route('user.create')); ?>">
									<i class="ri-user-add-line"></i>
									<span>Create a User</span>
								</a>
							</li>
							<li class="<?php echo e(request()->routeIs('user.index') ? 'active' : ''); ?>">
								<a href="<?php echo e(route('user.index')); ?>">
									<i class="ri-team-line"></i>
									<span>View All Users</span>
								</a>
							</li>
							<li class="<?php echo e(request()->routeIs('user.students.index') ? 'active' : ''); ?>">
								<a href="<?php echo e(route('user.students.index')); ?>">
									<i class="ri-graduation-cap-line"></i>
									<span>View All Students</span>
								</a>
							</li>
						</ul>
					</li>
				<?php endif; ?>

				<?php if(Auth::user()->hasAnyRole(['Student'])): ?>

					<li class="<?php echo e(request()->routeIs('course.index') ? 'active current-page' : ''); ?>">
						<a href="<?php echo e(route('course.index')); ?>">
							<i class="ri-book-open-line"></i>
							<span class="menu-text">Available Courses</span>
						</a>
					</li>

					<li class="<?php echo e(request()->routeIs('myCourses') ? 'active current-page' : ''); ?>">
						<a href="<?php echo e(route('myCourses')); ?>">
							<i class="ri-file-list-3-line"></i>
							<span class="menu-text">My Learnings</span>
						</a>
					</li>

					
					<li class="<?php echo e(request()->routeIs('payment.index') ? 'active current-page' : ''); ?>">
						<a href="<?php echo e(route('payment.index')); ?>">
							<i class="ri-wallet-line"></i>
							<span class="menu-text">My Payment History</span>
						</a>
					</li>

				<?php endif; ?>

				<?php if(Auth::user()->hasAnyRole(['Instructor'])): ?>

					<li class="<?php echo e(request()->routeIs('course.index') ? 'active current-page' : ''); ?>">
						<a href="<?php echo e(route('course.index')); ?>">
							<i class="ri-list-settings-line"></i>
							<span class="menu-text">My Course Allocations</span>
						</a>
					</li>

				<?php endif; ?>

				<li class="treeview <?php echo e(request()->routeIs('assignment.course.index','submission.course.index') ? 'active' : ''); ?>">
					<a href="#!">
						<i class="ri-file-list-3-line"></i>
						<span class="menu-text">Course Assignments</span>
					</a>
					<ul class="treeview-menu">
						<li class="<?php echo e(request()->routeIs('assignment.course.index') ? 'active' : ''); ?>">
							<a href="<?php echo e(route('assignment.course.index')); ?>">View assignments</a>
						</li>
						<li class="<?php echo e(request()->routeIs('submission.course.index') ? 'active' : ''); ?>">
							<a href="<?php echo e(route('submission.course.index')); ?>">View submissions</a>
						</li>
					</ul>
				</li>

				<li class="">
					<a href="">
							<i class="ri-pages-line"></i>
						<span class="menu-text">Course Tasks</span>
					</a>
				</li>
				
				<?php if(Auth::user()->hasAnyRole(['Administrator', 'Admin'])): ?>

					<li class="<?php echo e(request()->routeIs('program.index') ? 'active current-page' : ''); ?>">
						<a href="<?php echo e(route('program.index')); ?>">
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
							<?php if(Auth::user()->hasAnyRole(['Administrator', 'Admin'])): ?>
								<li><a href="<?php echo e(route('course.create')); ?>">Add New Course</a></li>
							<?php endif; ?>
							<li><a href="<?php echo e(route('course.index')); ?>">View All Courses</a></li>
							
						</ul>
					</li>
					<li class="<?php echo e(request()->routeIs('allocation.index') ? 'active current-page' : ''); ?>">
						<a href="<?php echo e(route('allocation.index')); ?>">
							<i class="ri-list-settings-line"></i>
							<span class="menu-text">Course Allocations</span>
						</a>
					</li>
					<li class="<?php echo e(request()->routeIs('payment.index') ? 'active current-page' : ''); ?>">
						<a href="<?php echo e(route('payment.index')); ?>">
							<i class="ri-wallet-line"></i>
							<span class="menu-text">Payment History</span>
						</a>
					</li>
				

					<li class="<?php echo e(request()->routeIs('faq.index') ? 'active current-page' : ''); ?>">
						<a href="<?php echo e(route('faq.index')); ?>">
							<i class="ri-list-settings-line"></i>
							<span class="menu-text">FAQ</span>
						</a>
					</li>

					<li class="<?php echo e(request()->routeIs('blog.index') ? 'active current-page' : ''); ?>">
						<a href="<?php echo e(route('blog.index')); ?>">
							<i class="ri-table-line"></i>
							<span class="menu-text">BLOG</span>
						</a>
					</li>

				<?php endif; ?>
			<?php endif; ?>
			
			<li class="<?php echo e(request()->routeIs('user.show') ? 'active current-page' : ''); ?>">
				<a href="<?php echo e(route('user.show', Auth::user()->slug)); ?>">
					<i class="ri-user-line"></i>
					<span class="menu-text">My Profile</span>
				</a>
			</li>
			<li class="<?php echo e(request()->routeIs('signout') ? 'active current-page' : ''); ?>">
				<a href="<?php echo e(route('signout')); ?>">
					<i class="ri-logout-box-line"></i>
					<span class="menu-text">Logout</span>
				</a>
			</li>
		</ul>
	</div>
    <!-- Sidebar menu ends -->

</nav><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>