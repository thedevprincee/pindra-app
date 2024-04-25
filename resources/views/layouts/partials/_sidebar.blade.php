
<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('./backend/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo" />
            <img
                src="{{ asset('./backend/vendors/images/deskapp-logo-white.svg') }}"
                alt=""
                class="light-logo"
            />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
            
                <li>
                    <a href="/portal/dashboard" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-house"></span
                            ><span class="mtext">Dashboard</span>
                    </a>
                </li>
               
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-archive"></span
                        ><span class="mtext"> Package </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="/portal/package/add">Add Package</a></li>
                        <li><a href="/portal/package/list">List</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-broadcast-pin"></span
                        ><span class="mtext"> Site </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="/portal/site/">Site</a></li>
                        <li><a href="/portal/site/settings">Site Settings</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-person-bounding-box"></span
                        ><span class="mtext"> Account </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="/portal/user/account">API Settings</a></li>
                        <li><a href="/portal/user/profile">Profile</a></li>
                    </ul>
                </li>

            
                <li>
                    <a
                    href="/portal/layout"
                    target="_blank"
                    class="dropdown-toggle no-arrow"
                    >
                    <span class="micon bi bi-layout-text-window-reverse"></span>
                    <span class="mtext"
                    >Site Layout
                    <img src="{{ asset('./backend/vendors/images/coming-soon.png') }}" alt="" width="25"
                    /></span>
                </a>
            </li>
            <li>
                <a href="/auth/logout" class="dropdown-toggle no-arrow">
                    <span class="micon bi bi-lock"></span
                        ><span class="mtext">Logout</span>
                </a>
            </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
