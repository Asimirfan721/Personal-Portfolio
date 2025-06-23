<?php $__env->startSection('content'); ?>
<style>
    body {
        background: #f4f6f8;
    }
    .resume-container {
        max-width: 600px;
        margin: 48px auto 0 auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(60,72,88,0.10), 0 1.5px 4px rgba(60,72,88,0.07);
        padding: 36px 32px 32px 32px;
    }
    .resume-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }
    .resume-header h1 {
        font-size: 1.7em;
        font-weight: 700;
        color: #4a90e2;
        margin: 0;
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
    }
    .btn-home:hover {
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
    .form-control:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.15);
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
    .uploaded-section {
        margin-top: 38px;
    }
    .uploaded-section h2 {
        color: #4a90e2;
        font-size: 1.2em;
        font-weight: 600;
        margin-bottom: 16px;
    }
    .list-group-item {
        background: #f8fafc;
        border: 1px solid #e3e7ed;
        border-radius: 8px;
        margin-bottom: 10px;
        font-size: 1.08em;
        color: #333;
        box-shadow: 0 1px 4px rgba(60,72,88,0.04);
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .list-group-item a {
        color: #4a90e2;
        font-weight: 500;
        text-decoration: underline;
        transition: color 0.2s;
    }
    .list-group-item a:hover {
        color: #357ab8;
    }
    .list-group-item p {
        margin: 0;
        color: #555;
        font-size: 0.98em;
    }
</style>

<div class="resume-container">
    <div class="resume-header">
        <h1>Upload Your Resume</h1>
        <a href="<?php echo e(url('/home')); ?>" class="btn-home">Home</a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('resume.upload')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="file" class="form-label">Select File (PDF/Image)</label>
            <input type="file" name="file" id="file" class="form-control" required>
            <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Enter a brief description" required>
            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="btn btn-primary w-100">Upload</button>
    </form>

    <div class="uploaded-section">
        <h2>Uploaded Files</h2>
        <ul class="list-group">
            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    <a href="<?php echo e(asset('storage/' . $file)); ?>" target="_blank"><?php echo e(basename($file)); ?></a>
                    <p><?php echo e($descriptions[$file] ?? ''); ?></p>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Taha Ahmed\OneDrive\Desktop\coding\laravel\Personal-Portfolio\resources\views/resume.blade.php ENDPATH**/ ?>