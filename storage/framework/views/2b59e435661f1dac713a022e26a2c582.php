<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Font awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <h1 class="h5 mb-0"><?php echo e(config('app.name')); ?></h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    <!-- [SOON] Search here. Show it only to the logged-in users -->

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <!-- Home -->
                               <li class="nav-item" title="Home">
                                   <a href="<?php echo e(route('index')); ?>" class="nav-link"><i class="fa-solid fa-house text-dark icon-sm"></i></a>
                               </li>
                            <!-- Create Post -->
                                <li class="nav-item" title="Create Post">
                                    <a href="<?php echo e(route('post.create')); ?>" class="nav-link"><i class="fa-solid fa-circle-plus text-dark icon-sm"></i></a>
                                </li>

                                
                                <li class="nav-item dropdown">
                                   <button class="btn shadow-none nav-link" data-bs-toggle="dropdown" id="account-dropdown">
                                       <?php if(Auth::user()->avatar): ?>
                                           <img src="#" alt="<?php echo e(Auth::user()->name); ?>" class="rounded-circle avatar-sm">
                                        <?php else: ?>
                                            <i class="fa-solid fa-circle-user text-dark icon-sm"></i>
                                        <?php endif; ?>                                           
                                   </button>

                                   <div class="dropdown-menu dropdown-menu-end" aria-labelledby="account-dropdown">
                                    

                                    
                                    <a href="#" class="dropdown-item">
                                        <i class="fa-solid fa-circle-user"></i> Profile
                                    </a>
                                    
                                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item"
                                        onclick="event.preventDefault():document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i> <?php echo e(__('logout')); ?></a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                       <?php echo csrf_field(); ?>
                                    </form>
                                   </div>
                                </li>
                        
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    
                    
                    <div class="col-9">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                    
                </div>
            </div>
            
        </main>
    </div>
</body>
</html>
<?php /**PATH /Users/shimadaisaku/Desktop/laravel-insta/laravel-insta-app/insta-app/resources/views/layouts/app.blade.php ENDPATH**/ ?>