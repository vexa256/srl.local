<div class="modal fade" id="New">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title"> Create a new time for tests <span class="text-danger">

                    </span>



                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="<?php echo e(route('MassInsert')); ?>" class="row" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">



                        <input type="hidden" name="created_at" value="<?php echo e(date('Y-m-d h:i:s')); ?>">

                        <div class="mb-3 col-md-6  ">
                            <label id="label" for="" class="required form-label">Select
                                Assement Type</label>
                            <select required name="AssessmentType" class="form-select   form-select-solid"
                                data-control="select2" data-placeholder="Select a option">
                                <option></option>
                                <option value="ModularTests">Modular Tests</option>
                                <option value="PostTests">Post Tests</option>
                                <option value="PracticalTests">Practical Tests</option>


                            </select>

                        </div>

                        <input type="hidden" name="TableName" value="exam_timer_logics">

                        <?php $__currentLoopData = $Form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data['type'] == 'string'): ?>
                                <?php echo e(CreateInputText($data, $placeholder = null, $col = '6')); ?>

                            <?php elseif('smallint' == $data['type'] || 'bigint' === $data['type'] || 'integer' == $data['type'] || 'bigint' == $data['type']): ?>
                                <?php echo e(CreateInputInteger($data, $placeholder = null, $col = '6')); ?>

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

                    


                    <input type="hidden" name="uuid"
                        value="<?php echo e(md5(\Hash::make(uniqid() . 'AFC' . date('Y-m-d H:I:S')))); ?>">




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark">Save
                    Changes</button>

                </form>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/srl.local/sys/ExamTimer/NewTimer.blade.php ENDPATH**/ ?>