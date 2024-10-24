<?php include("inc/header.php");?>
	<div class="container">
        <h3>CO-ADMIN DASHBOARD</h3>
        <?php $username = $this->session->userdata('username');?>
        <p>Welcome, <?php echo $username;?></p>

        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($students)): ?><!--get database college data to update the table -->
                    <?php foreach($students as $student): ?>
                        <tr>
                            
                            <td><?php echo $student->studentname; ?></td>
                            <td><?php echo $student->email; ?></td>
                            <td><?php echo $student->course; ?></td>
                        
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
