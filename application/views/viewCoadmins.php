<?php include("inc/header.php");?>
	<div class="container">
        <h3>VIEW CO-ADMINS</h3>
        <?php $username = $this->session->userdata('username');?>
        <p>Welcome, <?php echo $username;?></p>

        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>College Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($coadmins)): ?> <!--get database college data to update the table -->
                    <!-- echo '<pre>';print_r($coadmins);echo '</pre>';exit(); -->
                    <?php foreach($coadmins as $coadmin): ?>
                        <tr>
                            <td><?php echo $coadmin->user_id; ?></td>
                            <td><?php echo $coadmin->username; ?></td>
                            <td><?php echo $coadmin->collegename; ?></td>
                            <td><?php echo $coadmin->email; ?></td>
                            <td><?php echo $coadmin->gender; ?></td>
                            <td>
                                <?php echo anchor("admin/viewStudents/{$coadmin->college_id}", "View Students", ['class'=>'buttons'])?>
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

        <?php echo anchor("admin/dashboard", "Back", ['class'=>'btn btn-primary']);?>

    </div>

<?php include("inc/footer.php");?>
