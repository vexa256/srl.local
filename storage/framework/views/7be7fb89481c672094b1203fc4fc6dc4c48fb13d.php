<div class="modal fade" id="New">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title"> Let's create a new course



                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="<?php echo e(route('MassInsert')); ?>" class="row"
                    method="POST" enctype="multipart/form-data"> <?php echo csrf_field(); ?>
                    <div class="row">


                        <div class="mt-3  mb-3 col-md-6 ">
                            <label id="label" for="" class=" required form-label">Upload
                                Course
                                Thumbnail (Only SVG, PNG and JPG )</label>

                            <input type="file" required name="Thumbnail"
                                class="form-control" id="">

                        </div>



                        <input type="hidden" name="created_at"
                            value="<?php echo e(date('Y-m-d h:i:s')); ?>">

                        <input type="hidden" name="TableName" value="courses">

                        <?php $__currentLoopData = $Form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data['type'] == 'string'): ?>
                                <?php echo e(CreateInputText($data, $placeholder = null, $col = '6')); ?>

                            <?php elseif('smallint' == $data['type'] || 'bigint' === $data['type'] || 'integer' == $data['type'] || 'bigint' == $data['type']): ?>
                                <?php echo e(CreateInputInteger($data, $placeholder = null, $col = '4')); ?>

                            <?php elseif($data['type'] == 'date' || $data['type'] == 'datetime'): ?>
                                <?php echo e(CreateInputDate($data, $placeholder = null, $col = '4')); ?>

                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <div class="row">
                        <?php $__currentLoopData = $Form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data['type'] == 'text'): ?>
                                <?php echo e(CreateInputEditor($data, $placeholder = null, $col = '12')); ?>

                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <input type="hidden" name="CID"
                        value="<?php echo e(md5(uniqid() . 'AFC' . date('Y-m-d H:I:S'))); ?>">


                    <input type="hidden" name="uuid"
                        value="<?php echo e(md5(uniqid() . 'AFC' . date('Y-m-d H:I:S'))); ?>">




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info"
                    data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark">Save
                    Changes</button>

                </form>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/srl.local/sys/courses/NewCourse.blade.php ENDPATH**/ ?>