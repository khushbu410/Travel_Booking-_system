<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Bookings</h3>
		<!-- <div class="card-tools">
			<a href="?page=packages/manage" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div> -->
	</div>
	<div class="card-body">
        <div class="container-fluid">
        <table class="table table-stripped text-dark">
            <colgroup>
                <col width="5%">
                <col width="15">
                <col width="10">
                <col width="15">
                <col width="25">
                <col width="20">
                <col width="20">
                <col width="5">
                <col width="5">
            </colgroup>
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>No.Person</th>
                    <th>MobileNumber</th>
                    <th>Package</th>
                    <th>Check_in</th>
                    <th>Check_out</th>
                    <th>Payment_Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=1;
                    $qry = $conn->query("SELECT b.*,p.title,b.mobilenumber,concat(u.name,' ','')as name FROM book_list  b inner join `packages` p on p.id = b.package_id inner join users u on u.id = b.user_id order by date(b.date_created) desc ");
                    while($row= $qry->fetch_assoc()):
                ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['Number_guest'] ?></td>
                        <td><?php echo $row['mobilenumber'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo date("d-m-Y",strtotime($row['Check_in_date'])) ?></td>
                        <td><?php echo date("d-m-Y",strtotime($row['Check_out_date'])) ?></td>
                        <td class="text-center">
                            <?php if($row['payment_status'] == 0): ?>
                                <span class="badge badge-warning">Pending</span>
                            <?php elseif($row['payment_status'] == 1): ?>
                                <span class="badge badge-primary">Confirmed</span>
                            <?php elseif($row['payment_status'] == 2): ?>
                                <span class="badge badge-danger">Cancelled</span>
                            <?php elseif($row['payment_status'] == 3): ?>
                                <span class="badge badge-success">Done</span>
                            <?php endif; ?>
                        </td>
                        <td align="center">
                                <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    Action
                                <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item view_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-file text-primary"></span> View</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
                                </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this booking permanently?","delete_booking",[$(this).attr('data-id')])
		})
        $('.view_data').click(function(){
            uni_modal("Booking Information","books/view.php?id="+$(this).attr('data-id'))
        })
		$('.table').dataTable();
	})
	function delete_booking($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_booking",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>