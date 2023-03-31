<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}"><i class="fas fa-th-large"></i> <span>Dashboard </span></a>
                </li>
                @if(Auth::user()->user_id == 'superadmin')
                <li class="submenu">
                    <a href="#"><i class="fa fa-cog"></i> <span> Pengaturan Aplikasi </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        {{-- from CustomProvider --}}
                        @foreach ($menuadminsetting->where('route_category','superadmin') as $item_menu)
                        <li><a class="{{ (request()->is($item_menu->route)) ? 'active' : '' }}" href="{{ ($item_menu->route =='') ? '' : route($item_menu->route) }}">{{ $item_menu->route_name }}</a></li>
                        @endforeach        
                    </ul>
                </li>
                @endif           
               
                <li class="menu-title">Administrator</li>
                @if(Auth::User()->user_id == 'superadmin')
                {{-- from CustomProvider --}}
                @foreach ($menuadminsetting->where('route_category','admin') as $item_menu_general)
                <li>
                    {{-- <a href="{{ route($item_menu_general->route) }}" class="{{ (request()->is($item_menu_general->route)) ? 'active' : '' }}"><i class="{{ $item_menu_general->route_icon }}"></i><span>{{ $item_menu_general->route_name }}</span></a> --}}
                    <a href="{{ ($item_menu_general->route !='')? route($item_menu_general->route) : '' }}" class="{{ (request()->is($item_menu_general->route)) ? 'active' : '' }}"><i class="{{ $item_menu_general->route_icon }}"></i><span>{{ $item_menu_general->route_name }}</span></a>
                </li>  
                @endforeach
                @else
                {{-- from CustomProvider --}}
                
                @foreach ($menuusersetting->where('role',Auth::User()->user_role) as $item_menu_general)
                <li>
                    
                    <a href="{{ route($item_menu_general->route) }}" class="{{ (request()->is($item_menu_general->route)) ? 'active' : '' }}"><i class="{{ $item_menu_general->route_icon }}"></i><span>{{ $item_menu_general->route_name }}</span></a>
                </li>  
                @endforeach
                @endif
                <li class="menu-title">Menu</li>
                @if(Auth::User()->user_id == 'superadmin')
                {{-- from CustomProvider --}}
                @foreach ($menuadminsetting->where('route_category','general') as $item_menu_general)
                <li>
                    {{-- <a href="{{ route($item_menu_general->route) }}" class="{{ (request()->is($item_menu_general->route)) ? 'active' : '' }}"><i class="{{ $item_menu_general->route_icon }}"></i><span>{{ $item_menu_general->route_name }}</span></a> --}}
                    <a href="{{ ($item_menu_general->route !='')? route($item_menu_general->route) : '' }}" class="{{ (request()->is($item_menu_general->route)) ? 'active' : '' }}"><i class="{{ $item_menu_general->route_icon }}"></i><span>{{ $item_menu_general->route_name }}</span></a>
                </li>  
                @endforeach
                @else
                {{-- from CustomProvider --}}
                
                @foreach ($menuusersetting2->where('role',Auth::User()->user_role) as $item_menu_general2)
                <li>
                    
                    <a href="{{ route($item_menu_general2->route) }}" class="{{ (request()->is($item_menu_general2->route)) ? 'active' : '' }}"><i class="{{ $item_menu_general2->route_icon }}"></i><span>{{ $item_menu_general2->route_name }}</span></a>
                </li>  
                @endforeach
                @endif
              
                {{-- <li>
                </li>  
                <li>
                    <a href="doctors.html"><i class="fa-sharp fa-solid fa-user"></i><span>Users</span></a>
                </li>  
                <li>
                    <a href="doctors.html"><i class="fa-sharp fa-solid fa-book"></i><span>Petunjuk Teknis</span></a>
                </li>  
                <li>
                    <a href="patients.html"><i class="far fa-chart-bar"></i> <span>Performance Report</span></a>
                </li>
                <li>
                    <a href="appointments.html"><i class="fas fa-balance-scale"></i> <span>Balanced Scorecard</span></a>
                </li>
                <li>
                    <a href="schedule.html"><i class="fas fa-assistive-listening-systems"></i> <span>Indikator</span></a>
                </li>
                <li>
                    <a href="departments.html"><i class="far fa-smile"></i> <span>Pemanfaatan Layanan</span></a>
                </li>
                <li>
                    <a href="departments.html"><i class="fas fa-car-crash"></i> <span>Insiden</span></a>
                </li>
                <li>
                    <a href="departments.html"><i class="far fa-question-circle"></i> <span>Angket</span></a>
                </li> --}}
             
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>