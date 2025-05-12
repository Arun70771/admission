<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <!-- <li class="nav-item nav-category">Main Menu</li> -->
            <li class="nav-item mt-2">
              <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="reports">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Reports</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="reports">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.reports.programmes')}}">Programmes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.reports.virtual')}}">Virtual Campus</a>
                  </li>

                  <!-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.reports.results')}}">Results</a>
                  </li> -->

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.reports.country')}}">Country</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.reports.day')}}">Day</a>
                  </li> 

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.reports.day')}}">Course</a>
                  </li> 


                </ul>
              </div>
            </li>



            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#OfferLatter" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Offer Letter</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="OfferLatter">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.offer.rejected') }}">Rejected</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.offer.documents') }}">Documents</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.offer.level1') }}">Level 1</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.offer.level2') }}">Level 2</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('admin.offer.send') }}">Send Offer Letter</a></li>

                </ul>
              </div>
            </li>



            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#Payments" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Payments</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Payments">
                <ul class="nav flex-column sub-menu">
                 
                <li class="nav-item"><a class="nav-link" href="admin/pages/samples/error-500.html"> Enabled Payments Link </a></li>
                <li class="nav-item"><a class="nav-link" href="admin/pages/samples/error-500.html"> UnPaid</a></li>
                <li class="nav-item"><a class="nav-link" href="admin/pages/samples/error-500.html"> Paid</a></li>

                </ul>
              </div>
            </li>


            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#Payments" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Entrance Mode</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="Payments">
                <ul class="nav flex-column sub-menu">
                 
                  <li class="nav-item">
                    <a class="nav-link" href=" route('entrance-mode.selected-candidate')"> Selected Candidate </a>
                </li>
                

                </ul>
              </div>
            </li>



          
          </ul>
        </nav>