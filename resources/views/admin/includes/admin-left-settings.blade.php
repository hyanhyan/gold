<!-- Page Sidebar -->
<div class="page-sidebar">
    <div class="profile-menu">
        <a href="{{ route('admin.dashboard') }}">
            <img src="{{ url('/admin/assets/images/avatars/avatar1.png') }}" alt="">
        </a>
    </div>
    <div class="page-sidebar-inner">
        <div class="page-sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" data-toggle="tooltip" data-placement="right" title="Dashboard"><i class="fas fa-rocket"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="settings-menu-btn">
        <a href="#" class="settings-menu-link"><i class="fas fa-wrench"></i></a>
    </div>
</div><!-- /Page Sidebar -->
<div class="settings-sidebar">
    <div class="settings-sidebar-content">
        <div class="settings-sidebar-header">
            <span>Settings</span>
            <a href="javascript: void(0);" class="settings-menu-close"><i class="icon-close"></i></a>
        </div>
        <div class="right-sidebar-settings">
            <span class="settings-title">General Settings</span>
            <ul class="sidebar-setting-list list-unstyled">
                <li>
                    <span class="settings-option">Notifications</span><input type="checkbox" class="js-switch" checked />
                </li>
                <li>
                    <span class="settings-option">Activity log</span><input type="checkbox" class="js-switch" checked />
                </li>
                <li>
                    <span class="settings-option">Automatic updates</span><input type="checkbox" class="js-switch" />
                </li>
                <li>
                    <span class="settings-option">Allow backups</span><input type="checkbox" class="js-switch" />
                </li>
            </ul>
            <span class="settings-title">Account Settings</span>
            <ul class="sidebar-setting-list list-unstyled">
                <li>
                    <span class="settings-option">Chat</span><input type="checkbox" class="js-switch" checked />
                </li>
                <li>
                    <span class="settings-option">Incognito mode</span><input type="checkbox" class="js-switch" />
                </li>
                <li>
                    <span class="settings-option">Public profile</span><input type="checkbox" class="js-switch" />
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="settings-overlay"></div>