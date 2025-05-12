 <!-- main-sidebar -->
        <div class="sticky sticky-pin" style="margin-bottom: -63px;">
					<aside class="app-sidebar ps ps--active-y horizontal-main">
						<div class="main-sidebar-header active">
							<a class="header-logo active" href="javascript:void();">
								<img src="{{url('admin/assets/img/brand/logo.png')}}" class="main-logo  desktop-logo" alt="logo">
								<img src="{{url('admin/assets/img/brand/logo-white.png')}}" class="main-logo  desktop-dark" alt="logo">
								<img src="{{url('admin/assets/img/brand/favicon.png')}}" class="main-logo  mobile-logo" alt="logo">
								<img src="{{url('admin/assets/img/brand/favicon-white.png')}}" class="main-logo  mobile-dark" alt="logo">
							</a>
						</div>
						<div class="main-sidemenu is-expanded container">
							<div class="slide-left disabled active d-none" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg></div>
							<ul class="side-menu open" style="margin-right: 0px; flex-wrap: nowrap; margin-left: 0px;">
								<li class="side-item side-item-category">Main</li>
								<!-- <li class="slide">
									<a class="side-menu__item active is-expanded" data-bs-toggle="slide" href="{{url('admin/home')}}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"></path></svg><span class="side-menu__label">Dashboards</span><i class="angle fe fe-chevron-right"></i></a>
									<ul class="slide-menu" style="">
										<li class="side-menu__label1"><a href="{{url('admin/home')}}">Dashboard</a></li>
									</ul>
								</li> --> 
								<li class="slide">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
										<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" 
										viewBox="0 0 24 24">
										<path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"></path>
									</svg>
									<span class="side-menu__label">Users</span><i class="angle fe fe-chevron-right"></i></a>
									<ul class="slide-menu">
										<li><a class="slide-item" href="{{route('userdetails')}}">All Users</a></li>										
									</ul>
								</li>
								 
								<li class="slide">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
										<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
											<path d="M22 7.999a1 1 0 0 0-.516-.874l-9.022-5a1.003 1.003 0 0 0-.968 0l-8.978 4.96a1 1 0 0 0-.003 1.748l9.022 5.04a.995.995 0 0 0 .973.001l8.978-5A1 1 0 0 0 22 7.999zm-9.977 3.855L5.06 7.965l6.917-3.822 6.964 3.859-6.918 3.852z"/><path d="M20.515 11.126 12 15.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"/><path d="M20.515 15.126 12 19.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"/></svg>
									<span class="side-menu__label">Leads</span><i class="angle fe fe-chevron-right"></i></a>
									<ul class="slide-menu">
										<li><a class="slide-item" href="{{route('applycreditcard')}}">Apply Credit Card</a></li> 
										<li><a class="slide-item" href="{{route('apply_werize_loan')}}">Apply Werize Personal Loan</a></li>
										<li><a class="slide-item" href="{{route('lead_details')}}">All Lead</a></li>

										<!-- <li><a class="slide-item" href="{{route('lead_user_aotp')}}">Only User Get OTP </a></li> -->
										<li><a class="slide-item" href="{{route('usergetotppage')}}">User Get Otp Page </a></li>
										<li><a class="slide-item" href="{{route('mailsection')}}"> Mail Section</a></li>

									</ul>
								</li>
								<li class="slide">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
										<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" 
										viewBox="0 0 24 24">
										<path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"></path>
									</svg>
									<span class="side-menu__label">Api</span><i class="angle fe fe-chevron-right"></i></a>
									<ul class="slide-menu">
										<li><a class="slide-item" href="{{route('allapi')}}">All Api's</a></li>		
										<li><a class="slide-item" href="">Standard chartered</a></li>								
									</ul>
								</li>
								<li class="slide">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
										<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" 
										viewBox="0 0 24 24">
										<path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"></path>
									</svg>
									<span class="side-menu__label">Catalog</span><i class="angle fe fe-chevron-right"></i></a>
									<ul class="slide-menu">
										<li><a class="slide-item" href="{{route('category')}}">Category</a></li>
										<li><a class="slide-item" href="{{route('page')}}">Pages</a></li>
										<li><a class="slide-item" href="{{route('applypage')}}">Apply Pages</a></li>
										<li><a class="slide-item" href="{{route('contentpage')}}">Fix Content Page</a></li>
										<li><a class="slide-item" href="{{route('staticpage')}}">Static Page</a></li>
									</ul>
								</li>

								<li class="slide">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
										<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" 
										viewBox="0 0 24 24">
										<path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"></path>
									</svg>
									<span class="side-menu__label">Setting</span><i class="angle fe fe-chevron-right"></i></a>
									<ul class="slide-menu">
										<li><a class="slide-item" href="{{route('menu')}}">Header Menu</a></li>
										<li><a class="slide-item" href="{{route('footerlink')}}">Footer Link</a></li>
										<li><a class="slide-item" href="{{route('partner')}}">Partners</a></li>
										<li><a class="slide-item" href="{{route('video')}}">Video</a></li>
										<li><a class="slide-item" href="{{route('testimonial')}}">Testimonial</a></li>
										<li><a class="slide-item" href="{{route('index')}}">Gallery</a></li>	
										<li><a class="sub-side-menu__item" href="{{route('profession_type')}}">Profession Type</a></li>
										<li><a class="sub-side-menu__item" href="{{route('qualification')}}">Qualification</a></li>
										<li><a class="sub-side-menu__item" href="{{route('name_title')}}">Name Title</a></li>
										<li><a class="sub-side-menu__item" href="{{route('bank')}}">Bank</a></li>
										<li><a class="sub-side-menu__item" href="{{route('calculator')}}">Calculator</a></li>									
									</ul>
								</li> 
								 
								<li class="slide">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
										<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
										<path d="M22 7.999a1 1 0 0 0-.516-.874l-9.022-5a1.003 1.003 0 0 0-.968 0l-8.978 4.96a1 1 0 0 0-.003 1.748l9.022 5.04a.995.995 0 0 0 .973.001l8.978-5A1 1 0 0 0 22 7.999zm-9.977 3.855L5.06 7.965l6.917-3.822 6.964 3.859-6.918 3.852z"/><path d="M20.515 11.126 12 15.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"/><path d="M20.515 15.126 12 19.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"/></svg>
										<span class="side-menu__label">Company</span><i class="angle fe fe-chevron-right"></i>
									</a>
									<ul class="slide-menu">
										<li><a class="sub-side-menu__item" href="{{route('company')}}">Company</a></li>
										<li><a class="sub-side-menu__item" href="{{route('company_type')}}">Company Type</a></li>
										<li><a class="sub-side-menu__item" href="{{route('work_type')}}">Work Type</a></li>
										<li><a class="sub-side-menu__item" href="{{route('employee_type')}}">Employee Type</a></li>
										<li><a class="sub-side-menu__item" href="{{route('industry')}}">Industry</a></li>
										<li><a class="sub-side-menu__item" href="{{route('occupation')}}">Occupation</a></li>
										<li><a class="sub-side-menu__item" href="{{route('work_experience')}}">Work Experience</a></li>
									</ul>
								</li>
								<li class="slide">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
										<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
										<path d="M22 7.999a1 1 0 0 0-.516-.874l-9.022-5a1.003 1.003 0 0 0-.968 0l-8.978 4.96a1 1 0 0 0-.003 1.748l9.022 5.04a.995.995 0 0 0 .973.001l8.978-5A1 1 0 0 0 22 7.999zm-9.977 3.855L5.06 7.965l6.917-3.822 6.964 3.859-6.918 3.852z"/><path d="M20.515 11.126 12 15.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"/><path d="M20.515 15.126 12 19.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"/></svg>
										<span class="side-menu__label">Location</span><i class="angle fe fe-chevron-right"></i>
									</a>
									<ul class="slide-menu">
										<li><a class="sub-side-menu__item" href="{{route('state')}}">State</a></li>
										<li><a class="sub-side-menu__item" href="{{route('district')}}">District</a></li>
										<li><a class="sub-side-menu__item" href="{{route('residence_type')}}">Residence Type</a></li>
									</ul>
								</li>
								 
								<li class="slide">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
										<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
											<path d="M22 7.999a1 1 0 0 0-.516-.874l-9.022-5a1.003 1.003 0 0 0-.968 0l-8.978 4.96a1 1 0 0 0-.003 1.748l9.022 5.04a.995.995 0 0 0 .973.001l8.978-5A1 1 0 0 0 22 7.999zm-9.977 3.855L5.06 7.965l6.917-3.822 6.964 3.859-6.918 3.852z"/><path d="M20.515 11.126 12 15.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"/><path d="M20.515 15.126 12 19.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"/></svg>
											<span class="side-menu__label">Frenchise</span><i class="angle fe fe-chevron-right"></i></a>
									<ul class="slide-menu">
										<li><a class="slide-item" href="{{route('frenchise_view')}}">Frenchise Inquiry</a></li>
									</ul>
								</li>
								<li class="slide">
									<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
										<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
											<path d="M22 7.999a1 1 0 0 0-.516-.874l-9.022-5a1.003 1.003 0 0 0-.968 0l-8.978 4.96a1 1 0 0 0-.003 1.748l9.022 5.04a.995.995 0 0 0 .973.001l8.978-5A1 1 0 0 0 22 7.999zm-9.977 3.855L5.06 7.965l6.917-3.822 6.964 3.859-6.918 3.852z"/><path d="M20.515 11.126 12 15.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"/><path d="M20.515 15.126 12 19.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"/></svg>
											<span class="side-menu__label">Admin Management</span><i class="angle fe fe-chevron-right"></i></a>
									<ul class="slide-menu">
										<li><a class="slide-item" href="{{route('addUsers')}}">Admin Users</a></li>
										
									</ul>
								</li>
								

							<div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg></div>
						</div>
					<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 577px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 373px;"></div></div></aside>
				</div>
        <!-- main-sidebar -->