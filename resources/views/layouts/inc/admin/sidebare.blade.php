<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #2874f0">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="mdi mdi-home menu-icon"style="color: white"></i>
          <span class="menu-title" style="color: white;font-weight:bold">Dashboard</span><br>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ url('admin/category') }}" class="nav-link">
            <i class="mdi mdi-menu menu-icon" style="color: white"></i>
                     <span class="menu-title" style="color: white;font-weight:bold">Catégories</span><br>

        </a>

      </li>
      <li class="nav-item">
        <a href="{{ url('admin/brands') }}" class="nav-link">
            {{-- <span class="mdi mdi-format-list-bulleted-square"></span> --}}
            <span class="mdi mdi-format-list-bulleted-square"style="color: white; font-size:20px"></span>
          <span class="menu-title" style="color: white;font-weight:bold">&nbsp; &nbsp;&nbsp;&nbsp;Marques</span>

        </a>

      </li>
      <li class="nav-item">
        <a href="{{ url('admin/colors') }}" class="nav-link">
            {{-- <span class="mdi mdi-format-list-bulleted-square"></span> --}}
            <span class="mdi mdi-palette" style="color: white; font-size:20px"></span>
          <span class="menu-title" style="color: white;font-weight:bold">&nbsp; &nbsp;&nbsp;&nbsp;Couleurs</span>

        </a>

      </li>
      <li class="nav-item">
        <a href="{{ url('admin/sizes') }}" class="nav-link">
            {{-- <span class="mdi mdi-format-list-bulleted-square"></span> --}}
            <span class="mdi mdi-image-size-select-actual" style="color: white; font-size:20px"></span>
          <span class="menu-title" style="color: white;font-weight:bold">&nbsp; &nbsp;&nbsp;&nbsp;Tailles</span>

        </a>

      </li>
      <li class="nav-item">
        <a href="{{ url('admin/products') }}" class="nav-link">
            <span class="mdi mdi-cart menu-icon" style="color: white;font-size:20px"></span>
          <span class="menu-title" style="color: white;font-weight:bold">&nbsp; &nbsp;&nbsp;&nbsp;Produits</span><br>

        </a>

      </li>
      <li class="nav-item">
        <a href="{{ url('admin/orders') }}" class="nav-link">
            {{-- <i class="fa-thin fa-list-radio"></i> --}}
            <i class="mdi mdi-menu menu-icon" style="color: white"></i>
            <span class="menu-title" style="color: white;font-weight:bold">Commandes</span><br>

        </a>

      </li>
      <li class="nav-item">
        <a href="{{ url('admin/users') }}" class="nav-link">
            {{-- <i class="fa-thin fa-list-radio"></i> --}}
            <i class="fa-solid fa-users" style="color: white"></i>
            <span class="menu-title" style="color: white;font-weight:bold">&nbsp; &nbsp;&nbsp;&nbsp;Users</span><br>

        </a>

      </li>
      <li class="nav-item">
        <a href="{{ url('admin/sliders') }}" class="nav-link">
            <span class="mdi mdi-home-group"style="color: white;font-size:20px"></span>

          <span class="menu-title" style="color: white;font-weight:bold">&nbsp; &nbsp;&nbsp;&nbsp;Sliders d'accueil</span><br>

        </a>

      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="pages/forms/basic_elements.html">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Catégories</span>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="pages/charts/chartjs.html">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Charts</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="documentation/documentation.html">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li> --}}
    </ul>
  </nav>
