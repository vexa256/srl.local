<?php if(isset($Apps)): ?>
    <?php $__currentLoopData = $Apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" aria-hidden="true" id="Approve<?php echo e($data->id); ?>">
            <div class="modal-dialog modal-lg modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Approve Student Course Application</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form method="post" action="<?php echo e(route('ApproveAppLogic')); ?>">

                            <div class="row">
                                <?php echo csrf_field(); ?>


                                <div class="mt-3  mb-3 col-md-4">
                                    <label id="label" for="" class="required form-label">Approving Training
                                        Coordinator</label>
                                    <select required name="Coordinator" class="form-select form-select-solid"
                                        data-control="select2" data-placeholder="Select a option">
                                        <option></option>
                                        <?php if(isset($Coordinators)): ?>
                                            <?php $__currentLoopData = $Coordinators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c->id); ?>">
                                                    <?php echo e($c->Name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </select>

                                </div>



                                <div class="mt-3  mb-3 col-md-4 ">
                                    <label id="label" for="" class=" required form-label">

                                        Start Date

                                    </label>

                                    <input type="text" required name="From" class="form-control DateArea"
                                        id="">

                                </div>


                                <div class="mt-3  mb-3 col-md-4 ">
                                    <label id="label" for="" class=" required form-label">

                                        End Date
                                    </label>

                                    <input type="text" required name="To" class="form-control DateArea"
                                        id="">

                                </div>









                            </div>


                            <input type="hidden" name="UserID" value="<?php echo e($data->UserID); ?>">

                            



                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                                <button type="submit" class="btn btn-dark">Save
                                    Changes</button>

                        </form>
                    </div>


                </div>

            </div>
        </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/srl.local/sys/public/ApproveModal.blade.php ENDPATH**/ ?>