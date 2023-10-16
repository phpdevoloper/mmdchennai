<!-- <div class="pre-loader">
    <div class="pre-loader-box">
        <div class="loader-logo"><img src="vendors/images/deskapp-logo.svg" alt=""></div>
        <div class='loader-progress' id="progress_div">
            <div class='bar' id='bar1'></div>
        </div>
        <div class='percent' id='percent1'>0%</div>
        <div class="loading-text">
            Loading...
        </div>
    </div>
</div> -->
<?Php


session_start();

if (!$_SESSION['current_user_id']) {
    header('Location: login.php');
    // include "signin.php";
    session_unset();
    session_destroy();
}
?>
<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu">

        </div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search">

        </div>
        <div class="col-lg-12 d-none d-lg-block">
            <!-- <div class="col-lg-8"> -->
            <div class="row">
                <h4>Mercantile Marine Department,Chennai</h4>
            </div>
            <div class="row">
                <h6 class="header_name">Ministry of Ports, Shipping & Waterways</h6>
            </div>
            <div class="row">
                <h6 class="header_name">Government of India</h6>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <div class="header-right">

        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="vendors/images/profile-picture.png" alt="profile-picture">
                    </span>
                    <span class="user-name"><?php echo $_SESSION['admin_username']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <!-- <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a> -->
                    <a class="dropdown-item" href="login.php"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="right-sidebar">
    <div class="sidebar-title">
        <h3 class="weight-600 font-16 text-blue">
            Layout Settings
            <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
        </h3>
        <div class="close-sidebar" data-toggle="right-sidebar-close">
            <i class="icon-copy ion-close-round"></i>
        </div>
    </div>
    <div class="right-sidebar-body customscroll">
        <div class="right-sidebar-body-content">
            <h4 class="weight-600 font-18 pb-10">Header Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
            <div class="sidebar-btn-group pb-30 mb-10">
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
                <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
            <div class="sidebar-radio-group pb-10 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
                    <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
                    <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
                    <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                </div>
            </div>

            <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
            <div class="sidebar-radio-group pb-30 mb-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
                    <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
                    <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
                    <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
                    <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
                    <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
                    <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                </div>
            </div>

            <div class="reset-options pt-30 text-center">
                <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
            </div>
        </div>
    </div>
</div>