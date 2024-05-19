<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <div class="app-brand demo">
        <a href="{{ route('admin.home.index') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold">
                {{ __('admin.dashboard') }}
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">


        <li class="menu-item  {{ active_url('admin/home') }}">
            <a href="{{ route('admin.home.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{ __('admin.dashboard')}}</div>
            </a>
        </li>


        @can(['users', 'roles'])
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">
                    {{ __('admin.users') }}
                </span>
            </li>

            <li class="menu-item {{ active_url('admin/users/manage*') }} {{ active_url('admin/users/blocks*') }} {{ active_url('admin/roles*') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div>
                        {{ __('admin.manage :name', ['name' => __('admin.users')]) }}
                    </div>
                </a>


                <ul class="menu-sub">

                    @can('users')

                        <li class="menu-item {{ active_url('admin/users/manage*') }} {{ active_url('admin/users/blocks*') }}">

                            <a href="javascript:void(0)" class="menu-link menu-toggle">
                                <div>
                                    {{ __('admin.users') }}
                                </div>
                            </a>

                            <ul class="menu-sub">

                                <li class="menu-item {{ active_url('admin/users/manage/index*') }}">
                                    <a href="{{ route('admin.users.manage.index') }}" class="menu-link">
                                        <div>
                                            {{ __('admin.all :name', ['name' => __('admin.users')]) }}
                                        </div>
                                        <div class="badge bg-primary rounded-pill ms-auto">
                                            {{ formatNumber(\App\Models\User::count()) }}
                                        </div>
                                    </a>
                                </li>

                                <li class="menu-item {{ active_url('admin/users/blocks*') }}">
                                    <a href="{{ route('admin.users.blocks.userBlock') }}" class="menu-link">
                                        <div>
                                            {{ __('admin.banned :name', ['name' => __('admin.users')]) }}
                                        </div>
                                        <div class="badge bg-primary rounded-pill ms-auto">
                                            {{ formatNumber(\App\Models\User::where('status', \App\Enum\UserState::BLOCKED)->count()) }}
                                        </div>
                                    </a>
                                </li>

                                <li class="menu-item {{ active_url('admin/users/manage/role*') }}">
                                    <a href="{{ route('admin.users.manage.usersRole') }}" class="menu-link">
                                        <div>
                                            {{ __('admin.admins') }}
                                        </div>
                                    </a>
                                </li>

                            </ul>

                        </li>

                        @can('roles')
                            <li class="menu-item {{ active_url('admin/roles*') }}">

                                <a href="javascript:void(0)" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons ti ti-settings"></i>
                                    <div>
                                        {{ __('admin.manage :name', ['name' => __('admin.roles')]) }}
                                    </div>
                                </a>

                                <ul class="menu-sub {{ active_url('admin/roles*') }}">

                                    <li class="menu-item {{ active_url('admin/roles*') }}">
                                        <a href="{{ route('admin.roles.index') }}" class="menu-link">
                                            <div>
                                                {{ __('admin.all :name', ['name' => __('admin.roles')]) }}
                                            </div>
                                            <div class="badge bg-primary rounded-pill ms-auto">
                                                {{ formatNumber(\Spatie\Permission\Models\Role::count()) }}
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                    @endcan

                </ul>
            </li>
        @endcan

        @can(['countries', 'cities'])
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">
                    {{ __('admin.cities_and_countries') }}
                </span>
            </li>

            <li class="menu-item {{ active_url('admin/countries*') }} {{ active_url('admin/cities*') }} {{ active_url('admin/nationalities*') }}">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-brand-days-counter"></i>
                    <div>
                        {{ __('admin.all :name', ['name' => __('admin.cities_and_countries')]) }}
                    </div>
                </a>


                <ul class="menu-sub">

                    @can('countries')
                        <li class="menu-item {{ active_url('admin/countries*') }}">
                            <a href="{{ route('admin.countries.index') }}" class="menu-link">
                                <div>
                                    {{ __('admin.countries') }}
                                </div>
                                <div class="badge bg-primary rounded-pill ms-auto">
                                    {{ formatNumber(\App\Models\Country::count()) }}
                                </div>
                            </a>
                        </li>
                    @endcan

                    @can('cities')
                        <li class="menu-item {{ active_url('admin/cities*') }}">
                            <a href="{{ route('admin.cities.index') }}" class="menu-link">
                                <div>
                                    {{ __('admin.cities') }}
                                </div>
                                <div class="badge bg-primary rounded-pill ms-auto">
                                    {{ formatNumber(\App\Models\City::count()) }}
                                </div>
                            </a>
                        </li>
                    @endcan

                    @can('nationalities')
                        <li class="menu-item {{ active_url('admin/nationalities*') }}">
                            <a href="{{ route('admin.nationalities.index') }}" class="menu-link">
                                <div>
                                    {{ __('admin.nationalities') }}
                                </div>
                                <div class="badge bg-primary rounded-pill ms-auto">
                                    {{ formatNumber(\App\Models\Nationality::count()) }}
                                </div>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endcan

        @can('sliders')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">
                    {{ __('admin.sliders') }}
                </span>
            </li>

            <li class="menu-item {{ active_url('admin/slider*') }} {{ active_url('admin/slider/ads-space*') }}">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-photo"></i>
                    <div>
                        {{ __('admin.all :name', ['name' => __('admin.sliders')]) }}
                    </div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item {{ active_url('admin/slider') }}">
                        <a href="{{ route('admin.slider.index') }}" class="menu-link">
                            <div>
                                {{ __('admin.sliders') }}
                            </div>
                            <div class="badge bg-primary rounded-pill ms-auto">
                                {{ formatNumber(\App\Models\Slider::where('type', 1)->count()) }}
                            </div>
                        </a>
                    </li>

                </ul>

            </li>
        @endcan

        @can('categories')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">
                    {{ __('admin.categories') }}
                </span>
            </li>

            <li class="menu-item {{ active_url('admin/categories*') }}">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-menu"></i>
                    <div>
                        {{ __('admin.all :name', ['name' => __('admin.categories')]) }}
                    </div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item {{ active_url('admin/categories*') }}">
                        <a href="{{ route('admin.categories.index') }}" class="menu-link">
                            <div>
                                {{ __('admin.categories') }}
                            </div>
                            <div class="badge bg-primary rounded-pill ms-auto">
                                {{ formatNumber(\App\Models\Category::count()) }}
                            </div>
                        </a>
                    </li>

                </ul>

            </li>
        @endcan

        @can('years')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">
                    {{ __('admin.years') }}
                </span>
            </li>

            <li class="menu-item {{ active_url('admin/years*') }}">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-calendar"></i>
                    <div>
                        {{ __('admin.all :name', ['name' => __('admin.years')]) }}
                    </div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item {{ active_url('admin/years*') }}">
                        <a href="{{ route('admin.years.index') }}" class="menu-link">
                            <div>
                                {{ __('admin.years') }}
                            </div>
                        </a>
                    </li>

                </ul>

            </li>
        @endcan

        @can('guidelines')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">
                    {{ __('admin.guidelines') }}
                </span>
            </li>

            <li class="menu-item {{ active_url('admin/guidelines*') }}">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div>
                        {{ __('admin.all :name', ['name' => __('admin.guidelines')]) }}
                    </div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item {{ active_url('admin/guidelines*') }}">
                        <a href="{{ route('admin.guidelines.index') }}" class="menu-link">
                            <div>
                                {{ __('admin.guidelines') }}
                            </div>
                        </a>
                    </li>

                </ul>

            </li>
        @endcan

        @can('questions')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">
                    {{ __('admin.questions') }}
                </span>
            </li>

            <li class="menu-item {{ active_url('admin/questions*') }}">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-help"></i>
                    <div>
                        {{ __('admin.all :name', ['name' => __('admin.questions')]) }}
                    </div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item {{ active_url('admin/questions*') }}">
                        <a href="{{ route('admin.questions.index') }}" class="menu-link">
                            <div>
                                {{ __('admin.questions') }}
                            </div>
                        </a>
                    </li>

                </ul>

            </li>
        @endcan

        <li class="menu-header small text-uppercase">
                <span class="menu-header-text">
                    {{ __('admin.plans') }}
                </span>
        </li>

        <li class="menu-item {{ active_url('admin/plans*') }}">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-credit-card"></i>
                <div>
                    {{ __('admin.all :name', ['name' => __('admin.plans')]) }}
                </div>
            </a>

            <ul class="menu-sub">

                <li class="menu-item {{ active_url('admin/plans*') }}">
                    <a href="{{ route('admin.plans.index') }}" class="menu-link">
                        <div>
                            {{ __('admin.plans') }}
                        </div>
                    </a>
                </li>

            </ul>

        </li>

        <li class="menu-header small text-uppercase">
                <span class="menu-header-text">
                    {{ __('admin.nicknames') }}
                </span>
        </li>

        <li class="menu-item {{ active_url('admin/nicknames*') }}">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-credit-card"></i>
                <div>
                    {{ __('admin.all :name', ['name' => __('admin.nicknames')]) }}
                </div>
            </a>

            <ul class="menu-sub">

                <li class="menu-item {{ active_url('admin/nicknames*') }}">
                    <a href="{{ route('admin.nicknames.index') }}" class="menu-link">
                        <div>
                            {{ __('admin.nicknames') }}
                        </div>
                    </a>
                </li>

            </ul>
        </li>

        @can('reports')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">
                    {{ __('admin.reports') }}
                </span>
            </li>

            <li class="menu-item {{ active_url('admin/reports*') }}">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-announcement"></i>
                    <div>
                        {{ __('admin.all :name', ['name' => __('admin.reports')]) }}
                    </div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item {{ active_url('admin/reports/question') }}">
                        <a href="{{ route('admin.reports.question') }}" class="menu-link">
                            <div>
                                {{ __('admin.reports') . ' ' . __('admin.questions') }}
                            </div>
                        </a>
                    </li>

                    <li class="menu-item {{ active_url('admin/reports/answer') }}">
                        <a href="{{ route('admin.reports.answer') }}" class="menu-link">
                            <div>
                                {{ __('admin.reports') . ' ' . __('admin.answers') }}
                            </div>
                        </a>
                    </li>

                </ul>

            </li>
        @endcan

        <li class="menu-header small text-uppercase">
                <span class="menu-header-text">
                    {{ __('admin.tickets') }}
                </span>
        </li>

        <li class="menu-item {{ active_url('admin/tickets*') }}">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-announcement"></i>
                <div>
                    {{ __('admin.all :name', ['name' => __('admin.tickets')]) }}
                </div>
            </a>

            <ul class="menu-sub">

                <li class="menu-item {{ active_url('admin/tickets*') }}">
                    <a href="{{ route('admin.tickets.index') }}" class="menu-link">
                        <div>
                            {{ __('admin.tickets') }}
                        </div>
                    </a>
                </li>

            </ul>

        </li>


    </ul>

</aside>
