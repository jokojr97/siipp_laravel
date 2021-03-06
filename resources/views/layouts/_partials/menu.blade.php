@if($user->roles[0]->name == "admin")
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview menu-open">
      <a href="/home" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
          RUP
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/rup" class="nav-link" style="padding-top: 0px;padding-bottom: 0px">
            <i class="nav-icon"></i>
            <p>Lihat RUP</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/rup/import/2020" class="nav-link" style="padding-top: 0px;">
            <i class=" nav-icon"></i>
            <p>Import</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>
          Tender
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/tender" class="nav-link" style="padding-top: 0px;padding-bottom: 0px">
            <i class=" nav-icon"></i>
            <p>Lihat Tender</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/tender/import/2020" class="nav-link" style="padding-top: 0px;">
            <i class=" nav-icon"></i>
            <p>Import</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>
          Non Tender
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/nontender/2020" class="nav-link" style="padding-top: 0px;padding-bottom: 0px">
            <i class=" nav-icon"></i>
            <p>Lihat Non Tender</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/nontender/import/2020" class="nav-link" style="padding-top: 0px;">
            <i class=" nav-icon"></i>
            <p>Import</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Peserta Lelang
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/peserta/2020" class="nav-link" style="padding-top: 0px;padding-bottom: 0px">
            <i class=" nav-icon"></i>
            <p>Lihat Peserta</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/peserta/import/2020" class="nav-link" style="padding-top: 0px;">
            <i class=" nav-icon"></i>
            <p>Import</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/progress" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
          Progress Pekerjaan
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/rup/proses/2020" class="nav-link">
        <i class="nav-icon fas fa-sync"></i>
        <p>
          Rup Proses
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/pra" class="nav-link">
        <i class="nav-icon fas fa-calculator"></i>
        <p>
          Hitung PRA
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/aspirasi" class="nav-link">
        <i class="nav-icon fas fa-comment"></i>
        <p>
          Aspirasi
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/users" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Users
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/profile/edit" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          My Profile
        </p>
      </a>
    </li>
    <li class="nav-header">Logout</li>
    <li class="nav-item">
      <a href="#" class="nav-link" onclick="myfunction()">
        <i class="nav-icon fas fa-power-off"></i>
        <p>Logout</p>
      </a>
      <form id="logout-form" action="/logout" method="POST" style="display: none">
      @csrf
      </form>
    </li>
  </ul>
</nav>

@elseif($user->roles[0]->name == "user")
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview menu-open">
      <a href="/home" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/aspirasi" class="nav-link">
        <i class="nav-icon fas fa-comment"></i>
        <p>
          Aspirasi
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/profile/edit" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          My Profile
        </p>
      </a>
    </li>
    <li class="nav-header">Logout</li>
    <li class="nav-item">
      <a href="#" class="nav-link" onclick="myfunction()">
        <i class="nav-icon fas fa-power-off"></i>
        <p>Logout</p>
      </a>
      <form id="logout-form" action="/logout" method="POST" style="display: none">
      @csrf
      </form>
    </li>
  </ul>
</nav>

@elseif($user->roles[0]->name == "adminsuper")
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview menu-open">
      <a href="/home" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
          RUP
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/rup" class="nav-link" style="padding-top: 0px;padding-bottom: 0px">
            <i class="nav-icon"></i>
            <p>Lihat RUP</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/rup/import/2020" class="nav-link" style="padding-top: 0px;">
            <i class=" nav-icon"></i>
            <p>Import</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>
          Tender
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/tender" class="nav-link" style="padding-top: 0px;padding-bottom: 0px">
            <i class=" nav-icon"></i>
            <p>Lihat Tender</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/tender/import/2020" class="nav-link" style="padding-top: 0px;">
            <i class=" nav-icon"></i>
            <p>Import</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>
          Non Tender
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/nontender/2020" class="nav-link" style="padding-top: 0px;padding-bottom: 0px">
            <i class=" nav-icon"></i>
            <p>Lihat Non Tender</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/nontender/import/2020" class="nav-link" style="padding-top: 0px;">
            <i class=" nav-icon"></i>
            <p>Import</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Peserta Lelang
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/peserta/2020" class="nav-link" style="padding-top: 0px;padding-bottom: 0px">
            <i class=" nav-icon"></i>
            <p>Lihat Peserta</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/{{$user->roles[0]->name}}/peserta/import/2020" class="nav-link" style="padding-top: 0px;">
            <i class=" nav-icon"></i>
            <p>Import</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/progress" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
          Progress Pekerjaan
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/rup/proses/2020" class="nav-link">
        <i class="nav-icon fas fa-sync"></i>
        <p>
          Rup Proses
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/pra" class="nav-link">
        <i class="nav-icon fas fa-calculator"></i>
        <p>
          Hitung PRA
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/aspirasi" class="nav-link">
        <i class="nav-icon fas fa-comment"></i>
        <p>
          Aspirasi
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/users" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Users
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/profile/edit" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          My Profile
        </p>
      </a>
    </li>
    <li class="nav-header">Logout</li>
    <li class="nav-item">
      <a href="#" class="nav-link" onclick="myfunction()">
        <i class="nav-icon fas fa-power-off"></i>
        <p>Logout</p>
      </a>
      <form id="logout-form" action="/logout" method="POST" style="display: none">
      @csrf
      </form>
    </li>
  </ul>
</nav>

@elseif($user->roles[0]->name == "relawan")
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview menu-open">
      <a href="/home" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/progress" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
          Progress Pekerjaan
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/aspirasi" class="nav-link">
        <i class="nav-icon fas fa-comment"></i>
        <p>
          Aspirasi
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/{{$user->roles[0]->name}}/profile/edit" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          My Profile
        </p>
      </a>
    </li>
    <li class="nav-header">Logout</li>
    <li class="nav-item">
      <a href="#" class="nav-link" onclick="myfunction()">
        <i class="nav-icon fas fa-power-off"></i>
        <p>Logout</p>
      </a>
      <form id="logout-form" action="/logout" method="POST" style="display: none">
      @csrf
      </form>
    </li>
  </ul>
</nav>

@endif