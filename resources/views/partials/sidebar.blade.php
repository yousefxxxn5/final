<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">

            <li>

                <a  href="{{ route('dashboard') }}" >
                    <i   class="fas fa-home"></i>
                    <span  class="nav-text">Home</span>
            </a>
            </li>

            <li><a href="{{ route('manange.index') }}">
                <i class="fas fa-plus"></i>
                    <span class="nav-text">Add user</span>
                </a>

            </li>
            <li><a href="{{ route('user_table.index') }}">
                    <i class="fas fa-table"></i>
                    <span class="nav-text">User Table</span>
                </a>

            </li>

            <li><a href="{{ route('setting.index') }}" class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fas fa-wrench"></i>
                    <span class="nav-text">Setting</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route("general_setting.index") }}">الاعدادت العامة</a></li>
                    <li><a href="{{ route("setting.index") }}">الاعدادت الوظيفية</a></li>
                    <li><a href="{{ route("seting_mangment") }}"> الاعدادات الادارية</a></li>

                </ul>
            </li>


            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fas fa-money-check-alt"></i>
                    <span class="nav-text">خيارات الدفع</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('karymy_bank.index') }}">بنك الكريمي</a></li>
                    <li><a href="{{ route('visa.index') }}">الفيزا كارد</a></li>

                </ul>
            </li>
            <li><a href="{{ route('help.index') }}"  >
                    <i class="fas fa-question-circle"></i>
                    <span class="nav-text">Help</span>
                </a>
            </li>
            <li><a  href="{{ route('abut_us.index') }}">
                    <i class="fas fa-clone"></i>
                    <span class="nav-text">Abut us</span>
                </a>
            </li>
            <li><a href="widget-basic.html" class="" aria-expanded="false" onclick="document.getElementById('logoutForm').submit(); return false;">
                <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>




















        <div class="side-bar-profile">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="side-bar-profile-img">
                    <img src="images/user.jpg" alt="">
                </div>
                <div class="profile-info1">
                    <h4 class="fs-18 font-w500">Soeng Souy</h4>
                    <span>example@mail.com</span>
                </div>
                <div class="profile-button">
                    <i class="fas fa-caret-down scale5 text-light"></i>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-2 progress-info">
                <span class="fs-12"><i class="fas fa-star text-orange me-2"></i>Task Progress</span>
                <span class="fs-12">20/45</span>
            </div>
            <div class="progress default-progress">
                <div class="progress-bar bg-gradientf progress-animated" style="width: 45%; height:10px;" role="progressbar">
                    <span class="sr-only">45% Complete</span>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p><strong>man Saas Admin</strong> © 2021 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by DexignLabs</p>
        </div>
    </div>
</div>
