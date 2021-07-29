

<nav class="pcoded-navbar">
		<div class="sidebar_toggle"><a href=""><i class="icon-close icons"></i></a></div>
		<div class="pcoded-inner-navbar main-menu">
			<div class="">
				<div class="main-menu-header">
					<img class="img-80 img-radius" src="{{ asset(Session::get('users_img')) }}" alt="User-Profile-Image">
					<div class="user-details">
						<span id="more-details">{{Auth::user()->name}}<i class="fa fa-caret-down"></i></span>
					</div>
				</div>
				<div class="main-menu-content">
					<ul>
						<li class="more-details">
						<a href="{{ ('profile') }}"><i class="ti-user"></i>View Profile</a>
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="ti-layout-sidebar-left"></i>{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</li>
					</ul>
				</div>
			</div>

			<div class="pcoded-navigation-label">Navigation</div>
			<ul class="pcoded-item pcoded-left-item">
			<li class="pcoded-hasmenu dashboard active pcoded-trigger">
				<a href="{{url('/')}}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
					<span class="pcoded-mtext">Dashboard</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>

            {{-- @canany(['Add patients','Edit patients'])
			<li class="patient">
				<a href="{{url('patient')}}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-agenda"></i><b>P</b></span>
					<span class="pcoded-mtext">Patient</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			@endcanany --}}

			<li class="document  pcoded-trigger">
				<a href="{{url('document/create')}}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-agenda"></i><b>a</b></span>
					<span class="pcoded-mtext">Add Document</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
		
			<!-- <li class="document  pcoded-trigger">
				<a href="{{url('doc_dashboard')}}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-agenda"></i><b>a</b></span>
					<span class="pcoded-mtext">All Document</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li> -->
		


			<li class="queue pcoded-trigger">
				<a href="{{url('all_document_msg')}}" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-agenda"></i><b>P</b></span>
					<span class="pcoded-mtext">My Queue</span>
					<span class="pcoded-mcaret"></span>
				</a>
			</li>
			
			@if (Auth::user()->super_admin == '1')
				<li class="document  pcoded-trigger">
					<a href="{{url('add_bulk')}}" class="waves-effect waves-dark">
						<span class="pcoded-micon"><i class="ti-import"></i><b>a</b></span>
						<span class="pcoded-mtext">Bulk Import</span>
						<span class="pcoded-mcaret"></span>
					</a>
				</li>
			@endif
			
			<li class="pcoded-hasmenu settings">
				<a href="javascript:void(0)" class="waves-effect waves-dark">
					<span class="pcoded-micon"><i class="ti-settings"></i><b>P</b></span>
					<span class="pcoded-mtext">Settings</span>
					<span class="pcoded-mcaret"></span>
				</a>
				<ul class="pcoded-submenu">
					@can('Add User')
					<li class="user">
						<a href="{{route('user.create')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Add User</span>
						</a>
					</li>
					@endcan

					@can('View User List')
					<li class="user">
						<a href="{{url('user')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Users List</span>
						</a>
					</li>
					@endcan

					@can('Add/Edit Role')
					<li class="role">
						<a href="{{url('role')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Role</span>
						</a>
					</li>
					@endcan

					@can('Doc Type & Code')
					<li class="role">
						<a href="{{url('application_type')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Application Types</span>
						</a>
					</li>
					@endcan

					@can('Doc Type & Code')
					<li class="role">
						<a href="{{url('doc_type_code')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Doc type & Code</span>
						</a>
					</li>
					@endcan

					@can('Speciality List')
					<li class="role">
						<a href="{{url('speciality')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Speciality List</span>
						</a>
					</li>
					@endcan

					@can('Consultant List')
					<li class="role">
						<a href="{{url('consultant')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Consultant List</span>
						</a>
					</li>
					@endcan

					@can('Speciality List')
					<li class="role">
						<a href="{{url('header')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Dashboard Settings</span>
						</a>
					</li>
					@endcan
					
					<!-- <li class="module_link">
						<a href="{{url('module_link')}}" class="waves-effect waves-dark">
							<span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
							<span class="pcoded-mtext">Module links</span>
						</a>
					</li> -->
				</ul>
			</li>
		</ul>
	</div>
</nav>