<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Confirm Delete Student</h3>
        </div>
        <div class="card-body">
            <p>Are you sure you want to delete the following student?</p>
            
            <table class="table">
                <tr>
                    <th>Student Name:</th>
                    <td><?php echo $student->studentname; ?></td>
                </tr>
                <tr>
                    <th>College Name:</th>
                    <td><?php echo $student->collegename; ?></td>
                </tr>
                <tr>
                    <th>Course:</th>
                    <td><?php echo $student->course; ?></td>
                </tr>
            </table>

            <?php echo form_open("admin/deleteStudent/{$student->id}"); ?>
                <input type="hidden" name="confirm_delete" value="1">
                <button type="submit" class="btn btn-danger">Yes, Delete Student</button>
                <?php echo anchor("admin/viewStudents/{$student->college_id}", 'Cancel', ['class' => 'btn btn-secondary']); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>