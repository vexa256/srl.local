<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert(
        $icon = 'fa-info',
        $class = 'alert-primary',
        $Title = 'Manage all registered users accounts | Deleted accounts can not be recovered',
        $Msg = null,
    ); ?>



</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo e(HeaderBtn($Toggle = 'New', $Class = 'btn-danger', $Label = 'New Admin Account ', $Icon = 'fa-plus')); ?>

    <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>User's Name</th>
                <th>User Name/Email</th>
                <th class="bg-dark text-light">Role</th>
                
                <th class="bg-danger fw-bolder text-light"> Delete Account </th>



            </tr>
        </thead>
        <tbody>
            <?php if(isset($Users)): ?>
                <?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($data->name); ?></td>
                        <td><?php echo e($data->email); ?></td>
                        <td class="bg-dark text-light"><?php echo e($data->role); ?></td>
                        
                        
                        <td>

                            <?php echo ConfirmBtn(
                                $data = [
                                    'msg' => 'You want to delete this record',
                                    'route' => route('DeleteData', ['id' => $data->id, 'TableName' => 'users']),
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

<?php echo $__env->make('users.NewAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/srl.local/sys/users/MgtUsers.blade.php ENDPATH**/ ?>