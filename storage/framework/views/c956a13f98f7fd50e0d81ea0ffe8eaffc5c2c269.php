<?php if(isset($Apps)): ?>
    <?php $__currentLoopData = $Apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="ViewQtn">
            <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header bg-gray">
                        <h5 class="modal-title"> Hello,
                            <?php echo e(Auth::user()->name); ?>,
                            This is your pre-test Assessment for the course
                            <span class="text-danger">
                                <?php echo e($data->CourseName); ?>

                            </span>
                        </h5>
                        <a data-bs-toggle="modal" data-bs-dismiss="modal" href="#AnswerQtn"
                            class="btn HideSecondaryShowBtn btn-warning">
                            Attempt Qtn (s)
                        </a>
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>

                        <!--end::Close-->
                    </div>

                    <div class="modal-body ">

                        <textarea class="editorme">

                            <?php echo $data->TestQuestion; ?>


                    </textarea>
                    </div>



                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/srl.local/sys/public/ViewPretestQtn.blade.php ENDPATH**/ ?>