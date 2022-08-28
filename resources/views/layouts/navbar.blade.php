<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">MTD Arsip</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class="bi bi-chevron-double-left"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <div class="search-toggle-icon d-xl-none ms-auto">
                <i class="bi bi-search"></i>
            </div>
            <form class="searchbar d-none d-xl-flex">
                <input class="form-control" type="text" placeholder="Filter">
                <div class="position-absolute top-50 translate-middle-y d-block d-xl-none search-close-icon"><i class="bi bi-x-lg"></i></div>
            </form>
        </li>
        @if ($menus)
            @foreach ($menus as $menu)
                @if ($menu->parent == 0)
                    <li>
                        <a href="{{ $menu->url }}">
                            <div class="parent-icon"><i class="{{ $menu->icon }}"></i>
                            </div>
                            <div class="menu-title">{{ $menu->title }}</div>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="{{ $menu->icon }}"></i>
                            </div>
                            <div class="menu-title">{{ $menu->title }}</div>
                        </a>
                        <ul>
                            @if ($menu->submenus)
                                @foreach ($menu->submenus as $submenu)
                                    <li> <a href="{{ $submenu->url }}"><i class="{{ $submenu->icon }}"></i>{{ $submenu->title }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
    <!--end navigation-->
</aside>