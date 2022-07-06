<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Lets create marking guides for the selected course', $Msg = null); ?>



</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo e(HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Marking Guide ', $Icon = 'fa-plus')); ?>

    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course Name</th>
                <th>Marking Guide Title</th>
                <th> View Guide </th>
                <th>Date Created</th>

                <th class="bg-danger fw-bolder text-light"> Delete </th>



            </tr>
        </thead>
        <tbody>
            <?php if(isset($Guides)): ?>
                <?php $__currentLoopData = $Guides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($data->CourseName); ?></td>
                        <td><?php echo e($data->MarkingGuideTitle); ?></td>


                        <td>
                            <a data-doc="  <?php echo e($data->MarkingGuideTitle); ?> "
                                data-source="<?php echo e(asset('assets/data/' . $data->url)); ?>" data-bs-toggle="modal" href="#PdfJS"
                                class="btn btn-sm  PdfViewer btn-info"> <i class="fas fa-file-pdf" aria-hidden="true"></i>
                            </a>
                        </td>


                        <td><?php echo date('F j, Y', strtotime($data->created_at)); ?></td>





                        <td>

                            <?php echo ConfirmBtn(
    $data = [
        'msg' => 'You want to delete this record',
        'route' => route('DeleteDoc', ['id' => $data->id, 'TableName' => 'marking_guides']),
        'label' => '<i class="fas fa-trash"></i>',
        'class' => 'btn btn-danger btn-sm deleteConfirm admin',
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

<?php echo $__env->make('courses.NewMarkingGuide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('pdf.PDFJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/srl.local/sys/courses/MarkingGuide.blade.php ENDPATH**/ ?>