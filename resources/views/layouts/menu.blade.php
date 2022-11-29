<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>INICIO</p>
    </a>
</li>

{{--
<li class="nav-item">
    <a href="{{ route('prueba') }}" class="nav-link {{ Request::is('prueba') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>prueba</p>
    </a>
</li> --}}

<li class="nav-item menu-open">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-duotone fa-handshake"></i>
        <p>
                @php
                    echo $gbl_menus->name;
                @endphp
        </p>
        <i class="right fas fa-angle-left"></i>
    </a>

    <ul class="nav nav-treeview">


            @for ($i = 0; $i < sizeof($gbl_submenus); $i++)
                <li class="nav-item">
                    <a href="{{ $gbl_submenus[$i]['url'] }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            {{ $gbl_submenus[$i]['name'] }}
                       </p>
                    </a>
                </li>
            @endfor

    </ul>

        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-camera"></i>
            <p>
              SALA DE PRENSA
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ route('blogs.index') }}" class="nav-link {{ Request::is('blogs') ? 'active' : '' }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>GALERIA DE MEDIOS</p>
              </a>
            </li>
          </ul>

       {{--    <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ route('rol.index') }}" class="nav-link {{ Request::is('rol') ? 'active' : '' }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>ROLES Y PERFILES</p>
              </a>
            </li>
          </ul> --}}

        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-bars"></i>
            <p>
              MANTENIMIENTOS
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{ route('menus.index') }}" class="nav-link {{ Request::is('menus') ? 'active' : '' }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>CREACIÓN DE MENUS</p>
              </a>
            </li>


