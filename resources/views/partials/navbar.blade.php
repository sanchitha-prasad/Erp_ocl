@if(Auth::check())
<nav class="main-nav--bg">
            <div class="container main-nav">
                <div class="main-nav-start">
                    <!-- <div class="search-wrapper">
                        <i data-feather="search" aria-hidden="true"></i>
                        <input type="text" placeholder="Enter keywords ..." required>
                    </div> -->
                </div>
                <div class="main-nav-end">
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only">Toggle menu</span>
                        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                    </button>
                   
                    

                    <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                        <span class="sr-only">Switch theme</span>
                        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
                    </button>
                  
                    <div class="nav-user-wrapper">
                        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                            <span class="sr-only">My profile</span>
                            <span class="nav-user-img">
                                <picture>
                                    <source srcset="{{asset('img/avatar/avatar-illustrated-02.webp')}}" type="image/webp"><img
                                        src="{{asset('/img/avatar/avatar-illustrated-02.png')}}" alt="User name"></picture>
                            </span>
                        </button>
                        <ul class="users-item-dropdown nav-user-dropdown dropdown">
                            <li><a href="/Dashboard/profile">
                                    <i data-feather="user" aria-hidden="true"></i>
                                    <span>{{__('message.profile')}}</span>
                                </a></li>
                            <li><a href="##">
                                    <i data-feather="settings" aria-hidden="true"></i>
                                    <span>{{__('message.setting')}}</span>
                                </a></li>
                            <li>
                                <a class="danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                    <i data-feather="log-out" aria-hidden="true"></i>
                                    <span>{{__('message.logout')}}</span>
                                </a>    
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                </li>
                                
                        </ul>
                        
                    </div>
                    <div class="notification-wrapper">
                    
                        <a id="navbarDropdown" class="nav-link dropdown-btn" href="#" 
                           type="button"  >
                            {{ Config::get('languages')[App::getLocale()]}}
                           
                            <span class="caret"></span>
                        </a>
                       
                        
                        <ul class="users-item-dropdown notification-dropdown dropdown">
                            <li>
                                @foreach(Config::get('languages') as $lang =>$language)
                                @if($lang != App::getLocale())
                                <a href="{{route('lang.switch',$lang)}}">{{$language}}</a>
                                @endif
                                @endforeach
                            </li>
                         
                             
                          
                        </ul>
                    </div> 
                </div>
            </div>
        </nav>
        @endif