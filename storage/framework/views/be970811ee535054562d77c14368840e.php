<!DOCTYPE html>
<html>
<head>
    <title>Statement of Purpose</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f8;
            color: #222;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 32px 28px 28px 28px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(60,72,88,0.10), 0 1.5px 4px rgba(60,72,88,0.07);
        }
        h1 {
            color: #4a90e2;
            text-align: center;
            margin-bottom: 24px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .btn-home {
            background: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 8px 22px;
            font-size: 1em;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.2s;
            box-shadow: 0 1px 4px rgba(60,72,88,0.07);
            margin-bottom: 18px;
            display: inline-block;
        }
        .btn-home:hover {
            background: #357ab8;
            color: #fff;
        }
        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #b2dfdb;
            border-radius: 5px;
            font-size: 1.1em;
            font-weight: 500;
            margin-bottom: 18px;
            text-align: center;
            padding: 10px 0;
        }
        .alert-danger {
            background: #ffebee;
            color: #b71c1c;
            border: 1px solid #ffcdd2;
            border-radius: 5px;
            font-size: 1.05em;
            margin-bottom: 18px;
            padding: 10px 0;
        }
        .sop-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-bottom: 18px;
        }
        .sop-button {
            padding: 10px 18px;
            background: #6abf69;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 1em;
            font-weight: 500;
            transition: background 0.2s, transform 0.2s;
            box-shadow: 0 1px 4px rgba(60,72,88,0.07);
        }
        .sop-button:hover {
            background: #4e9e4e;
            color: #fff;
            transform: scale(1.04);
        }
        .btn-primary, .btn-danger {
            border: none;
            border-radius: 6px;
            font-weight: 500;
            font-size: 1em;
            padding: 10px 0;
            margin-top: 10px;
        }
        .btn-primary {
            background: #4a90e2;
        }
        .btn-primary:hover {
            background: #357ab8;
        }
        .btn-danger {
            background: #f44336;
        }
        .btn-danger:hover {
            background: #c62828;
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
        .form-control:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.15);
        }
        @media (max-width: 900px) {
            .container {
                padding: 18px 6px 18px 6px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Statement of Purpose</h1>

        <!-- Home Button -->
        <a href="<?php echo e(url('/home')); ?>" class="btn-home">Home</a>

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

        <!-- Create New SOP Button -->
        <a href="<?php echo e(route('statement-of-purpose.create')); ?>" class="btn btn-primary w-100 mt-2">Create New SOP</a>

        <!-- SOP Create Form -->
        <?php if(isset($create)): ?>
            <form method="POST" action="<?php echo e(route('statement-of-purpose.store')); ?>" class="mt-4">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Your Statement of Purpose</label>
                    <textarea name="content" class="form-control" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Create SOP</button>
            </form>
        <?php endif; ?>

        <!-- SOP Edit Form -->
        <?php if(isset($edit)): ?>
            <form method="POST" action="<?php echo e(route('statement-of-purpose.update', $edit->id)); ?>" class="mt-4">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo e($edit->title); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Your Statement of Purpose</label>
                    <textarea name="content" class="form-control" rows="10" required><?php echo e($edit->content); ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update SOP</button>
            </form>

            <form method="POST" action="<?php echo e(route('statement-of-purpose.destroy', $edit->id)); ?>" class="mt-2">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger w-100">Delete SOP</button>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\Taha Ahmed\OneDrive\Desktop\coding\laravel\Personal-Portfolio\resources\views/statement-of-purpos.blade.php ENDPATH**/ ?>