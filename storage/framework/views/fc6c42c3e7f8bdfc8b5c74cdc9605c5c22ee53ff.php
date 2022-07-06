<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'View marking guides attached to the course ' . $CourseName, $Msg = null); ?>



</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    
    <table class="  table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course Name</th>
                <th>Marking Guide Title</th>
                <th> View Guide </th>
                <th>Date Created</th>

                



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
                                data-source="<?php echo e(asset('assets/data/' . $data->url)); ?>"
                                data-bs-toggle="modal" href="#PdfJS"
                                class="btn btn-sm  PdfViewer btn-info"> <i
                                    class="fas fa-file-pdf" aria-hidden="true"></i>
                            </a>
                        </td>


                        <td><?php echo date('F j, Y', strtotime($data->created_at)); ?></td>




                        





                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>



        </tbody>
    </table>
</div>
<!--end::Card body-->



<?php echo $__env->make('pdf.PDFJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/srl.local/sys/instructors/ViewMarkingGuide.blade.php ENDPATH**/ ?>