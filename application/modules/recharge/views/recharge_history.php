

 <div class="card">
            <div class="card-header">
              <h3 class="card-title">Recharge History</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">


<!-- <div id="overlay">loading...</div> -->
<table id="recharge_table" class="table table-bordered table-hover">
	
	<thead>
		<tr>
			<!-- <th>no</th> -->
			<th>recharge id</th>
			<th>Username</th>
			
			<th>Method</th>
			<th>Total Amount</th>
			<th>Paid Amount</th>
			<th>Balance</th>
			<th>Date</th>
			<th>Collect By</th>
			<!-- <th>created_by</th> -->
			
			
			
			<!-- <th>DATE</th> -->
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php  
		$count=1 ?>
		<?php foreach($recharge_history as $row){ ?>
			<tr>
				
					 <td><?= $row['id']; ?></td> 
				
				<td><?= $row['username']; ?></td>
				
				
				<td><?= $row['pay_type']; ?> / <?= $row['attend_type']; ?> </td>
				<td><?= $row['total_amount']; ?></td>
				<td><?= $row['paid_amount']; ?></td>
				<td><?= $row['balance']; ?></td>
				<td><?=  date('j F Y ', strtotime($row['date']) ) ; ?><br>
						<?=  date('h :i a', strtotime($row['date']) ) ; ?>
				</td>
			
				<td style="color:blue;"><?= $row['staff_name']; ?></td>
				<td></td>
				<!-- <td></td> -->
				
				
			</tr>
			
                 
		<?php } ?>
	</tbody>
</table>
</div>
</div>



	<script>
		$(document).ready( function () {
			$('#recharge_table').DataTable(
				{
					"processing": true
				});
		} );
	</script>
	


