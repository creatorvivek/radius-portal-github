
<!-- <div class="pull-right">
	<a href="<?= site_url('nas/add_nas'); ?>" class="btn btn-success">Add</a> 
</div> -->
<!-- <div id="message"><div class="alert alert-success"></div></div> -->
 <div class="card">
            <div class="card-header">
              <h3 class="card-title">Staff List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">


<!-- <div id="overlay">loading...</div> -->
<div class="table-responsive">
<table id ="staff_table" class="table table-bordered table-hover">
	
	<thead>
		<tr>
			<!-- <th>id</th> -->
			<th>name</th>
			
			<th>email</th>
			<th>mobile</th>
			<!-- <th>location</th> -->
			<!-- <th>created_by</th> -->
			
			
			
			<!-- <th>DATE</th> -->
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php  
		$count=1; ?>
		<?php foreach($staff as $row){ ?>
			<tr id="<?= $row['id'] ?>">
				<!-- <td><?= $row['id']; ?></td> -->
				
				<td><?= $row['name']; ?></td>
				
				
				<td><?= $row['email']; ?></td>
				<td><?= $row['mobile']; ?><br><a href="<?= base_url() ?>sms/index?mobile=<?= $row['mobile'] ?>" class="btn btn-info">sms</a><button type="button" class="btn btn-danger">Call</button></td>
				
				
				
				
				
				
				<td>
					<div class="btn-group" >
						<a href="<?= base_url() ?>staff/edit/<?= $row['id'] ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
						<!-- <button type="button" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Edit"><a href="<?= base_url() ?>staff/edit/<?= $row['id'] ?>" ><i class="fa fa-pencil"></i></a></button> -->
						<button type="button" class="btn btn-danger" onclick="delFunction(<?= $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>

						 <!-- <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="#" id="<?= $row['id']?>" class="view_data"><i class="fa fa-eye"></i></a></button> -->
						
						
					</div>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
</div>
</div>
</div>



	<script>
		$(document).ready( function () {
			$('#staff_table').DataTable(
				{
					"processing": true
				});
		} );
	</script>
	<script type="text/javascript">
		var url="<?= base_url();?>";
		function delFunction(id)
		{
			
			
			bootbox.confirm("Are you sure want to delete ", function(result) {
				if(result)
				{	
					
				$.ajax({
					type: "POST",
					url: "<?= base_url() ?>staff/delete_member",
					data: {
						member_id:id
					},

					success: function (data) {
						console.log(data);
						// $('#message').show();
						// $('#message').html("succesfully deleted");
						if(data){
			                $('#'+id+'').fadeOut();
			                 }
			                 else
			                 {
			                        bootbox.alert("not deleted");
			                 }
									// location.reload();


					},
					error:function()
					{
						console.log("error");
					}
				});
				}
				
			});
		}

	</script>
	


