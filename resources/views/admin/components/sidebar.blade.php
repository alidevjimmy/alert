<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    @if(auth()->guard('admin')->user())
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">پنل مدیریت</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>صفحه اصلی</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Alerts
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-microphone"></i>
            <span>آلارم ها</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">مدیریت آلارم ها :</h6>
                <a class="collapse-item" href="{{ route('admin.voices.index') }}">همه آلارم ها</a>
                <a class="collapse-item" href="{{ route('admin.voices.create') }}">اضافه کردن آلارم</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
        <div class="sidebar-heading">
            Notifications
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
               aria-expanded="true" aria-controls="collapse3">
                <i class="fas fa-ad"></i>
                <span>نوتیفیکیشن ها</span>
            </a>
            <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">مدیریت نوتیفیکیشن ها :</h6>
                    <a class="collapse-item" href="{{ route('admin.notifications.index') }}">همه نوتیفیکیشن ها</a>
                    <a class="collapse-item" href="{{ route('admin.notifications.create') }}">اضافه کردن نوتیفیکیشن</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
@endif
</ul>
