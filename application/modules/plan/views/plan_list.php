<style type="text/css">
.bg-danger
{
	background-color: red;
}
</style>


<div class="card">
	<div class="card-header">
		<h3 class="card-title">Plan List</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">


		<!-- <div id="overlay">loading...</div> -->
		<div class="table-responsive">
		<table id="plan_table" class="table table-bordered table-hover">
			
			<thead>
				<tr>
					
					<th>Plan name</th>
					<th>Description</th>
					<th>Amount</th>
					<th>Validity</th>
					<th>(Upload | download) data limit</th>
					<!-- <th>Download data limit</th> -->
					<th>Total data limit</th>

					
					<th>(Upload/Download) Speed</th>
					<!-- <th>Download Speed</th> -->
					<th>Transfer Speed</th>
					<th>Time Limit</th>
					<!-- <th>Post Usage</th> -->
					
					<!-- <th>Plan Type</th>/ -->
					<!-- <th>DATE</th> -->
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				
				<?php foreach($plan_lists as $row){ ?>
						
					<tr id="<?= $row['plan_id'] ?>">
					<?php 	if($row['status']==1)  { 

					   ?>
						<td style="background-color:green"><?= $row['name']; ?></td>
					<?php } else {        ?>
						<td style="background-color: #e60000"><?= $row['name']; ?></td>

				<?php 	}  ?>


						
					 <td><?= $row['description']; ?></td> 
						
						
						<td><?= $row['amount']; ?></td>
						<!-- for conversion of second in user friendly format -->
						<?php switch($row['validity_type'])
						{
							case 1:
							$row['validity']=$row['validity']/86400 .' &nbsp days';
							break;
							case 2:
							$row['validity']=$row['validity']/604800 .'&nbsp week';
							break;
							case 3:
							$row['validity']=$row['validity']/2592000 .'&nbsp month';
							break;
							$row['validity']=$row['validity']/31536000 .'&nbsp year';
						} ?>	

						<td><?= $row['validity']; ?></td>
						<!-- for speed -->
						<?php switch($row['speed_unit'])
						{
							case 1:
							@$row['transfer_speed']=$row['transfer_speed'] .'&nbsp kb/s';
							@$row['download_speed']=$row['download_speed'] .'&nbsp kb/s';
							@$row['upload_speed']=$row['upload_speed'] .'&nbsp kb/s';
							break;
							case 2:
							@$row['transfer_speed']=$row['transfer_speed']/1024 .'&nbsp Mb/s';
							@$row['download_speed']=$row['download_speed']/1024 .'&nbsp Mb/s';
							@$row['upload_speed']=$row['upload_speed']/1024 .'&nbsp Mb/s';
							break;
							case 3:
							@$row['transfer_speed']=$row['transfer_speed']/1048576 .'&nbsp Gb/s';
							@$row['download_speed']=$row['download_speed']/1048576 .'&nbsp Gb/s';
							@$row['upload_speed']=$row['upload_speed']/1048576 .'&nbsp Gb/s';
							break;
					
						} 
						?>
						









						
						

						<?php  switch($row['data_unit'])
						{
							case 1:
							@$row['data_transfer_limit']= $row['data_transfer_limit']*1024 ;
							@$row['upload_data_limit']= $row['upload_data_limit']*1024 ;
							@$row['download_data_limit']= $row['download_data_limit']*1024 ;
							$unit='&nbsp  Kb';
							break;
							case 2:
							@$row['data_transfer_limit']= $row['data_transfer_limit'] ;
							@$row['upload_data_limit']= $row['upload_data_limit'] ;
							@$row['download_data_limit']= $row['download_data_limit'] ;
							$unit='&nbsp  Mb';
							break;
							case 3:
							@$row['data_transfer_limit']= $row['data_transfer_limit']/1024 ;
							@$row['upload_data_limit']= $row['upload_data_limit']/1024 ;
							@$row['download_data_limit']= $row['download_data_limit']/1024 ;
							$unit='&nbsp  Gb';
							break;
					// $row['transfer_speed']=$row['transfer_speed']/31536000 .'&nbsp year';
						} ?>	
						<?php if($row['upload_data_limit']==0) { $row['upload_data_limit']=='unlimited' ;  }   ?>
						<td data-toggle="tooltip" title="0 means unlimited here"><?= $row['upload_data_limit']; ?> &nbsp/ <?= $row['download_data_limit']; ?></td> 
						
						
						<?php if($row['data_transfer_limit']==0) { $row['data_transfer_limit']='Unlimited';$unit=''; } ?>
						<td><?= $row['data_transfer_limit'].' '.$unit ;?></td>
						

						<td><?= $row['upload_speed']; ?> &nbsp/ <?= $row['download_speed']; ?></td>
						

						<td><?= $row['transfer_speed']; ?></td>
						<?php if($row['start_time'] ||  $row['end_time']) { ?>
							<td ><a href="<?= base_url() ?>("><?= $row['start_time']; ?> &nbsp/ <?= $row['end_time']; ?> </a></td>
						<?php } else { ?>
							<td>No Time limit</td> 
						<?php } ?>
						<!-- <?php  ?> -->
						<!-- <td><?php echo $row['plan_type']; ?></td> -->
						
						
						
						<!-- <div id="div2" class="table table-bordered" style="position:relative;z-index:20000;background-color:silver"></div> -->
						
						<!--  -->
						<td>
							<div class="btn-group" >
								<a href="<?= base_url() ?>plan/edit/<?= $row['plan_id'] ?>" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Edit" ><i class="fa fa-pencil"></i></a>
								<!-- <button type="button" class="btn btn-danger" onclick="delFunction(<?= $row['plan_id'] ?>);" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button> -->
								<!-- <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="buy plan"><a href="<?= base_url()?>payment/online?plan_id=<?= $row['plan_id'] ?>&amount=<?= $row['amount']; ?>&duration=<?= $row['validity_actual'] ?>&plan_name=<?= $row['name'] ?> " >buy</a>
								</button> -->
								
			

                 
               

                 <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <div class="dropdown-menu">
                  <!-- <a class="dropdown-item" href="<?=base_url() ?>plan/assign_plan/<?= $row['id']; ?>" >Assign plan</a> -->
                
                <a href="<?= base_url() ?>plan/deactivate_plan/<?= $row['plan_id'] ?>" class="dropdown-item">deactivate</a>
                <a href="<?= base_url() ?>plan/activate_plan/<?= $row['plan_id'] ?>" class="dropdown-item">activate</a>
                <a   onclick="fadeSecondryPlan(<?= $row['plan_id'] ?>)" class="dropdown-item">secondry</a>
              
               <!-- <button class="btn btn-danger">Call</button> -->
                </div> 

              </div>
            </td>
							</div>
						</td>
					<div id="div2" class="table table-bordered" style="position:relative;z-index:20000;background-color:silver"></div>
					</tr>
				<?php } ?>
			</tbody>

		</table>
		
	</div>
	</div>
