@if (Auth::check())
    <aside class="sidebar">
        <div class="sidebar-start">
            <div class="sidebar-head">
                <a href="/" class="logo-wrapper" title="Home">
                    <span class="sr-only">Home</span>
                    <span class="icon logo" aria-hidden="true"></span>
                    <div class="logo-text">
                        <span class="logo-title">ERP</span>
                    
                    </div>

                </a>
                <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                    <span class="sr-only">Toggle menu</span>
                    <span class="icon menu-toggle" aria-hidden="true"></span>
                </button>
            </div>
            <div class="sidebar-body">
                <ul class="sidebar-body-menu">
                    <li>
                        <a class="{{ request()->routeIs('home*') ? 'active' : '' }}" href="/"><span
                                class="icon home" aria-hidden="true"></span>{{__('message.Dashboard')}}</a>
                    </li>
                    <li>
                        <a class="show-cat-btn {{ request()->routeIs('dashboard*') ? 'active' : '' }}" href="##">
                            <span class="icon user-3" aria-hidden="true"></span>{{__('message.Hr')}}
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a class="{{ request()->routeIs('dashboard.department*') ? 'active' : '' }}"
                                    href="{{ route('dashboard.department') }}"> {{__('message.Department')}}</a>
                            </li>
                            <li>
                                <a class="{{ request()->routeIs('dashboard.employee*') ? 'active' : '' }}"
                                    href="/Dashboard/employee">{{__('message.Employee')}}</a>
                            </li>
                            <li>
                                <a class="{{ request()->routeIs('dashboard.user*') ? 'active' : '' }}"
                                    href="{{ route('dashboard.user') }}">{{__('message.User')}}</a>
                            </li>
                            <li>
                                <a class="{{ request()->routeIs('dashboard.customer*') ? 'active' : '' }}"
                                    href="{{ route('dashboard.customer') }}">{{__('message.Customer')}}</a>
                            </li>
                            <li>
                                <a class="{{ request()->routeIs('dashboard.supplier*') ? 'active' : '' }}"
                                    href="{{ route('dashboard.supplier') }}">{{__('message.Supplier')}}</a>
                            </li>
                            <li>
                                <a class="{{ request()->routeIs('dashboard.deliver*') ? 'active' : '' }}"
                                    href="{{ route('dashboard.deliver') }}">{{__('message.Deliver')}}</a>
                            </li>
                            <li>
                                <a class="{{ request()->routeIs('dashboard.vender*') ? 'active' : '' }}"
                                    href="{{ route('dashboard.vender') }}">{{__('message.vender')}}</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a class="show-cat-btn" href="##">
                            <span class="icon folder" aria-hidden="true"></span>Categories
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a href="categories.html">All categories</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="show-cat-btn" href="##">
                            <span class="icon image" aria-hidden="true"></span>Media
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a href="media-01.html">Media-01</a>
                            </li>
                            <li>
                                <a href="media-02.html">Media-02</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="show-cat-btn" href="##">
                            <span class="icon paper" aria-hidden="true"></span>Pages
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a href="pages.html">All pages</a>
                            </li>
                            <li>
                                <a href="new-page.html">Add new page</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="comments.html">
                            <span class="icon message" aria-hidden="true"></span>
                            Comments
                        </a>
                        <span class="msg-counter">7</span>
                    </li>
                </ul>
                <span class="system-menu__title">system</span>
                <ul class="sidebar-body-menu">
                    <li>
                        <a href="appearance.html"><span class="icon edit" aria-hidden="true"></span>Appearance</a>
                    </li>
                    <li>
                        <a class="show-cat-btn" href="##">
                            <span class="icon category" aria-hidden="true"></span>Extentions
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a href="extention-01.html">Extentions-01</a>
                            </li>
                            <li>
                                <a href="extention-02.html">Extentions-02</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="show-cat-btn" href="##">
                            <span class="icon user-3" aria-hidden="true"></span>Users
                            <span class="category__btn transparent-btn" title="Open list">
                                <span class="sr-only">Open list</span>
                                <span class="icon arrow-down" aria-hidden="true"></span>
                            </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a href="users-01.html">Users-01</a>
                            </li>
                            <li>
                                <a href="users-02.html">Users-02</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="##"><span class="icon setting" aria-hidden="true"></span>Settings</a>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="sidebar-footer">
            <a href="##" class="sidebar-user">
                <span class="sidebar-user-img">
                    <picture>
                        <source srcset="{{ asset('img/avatar/avatar-illustrated-01.webp') }}" type="image/webp"><img
                            src="{{ asset('img/avatar/avatar-illustrated-01.png') }}" alt="User name">
                    </picture>
                </span>
                <div class="sidebar-user-info">
                    <span class="sidebar-user__title">Sanchitha.</span>
                    <span class="sidebar-user__subtitle">manager</span>
                </div>
            </a>
        </div>
    </aside>
@endif