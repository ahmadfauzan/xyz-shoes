<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">

        <div class="sidebar-brand-text mx-3">XYZ ADMIN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $menu == 'dashboard' ? 'active' : ''}}">
        <a class="nav-link" href="/admin/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  {{ $menu == 'product' ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-shoe-prints"></i>
                <span>Manage Product</span>
        </a>
        <div id="collapsePages" class="collapse {{ $menu == 'product' ? 'show' : ''}}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $active == 'category' ? 'active' : '' }}" href="{{ route('category.index') }}">Category</a>
                <a class="collapse-item  {{ $active == 'type_size' ? 'active' : '' }}" href="{{ route('type_size.index') }}">Type Size</a>
                    <a class="collapse-item {{ $active == 'product' ? 'active' : '' }}" href="{{ route('product.index') }}">Product</a>
                    <a class="collapse-item {{ $active == 'gallery' ? 'active' : '' }}" href="{{ route('gallery.index') }}">Gallery</a>
            </div>
        </div>
    </li> 


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  {{ $menu == 'discount' ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
                        aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-tags"></i>
                <span>Manage Discount</span>
        </a>
        <div id="collapsePages2" class="collapse  {{ $menu == 'discount' ? 'show' : ''}}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $active == 'discount' ? 'active' : '' }}" href="{{ route('discount.index') }}">Discount</a>
                <a class="collapse-item {{ $active == 'flash_sale' ? 'active' : '' }}" href="{{ route('flash_sale.index') }}">Flash Sale</a>
            </div>
        </div>
    </li> 


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  {{ $menu == 'transaction' ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
                        aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-credit-card"></i>
                <span>Manage Transaction</span>
        </a>
        <div id="collapsePages3" class="collapse {{ $menu == 'transaction' ? 'show' : ''}}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ $active == 'transaction' ? 'active' : '' }}" href="{{ route('transaction.index') }}">Transaction</a>
                <a class="collapse-item {{ $active == 'donation' ? 'active' : '' }}" href="{{ route('donation.index') }}">Donation</a>
            </div>
        </div>
    </li> 


    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
