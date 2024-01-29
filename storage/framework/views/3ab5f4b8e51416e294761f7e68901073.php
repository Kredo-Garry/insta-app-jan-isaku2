<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row gx-5">
        <div class="col-8 bg-light">
            Posts Area
        </div>
        <div class="col-4 bg-secondary">
            Profile Overview & Suggestions Area
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/shimadaisaku/Desktop/laravel-insta/laravel-insta-app/insta-app/resources/views/users/home.blade.php ENDPATH**/ ?>