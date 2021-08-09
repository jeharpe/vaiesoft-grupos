  <aside class="main-sidebar sidebar-ufps-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="">
      <img src="https://ww2.ufps.edu.co/public/imagenes/template/header/logo_ufps.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="width: 100%; opacity: .8; margin-bottom: 10px;">
      <!--span class="brand-text font-weight-light">VAIESOFT</span-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <b>{{ $sesion['nombre'] }}</b> - <a href="perfil-usuario">Editar</a>
                </h3>
                <p class="text-sm">{{ $sesion['tipo_usuario'] }}</p>
              </div>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Buscar">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if($sesion['tipo'] == 1 || $sesion['tipo'] == 2)
            @if($menu =='usuarios_sistema' || $menu =='usuarios_director')        
            <li class="nav-item menu-open"> 
              <a href="#" class="nav-link active">
            @else
            <li class="nav-item">
              <a href="#" class="nav-link">    
            @endif
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Gestión de Usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if($sesion['tipo'] == 1)
                <li class="nav-item">
                @if($menu =='usuarios_sistema')         
                  <a href="/usuarios-sistema"  class="nav-link nav-link2 active">
                @else
                  <a href="/usuarios-sistema" class="nav-link" >
                @endif
                    <i class="far fa-circle nav-icon"></i>
                    <p>Usuarios del sistema</p>
                  </a>
                </li>
                @endif
                <li class="nav-item">
                @if($menu =='usuarios_director')         
                  <a href="/usuarios-director"  class="nav-link nav-link2 active">
                @else
                  <a href="/usuarios-director" class="nav-link" >
                @endif
                    <i class="far fa-circle nav-icon"></i>
                    <p>Director de Grupo</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif

          <li class="nav-item">
          @if($menu =='gestion_grupos')         
            <a href="/gestion-grupos" class="nav-link active">
          @else
            <a href="/gestion-grupos" class="nav-link">    
          @endif
              <i class="nav-icon fas fa-th"></i>
              <p>
                Gestión Grupos
              </p>
            </a>
          </li>
          <li class="nav-item">
          @if($menu =='solicitud_horas')         
            <a href="/solicitud-horas" class="nav-link active">
          @else
            <a href="/solicitud-horas" class="nav-link">    
          @endif
              <i class="nav-icon fas fa-th"></i>
              <p>
                Solicitud de Horas
              </p>
            </a>
          </li>
          <li class="nav-item">
          @if($menu =='informe_gestion')         
            <a href="/informe-gestion" class="nav-link active">
          @else
            <a href="/informe-gestion" class="nav-link">    
          @endif
              <i class="nav-icon fas fa-th"></i>
              <p>
                Informe de Gestión
              </p>
            </a>
          </li>
          <li class="nav-item">
          @if($menu =='plan_accion')         
            <a href="/plan-accion" class="nav-link active">
          @else
            <a href="/plan-accion" class="nav-link">    
          @endif
              <i class="nav-icon fas fa-th"></i>
              <p>
                Plan de Acción
              </p>
            </a>
          </li>
          <li class="nav-item">
          @if($menu =='actividades')         
            <a href="/actividades" class="nav-link active">
          @else
            <a href="/actividades" class="nav-link">    
          @endif
              <i class="nav-icon fas fa-th"></i>
              <p>
                Act. Investigativas
              </p>
            </a>
          </li>
          <li class="nav-item">
          @if($menu =='investigadores')         
            <a href="/investigadores" class="nav-link active">
          @else
            <a href="/investigadores" class="nav-link">    
          @endif
              <i class="nav-icon fas fa-th"></i>
              <p>
                Investigadores
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
