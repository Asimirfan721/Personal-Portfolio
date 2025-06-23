

<?php $__env->startSection('content'); ?>
<style>
    body {
        background: #f4f6f8;
    }
    .category-container {
        max-width: 540px;
        margin: 40px auto 0 auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(60,72,88,0.10), 0 1.5px 4px rgba(60,72,88,0.07);
        padding: 32px 28px 28px 28px;
    }
    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
    }
    .category-header h2 {
        font-size: 1.5em;
        font-weight: 600;
        color: #3a3a3a;
        margin: 0;
    }
    .btn-back {
        background: #4a90e2;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 8px 20px;
        font-size: 1em;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.2s;
        box-shadow: 0 1px 4px rgba(60,72,88,0.07);
    }
    .btn-back:hover {
        background: #357ab8;
        color: #fff;
    }
    .form-label {
        font-weight: 500;
        color: #4a90e2;
        margin-bottom: 6px;
    }
    .form-control {
        border-radius: 6px;
        border: 1px solid #cfd8dc;
        background: #f4f6f8;
        color: #222;
        font-size: 1em;
        margin-bottom: 14px;
    }
    .btn-primary {
        background: #6abf69;
        border: none;
        border-radius: 6px;
        font-weight: 500;
        font-size: 1em;
        padding: 10px 28px;
        transition: background 0.2s;
    }
    .btn-primary:hover {
        background: #4e9e4e;
    }
    .alert-success {
        color: #2e7d32;
        background: #e8f5e9;
        border: 1px solid #b2dfdb;
        border-radius: 5px;
        font-size: 1.1em;
        font-weight: 500;
        margin-bottom: 18px;
        text-align: center;
        padding: 10px 0;
    }
    .category-list {
        margin-top: 18px;
        padding-left: 0;
        list-style: none;
    }
    .category-list li {
        background: #f8fafc;
        border: 1px solid #e3e7ed;
        border-radius: 8px;
        padding: 12px 18px;
        margin-bottom: 10px;
        font-size: 1.08em;
        color: #333;
        box-shadow: 0 1px 4px rgba(60,72,88,0.04);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .category-list li:before {
        content: "•";
        color: #4a90e2;
        font-size: 1.5em;
        margin-right: 8px;
    }
</style>

<div class="category-container">
    <div class="category-header">
        <h2>Add New Category</h2>
        <a href="<?php echo e(url('/home')); ?>" class="btn-back">Home</a>
    </div>
    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('category.store')); ?>">
        <?php echo csrf_field(); ?>
        <label for="name" class="form-label">Category Name</label>
        <input type="text" name="name" id="name" placeholder="Enter category name" class="form-control" required>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>

    <hr style="margin: 32px 0 18px 0;">

    <h4 style="color:#4a90e2; font-weight:600;">All Categories</h4>
    <ul class="category-list">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($cat->name); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Taha Ahmed\OneDrive\Desktop\coding\laravel\Personal-Portfolio\resources\views/category/index.blade.php ENDPATH**/ ?>