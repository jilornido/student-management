
  <?php $__env->startSection('style'); ?>
  
  <?php $__env->startSection('content'); ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add new Subject</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <form method="post" action="">
              <?php echo e(csrf_field()); ?>

                <div class="card-body">
                <div class="form-group">
                    <label>Subject Name</label>
                    <input type="text" class="form-control" name="name" required placeholder="Subject Name">
                  </div>

                  <div class="form-group">
                    <label>Subject Type</label>
                    <select class="form-control" name="type" required>
                        <option value="">Select Type</option>
                        <option value="Theory">Theory</option>
                        <option value="Practical">Practical</option>
                    </select>
                    
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                    </select>
                    
                  </div>
                      
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\student-management\resources\views/admin/subject/add.blade.php ENDPATH**/ ?>