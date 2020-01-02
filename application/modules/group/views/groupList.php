<div class="card">
	<div class="card-header">
		<h3 class="card-title">Group List</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">


		<!-- <div id="overlay">loading...</div> -->
		<table id ="group_table" class="table table-bordered table-hover">

			<thead>
				<tr>
					<th>ID</th>
					<th>Group name</th>
					<th>Group head</th>

					<th>Frenchizy Detail</th>
					<th>Group discription</th>
					<th>Related Business</th>
					<th>date</th>

			<!-- 
			<th>MAC ADDRESS</th>
			<th>IP ADDRESS</th>
			<th>PORT</th>
			<th>TYPE</th> -->

			
			<!-- <th>DATE</th> -->
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php  
		$count=1 ?>
		<?php foreach($group as $row){ ?>
			<tr>
				<td><?= $count++ ?></td>
				
				<td><?= $row['name']; ?></td>
				
				
				<td><?= $row['head_name']; ?></td>
				<td><?= $row['frenchizy_detail']; ?></td>
				<td><?= $row['description']; ?></td>
				<td><?= $row['belong_business']; ?></td>
				<td><?= $row['created_at']; ?></td>
				
				
				<td>
					<div class="btn-group" >
						<a href="<?= base_url() ?>group/edit/<?= $row['id'] ?>" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Edit" ><i class="fa fa-pencil"></i></a>
						<button type="button" class="btn btn-danger" onclick="delFunction('<?= $row['group_id'] ?>');" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
						<!-- <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="#" id="<?= $row['id']?>" class="view_data"><i class="fa fa-eye"></i></a></button> -->
						<a href="<?= base_url() ?>group/group_info?group_id=<?= $row['group_id'] ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
						
					</div>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
</div>
</div>



<script>
	$(document).ready( function () {
		$('#group_table').DataTable(
		{
			"processing": true
		});
	} );
</script>
<script type="text/javascript">
	
	function delFunction(id)
	{
		console.log(id);

		bootbox.confirm("Are you sure?Are you sure to delete ", function(result) {
			if(result)
				$.ajax({  
					url:"<?= base_url()?>group/deleteGroup",  
					method:"post",  
					data:{group_id:id},  
					success:function(data){
						location.reload();
					},
					});
		});

	}

	</script>