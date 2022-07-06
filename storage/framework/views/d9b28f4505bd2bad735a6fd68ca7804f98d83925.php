<div class="row">
    <div class="col-md-12">
        <!--begin::Card body-->
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">
            <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Course Practical Test Activation Management', $Msg = null); ?>



        </div>
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">



            <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Course Name</th>
                        <th>Post Test</th>
                        <th>Description</th>
                        <th>Activation Status</th>
                        
                        
                        <th class="bg-danger fw-bolder text-light"> Activate / Disable </th>







                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($Tests)): ?>
                        <?php $__currentLoopData = $Tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td><?php echo e($data->CourseName); ?></td>
                                <td><?php echo e($data->PracticalTestTitle); ?></td>
                                <td><?php echo e($data->BriefDescription); ?></td>


                                <?php if($data->Active == 'true'): ?>
                                    <td class="bg-success text-dark fw-bolder">
                                        Test Activated
                                    </td>
                                <?php else: ?>
                                    <td class="bg-dark text-light fw-bolder">
                                        Test Disabled
                                    </td>
                                <?php endif; ?>


                                <?php if($data->Active == 'true'): ?>
                                    <td>

                                        <?php echo ConfirmBtn(
    $data = [
        'msg' => 'You want to disable this Test',
        'route' => route('DeActivateSelectedTest', ['id' => $data->id, 'TableName' => 'practical_tests']),
        'label' => '<i class="fas fa-times"></i>',
        'class' => 'btn btn-danger btn-sm deleteConfirm admin',
    ],
); ?>


                                    </td>
                                <?php else: ?>
                                    <td>

                                        <?php echo ConfirmBtn(
    $data = [
        'msg' => 'You want to enable this Test',
        'route' => route('ActivateSelectedTest', ['id' => $data->id, 'TableName' => 'practical_tests']),
        'label' => '<i class="fas fa-check"></i>',
        'class' => 'btn btn-danger btn-sm deleteConfirm admin',
    ],
); ?>


                                    </td>
                                <?php endif; ?>













                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>



                </tbody>
            </table>
        </div>

    </div>
</div>
<?php /**PATH /var/www/html/srl.local/sys/EnableExams/EnablePractical.blade.php ENDPATH**/ ?>