<!-- Quick View START -->
<div class="quick-view">
    <ul class="quick-view-tabs nav nav-tabs nav-justified" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#config" role="tab" data-toggle="tab">
                <span>{{ __('config') }}</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="#activity" role="tab" data-toggle="tab">
                <span>{{ __('activity') }}</span>
            </a>
        </li>
    </ul>
    <div class="tab-content scrollable">
        <!-- config START -->
        <div id="config" role="tabpanel" class="tab-pane fade in active">
            <div class="theme-configurator p-20">
                <div class="m-v-20 border bottom">
                    <p class="text-dark text-semibold m-b-0">{{ __('solid_header') }}</p>
                    <p class="m-b-15">{{ __('solid_background') }}</p>
                    <div class="theme-selector p-b-20">
                        <label>
                            {{ Form::radio('header-theme', 'default') }}
                            <span class="theme-color bg-white border"></span>
                        </label>
                        <label>
                            {{ Form::radio('header-theme', 'primary') }}
                            <span class="theme-color bg-primary"></span>
                        </label>
                        <label>
                            {{ Form::radio('header-theme', 'info') }}
                            <span class="theme-color bg-info"></span>
                        </label>
                        <label>
                            {{ Form::radio('header-theme', 'success') }}
                            <span class="theme-color bg-success"></span>
                        </label>
                        <label>
                            {{ Form::radio('header-theme', 'warning') }}
                            <span class="theme-color bg-warning"></span>
                        </label>
                        <label>
                            {{ Form::radio('header-theme', 'danger') }}
                            <span class="theme-color bg-danger"></span>
                        </label>
                        <label>
                            {{ Form::radio('header-theme', 'dark') }}
                            <span class="theme-color bg-dark"></span>
                        </label>
                    </div>
                </div>
                <div class="m-v-15 border bottom">
                    <p class="text-dark text-semibold m-b-0">{{ __('gradiant_header') }}</p>
                    <p class="m-b-15">{{ __('gradiant_background') }}</p>
                    <div class="theme-selector p-b-15">
                        <label>
                            {{ Form::radio('header-theme', 'primary-gradient') }}
                            <span class="theme-color bg-gradient-primary"></span>
                        </label>
                        <label>
                            {{ Form::radio('header-theme', 'info-gradient') }}
                            <span class="theme-color bg-gradient-info"></span>
                        </label>
                        <label>
                            {{ Form::radio('header-theme', 'success-gradient') }}
                            <span class="theme-color bg-gradient-success"></span>
                        </label>
                        <label>
                            {{ Form::radio('header-theme', 'warning-gradient') }}
                            <span class="theme-color bg-gradient-warning"></span>
                        </label>
                        <label>
                            {{ Form::radio('header-theme', 'danger-gradient') }}
                            <span class="theme-color bg-gradient-danger"></span>
                        </label>
                    </div>
                </div>
                <div class="m-v-15 border bottom">
                    <p class="text-dark text-semibold m-b-0">{{ __('side_nav') }}</p>
                    <p class="m-b-15">{{ __('side_background') }}</p>
                    <div class="theme-selector p-b-15">
                        <label>
                            {{ Form::radio('side-nav-color', 'default') }}
                            <span class="theme-color bg-white border"></span>
                        </label>
                        <label>
                            {{ Form::radio('side-nav-color', 'dark') }}
                            <span class="theme-color bg-dark"></span>
                        </label>
                    </div>
                </div>
                <div class="m-v-15">
                    <p class="text-dark text-semibold m-b-0">{{ __('RTL') }}</p>
                    <p class="m-b-15">{{ __('right_to_left') }}</p>
                    <div class="theme-selector p-b-15">
                        <div class="switch checkbox-inline">
                            {{ Form::checkbox('rtl-toogle', null, true, ['id' => 'rtl-toogle']) }}
                            {{ Form::label('rtl-toogle', null) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- config END -->
        <!-- activity START -->
        <div id="activity" role="tabpanel" class="tab-pane fade">
            <div class="quick-view-activity">
                <ul class="list-media m-t-20">
                    <li class="list-item border bottom">
                        <a href="javascript:void(0);" class="media-hover p-20">
                            <div class="media-img">
                                <div class="icon-avatar bg-primary">
                                    <i class="ti-settings"></i>
                                </div>
                            </div>
                            <div class="info">
                                <span class="title">{{ __('system_notification') }}</span>
                                <span class="sub-title"></span>
                                <span class="sub-title font-size-11 p-t-5"></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- activity END -->
    </div>
</div>
<!-- Side Panel END -->
