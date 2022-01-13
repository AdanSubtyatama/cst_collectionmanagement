<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">CST_C_MANAGEMENT</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Navigasi Item</li>
            {{-- <li class="active"><a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="far fa-square"></i> <span>Dashboard Page</span></a></li>
            <li class="menu-header">Main Data</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Preferensi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('branch') }}">Data Cabang</a></li>
                    <li><a class="nav-link" href="{{ route('business-collector') }}">Data Collector</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('business-officer') }}">Data Officer</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Utility</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('user') }}">Data System User</a></li>
                    <li><a class="nav-link" href="">Pengaturan Menu</a></li>
                </ul>
            </li> --}}
            @foreach (session()->get('single_menu') as $single_menu_item)
                <li class="active"><a class="nav-link" href="{{ url($single_menu_item->link) }}"><i
                            class="far fa-square"></i> <span>{{ $single_menu_item->text }}</span></a></li>
            @endforeach

            @foreach (session()->get('main_dropdown_menu') as $main_dropdown_menu_item)
                <li class="dropdown">
                    <a href="" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                        <span>{{ $main_dropdown_menu_item->text }}</span></a>
                    <ul class="dropdown-menu">
                        @foreach (session()->get('submain_dropdown_menu') as $submain_dropdown_menu_item)
                        @if($main_dropdown_menu_item->id_menu == substr ($submain_dropdown_menu_item->id_menu, 0, 1))
                        <li class="dropdown">
                            <a class="nav-link" data-toggle="dropdownini"><span>{{ $submain_dropdown_menu_item->text }}</span></a>
                                <ul class="dropdown-menu" style="display: block;">
                                    @foreach (session()->get('submain_dropdown_menu_item') as $submain_dropdown_menu_item)
                                        <li><a href="{{ url($submain_dropdown_menu_item->link) }}">{{$submain_dropdown_menu_item->text  }}</a>
                                        </li>                                        
                                    @endforeach
                                    
                                </ul>
                                @endif

                            </li>
                            @foreach (session()->get('dropdown_menu_item') as $dropdown_menu_item)
                                @if($main_dropdown_menu_item->id_menu == substr ($dropdown_menu_item->id_menu, 0, 1))
                                    <li class="active"><a class="nav-link"
                                        href="{{ url($dropdown_menu_item->link) }}">
                                        <span>{{ $dropdown_menu_item->text }} </span></a></li>
                                @endif
                            @endforeach
                    </ul>
                </li>
            @endforeach
            @endforeach


            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Documentation
                </a>
            </div>
    </aside>
</div>

{{--  <li>
                                <div class="btn-group dropright">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropright
                                    </a>
                                    <div class="dropdown-menu dropright" style="z-index:99">
                                    @foreach (session()->get('submain_dropdown_menu_item') as $submain_dropdown_menu_item)
                                    <a class="dropdown-item" style="z-index:99" href="#">Action</a>                             
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            </li> --}}