@if(session()->get('role')==1)
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu Admin</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home </a>
            </li>
            <li><a href="{{url('admin/anggota')}}"><i class="fa fa-home"></i>Anggota</a>
            </li>
            <li><a><i class="fa fa-home"></i> Home </a>
            </li>
            <li><a><i class="fa fa-home"></i> Home </a>
            </li>
            
        </ul>
    </div>
    

</div>
@elseif(session()->get('role')==2)
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<div class="menu_section">
        <h3>Menu Sekretaris</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home </a>
            </li>
            <li><a><i class="fa fa-home"></i> Home </a>
            </li>
            <li><a><i class="fa fa-home"></i> Home </a>
            </li>
            <li><a><i class="fa fa-home"></i> Home </a>
            </li>
            
        </ul>
    </div>

</div>
@endif