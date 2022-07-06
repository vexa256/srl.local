<?php if(isset($Apps)): ?>
    <?php $__currentLoopData = $Apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="ViewMore<?php echo e($data->Uid); ?>" data-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View more details about selected
                            application for the student

                            <span class="text-danger fw-bolder">
                                <?php echo e($data->name); ?>

                            </span>


                        </h5>
                        <button type="button" class="closse btn btn-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class=" mytable table table-rounded table-bordered  border gy-3 gs-3">
                            <thead>
                                <tr class="fw-bold  text-gray-800 border-bottom border-gray-200">

                                    <th>Course</th>
                                    <th>Nationality</th>
                                    <th>Gender</th>
                                    <th>Title</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Application Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($Apps)): ?>
                                    <?php $__currentLoopData = $Apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>


                                            <td><?php echo e($data->CourseName); ?></td>

                                            <td><?php echo e($data->nationality); ?></td>
                                            <td><?php echo e($data->gender); ?></td>
                                            <td><?php echo e($data->JobTitle); ?></td>
                                            <td><?php echo e($data->Address); ?></td>
                                            <td><?php echo e($data->email); ?></td>

                                            <td><?php echo date('F j, Y', strtotime($data->created_at)); ?></td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>



                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/srl.local/sys/public/ViewMoreStudentDetails.blade.php ENDPATH**/ ?>