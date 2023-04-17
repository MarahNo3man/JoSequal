 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">

     <div data-simplebar class="h-100">

         <!-- User details -->
         <div class="user-profile text-center mt-3">
             <div class="mt-3">
                 <h4 class="font-size-16 mb-1">{{ Auth::user()->name ?? '' }}</h4>

             </div>
         </div>

         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Menu</li>

                 <li>
                     <a href="{{ route('admin.home') }}" class="waves-effect">
                         <i class="ri-dashboard-line"></i>
                         <span>Dashboard</span>
                     </a>
                 </li>

                 <li>
                     <a href="{{ route('admin.index-companies') }}" class="waves-effect">
                        <i class="ri-building-2-line"></i>
                         <span>Company</span>
                     </a>
                 </li>

                 <li>
                    <a href="{{ route('admin.index-employees') }}" class="waves-effect">
                       <i class="ri-building-2-line"></i>
                        <span>Employee</span>
                    </a>
                </li>





             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
 <!-- Left Sidebar End -->
