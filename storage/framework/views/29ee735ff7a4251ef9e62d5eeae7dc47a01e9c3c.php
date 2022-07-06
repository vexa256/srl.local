<div class="row" style="max-height: 100%; overflow-y:scroll">

    <?php if(isset($Courses)): ?>
        <?php $__currentLoopData = $Courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e($data->CourseName); ?></h3>

                    </div>
                    <div class="card-body p-0">

                        <div class="text-center px-4">
                            <img class="mw-100 shadow-xl h-200px card-rounded-bottom" alt=""
                                src="<?php echo e(asset('assets/data/' . $data->Thumbnail)); ?>" />
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-toolbar">
                            <a data-bs-toggle="modal" href="#Desc<?php echo e($data->id); ?>" class="btn btn-sm btn-danger me-2">
                                View More
                            </a>
                            <a data-bs-toggle="modal" href="#New" class="btn btn-sm btn-dark">
                                Apply
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>


<?php echo $__env->make('public.Viewer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('public.NewApp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/srl.local/sys/public/CourseView.blade.php ENDPATH**/ ?>