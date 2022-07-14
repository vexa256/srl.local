<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = 'SRL E-learning Student Enrollment Statistics',
        $Msg = null,
    ); ?>


</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">

    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                
                <th>Course</th>
                <th>Students</th>


            </tr>
        </thead>
        <tbody>
            <?php if(isset($Apps)): ?>
                <?php $__currentLoopData = $Apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($data->CourseName); ?></td>
                        <td><?php echo e($data->Students); ?></td>


                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>



        </tbody>
    </table>
</div>
<!--end::Card body-->
<?php /**PATH /var/www/html/srl.local/sys/reports/Enrollment.blade.php ENDPATH**/ ?>