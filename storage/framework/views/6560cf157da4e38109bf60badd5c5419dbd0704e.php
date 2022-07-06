<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Instructor guides for specific course modules', $Msg = null); ?>

</div>


<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php if(Auth::user()->role == 'admin'): ?>
        <?php echo e(HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Facilitator Guide  ', $Icon = 'fa-plus')); ?>

    <?php endif; ?>

    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course Name</th>
                <th>Module Name</th>
                <th>Facilitator Guide Title</th>
                <th>View Guide</th>
                <th>Date Created</th>

                <?php if(Auth::user()->role == 'admin'): ?>
                    <th class="bg-danger fw-bolder text-light"> Delete </th>
                <?php endif; ?>




            </tr>
        </thead>
        <tbody>
            <?php if(isset($Guides)): ?>
                <?php $__currentLoopData = $Guides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($data->CourseName); ?></td>
                        <td><?php echo e($data->Module); ?></td>
                        <td><?php echo e($data->InstructorGuidelineTitle); ?></td>


                        <td>
                            <a data-doc="  <?php echo e($data->InstructorGuidelineTitle); ?> "
                                data-source="<?php echo e(asset('assets/data/' . $data->url)); ?>" data-bs-toggle="modal" href="#PdfJS"
                                class="btn btn-sm  PdfViewer btn-info"> <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            </a>
                        </td>


                        <td><?php echo date('F j, Y', strtotime($data->created_at)); ?></td>



                        <?php if(Auth::user()->role == 'admin'): ?>
                            <td>

                                <?php echo ConfirmBtn(
    $data = [
        'msg' => 'You want to delete this record',
        'route' => route('DeleteDoc', ['id' => $data->id, 'TableName' => 'instructor_guidelines']),
        'label' => '<i class="fas fa-trash"></i>',
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
<!--end::Card body-->

<?php echo $__env->make('instructors.NewGuide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('pdf.PDFJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/srl.local/sys/instructors/MgtGuides.blade.php ENDPATH**/ ?>