</div>
<div class="modal" id="plan_secondry">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" >Plan </h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
            	<table class="body table table-bordered"></table>
            	</div>
            </div>
            <!-- Modal footer -->
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Edit</button>
              <button type="button" class="btn btn-success" onclick="submitFormAction()">Submit</button>
            </div> -->
          </div>
        </div>
      </div>
<script>
	$(document).ready( function () {
		$('#plan_table').DataTable(
		{
			"processing": true
		});
	});
</script>
<script type="text/javascript">
	// var url="<?= base_url();?>";
	// function delFunction(id)
	// {
		
	// 	bootbox.confirm("Are you sure want to delete? ", function(result) {
	// 		if(result)
	// 		{	
	// 			$('#'+id+'').closest('tr').addClass('bg-danger');
				
	// 			$.ajax({
	// 				type: "POST",
	// 				url: "<?= base_url() ?>plan/delete_plan",
	// 				data: {
	// 					plan_id:id
	// 				},

	// 				success: function (data) {
	// 					console.log(data);
						
	// 					$('#'+id+'').fadeOut(100);
						


	// 				},
	// 				error:function()
	// 				{
	// 					console.log("error");
	// 				}
	// 			});
	// 		}
			
	// 	});
	// }
function fadeSecondryPlan(plan_id)
  {
  	// console.log(plan_id);
   $.ajax({
  
    url: "<?= base_url() ?>plan/secondry_plan_list",
    method:"post",  
    data:{id:plan_id},
    success:function(data) 
    {
                          // $("#ajax_indicator").hide();
     // console.log(data);
             var obj=JSON.parse(data);
               // console.log(obj);
                            var i,row,transfer_speed,download_speed,upload_speed,data_transfer_limit,upload_data_limit,download_data_limit,speed;
                            var table_heading='<tr><th>plan name</th><th>upload data limit</th><th>download data limit</th><th>total data limit</th><th>Upload speed</th><th>download speed</th><th>transfer speed </th></tr>';
                            for(i=0;i<obj.length;i++)
                            {

                      // var speed=""+obj[i].speed_unit+"";
                      //       console.log(speed);

                      if(obj[i].speed_unit==1)
                      {
                       transfer_speed=""+obj[i].transfer_speed+"  kb/s";
                       download_speed=""+obj[i].download_speed +" kb/s";
                       upload_speed=""+obj[i].upload_speed +" kb/s";

                     }
                     if(obj[i].speed_unit==2)
                     {
                       var transfer_speed=""+obj[i].transfer_speed/1024 +"&nbsp Mb/s";
                       download_speed=""+obj[i].download_speed/1024 +"&nbsp Mb/s";
                       upload_speed=""+obj[i].upload_speed/1024 +"&nbsp Mb/s";

                     }
                     if(obj[i].speed_unit==3)
                     {

                      var transfer_speed=""+obj[i].transfer_speed/1048576 +"&nbsp Gb/s";
                      download_speed=""+obj[i].download_speed/1048576 +"&nbsp Gb/s";
                      upload_speed=""+obj[i].upload_speed/1048576 +"&nbsp Gb/s";
                    }


                    if(obj[i].data_unit==1)
                    {
                      data_transfer_limit= ""+obj[i].data_transfer_limit*1024 ;
                      upload_data_limit= ""+obj[i].upload_data_limit*1024 ;
                      download_data_limit= ""+obj[i].download_data_limit*1024 ;
                      unit="&nbsp  Kb";

                    }
                    if(obj[i].data_unit==2)
                    {

                      data_transfer_limit= ""+obj[i].data_transfer_limit ;
                      upload_data_limit= ""+obj[i].upload_data_limit;
                      download_data_limit= ""+obj[i].download_data_limit;
                      unit="&nbsp  Mb";
                    }
                    if(obj[i].data_unit==3)
                    {
                         data_transfer_limit= ""+obj[i].data_transfer_limit/1024 ;
                              upload_data_limit= ""+obj[i].upload_data_limit/1024 ;
                              download_data_limit= ""+obj[i].download_data_limit/1024 ;
                              unit="&nbsp  Gb";


                    }



                          //      switch(1)
                          //        {
                          //   case 1:
                          //    transfer_speed=""+obj[i].transfer_speed+"  kb/s";
                          
                          //   download_speed=""+obj[i].download_speed +" kb/s";
                          //   upload_speed=""+obj[i].upload_speed +" kb/s";
                          //   break;
                          //   case 2:
                          //  var transfer_speed=""+obj[i].transfer_speed/1024 +"&nbsp Mb/s";
                          //   download_speed=""+obj[i].download_speed/1024 +"&nbsp Mb/s";
                          //   upload_speed=""+obj[i].upload_speed/1024 +"&nbsp Mb/s";
                          //   break;
                          //   case 3:
                          //   var transfer_speed=""+obj[i].transfer_speed/1048576 +"&nbsp Gb/s";
                          //   download_speed=""+obj[i].download_speed/1048576 +"&nbsp Gb/s";
                          //   upload_speed=""+obj[i].upload_speed/1048576 +"&nbsp Gb/s";
                          //   break;

                          // } 
                          // switch(2)
                          // {
                          //   case 1:
                          //   data_transfer_limit= ""+obj[i].data_transfer_limit*1024 ;
                          //   upload_data_limit= ""+obj[i].upload_data_limit*1024 ;
                          //   download_data_limit= ""+obj[i].download_data_limit*1024 ;
                          //   $unit="&nbsp  Kb";
                          //   break;
                          //   case 2:
                          //   data_transfer_limit= ""+obj[i].data_transfer_limit ;
                          //   upload_data_limit= ""+obj[i].upload_data_limit;
                          //   download_data_limit= ""+obj[i].download_data_limit;
                          //   $unit="&nbsp  Mb";
                          //   break;
                          //   case 3:
                          //   data_transfer_limit= ""+obj[i].data_transfer_limit/1024 ;
                          //   upload_data_limit= ""+obj[i].upload_data_limit/1024 ;
                          //   download_data_limit= ""+obj[i].download_data_limit/1024 ;
                          //   $unit="&nbsp  Gb";
                          //   break;

                          // } 

                          row+='<tr><td>'+obj[i].name+'</td><td>'+upload_data_limit+'</td><td>'+download_data_limit+'</td><td>'+data_transfer_limit+'</td><td>'+upload_speed+'</td><td>'+download_speed+'</td><td>'+transfer_speed+'</td></tr>';
                        }
                        $(".body").html(table_heading+row);
                        $("#plan_secondry").modal();

                             $("#div2").slideDown("slow");
                            // $('#submit').attr('disabled', false);
                            // document.location.reload();
                          },
                        });

}
</script>