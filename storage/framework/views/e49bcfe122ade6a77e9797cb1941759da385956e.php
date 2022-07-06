<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = ' Attempt the Pre-Test Assessment to  continue', $Msg = null); ?>


    <input type="text" class="d-none ExamTimerValue" value="<?php echo e($Timer); ?>">

    <div class="bg-dark fs-5 shadow-lg alert text-light fw-bolder">
        <span class="fs-5">
            Pre-test assessment
        </span>
        <div class="spanTimer fs-3">
        </div>


    </div>
</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">

    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course</th>
                <th>Assessment</th>
                
                <th class="bg-danger text-light fw-bolder">Description</th>
                <th>Student</th>

                <th>Attempt Test</th>
                <th>Date Attempted</th>

            </tr>
        </thead>
        <tbody>
            <?php if(isset($Apps)): ?>
                <?php $__currentLoopData = $Apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($data->CourseName); ?></td>
                        <td> Pre-Test Assessment</td>
                        
                        <td><?php echo e($data->BriefDescription); ?>

                        </td>

                        <td><?php echo e($data->Name); ?>

                        </td>


                        <td class="ToggleButton">
                            <a data-bs-toggle="modal" class="btn TimerRemover StartExamTimer btn-dark shadow-lg bt-lg"
                                href="#AnswerQtn">

                                Start Exam
                            </a>

                        </td>


                        <td><?php echo date('F j, Y'); ?></td>


                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>



        </tbody>
    </table>
</div>
<!--end::Card body-->


<?php echo $__env->make('public.ViewPretestQtn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('public.RecordAnswer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/srl.local/sys/public/AttemptPreTest.blade.php ENDPATH**/ ?>