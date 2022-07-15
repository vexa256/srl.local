<div class="row">
    <div class="col-md-12">
        <!--begin::Card body-->
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">
            <?php echo Alert(
                $icon = 'fa-info',
                $class = 'alert-primary',
                $Title = $ModuleName . ' (' . $CourseName . ') Document Notes',
                $Msg = null,
            ); ?>



        </div>
        <div class="card-body pt-3 bg-light shadow-lg table-responsive">

            <?php if(Auth::user()->role != 'student'): ?>
                <?php echo e(HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Document Notes ', $Icon = 'fa-plus')); ?>


                <?php echo e(HeaderBtn($Toggle = 'MgtVid', $Class = 'btn-dark', $Label = 'View Video Notes ', $Icon = 'fa-binoculars')); ?>

            <?php else: ?>
                <?php echo e(HeaderBtn($Toggle = 'MgtVid', $Class = 'btn-dark', $Label = 'View Video Notes ', $Icon = 'fa-binoculars')); ?>

            <?php endif; ?>



            <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
                <thead>
                    <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                        <th>Course Name</th>
                        <th>Module Name</th>
                        <th>Notes Title</th>
                        <th>Brief Description</th>
                        <th>View Notes</th>

                        <?php if(Auth::user()->role != 'student'): ?>
                            <th>Date Created</th>

                            <th class="bg-danger fw-bolder text-light"> Delete </th>
                        <?php endif; ?>





                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($Notes)): ?>
                        <?php $__currentLoopData = $Notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td><?php echo e($CourseName); ?></td>
                                <td><?php echo e($ModuleName); ?></td>

                                <td><?php echo e($data->Title); ?></td>
                                <td><?php echo e($data->BriefDescription); ?></td>

                                <td>
                                    <a data-doc="  <?php echo e($data->Title); ?> (<?php echo e($data->BriefDescription); ?>)"
                                        data-source="<?php echo e(asset('assets/data/' . $data->url)); ?>" data-bs-toggle="modal"
                                        href="#PdfJS" class="btn btn-sm  PdfViewer btn-info"> <i class="fas fa-file-pdf"
                                            aria-hidden="true"></i>
                                    </a>
                                </td>

                                <?php if(Auth::user()->role != 'student'): ?>
                                    <td><?php echo date('F j, Y', strtotime($data->created_at)); ?></td>





                                    <td>

                                        <?php echo ConfirmBtn(
                                            $data = [
                                                'msg' => 'You want to delete this record',
                                                'route' => route('DeleteDoc', ['id' => $data->id, 'TableName' => 'notes']),
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

    </div>
</div>


<!--end::Card body-->
<?php echo $__env->make('notes.NewDocument', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('notes.NewVideo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('notes.MgtVideos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php echo $__env->make('pdf.PDFJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/srl.local/sys/notes/MgtNotes.blade.php ENDPATH**/ ?>