<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Time Duration', $Msg = 'Please Attempt The Given Test In the Assigned Time. Assessments Submitted After The Deadline Will Not Be Considered'); ?>


    <?php echo Alert($icon = 'fa-info', $class = 'alert-danger', $Title = 'Deadline ,  Authenticity and guidelines', $Msg = ' Submission deadline  is ' . $Deadline . '. An advanced plagiarism checker will be used to determine the authenticity of your  submission. Do not open other browser tabs as the system will record the action as malpractice'); ?>




</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    
    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course Name</th>
                <th>Module Name</th>
                <th>Practical Test</th>
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
                        <td><?php echo e($data->PracticalTestTitle); ?></td>
                        <td><?php echo e($data->BriefDescription); ?></td>







                        <td>
                            <a data-bs-toggle="modal" href="#New" class="btn   PdfViewer btn-info"> <i class="fas fa-book"
                                    aria-hidden="true"></i>
                                Attempt Test</a>
                        </td>



                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>



        </tbody>
    </table>
</div>
<!--end::Card body-->

<?php echo $__env->make('AttemptExams.PracticalAnswer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/srl.local/sys/AttemptExams/AttemptPractical.blade.php ENDPATH**/ ?>