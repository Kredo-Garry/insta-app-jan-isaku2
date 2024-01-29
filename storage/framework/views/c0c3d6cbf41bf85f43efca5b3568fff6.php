<?php $__env->startSection('title', 'Following Page'); ?>
    
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('users.profile.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div style="margin-top: 100px">
        <?php if($user->following->isNotEmpty()): ?>
            <div class="row justify-content-center">
                <div class="col-4">
                    <h3 class="text-muted text-center">Following</h3>
                    <?php $__currentLoopData = $user->following; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row justify-content-center mt-3">
                            <div class="col-auto">
                                
                                <a href="<?php echo e(route('profile.show', $follow->following->id)); ?>">
                                    <?php if($follow->following->avatar): ?>
                                        <img src="<?php echo e($follow->following->avatar); ?>" alt="<?php echo e($follow->following->name); ?>" class="rounded-circle avatar-sm">
                                    <?php else: ?>
                                        <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="col ps-0 text-truncate">
                                <a href="<?php echo e(route('profile.show', $follow->following->id)); ?>" class="text-decoration-none text-dark fw-bold"><?php echo e($follow->following->name); ?></a>
                            </div>
                            <div class="col-auto text-end">
                                <?php if($follow->following->id != Auth::user()->id): ?>
                                    <?php if($follow->following->isFollowed()): ?>
                                        <form action="<?php echo e(route('follow.destroy', $follow->following->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="border-0 bg-transparent p-0 text-secondary btn-sm">Following</button>
                                        </form>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('follow.store', $follow->following->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="border-0 bg-transparent p-0 text-primary btn-sm">Follow</button>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php else: ?>
            <h3 class="text-muted fw-bold text-center">No Following Yet</h3>
        <?php endif; ?>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/insta-app/resources/views/users/profile/following.blade.php ENDPATH**/ ?>