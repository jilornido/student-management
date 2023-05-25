
  <!-- <?php $__env->startSection('style'); ?> -->
  
  <?php $__env->startSection('content'); ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assign Subject List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="<?php echo e(url('admin/assign_subject/add')); ?>" class="btn btn-primary">New Assign Subject</a>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="row">
          
          <div class="col-md-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Assign Subject</h3>
              </div>
              <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                  
                <div class="form-group col-md-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="<?php echo e(Request::get('name')); ?>" name="name" placeholder="Name">
                  </div>

                  <div class="form-group col-md-3">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="<?php echo e(Request::get('date')); ?>" placeholder="Date">
                  </div>

                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                    <a href="<?php echo e(url('admin/assign_subject/list')); ?>" class="btn btn-success" type="submit" style="margin-top: 30px;">Reset</a>
                  </div>
                  
                  </div>    
                </div>
              </form>
            </div>
            <!-- /.card -->


          <?php echo $__env->make('_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Assign Subject List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Class Name</th>
                      <th>Subject Name</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $getRecord; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($value->id); ?></td>
                          <td><?php echo e($value->class_name); ?></td>
                          <td><?php echo e($value->subject_name); ?></td>
                          <td>
                            <?php if($value->status == 0): ?>
                              Active
                            <?php else: ?>
                              Inactive
                            <?php endif; ?>
                              </td>
                                <td><?php echo e($value->created_by_name); ?></td>
                                <td><?php echo e(date('d-m-Y H:i A', strtotime($value->created_at))); ?></td>
                              <td>
                                <a href="<?php echo e(url('admin/assign_subject/edit/' .$value->id)); ?>" class="btn btn-primary">Edit</a>
                                <a href="<?php echo e(url('admin/assign_subject/delete/' .$value->id)); ?>" class="btn btn-danger">Delete</a>
                              </td>
                          </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                  
                </div>
              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\student-management\resources\views/admin/assign_subject/list.blade.php ENDPATH**/ ?>