<?php $__env->startSection('content'); ?>
<div class="page-header">
    <h3 class="page-title">
        <?php echo e(strtoupper(Request::segment(1))); ?>

    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin-dashboard-panel')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active"
                aria-current="page"><?php echo e(strtoupper(Request::segment(1))); ?></li>
        </ol>
    </nav>
</div>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card basic-form">
                {{--                <div class="card-header bg-light">--}}
                {{--                    <h3 class="text-22 text-midnight text-bold mb-4"> Create </h3>--}}
                {{--                </div>--}}
                <div class="card-body">


                    <?php if ($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all();
                            $__env->addLoop($__currentLoopData);
                            foreach ($__currentLoopData as $error): $__env->incrementLoopIndices();
                            $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach;
                            $__env->popLoop();
                            $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <form method="post" name="myForm" onsubmit="return validateForm()"
                          action="<?php echo route('permissions.store'); ?>"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="input-label">
                                        <label>Name</label>
                                    </div>
                                    <input type="text" required class="form-control" value="" name="name">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <div class="input-label">
                                        <label>Main</label>
                                    </div>
                                    <input type="checkbox" id="main_check" value="main" name="main">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <div class="input-label">
                                        <label>IsSub</label>
                                    </div>
                                    <input type="checkbox" 
                                           value="1" name="sub_menu">
                                </div>
                            </div>
                            <div class="col-6" id="parrent">
                                <div class="form-group">
                                    <div class="input-label">
                                        <label>Main Permission</label>
                                    </div>
                                    <select id="parrent_val" name="parent_id" class="form-control">
                                        <option value="">Select Option</option>
                                        <?php $__currentLoopData = $mainpermissions;
                                        $__env->addLoop($__currentLoopData);
                                        foreach ($__currentLoopData as $item): $__env->incrementLoopIndices();
                                        $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
                                        <?php endforeach;
                                        $__env->popLoop();
                                        $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="input-label">
                                        <label> Group Icon</label>
                                    </div>
                                    <input type="text" required class="form-control" value="" name="icon">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="input-label">
                                        <label>URL</label>
                                    </div>
                                    <input type="text" required class="form-control" value="" name="url">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="input-label">
                                        <label>Display Name</label>
                                    </div>
                                    <input type="text" required class="form-control" value="" name="display_name">
                                </div>
                            </div>


                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="form-group text-right">
                                    <button type="submit" class="btn  btn-outline-success btn-fw">Save</button>
                                    <a href="<?php echo route('permissions.index'); ?>"
                                       class="btn  btn-outline-danger btn-fw">Cancel </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    function validateForm() {

        let x = document.forms["myForm"]["name"].value;
        if (x == " ") {

            alert("Name must be filled out");
            return false;
        } else {
            alert(x);
        }
        let display_name = document.forms["myForm"]["display_name"].value;
        if (x == "") {
            alert("Display Name must be filled out");
            return false;
        }
    }


    $(document).ready(function () {
        // $('#main_check').change(function () {
        //     if ($(this).is(":checked")) {
        //         $("#parrent").addClass("d-none");
        //         $("#parrent_val").prop('required', false);
        //     } else {
        //         $("#parrent").removeClass("d-none");
        //         $("#parrent_val").prop('required', true);
        //     }
        // });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ashar.azeem\Desktop\projectsami\resources\views/admin/permissions/create.blade.php ENDPATH**/ ?>
