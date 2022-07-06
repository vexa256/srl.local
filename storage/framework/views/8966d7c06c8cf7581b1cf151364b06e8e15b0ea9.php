<?php if(isset($PassedData)): ?>
    <?php $__currentLoopData = $PassedData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="Desc<?php echo e($data->id); ?>">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header bg-gray">
                        <h5 class="modal-title"><?php echo e($Title); ?>


                        </h5>

                        <!--begin::Close-->
                        <a href="#MgtTaxes" type="button" class="btn btn-info"
                            data-bs-dismiss="modal"
                            class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                            aria-label="Close">
                            <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                        </a>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body ">

                        <textarea class="editorme">
                        <?php echo e($data->$DescriptionTableColumn); ?>

                    </textarea>

                    </div>

                    <div class="modal-footer">
                        <a data-bs-toggle="modal" href="#" type="button"
                            class="btn btn-info" data-bs-dismiss="modal">Close</a>


                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/srl.local/sys/viewer/viewer.blade.php ENDPATH**/ ?>