    <!DOCTYPE html>
    <html>
    <head>
        <title>Statement of Purpose</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #121212;
                color: #ffffff;
                font-family: 'Arial', sans-serif;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;   
                background-color: #1e1e1e;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                border: 1px solid #ff0000;
            }
            h1 {
                color: #ff0000;
                text-align: center;
                margin-bottom: 20px;
            }
            .btn-secondary {
                background-color: #ff0000;
                border: none;
                color: #ffffff;
            }
            .btn-secondary:hover {
                background-color: #cc0000;
            }
            .form-label {
                color: #ffffff;
            }
            .form-control {
                background-color: #2c2c2c;
                border: 1px solid #ff0000;
                color: #ffffff;
            }
            .form-control::placeholder {
                color: #cccccc;
            }
            .form-control:focus {
                background-color: #2c2c2c;
                border-color: #ff0000;
                color: #ffffff;
                box-shadow: 0 0 0 0.2rem rgba(255, 0, 0, 0.25);
            }
            .btn-primary {
                background-color: #ff0000;
                border: none;
            }
            .btn-primary:hover {
                background-color: #cc0000;
            }
            .alert-success {
                background-color: #1e4620;
                border-color: #28a745;
                color: #ffffff;
            }
            .alert-danger {
                background-color: #4a1e1e;
                border-color: #ff0000;
                color: #ffffff;
            }
            .sop-buttons {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                justify-content: center;
            }
            .sop-button {
                padding: 10px 15px;
                background: #ff0000;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-size: 16px;
            }
            .create-button {
                background: green;
                margin-top: 20px;
            }   
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <h1>Statement of Purpose</h1>

            <!-- Home Button -->
            <a href="<?php echo e(url('/home')); ?>" class="btn btn-secondary mb-3">Home</a>

            <!-- Success Message -->
            <?php if(session('success')): ?>
                <div class="alert alert-success text-center">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <!-- Display Validation Errors -->
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <!-- SOP Buttons -->
            <div class="sop-buttons">
                <?php $__currentLoopData = $statements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('statement-of-purpose.edit', $sop->id)); ?>" class="sop-button"><?php echo e($sop->title); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Create New SOP    ad Button -->
            <a href="<?php echo e(route('statement-of-purpose.create')); ?>" class="btn btn-primary w-100 mt-3">Create New SOP</a>

            <!-- SOP Form (Only show when editing or creating) -->
            <?php if(isset($sop)): ?>
                <form method="POST" action="<?php echo e(route('statement-of-purpose.update', $sop->id)); ?>" class="mt-4">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e($sop->title); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Your Statement of Purpose</label>
                        <textarea name="content" class="form-control" rows="10" placeholder="Write your statement here..."><?php echo e($sop->content); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update SOP</button>
                </form>

                <!-- Delete Button -->
                <form method="POST" action="<?php echo e(route('statement-of-purpose.destroy', $sop->id)); ?>" class="mt-2">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger w-100">Delete SOP</button>
                </form>
            <?php endif; ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
<?php /**PATH C:\Users\Taha Ahmed\OneDrive\Desktop\coding\laravel\Personal-Portfolio\resources\views/statement-of-purpose.blade.php ENDPATH**/ ?>