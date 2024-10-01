<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
    <div class="sidebar-brand">
        <img src="/assets/img/logo-site.png" width="130px" class="sidebar-brand-full" alt="logo" />
        <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
            <use xlink:href="/assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
    <button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="cil-view-quilt nav-icon"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.home.slider')}}">
            <i class="cil-house nav-icon"></i>  Home
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.reservations')}}">
            <i class="cil-check-circle nav-icon"></i> Reservation
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.timeslots')}}">
            <i class="cil-av-timer nav-icon"></i> Time Slots
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.about')}}">
           <i class="cil-info nav-icon"></i> About Us
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.services')}}">
            <i class="cil-handshake nav-icon"></i>Services
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.blogs')}}">
            <i class="cil-bullhorn nav-icon"></i> Blogs
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.users')}}">
            <i class="cil-people nav-icon"></i> Users
        </a>
    </li>
    <li class="nav-group">
        <a class="nav-link nav-group-toggle" href="javascript:void(0)">
            <i class="cil-cog nav-icon"></i> Others
        </a>
        <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><span class="nav-icon"><span class="nav-icon-bullet"></span></span>Banner Section</a></li>
            <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><span class="nav-icon"><span class="nav-icon-bullet"></span></span>Map</a></li>
            <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><span class="nav-icon"><span class="nav-icon-bullet"></span></span>Other Texts</a></li>
            <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><span class="nav-icon"><span class="nav-icon-bullet"></span></span>Contact Information</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.medications')}}">
            <i class="cil-medical-cross nav-icon"></i> Medications
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.tags')}}">
            <i class="cil-tags nav-icon"></i> Google Tags
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.administrators')}}">
            <i class="cil-user-plus nav-icon"></i> Administrators
        </a>
    </li>
    <div class="mt-auto sidebar-footer border-top d-none d-md-flex">     
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
</div>