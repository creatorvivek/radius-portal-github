 <div class="card">
            <div class="card-header">
              <h3 class="card-title">NAS List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">




<div class="pull-right">
	<a href="<?= site_url('nas/add_nas'); ?>" class="btn btn-success">Add</a> 
</div>
<div class="table-responsive">
<table id ="nas_table" class="table table-bordered  table-hover">
	
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			
			<th>NAS ID</th>
			
			
			<th>MAC ADDRESS</th>
			<th>IP ADDRESS</th>
			<th>PORT</th>
			<th>TYPE</th>

			
			<th>DATE</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php  
		$count=1 ?>
		<?php foreach($nas as $row){ ?>
			<tr>
				<td><?= $count++ ?></td>
				
				<td><?= $row['name']; ?></td>
				
				
				<td><?= $row['nas_id']; ?></td>
				<td><?= $row['mac_address']; ?></td>
				<td><?= $row['ip_address']; ?></td>
				<td><?= $row['port']; ?></td>
				
				<td><?= $row['type']; ?></td>
				<td><?= $row['created_at']; ?></td>
				
				<td>
					<div class="btn-group" >
						<a href="<?= base_url() ?>nas/edit_view/<?= $row['id'] ?>" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Edit" ><i class="fa fa-pencil"></i></a>
					<!-- 	<button type="button" class="btn btn-danger" onclick="delFunction(<?= $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button> -->
						<!-- <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><a href="#" id="<?= $row['id']?>" class="view_data"><i class="fa fa-eye"></i></a></button> -->
						<a href="javascript:void(0)" class="btn btn-danger" onclick="delFunction(<?= $row['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-trash"></i></a>
						
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
			$('#nas_table').DataTable(
				{
					"processing": true
				});
		} );
	</script>
	<script type="text/javascript">
		var url="<?= base_url();?>";
		function delFunction(id)
		{
			
			
			bootbox.confirm("Are you sure?Are you sure to delete ", function(result) {
				if(result)
					
					window.location = url+'nas/remove/'+id ;
				
			});
		}

	</script>
	


<!-- <script type="text/javascript">
	$(window).load(function(){
   // PAGE IS FULLY LOADED  
   // FADE OUT YOUR OVERLAYING DIV
   $('#overlay').hide();
});
</script> -->