<!-- <div id="message"><div class="alert alert-success"></div></div> -->

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Frenchise List</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">

		<div class="pull-right">
			<a href="<?= site_url('super_admin/add_frenchise'); ?>" class="btn btn-success">Add</a> 
		</div> 

		<!-- <div id="overlay">loading...</div> -->
		<div class="table-responsive">
		<table id ="staff_table" class="table table-bordered table-hover">
			
			<thead>
				<tr>
					<!-- <th>no</th> -->
					<th>name</th>
					
					<th>email</th>
					<th>mobile</th>
					<th>Address</th>
					<th>parent frenchise</th>
					<!-- <th>password</th> -->
					<!-- <th>created_by</th> -->
					
					
					
					<!-- <th>DATE</th> -->
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php  
				$count=1 ?>
				<?php foreach($frenchise as $row){ ?>
					<tr>
						<!-- <td><?= $row['id']; ?></td> -->
						
						<td><?= $row['name']; ?></td>
						
						
						<td><?= $row['email']; ?></td>
						<td><?= $row['mobile']; ?></td>
						<td data-toggle="tooltip" title="<?= $row['address']; ?>"><?= substr($row['address'],0,20).'....' ?></td>
						<th> <?= $row['parent_name']; ?>      </th>
					
						
						
						
						
						
						
						<td>
							<div class="btn-group" >
								<a href="<?= base_url() ?>super_admin/edit/<?= $row['id'] ?>" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Edit" ><i class="fa fa-pencil"></i></a>
								<!-- <button type="button" class="btn btn-danger" onclick="delFunction(<?= $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button> -->
								<!-- <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="<?= base_url() ?>/frenchise/other_frenchise_session/<?= $row['id']?>" id="<?= $row['id']?>" class="view_data" target="_blank"><i class="fa fa-eye"></i></a></button>
								 -->
								
							</div>
						</td>
					</tr>
					<!-- <div class="modal fade" id="add_wallet" role="dialog"> -->
						<!-- <div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>

								</div>
								<div class="modal-body">
									<div class="col-md-10">
										<label for="ticket" class="col-md-12 control-label">ADD WALLET</label>
										<div class="form-group">
											<input type="text" class="form-control wallet">
										</div>
										<button class="btn btn-info add">ADD</button>
									</div>
									<div class="success"></div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">ok</button>
									</div>

								</div>
							</div>
						</div> -->
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
						url: "<?= base_url() ?>frenchise/delete",
						data: {
							member_id:id
						},

						success: function (data) {
							console.log(data);
							$('#'+id+'').fadeOut(100);
							location.reload();


						},
						error:function()
						{
							console.log("error");
						}
					});
				}
				
			});
		}

		function add_Wallet(fr_id)
		{
		
			$('#add_wallet').show();
			$('#add_wallet').modal();
		
		}


		$('.add').click(function(){
			var wallet=$('.wallet').val();
			console.log(wallet);
			$.ajax({
				url:"<?= base_url() ?>account/add_wallet",
				method:"POST",
				data:{wallet:wallet,f_id:fr_id},
				success: function (data) {
					console.log(data);
					$('.success').show('successfully wallet add');
				},
			});
		});
	
	</script>
	


