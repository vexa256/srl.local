<!--begin::Card body-->
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = 'Select the live course lesson session to start', $Msg = null); ?>

</div>
<div class="card-body pt-3 bg-light shadow-lg table-responsive">
    
    <table class="table table-rounded table-bordered  border gy-3 gs-3">
        <thead>
            <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">
                <th>Course</th>
                <th>Link Title</th>
                <th>Link Description</th>
                <th>Link Url</th>
                <th>Valid From</th>
                <th>Valid To</th>
                
                <th>Date Added</th>
                


            </tr>
        </thead>
        <tbody>
            <?php if(isset($Links)): ?>
                <?php $__currentLoopData = $Links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>

                        <td><?php echo e($data->CourseName); ?></td>
                        <td><?php echo e($data->LinkTitle); ?></td>
                        <td><?php echo e($data->LinkDescription); ?></td>
                        <td>
                            <a target="_blank" class="btn btn-danger shadow-lg"
                                href="<?php echo e($data->LinkUrl); ?>">

                                Attend Session
                            </a>

                        </td>
                        <td><?php echo date('F j, Y', strtotime($data->ValidFrom)); ?></td>
                        <td><?php echo date('F j, Y', strtotime($data->ValidTo)); ?></td>
                        
                        <td><?php echo date('F j, Y', strtotime($data->created_at)); ?></td>





                        

                        





                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>



        </tbody>
    </table>
</div>




<?php /**PATH /var/www/html/srl.local/sys/instructors/ViewVideoLinks.blade.php ENDPATH**/ ?>