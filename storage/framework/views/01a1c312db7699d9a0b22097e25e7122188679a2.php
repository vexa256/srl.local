<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Hello ' . Auth::user()->name . ' , Use this interface to submit your facilitator checklist', $Msg = null); ?>



</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo e(HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Checklist ', $Icon = 'fa-plus')); ?>

    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course Name</th>
                <th>Module Name</th>
                <th>Instructor</th>
                <th>Submitted Checklist</th>
                <th>Date Created</th>

                <th class="bg-danger fw-bolder text-light"> Delete </th>



            </tr>
        </thead>
        <tbody>
            <?php if(isset($Checklist)): ?>
                <?php $__currentLoopData = $Checklist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($CourseName); ?></td>
                        <td><?php echo e($ModuleName); ?></td>
                        <td><?php echo e($data->Name); ?></td>




                        <td>
                            <a data-bs-toggle="modal" class="btn btn-dark shadow-lg btn-sm"
                                href="#Desc<?php echo e($data->id); ?>">

                                <i class="fas fa-binoculars" aria-hidden="true"></i>
                            </a>

                        </td>



                        <td><?php echo date('F j, Y', strtotime($data->created_at)); ?></td>





                        <td>

                            <?php echo ConfirmBtn(
    $data = [
        'msg' => 'You want to delete this record',
        'route' => route('DeleteData', ['id' => $data->id, 'TableName' => 'facili_tator_check_lists']),
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

<?php echo $__env->make('checklist.NewCheckList', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php if(isset($Checklist)): ?>
    <?php echo $__env->make('viewer.viewer', [
        'PassedData' => $Checklist,
        'Title' => 'View Your Facilitator Checklist',
        'DescriptionTableColumn' => 'Checklist',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/srl.local/sys/checklist/MgtChecklist.blade.php ENDPATH**/ ?>