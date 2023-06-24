  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
          <a class="nav-link" href="{{ Route('dashboard') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Interface
      </div>

      <!-- Nav Item - Stations-->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stations"
              aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-solid fa-city"></i>
              <span>Stations</span>
          </a>
          <div id="stations" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Station Management</h6>
                  <a class="collapse-item" href="{{ Route('stations.create') }}">Add Station</a>
                  <a class="collapse-item" href="{{ Route('stations.index') }}">All Stations</a>
              </div>
          </div>
      </li>

      <!-- Nav Item - Buses-->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#buses" aria-expanded="true"
              aria-controls="collapseTwo">
              <i class="fas fa-solid fa-bus"></i> <span>Buses</span>
          </a>
          <div id="buses" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Buses Management</h6>
                  <a class="collapse-item" href="{{ Route('buses.create') }}">Add Bus</a>
                  <a class="collapse-item" href="{{ Route('buses.index') }}">All Buses</a>
              </div>
          </div>
      </li>

      <!-- Nav Item - Trips -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#trips" aria-expanded="true"
              aria-controls="collapseTwo">
              <i class="fas fa-solid fa-plane"></i>
              <span>Trips</span>
          </a>
          <div id="trips" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Trips Management</h6>
                  <a class="collapse-item" href="{{ Route('trips.create') }}">Add Trip</a>
                  <a class="collapse-item" href="{{ Route('trips.index') }}">All Trips</a>
              </div>
          </div>
      </li>

      <!-- Nav Item - Trips -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#trip_cost"
              aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-solid fa-credit-card"></i>
              <span>Trip Cost</span>
          </a>
          <div id="trip_cost" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Trip Cost Management</h6>
                  <a class="collapse-item" href="{{ Route('trip_cost.create') }}">Add Trip Cost</a>
                  <a class="collapse-item" href="{{ Route('trip_cost.index') }}">All Trips Cost</a>
              </div>
          </div>
      </li>

      <!-- Nav Item - Seats -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#seats" aria-expanded="true"
              aria-controls="collapseTwo">

              <i class="fas fa-solid fa-person-seat"></i>
              {{-- <i class="fa-solid fa-seat-airline"></i> --}}
              {{-- <i class="fa-solid fa-chair-office"></i> --}}
              <span>Seats</span>
          </a>
          <div id="seats" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Seats Management</h6>
                  <a class="collapse-item" href="{{ Route('seats.create') }}">Add Seat</a>
                  <a class="collapse-item" href="{{ Route('seats.index') }}">All Seats</a>
              </div>
          </div>
      </li>

      

     


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>



  </ul>
  <!-- End of Sidebar -->
