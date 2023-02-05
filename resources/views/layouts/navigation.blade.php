<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route('home') }}" class="waves-effect"><i class="mdi mdi-home-analytics"></i><span
                    class="badge badge-pill badge-primary float-right">7</span><span>Dashboard</span></a>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                    class="mdi mdi-table-merge-cells"></i><span>Master Data</span></a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('category.index') }}">Category</a></li>
                <li><a href="{{ route('product.index') }}">Produk</a></li>
                <li><a href="{{ route('user.index') }}">User</a></li>
                <li><a href="{{ route('member.index') }}">Member</a></li>
            </ul>
        </li>
    </ul>
</div>
<!-- Sidebar -->
