<?php if(isset($Apps)): ?>
    <?php $__currentLoopData = $Apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="AnswerQtn">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header bg-gray">
                        <h5 class="modal-title"> Hello,
                            <?php echo e(Auth::user()->name); ?>,
                            Use this editor to record your answers to the pre-test
                            assessment

                            <span class="spanTimer fs-3" class="text-danger">
                            </span>
                        </h5>

                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        <form action="<?php echo e(route('MassInsert')); ?>" class="row" method="POST"
                            enctype="multipart/form-data">
                            <button type="submit" class="btn btn-dark">Save
                                Changes</button>



                    </div>

                    <div class="modal-body ">

                        <?php echo csrf_field(); ?>
                        <div class="row">


                            <input type="hidden" name="TableName" value="attempt_pre_tests">



                            <input type="hidden" name="created_at" value="<?php echo e(date('Y-m-d')); ?>">



                            <input type="hidden" name="status" value="true">

                            <input type="hidden" name="uuid" value="<?php echo e(md5(Auth::user()->UserID . date('Y-m-d'))); ?>">

                            <input type="hidden" name="CID" value="<?php echo e($Form->CID); ?>">

                            <input type="hidden" name="PretestID" value="<?php echo e($Form->uuid); ?>">

                            <input type="hidden" name="PretestQuestionID" value="<?php echo e(Auth::user()->UserID); ?>">

                            <input type="hidden" name="StudentID" value="<?php echo e(Auth::user()->UserID); ?>">


                            <div class="col-md-12">
                                <div class="mt-3  mb-3 col-md-12  ">
                                    <label id="label" for="" class=" required form-label">Questions</label>
                                    <textarea class="editorme">

                                        <?php echo $data->TestQuestion; ?>


                                </textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mt-3  mb-3 col-md-12  ">
                                    <label id="label" for="" class=" required form-label">Record
                                        Answer</label>

                                    <textarea name="StudentAnswer" class="editorme">

                                            <h1>TYPE YOUR ANSWERS HERE</h1>
                                    </textarea>


                                </div>
                            </div>
                            </form>
                        </div>



                    </div>
                </div>
            </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/srl.local/sys/public/RecordAnswer.blade.php ENDPATH**/ ?>