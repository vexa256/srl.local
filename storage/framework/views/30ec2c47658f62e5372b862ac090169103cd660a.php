<div data-kt-menu-trigger="click" class="menu-item menu-accordion viewer_only">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas text-light fw-bolder fa-2x me-1 fa-users" aria-hidden="true"></i>
        </span>
        <span class="menu-title ms-2 fs-6">User Management</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <?php
        
        MenuItem($link = '#', $label = 'Manage Admins');
        MenuItem($link = '#', $label = 'Manage Examiners');
        MenuItem($link = '#', $label = 'Manage Instructors');
        
        ?>


    </div>
</div>
<?php /**PATH /var/www/html/srl.local/views/sidebar/Users.blade.php ENDPATH**/ ?>