<!-- Redesigned AI.blade.php -->

<style>
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background-color: #f4f6f8;
        color: #222;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 900px;
        margin: 40px auto;
        padding: 32px 28px 28px 28px;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 4px 32px rgba(60,72,88,0.10), 0 1.5px 4px rgba(60,72,88,0.07);
    }
    .header {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-bottom: 18px;
    }
    .btn-home, .btn-Category, .btn-add-category {
        display: inline-block;
        padding: 10px 22px;
        background: #4a90e2;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 500;
        font-size: 1em;
        border: none;
        transition: background 0.2s;
        box-shadow: 0 1px 4px rgba(60,72,88,0.07);
    }
    .btn-home:hover, .btn-Category:hover, .btn-add-category:hover {
        background: #357ab8;
    }
    .btn-add-category {
        background: #6abf69;
        margin-left: auto;
    }
    .btn-add-category:hover {
        background: #4e9e4e;
    }
    .section-title {
        font-size: 1.6em;
        font-weight: 600;
        margin-bottom: 18px;
        color: #3a3a3a;
        letter-spacing: 0.5px;
    }
    .upload-form {
        background: #f8fafc;
        border: 1px solid #e3e7ed;
        border-radius: 10px;
        padding: 24px 20px 18px 20px;
        margin-bottom: 36px;
        box-shadow: 0 1px 4px rgba(60,72,88,0.04);
    }
    label {
        font-weight: 500;
        margin-bottom: 6px;
        display: block;
        color: #4a90e2;
    }
    input[type="text"], input[type="file"], select {
        width: 100%;
        padding: 10px;
        margin-bottom: 14px;
        border: 1px solid #cfd8dc;
        border-radius: 5px;
        background: #f4f6f8;
        color: #222;
        font-size: 1em;
    }
    button[type="submit"] {
        background: #4a90e2;
        color: #fff;
        padding: 10px 28px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 500;
        font-size: 1em;
        transition: background 0.2s;
        margin-top: 6px;
    }
    button[type="submit"]:hover {
        background: #357ab8;
    }
    .message, .error {
        font-size: 1.1em;
        font-weight: 500;
        margin-bottom: 18px;
        text-align: center;
        border-radius: 5px;
        padding: 10px 0;
    }
    .message {
        color: #2e7d32;
        background: #e8f5e9;
        border: 1px solid #b2dfdb;
    }
    .error {
        color: #b71c1c;
        background: #ffebee;
        border: 1px solid #ffcdd2;
    }
    .uploaded-files {
        margin-top: 18px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 28px;
    }
    .uploaded-file-item {
        background: #f8fafc;
        border: 1px solid #e3e7ed;
        border-radius: 10px;
        padding: 18px 12px 12px 12px;
        text-align: center;
        box-shadow: 0 1px 4px rgba(60,72,88,0.04);
        transition: box-shadow 0.2s;
    }
    .uploaded-file-item:hover {
        box-shadow: 0 4px 16px rgba(60,72,88,0.10);
    }
    .sequence-number {
        font-weight: bold;
        font-size: 1.1em;
        margin-bottom: 10px;
        color: #4a90e2;
    }
    .uploaded-files img {
        width: 100%;
        max-width: 220px;
        border: 1px solid #cfd8dc;
        border-radius: 8px;
        margin-bottom: 10px;
        transition: transform 0.3s;
        background: #fff;
    }
    .uploaded-files img:hover {
        transform: scale(1.08);
    }
    .uploaded-files p {
        font-size: 1em;
        margin-top: 8px;
        color: #333;
        word-break: break-word;
    }
    .uploaded-files a {
        color: #4a90e2;
        text-decoration: underline;
        font-size: 1em;
    }
</style>

<div class="container">
    <div class="header">
        <a href="<?php echo e(url('/home')); ?>" class="btn-home">Home</a>
        <a href="<?php echo e(route('coursera.showButtons')); ?>" class="btn-Category">Categories</a>
        <a href="<?php echo e(url('/categories')); ?>" class="btn-add-category">Add C ategory</a>
    </div>

    <div class="section-title">Upload a File</div>

    <?php if(session('success')): ?>
        <div class="message">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="error">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('upload')); ?>" method="POST" enctype="multipart/form-data" class="upload-form">
        <?php echo csrf_field(); ?>
        <div>
            <label for="category_id">Select Category:</label>
            <select name="category_id" required>
                <option value="">-- Choose Category --</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label for="file">Choose a file:</label>
            <input type="file" name="file" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" required>
        </div>
        <button type="submit">Upload</button>
    </form>

    <?php if(isset($uploads) && count($uploads) > 0): ?>
        <div class="section-title" style="margin-top: 30px; color: #e24a4a;">Uploaded Files</div>
        <div class="uploaded-files">
            <?php
                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            ?>
            <?php $__currentLoopData = $uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="uploaded-file-item">
                    <div class="sequence-number">#<?php echo e($index + 1); ?></div>
                    <?php if(in_array(strtolower(pathinfo($upload->image_path, PATHINFO_EXTENSION)), $imageExtensions)): ?>
                        <img src="<?php echo e(asset('storage/' . $upload->image_path)); ?>" alt="Uploaded Image">
                    <?php else: ?>
                        <a href="<?php echo e(asset('storage/' . $upload->image_path)); ?>" target="_blank">View File</a>
                    <?php endif; ?>
                    <p><?php echo e($upload->description); ?></p>
                   <?php if($upload->category): ?>
    <p style="color:#4a90e2; font-size:0.98em; margin-top:2px;">
        Category: <?php echo e($upload->category->name); ?>

    </p>
<?php else: ?>
    <p style="color:gray; font-size:0.95em; margin-top:2px;">
        Category: Not Assigned
    </p>
<?php endif; ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\Taha Ahmed\OneDrive\Desktop\coding\laravel\Personal-Portfolio\resources\views/AI.blade.php ENDPATH**/ ?>