<?php if(auth()->guard()->guest()): ?>

    <body id="kt_body"
        class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
        style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px"
        data-kt-aside-minimize="on">
    <?php endif; ?>


    <?php if(auth()->guard()->check()): ?>

        <body id="kt_body"
            class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed"
            style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px"
            data-kt-aside-minimize="off">
        <?php endif; ?>
        <div class="modal-backdrop spinner_display_switch"
            style="background-color: rgba(0, 0, 0, 0.4); display:none">
            <div class="spinner"></div>
        </div>
        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Aside-->
<?php /**PATH /var/www/html/srl.local/views/body/body.blade.php ENDPATH**/ ?>