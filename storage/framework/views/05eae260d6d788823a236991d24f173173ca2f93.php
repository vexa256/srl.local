<div class="modal fade" id="MgtVid">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">

                    <?php if(Auth::user()->role != 'student'): ?>
                        Manage video notes attached to
                    <?php else: ?>
                        View video notes attached to
                    <?php endif; ?>

                    <span class="text-danger">
                        <?php echo e($ModuleName); ?> (<?php echo e($CourseName); ?>)
                    </span>

                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <div class="card-body pt-3 bg-light shadow-lg table-responsive">
                    <?php echo Alert($icon = 'fa-info', $class = 'alert-primary', $Title = $ModuleName . ' (' . $CourseName . ') Video Notes', $Msg = null); ?>



                </div>
                <div class="card-body pt-3 bg-light shadow-lg table-responsive">

                    


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
                            <?php if(isset($Videos)): ?>
                                <?php $__currentLoopData = $Videos->unique('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <td><?php echo e($CourseName); ?></td>
                                        <td><?php echo e($ModuleName); ?></td>

                                        <td><?php echo e($data->Title); ?></td>
                                        <td><?php echo e($data->BriefDescription); ?></td>

                                        <td>
                                            <a class="btn btn-danger btn-sm shadow-lg" data-fslightbox="gallery"
                                                href="<?php echo e(asset('assets/data/' . $data->url)); ?>">
                                                <i class="fas fa-video" aria-hidden="true"></i>
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

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>




            </div>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/srl.local/sys/notes/MgtVideos.blade.php ENDPATH**/ ?>