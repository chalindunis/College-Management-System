<?php include("inc/header.php");?>
	<div class="container">
        <h3>VIEW STUDENTS</h3>

        <hr>
        <?php echo anchor("admin/dashboard", "Back",['class'=>'btn btn-primary'])?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Image</th>
                    <th>Student Name</th>
                    <th>College Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($students)): ?> <!--get database college data to update the table -->
                    <?php foreach($students as $student): ?>
                        <tr>
                            <td><?php echo $student->id; ?></td>
                            <td><img src="<?php echo base_url('assets/uploads/' . $student->student_img); ?>" alt="User Image" class="student-image" style="display: block; margin: auto;" ></td>  <!--//echo $student->student_img; ?></td>-->
                            <td><?php echo $student->studentname; ?></td>
                            <td><?php echo $student->collegename; ?></td>
                            <td><?php echo $student->gender; ?></td>
                            <td><?php echo $student->email; ?></td>
                            <td><?php echo $student->course; ?></td>
                            <td>
                                <?php echo anchor("admin/editStudent/{$student->id}", "Edit", ['class'=>'btn btn-warning'])?>
                                <?php echo anchor("admin/deleteStudent/{$student->id}", "Delete", ['class'=>'btn btn-danger'])?> 
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php else:?>
                    <tr>
                        <td colspan="8">No Data Found</td>
                    </tr>
                <?php endif;?>
            </tbody>
        </table>

    </div>

<?php include("inc/footer.php");?>
