<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Let\'s manage our course modules.', $Msg = null); ?>

</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo e(HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Course Module', $Icon = 'fa-plus')); ?>

    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course Name</th>
                <th> Module</th>
                <th>Module Presenation</th>
                <th>Date Added</th>

                <th class="bg-dark text-light"> Update </th>
                <th class="bg-danger fw-bolder text-light"> Delete </th>



            </tr>
        </thead>
        <tbody>
            <?php if(isset($Modules)): ?>
                <?php $__currentLoopData = $Modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($CourseName); ?></td>
                        <td><?php echo e($data->Module); ?></td>
                        <td>
                            <a data-doc="  <?php echo e($data->Module); ?> "
                                data-source="<?php echo e(asset('assets/data/' . $data->ModulePresentation)); ?>"
                                data-bs-toggle="modal" href="#PdfJS"
                                class="btn btn-sm  PdfViewer btn-info"> <i
                                    class="fas fa-file-pdf" aria-hidden="true"></i>
                            </a>
                        </td>

                        <td><?php echo date('F j, Y', strtotime($data->created_at)); ?></td>



                        <td>

                            <a data-bs-toggle="modal"
                                class="btn shadow-lg btn-danger btn-sm admin"
                                href="#Update<?php echo e($data->id); ?>">

                                <i class="fas fa-edit" aria-hidden="true"></i>
                            </a>

                        </td>


                        <td>

                            <?php echo ConfirmBtn(
    $data = [
        'msg' => 'You want to delete this record',
        'route' => route('DeleteData', ['id' => $data->id, 'TableName' => 'modules']),
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
<?php echo $__env->make('modules.NewModule', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php if(isset($Modules)): ?>
    <?php $__currentLoopData = $Modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e(UpdateModalHeader($Title = 'Update the selected  record', $ModalID = $data->id)); ?>

        <form novalidate action="<?php echo e(route('MassUpdate')); ?>" class=""
            method="POST">
            <?php echo csrf_field(); ?>

            <div class="row">




                <input type="hidden" name="id" value="<?php echo e($data->id); ?>">

                <input type="hidden" name="TableName" value="modules">

                <?php echo e(RunUpdateModalFinal($ModalID = $data->id, $Extra = '', $csrf = null, $Title = null, $RecordID = $data->id, $col = '12', $te = '12', $TableName = 'modules')); ?>

            </div>


            <?php echo e(UpdateModalFooter()); ?>


        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php echo $__env->make('pdf.PDFJS', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/srl.local/sys/modules/MgtModule.blade.php ENDPATH**/ ?>