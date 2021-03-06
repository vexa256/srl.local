<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Hello ' . Auth::user()->name . '. Select modular test to attempt', $Msg = null); ?>

</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    
    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course Name</th>
                <th>Module Name</th>
                <th>Modular Test</th>
                <th>Description</th>
                <th class="bg-dark text-light"> Attempt Test </th>




            </tr>
        </thead>
        <tbody>
            <?php if(isset($ModularTests)): ?>
                <?php $__currentLoopData = $ModularTests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($data->CourseName); ?></td>
                        <td><?php echo e($data->Module); ?></td>
                        <td><?php echo e($data->ModularTestTitle); ?></td>
                        <td><?php echo e($data->BriefDescription); ?></td>





                        <td>

                            <?php echo ConfirmBtn(
    $data = [
        'msg' => 'You want to attempt this test. Once you confirm, the exam timer will start and can not be stopped. Please attempt the exam in the assigned time. All exams submitted after the assigned time will not  considered',
        'route' => route('ModularTestToAttemptSelected', ['id' => $data->id]),
        'label' => '<i class="fas fa-check"></i>',
        'class' => 'btn btn-dark  deleteConfirm admin',
    ],
); ?>


                        </td>





                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>



        </tbody>
    </table>
</div>
<!--end::Card body-->
<?php /**PATH /var/www/html/srl.local/sys/AttemptExams/SelectModularToAttempt.blade.php ENDPATH**/ ?>