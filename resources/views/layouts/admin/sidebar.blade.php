<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{route('home')}}">Tanaman Store</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('home')}}">TS</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="dropdown {{ request()->is('home') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          <li class="{{ request()->is('home') ? 'active' : '' }}"><a class="nav-link" href="{{route('home')}}">Dashboard</a></li>
        </ul>
      </li>
      <li class="menu-header">Master</li>
      <li class="{{ request()->is('users') ? 'active' : '' }}"><a class="nav-link" href="{{route('users.index')}}"><i class="far fa-user"></i> <span>Users</span></a></li>
      <li class="{{ request()->is('plants') ? 'active' : '' }}"><a class="nav-link" href="{{route('plants.index')}}"><i class="fas fa-seedling"></i> <span>Tanaman</span></a></li>
      <li class="{{ request()->is('transactions') ? 'active' : '' }}"><a class="nav-link" href="{{route('transactions.index')}}"><i class="fas fa-money-bill-wave"></i> <span>Transaksi</span></a></li>
      <li class="{{ request()->is('plantcares') ? 'active' : '' }}"><a class="nav-link" href="{{route('plantCares.index')}}"><i class="fas fa-seedling"></i> <span>Tanaman Care</span></a></li>
    </ul>
  </aside>
</div>