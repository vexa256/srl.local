<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = ' Approve pending student course enrollment application ',
        $Msg = null,
    ); ?>


</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">

    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Approve</th>
                <th>Decline</th>
                <th>Student</th>
                <th>Course</th>
                <th class="bg-danger text-light fw-bolder">Approval Status</th>
                <th>Institution</th>
                <th> Phone</th>
                <th>Work Phone</th>
                <th>Application</th>
                <th>CV</th>
                <th>ID</th>
                <th>View More</th>

            </tr>
        </thead>
        <tbody>
            <?php if(isset($Apps)): ?>
                <?php $__currentLoopData = $Apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a data-bs-toggle="modal" class="btn btn-dark shadow-lg btn-sm" href="#Approve<?php echo e($data->id); ?>">

                                <i class="fas fa-check" aria-hidden="true"></i>
                            </a>

                        </td>
                        <td>
                            <a class="btn btn-dark shadow-lg btn-sm"
                                href="<?php echo e(route('MarkAppAsDeclined', ['id' => $data->Uid])); ?>">

                                <i class="fas fa-times" aria-hidden="true"></i>
                            </a>

                        </td>

                        <td><?php echo e($data->name); ?></td>
                        <td><?php echo e($data->CourseName); ?></td>

                        <?php if($data->role == 'Approve'): ?>
                            <td class="bg-dark text-light">Application Pending
                                Approval</td>
                        <?php else: ?>
                            <td class="bg-dark text-light">Application Approved</td>
                        <?php endif; ?>


                        <td><?php echo e($data->institution); ?></td>
                        <td><?php echo e($data->phone); ?></td>
                        <td><?php echo e($data->WorkTelephoneNumber); ?></td>



                        <td>
                            <a data-bs-toggle="modal" class="btn btn-dark shadow-lg btn-sm" href="#Desc<?php echo e($data->id); ?>">

                                <i class="fas fa-binoculars" aria-hidden="true"></i>
                            </a>

                        </td>


                        <td>
                            <a data-doc="Course Application" data-source="<?php echo e(asset('assets/data/' . $data->CV)); ?>"
                                data-bs-toggle="modal" href="#PdfJS" class="btn btn-sm  PdfViewer btn-info"> <i
                                    class="fas fa-file-pdf" aria-hidden="true"></i>
                            </a>
                        </td>


                        <td>
                            <a data-doc="Course Application" data-source="<?php echo e(asset('assets/data/' . $data->StudentID)); ?>"
                                data-bs-toggle="modal" href="#PdfJS" class="btn btn-sm  PdfViewer btn-info"> <i
                                    class="fas fa-file-pdf" aria-hidden="true"></i>
                            </a>
                        </td>

                        <td>
                            <a data-bs-toggle="modal" href="#ViewMore<?php echo e($data->Uid); ?>" class="btn btn-sm  btn-warning">
                                <i class="fas fa-binoculars me-1" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>



        </tbody>
    </table>
</div>
<!--end::Card body-->



<?php if(isset($Apps)): ?>
    <?php echo $__env->make('viewer.viewer', [
        'PassedData' => $Apps,
    
        'Title' =>
            'Briefly describe your reasons for applying to this course and how you are hoping it will help you and your organization. ',
        'DescriptionTableColumn' => 'ReasonsForJoining',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>


<?php echo $__env->make('public.ViewMoreStudentDetails', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('pdf.PDFJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('public.ApproveModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/srl.local/sys/public/ApproveApplication.blade.php ENDPATH**/ ?>