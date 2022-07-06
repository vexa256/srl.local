<div class="row">
    <div class="col-12">
        <a href="#PdfJS" class="btn btn-lg  mb-4  PrintMe  btn-danger"> <i class="fas fa-file-pdf" aria-hidden="true"></i>
            Print
            Certificate
        </a>

        <br>


        <div id="PrinterThis">

            <div class="card">
                <img src="<?php echo e(asset('assets/cert.png')); ?>" class="card-img-top" alt="...">
                <div class="card-body ">
                    <div class="">

                        <h4>
                            (CERT No.
                            <?php echo e(Auth::user()->id); ?>02<?php echo e(Auth::user()->id); ?>)
                        </h4>
                        <h1 class="card-title container d-flex align-items-center justify-content-center">This is to
                            certify
                            that</h1>

                        <br>
                        <h2
                            class="container d-flex align-items-center justify-content-center card-title text-info fw-bolder">
                            <?php echo e(Auth::user()->name); ?></h2>

                        <br>
                        <h3
                            class="card-title container d-flex align-items-center justify-content-center text-primary fw-bolder">
                            Has successfully completed a
                            training in</h3>


                        <br>

                        <h2
                            class="container d-flex align-items-center justify-content-center card-title text-info fw-bolder">
                            <?php echo e($CourseName); ?></h2>

                        <br>





                        <p class="fs-3 card-text d-flex align-items-center justify-content-center card-title">
                            at the National Tuberculosis Reference Laboratory Kampala - Uganda <br>
                            on <?php echo e(date('F j, Y')); ?> and attained a Certificate of Attendance
                            <br>
                        </p>



                    </div>
                    <img src="<?php echo e(asset('assets/cer2.png')); ?>" class="card-img-top" alt="...">


                    <br>
                    <br>
                    <br>

                    <h1
                        class="card-title container d-flex align-items-center justify-content-center text-primary fw-bolder">
                        Training Modules</h1>

                    <?php if(isset($Modules)): ?>
                        <?php $__currentLoopData = $Modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="text-danger fw-bolder fs-4"><?php echo e($data->Module); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>



                    <br>
                    <br>
                    <br>

                    <h1
                        class="card-title container d-flex align-items-center justify-content-center text-primary fw-bolder">
                        Certification Criteria </h1>

                    <li class="text-danger fw-bolder fs-4">Attendance: Participant obtained < 80% from the training
                            assessments </li>

                    <li class="text-danger fw-bolder fs-4"> Achievement: Participant obtained ≥80% from the training
                        assessments</li>


                    <br>
                    <br>
                    <br>
                    <h2
                        class="container d-flex align-items-center justify-content-center card-title text-info fw-bolder">
                        Our Address</h2>

                    <br>


                    <p class="fs-3 card-text d-flex align-items-center justify-content-center card-title">
                        National Tuberculosis Reference Laboratory <br>
                        Plot 1062-106 Butabika Road,<br> Luzira; Opp. Butabika National Mental Referral Hospital;<br>
                        P.O. Box 16041, Wandegeya, Kampala, Uganda.<br> Website: www.ntrl.or.ug
                    </p>


                </div>
            </div>

        </div>

    </div>
</div>
<?php /**PATH /var/www/html/srl.local/sys/Scoreboard/Cert.blade.php ENDPATH**/ ?>