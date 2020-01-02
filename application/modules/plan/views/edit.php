   <!-- <?= $secondry[1]['burst_mode']; ?> -->
<style type="text/css">
::placeholder {
	/*color: blue;*/
	font-size:15px;
}
.form-control { font-size:15px;}

@media (min-width: 992px) {
	::placeholder {
		/*color: blue;*/
		font-size:12px;

	}
	.form-control { font-size:12px;}
	select ::placeholder {font-size: 8px;}
	.input-group-text
	{
		font-size:10px;
	}
}
.input-group-text
{
	font-size:15px;
}
#ajax_indicator
{
	position: absolute;
	top:40%;
	left:50%;
	z-index: 3000;
	font-size: 30px;
}
 .form-group {
  position: relative;
  margin-bottom: 1.5rem;
}

.form-control-placeholder {
  position: absolute;
  top: 0;
  font-size: 12px;
  padding: 7px 0 0 13px;
  transition: all 200ms;
  opacity: 0.5;
}

.form-control:focus + .form-control-placeholder,
.form-control:valid + .form-control-placeholder {
  font-size: 75%;
  transform: translate3d(0, -100%, 0);
  opacity: 1;
}
</style>
 <!-- <?php 

// $plan_types=explode(',',$plan['data'][0]['plan_type']);
// // print_r($plan_type);
// print_r($plan_type);
// echo count($plan_types);



 ?> -->
 <div id="ajax_indicator"><i class="fa fa-spinner fa-spin" style="font-size:44px;"></i></div>
 <div class="row">

   <div class="col-md-10">
    <div class="card">

     <form id="form" method="post">
      <div class="card-header">
       <div class="row">
        <div class="col-md-2">
         <h3 class="card-title">Edit Plan</h3> 
       </div>
       <div class="col-md-5">
         <label style="font-weight:200"><input type="checkbox"  name="service_enable" value="enable" id="check" <?php if($plan['data'][0]['status']==1){ echo 'checked'; } ?> > Enabled </label>
       </div>
     </div>
     <!-- <div class="checkbox"> -->
      <!-- </div> -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
       <div class="col-md-6">

        <div class="form-group">
         <input type="text" name="plan_name"  class="form-control" id="plan_name" value="<?= ($this->input->post('plan_name') ? $this->input->post('plan_name') : $plan['data'][0]['name']); ?>" required  autofocus  tabindex=1  data-toggle="tooltip" title="plan name">
           <label class="form-control-placeholder" for="plan_name">Plan Name</label>
         <span class="text-danger service_name_error"></span>
       </div>
       <!-- </div> -->
       <!-- <div class="col-md-5"> -->
         <div class="form-group">
          <!-- <label  class="col-md-10 control-label"><span class="text-danger">*</span>Type of Service</label> -->
                    <!-- <select class="form-control"  name="service_type" id="plan_type" tabindex=3 >
                      <option value="">Plan Type</option>
                      <option value="prepaid">Prepaid</option>
                      <option value="postpaid">Postpaid</option>
                      <option value="advance_rental">Advance Rental</option>

                    </select> -->
                    <div class="form-group" tabindex=3>

                      <!-- <?php print_r(explode(',',$plan['data'][0]['plan_type'])); ?> -->
                      <select class="form-control select2"  id="plan_type" onfocusin="validation()"   tabindex=3  data-placeholder="Plan type" multiple style="width: 100%;" >
                        <!-- <option value="" disable>Plan Type</option> -->
                        <?php 
                      // var_dump($plan_type);
                        $length=count($plan_type);
                        // print_r($length);

                        $plan_type_edit=explode(',',$plan['data'][0]['plan_type']);
                        $plan_type_length= count($plan_type_edit);
                        for($i=0;$i<$length;$i++) { 

                          for($j=0;$j<$plan_type_length;$j++)
                          {

                            ?>
                            <!-- $plan_type[$i]['type']==$plan['data'][0]['plan_type']; -->
                            <option value="<?= $plan_type[$i]['id'] ?>" <?= ($plan_type[$i]['id'] == $plan_type_edit[$j]) ?'selected':''?> > <?= $plan_type[$i]['type'] ?>
                            
                          </option>
                          <!-- <option value="postpaid">Postpaid</option> -->
                          <!-- <option value="advance_rental">Advance Rental</option> -->
                        <?php } 
                      }  ?>
                    </select>
                     <!-- <label class="form-control-placeholder" for="plan_type">Plan type</label> -->
                  </div>
                </div>

                <div class="input-group">
                 <input type="text" name="validity" placeholder="Validity" class="form-control" id="validity" disabled  tabindex=5>
                 <select disabled tabindex=5  name="validity_unit" class="form-control" id="validity_unit" ><option value="">Select</option><option value="1">Days</option><option value="2">Week</option><option value="3">Month</option><option value="4">Year</option>
                 </select>

                 <input class="form-control" disabled type="text" name="amount" id="amount" placeholder="Amount" tabindex="6">
                 <span class="input-group-addon"><button type="button" tabindex="7" class="btn btn-success addMutipleValidity" >Add</button></span>
               </div>
               <br>


             </div>

             <!-- </div> -->
             <div class="col-md-6 col-xs-push-6">
               <div class="form-group">
                <textarea   class="form-control" id="discription"  rows="3.8" tabindex=2 ><?= ($this->input->post('discriptions') ? $this->input->post('discription') : $plan['data'][0]['description']); ?></textarea>
                   <label class="form-control-placeholder" for="Plan description">Plan description</label>
                <span class="text-danger nas_error"></span>
              </div>
              <!-- </div> -->



            </div>
          </div><!-- /row -->
          <?php 
          for($i=0;$i<count($amount_data);$i++)   { ?>
           <div class="row" id="row<?= $i ?>"><input type="hidden" value="<?= $amount_data[$i]['plan_amount_id'] ?>" class="plan_amount_id" > <div class="col-md-3"><div class="input-group"><span class="input-group-text">Validity</span><input type="text" name="" value="<?= $amount_data[$i]['validity'] ?>" class="form-control validity"  id="validity" tabindex=7 > <span class="input-group-text"><?= $amount_data[$i]['validity_type'] ?></span></div></div><div class="col-md-3"><div class="input-group"><span class="input-group-text">Amount</span><input type="text"  class="form-control amount" onkeyup="calculateTaxAmountKeypress(<?= $i ?>)" value="<?= $amount_data[$i]['amount'] ?>"  id="amount<?= $i ?>"   tabindex=7> <span class="input-group-text"><i class="fa fa-inr"></i></span></div></div><input type="hidden" value="<?= $amount_data[$i]['validity_unit'] ?> "  class="validity_unit" id="validity_unit"><div class="col-md-2"> <div class="input-group"><span class="input-group-text">Tax</span><input type="number"  class="form-control"  readonly id="tax<?= $i ?>" tabindex=8> </div></div><div class="col-md-3"><div class="input-group"><span class="input-group-text">Total Amount</span> <input type="number"  class="form-control"  readonly="readonly" id="total_amount<?= $i ?>" tabindex=9> <span class="input-group-text"><i class="fa fa-inr"></i></span></div></div><div class="col-md-1"><button type="button" class="btn btn-danger removeplanlist"  data-row="row<?= $i ?> onclick="removePlanAmountList()">-</button></div></div>
         <?php } ?>
         <div id="addValidityId"></div>

         <br><br>
         <div class="row" id="form_2">


           <div class="col-md-6">
            <div class="form-group">
             <!-- <label  class="col-md-10 control-label"><span class="text-danger">*</span>Type of Service</label> -->
             <select class="form-control"  name="priority" id="priority" tabindex=10>
              <option value="">Priority</option>
              <option value="1" <?= ($plan['data'][0]['priority'] == '1')?'selected':''?> >1</option>
              <option value="2" <?= ($plan['data'][0]['priority'] == '2')?'selected':''?> > 2</option>
              <option value="3" <?= ($plan['data'][0]['priority'] == '3')?'selected':''?>>3</option>
              <option value="4" <?= ($plan['data'][0]['priority'] == '4')?'selected':''?>>4</option>
              <option value="5" <?= ($plan['data'][0]['priority'] == '5')?'selected':''?>>5</option>
              <option value="6" <?= ($plan['data'][0]['priority'] == '6')?'selected':''?>>6</option>
              <option value="7" <?= ($plan['data'][0]['priority'] == '7')?'selected':''?>>7</option>
              <option value="8" <?= ($plan['data'][0]['priority'] == '8')?'selected':''?>>8</option>

            </select>
            <label class="form-control-placeholder" for="priority">Priority</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
           <!-- <label  class="col-md-10 control-label"><span class="text-danger">*</span>Type of Service</label> -->
           <select class="form-control"  name="vacation_mode" id="vacation_mode" tabindex=11 required>
            <option value="" >Vacation mode </option>
            <option value="1" <?php echo ($plan['data'][0]['vacation_mode'] == '1')?'selected':''?>>Enable</option>
            <option value="0" <?php echo ($plan['data'][0]['vacation_mode'] == '0')?'selected':''?>>Disable</option>


          </select>
           <label class="form-control-placeholder" for="vacation_mode">Vacation mode</label>
        </div>

      </div>
      <!-- <div id="totalbox"> -->


        <!-- </div> -->



        <div class="col-md-6" id="addRowsExtra"></div>




        <!-- </div> -->
        <!-- ./totalbox -->

      </div><!-- /.row -->



      



    </div><!-- /row under body  -->
  </div><!-- /card -->
  <div id="form_3">
  	<div class="card">
  		<div class="card-body">
  			<div class="row">
  				<div class="col-md-6 col-sm-6" id="add_row" >
  					<div class="row boxstylerow">
  						<div class="col-md-3 col-sm-3 form-group">
               <?php 
               switch($plan['data'][0]['data_unit'])
               {
               ##kb
                case 1:

                $upload_data_mb=$plan['data'][0]['upload_data_limit']*1024;
                $download_data_mb=$plan['data'][0]['download_data_limit']*1024;
                $data_transfer_mb=$plan['data'][0]['data_transfer_limit']*1024;
                break;
                    ##mb
                case 2:
                $upload_data_mb=$plan['data'][0]['upload_data_limit'];
                $download_data_mb=$plan['data'][0]['download_data_limit'];
                $data_transfer_mb=$plan['data'][0]['data_transfer_limit'];
                break;
                     ## gb
                case 3:

                $upload_data_mb=$plan['data'][0]['upload_data_limit']/1024;
                $download_data_mb=$plan['data'][0]['download_data_limit']/1024;
                $data_transfer_mb=$plan['data'][0]['data_transfer_limit']/1024;
                break;



              }



              ?>


              <!-- <div class="input-group"><span class="input-group-text">Validity</span> -->
               <input type="text" name="download_data"   class="form-control download_data download_data0" onkeyup="disableTotalData();" value="<?= ($this->input->post('download_data') ? $this->input->post('download_data'):$download_data_mb); ?>" required tabindex=12 data-toggle="tooltip" title="bydefault download data limit is 0,here 0 indicate unlimited">
               <label class="form-control-placeholder" for="download_data">Download data</label>
             </div>
             <div class="col-md-3 col-sm-6 col-xs-3 form-group">
               <input type="text" name="upload_data"  class="form-control upload_data upload_data0"   onkeyup="disableTotalData();" tabindex=13 data-toggle="tooltip" value="<?= ($this->input->post('download_data') ? $this->input->post('download_data'):$upload_data_mb); ?>" title="bydefault upload data limit is 0,here 0 indicate unlimited" required>
               <label class="form-control-placeholder" for="upload_data">Upload data</label>
             </div>
             <div class="col-md-3 col-sm-3 form-group">
              <div class="form-group">
               <input type="text" name="data_transfer"  class="form-control data_transfer data_transfer0"  onkeyup="disableOther()" tabindex=14 value="<?= ($this->input->post('download_data') ? $this->input->post('download_data'):$data_transfer_mb); ?>" required>
                <label class="form-control-placeholder" for="data_transfer">data transfer</label>
              </div>
             </div>
             <div class="col-md-2 col-sm-3 form-group">
               <select class="form-control data_unit" tabindex=15><option value="2" <?= ($plan['data'][0]['data_unit'] == '2')?'selected':''?>>Mb</option><option value="1" <?= ($plan['data'][0]['data_unit'] == '1')?'selected':''?>>Kb</option><option value="3" <?= ($plan['data'][0]['data_unit'] == '3')?'selected':''?>>Gb</option></select>
             </div>

             <?php 

             switch($plan['data'][0]['speed_unit'])
             {
               case 3:
               $upload_speed_kb=$plan['data'][0]['upload_speed']/(1024*1024);
               $download_speed_kb=$plan['data'][0]['download_speed']/(1024*1024);
               $transfer_speed_kb=$plan['data'][0]['transfer_speed']/(1024*1024);
                 //  if($burst_mode=="double")
                 //  {
                 //   $burst_threshold_ul=$uploadSpeed[$i]*1024*1024*2;
                 //   $burst_threshold_dl=$downloadSpeed[$i]*1024*1024*2;
                 //   $transfer_burst_threshold=$transferSpeed[$i]*1024*1024*2;
                 // }
               break;
               case 2:
               /*mb*/
               $upload_speed_kb=$plan['data'][0]['upload_speed']/1024;
               $download_speed_kb=$plan['data'][0]['download_speed']/1024;
               $transfer_speed_kb=$plan['data'][0]['transfer_speed']/1024;
                 // if($burst_mode=="double")
                 // {
                 //   $burst_threshold_ul=$uploadSpeed[$i]*1024*2;
                 //   $burst_threshold_dl=$downloadSpeed[$i]*1024*2;
                 //   $transfer_burst_threshold=$transferSpeed[$i]*1024*2;
                 // }
               break;

              ##kb
               case 1:
               $upload_speed_kb=$plan['data'][0]['upload_speed'];
               $download_speed_kb=$plan['data'][0]['download_speed'];
               $transfer_speed_kb=$plan['data'][0]['transfer_speed'];
               break;


             }



             ?>
             <div class="col-md-3 form-group">
               <input type="text" name="download_speed" class="form-control download_speed download_speed0" required value="<?= ($this->input->post('download_speed') ? $this->input->post('download_speed'): $download_speed_kb); ?>"  tabindex=16 onkeyup="disableTotalSpeed()">
               <label class="form-control-placeholder" for="download_speed">Download speed</label>
             </div>
               <div class="col-md-3 form-group">
                <input type="text" name="upload_speed" value="<?= ($this->input->post('upload_speed') ? $this->input->post('upload_speed'):$upload_speed_kb); ?>" class="form-control upload_speed upload_speed0"  tabindex=17  required  onkeyup="disableTotalSpeed()">
                <label class="form-control-placeholder" for="data_transfer">Upload speed</label>
              </div>
              <div class="col-md-3 form-group">
                <input type="text" name="transfer_speed" value="<?= ($this->input->post('transfer_speed') ? $this->input->post('transfer_speed'): $transfer_speed_kb); ?>" class="form-control transfer_speed transfer_speed0"  tabindex=18 required  onkeyup="disableOther()" >
                 <label class="form-control-placeholder" for="transfer_speed">Transfer speed</label>
              </div>
              <div class="col-md-2 form-group">
                <select class="form-control speed_unit"   tabindex=19><option value="2" <?= ($plan['data'][0]['speed_unit'] == '2')?'selected':''?>>Mb/s</option><option value="1" <?= ($plan['data'][0]['speed_unit'] == '1')?'selected':''?>>Kb/s</option><option value="3" <?= ($plan['data'][0]['speed_unit'] == '3')?'selected':''?>>Gb/s</option></select>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
             <div class="col-md-6" id="datalimitselect">
              <div class="row">
               <div class="col-md-4 form-group">
                <!-- <div class="form-group"> -->
                 <input type="text" name="limit_in_no" class="form-control limit_in_no"   value="<?= $plan['data'][0]['limit_in_no'] ?> " required>
                  <label class="form-control-placeholder" for="limit_in_no">limit</label>
                 <input type="hidden" name="plan_id" class="plan_id_all" value="<?= $plan['data'][0]['id'] ?>" >
                 <!-- </div> -->
               </div>
               <div class="col-md-4 form-group">
                 <!-- <div class="form-group"> -->

                  <select class="form-control limit_validity_unit" id="limit_validity_unit"  ><option value="" >select</option><option value="1" <?= ($plan['data'][0]['limit_unit'] == '1')?'selected':''?>>Days</option><option value="2" <?= ($plan['data'][0]['limit_unit'] == '2')?'selected':''?> >Week</option><option value="3" <?= ($plan['data'][0]['limit_unit'] == '3')?'selected':''?>>Month</option><option value="4">Year</option></select>
                   <label class="form-control-placeholder" for="limit_validity_unit">limit unit</label>


                  <!-- </div> -->
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                   <!-- <label  class="col-md-10 control-label"><span class="text-danger">*</span>Type of Service</label> -->
                   <select class="form-control repeat_mode"  name="repeat_mode" id="repeat_mode"  data-toggle="tooltip" title="repeat mode repeat data in option wise">
                    <option <?= ($plan['data'][0]['repeat_mode'] == '')?'selected':''?> value="">Repeat Mode</option>
                    <option value="1" <?= ($plan['data'][0]['repeat_mode'] == "1")?'selected':''?> >Once</option>
                    <option value="2" <?= ($plan['data'][0]['repeat_mode'] == "2")?'selected':''?> >Unlimited</option>

                  </select>
                  <label class="form-control-placeholder" for="repeat_mode">repeat mode</label>
                </div>
              </div>
            </div>
          </div>
          <?php 

          if($plan['data'][0]['start_time']==0)
          {
            $plan_startH='' ;
            $plan_startM='';
          }
          else
          {
            $result = explode(':',$plan['data'][0]['start_time']); 
            $plan_startH=$result[0];
            $plan_startM=$result[1];
          }
          if($plan['data'][0]['end_time']==0)
          {
            $plan_endH='' ;
            $plan_endM='' ;

          }
          else
          {
            $result2 = explode(':',$plan['data'][0]['end_time']); 
            $plan_endH=$result2[0];
            $plan_endM=$result2[1];
          }
          ?>

          <div class="col-md-6">
            <div class="input-group">
              <input type="text" name="" placeholder="00 H"  class="form-control startH" value="<?= $plan_startH ?>">
              <!-- <span class="input-group-addon">:</span> -->
              <input type="text" name="" placeholder="00 M" class="form-control startM" value="<?= $plan_startM ?>">
              <span class="input-group-text">To</span>
              <input type="text" name="" placeholder="23 H" class="form-control endH" value="<?= $plan_endH ?>">
              <input type="text" name="" placeholder="59 M" class="form-control endM" value="<?= $plan_endM ?>">

            </div>
          </div>
          <!-- </div> -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-md-3">

            <div class="form-group">

              <select class="form-control burst_mode0 burst_mode_array"  name="burst" id="burst_mode"  onchange="custom(0);" required tabindex=26>
                <option value="">Burst mode</option>
                <option value="1" <?= ($plan['data'][0]['burst_mode'] =='1')?'selected':''?>>disable</option>
                <option value="2" <?= ($plan['data'][0]['burst_mode'] =='2')?'selected':''?> >enable by double rate</option>
                <option value="3" <?= ($plan['data'][0]['burst_mode'] =='3')?'selected':''?>>custom</option>
              </select>
              <label class="form-control-placeholder" for="burst">Burst mode</label>
              <span class="text-danger burst_error"></span>
            </div>
          </div>

          <div class="col-md-9 pull-right">
           <!-- Default inline 1-->
           <label class="checkbox-inline" data-toggle="tooltip" title="Monday">
            <input type="checkbox"   class="monday" value="1" <?= ($plan['data'][0]['monday'] == '1')?'checked':''?> >&nbsp M
          </label>&nbsp&nbsp 
          <label class="checkbox-inline" data-toggle="tooltip" title="Tuesday">
            <input type="checkbox" class="tuesday" value="1" <?= ($plan['data'][0]['tuesday'] == '1')?'checked':''?> >&nbspT
          </label>&nbsp&nbsp 
          <label class="checkbox-inline" data-toggle="tooltip" title="Wednesday">
            <input type="checkbox"  class="wednesday" value="1" <?= ($plan['data'][0]['wednesday'] == '1')?'checked':''?> >&nbspW
          </label>&nbsp&nbsp 
          <label class="checkbox-inline" data-toggle="tooltip" title="Thrusday">
            <input type="checkbox" class="thrusday" value="1" <?= ($plan['data'][0]['thrusday'] == '1')?'checked':''?> >&nbspT
          </label>&nbsp&nbsp 
          <label class="checkbox-inline" data-toggle="tooltip" title="Friday">
            <input type="checkbox" class="friday" value="1" <?= ($plan['data'][0]['friday'] == '1')?'checked':''?> >&nbspF
          </label>&nbsp&nbsp  
          <label class="checkbox-inline" data-toggle="tooltip" title="Saturday">
            <input type="checkbox" class="saturday" value="1" <?= ($plan['data'][0]['saturday'] == '1')?'checked':''?> >&nbspS
          </label>&nbsp&nbsp  
          <label class="checkbox-inline" data-toggle="tooltip" title="Sunday">
            <input type="checkbox" class="sunday" value="1" <?= ($plan['data'][0]['sunday'] == '1')?'checked':''?> >&nbspSu
          </label>
        </div>



      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12"> <div class="table-responsive"><table class="table table-bordered">
      <tr><th></th><th>dl</th><th>ul</th><th>transfer</th></tr><tr><td> <span class="input-group-text">Burst limit</span></td><td><input type="text" class="form-control dlburstlimit dlburstlimit0" tabindex="27" value="<?= $plan['data'][0]['burst_limit_dl'] ?>"   onkeypress="return isNumberKey(event)" name="dlburstlimit"   /></td><td> <input type="text" class="form-control ulburstlimit ulburstlimit0" tabindex="28" value="<?= $plan['data'][0]['burst_limit_ul'] ?>" onkeypress="return isNumberKey(event)" name="ulburstlimit"  /></td><td><input type="text" class="form-control totalburstlimit totalburstlimit0" value="<?= $plan['data'][0]['total_burst_limit'] ?>" tabindex="29" onkeypress="return isNumberKey(event)" name="totalburstlimit"  /></td></tr><tr><td> <span class="input-group-text"> Burst threshold</span></td><td><input type="text" class="form-control dlburstthreshold dlburstthreshold0" value="<?= $plan['data'][0]['burst_threshold_dl'] ?>" onkeypress="return isNumberKey(event)" tabindex="30" name="dlburstthreshold"  /></td><td><input type="text" class="form-control ulburstthreshold ulburstthreshold0"   value="<?= $plan['data'][0]['burst_threshold_ul'] ?>" tabindex="31" onkeypress="return isNumberKey(event)" name="ulburstthreshold"  /></td><td><input type="text" class="form-control totalburstthreshold totalburstthreshold0"  value="<?= $plan['data'][0]['total_burst_threshold'] ?>" onkeypress="return isNumberKey(event)" tabindex="32" name="totalburstthreshold"  /></td></tr><tr><td> <span class="input-group-text"> Burst time(in sec)</span></td><td><input type="text" class="form-control dlbursttime dlbursttime0" value="<?= $plan['data'][0]['burst_time_dl'] ?>" tabindex="33" onkeypress="return isNumberKey(event)" name="dlbursttime" /></td><td><input type="text" class="form-control ulbursttime ulbursttime0"  value="<?= $plan['data'][0]['burst_time_ul'] ?>" tabindex="34" onkeypress="return isNumberKey(event)" name="ulbursttime" /></td><td><input type="text" class="form-control totalbursttime totalbursttime0" value="<?= $plan['data'][0]['total_burst_time'] ?>"  tabindex="35" onkeypress="return isNumberKey(event)" name="totalbursttime" /></td></tr><tr><td> <span class="input-group-text">Priority</span></td><td colspan="3"> <input type="text" class="form-control burst_priority burst_priority0" name="priority" onkeypress="return isNumberKey(event)" tabindex="36"  value="<?= $plan['data'][0]['burst_priority'] ?>" /></td></tr>
    </table></div></div>
  </div>
  <button type="button" class="btn btn-info pull-right"  id="addMultipleRow"  >Add More</button>

</div>
</div>
<input type="hidden" name="after_expire" id="after_expire" value="<?=$plan['data'][0]['after_expire'] ?>">

<?php 
          // print_r($secondry) ;
$secondryPlanlength=count($secondry);
for($j=1;$j<$secondryPlanlength;$j++) { 

  switch($secondry[$j]['speed_unit'])
  {
   case 3:
   $upload_speed_kb=$secondry[$j]['upload_speed']/(1024*1024);
   $download_speed_kb=$secondry[$j]['download_speed']/(1024*1024);
   $transfer_speed_kb=$secondry[$j]['transfer_speed']/(1024*1024);

   break;
   case 2:
   /*mb*/
   $upload_speed_kb=$secondry[$j]['upload_speed']/1024;
   $download_speed_kb=$secondry[$j]['download_speed']/1024;
   $transfer_speed_kb=$secondry[$j]['transfer_speed']/1024;

   break;

              ##kb
   case 1:
   $upload_speed_kb=$secondry[$j]['upload_speed'];
   $download_speed_kb=$secondry[$j]['download_speed'];
   $transfer_speed_kb=$secondry[$j]['transfer_speed'];
   break;


 }


 switch($secondry[$j]['data_unit'])
 {
               ##kb
  case 1:

  $upload_data_mb=$secondry[$j]['upload_data_limit']*1024;
  $download_data_mb=$secondry[$j]['download_data_limit']*1024;
  $data_transfer_mb=$secondry[$j]['data_transfer_limit']*1024;
  break;
                    ##mb
  case 2:
  $upload_data_mb=$secondry[$j]['upload_data_limit'];
  $download_data_mb=$secondry[$j]['download_data_limit'];
  $data_transfer_mb=$secondry[$j]['data_transfer_limit'];
  break;
                     ## gb
  case 3:

  $upload_data_mb=$secondry[$j]['upload_data_limit']/1024;
  $download_data_mb=$secondry[$j]['download_data_limit']/1024;
  $data_transfer_mb=$secondry[$j]['data_transfer_limit']/1024;
  break;



}

?>
<div class="card" id="row'+count+'">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6" id="add_row" >
       <div class="row boxstylerow">
        <div class="col-md-3 col-sm-3 form-group">
         <input type="hidden" name="plan_id" class="plan_id_all" value="<?= $secondry[$j]['id'] ?>" >
         <input type="text" name="download_data"   class="form-control download_data download_data<?= $j?>" onkeyup="disableTotalData();" tabindex=12 data-toggle="tooltip" title="bydefault download data limit is 0,here 0 indicate unlimited"  required  value="<?= ($this->input->post('download_data') ? $this->input->post('download_data'):$download_data_mb); ?>">
         <label class="form-control-placeholder" for="download_data">download data</label>

       </div>
       <div class="col-md-3 col-sm-3 form-group">
        <input type="text" name="upload_data"  class="form-control upload_data upload_data<?= $j?>" required   onkeyup="disableTotalData();" tabindex=13 data-toggle="tooltip" title="bydefault upload data limit is 0,here 0 indicate unlimited"  value="<?= ($this->input->post('upload_data') ? $this->input->post('upload_data'):$upload_data_mb); ?>">
        <label class="form-control-placeholder" for="upload_data">Upload data</label>
      </div>
        <div class="col-md-3 col-sm-3 form-group">
          <input type="text" name="data_transfer"  value="<?= ($this->input->post('data_transfer') ? $this->input->post('data_transfer'):$data_transfer_mb); ?>" class="form-control data_transfer data_transfer<?= $j?>" required data-toggle="tooltip" title="data transfer if 0 then unlimited" placeholder="Data Transfer" onkeyup="disableOther()" tabindex=14>
          <label class="form-control-placeholder" for="upload_data">data transfer</label>
        </div>
        <div class="col-md-2 col-sm-2 form-group">
          <select class="form-control data_unit" tabindex=15>
            <option value="2" value="<?= ($secondry[$j]['data_unit'] == '2')?'selected':''?>" >Mb</option><option value="1" <?= ($secondry[$j]['data_unit'] == '1')?'selected':''?>>Kb</option><option value="3" <?= ($secondry[$j]['data_unit'] == '3')?'selected':''?>>Gb</option></select>
            <!-- <label class="form-control-placeholder" for="upload_data">data transfer</label> -->
             </div>
            <div class="col-md-3 form-group">
              <input type="text" name="download_speed"  class="form-control download_speed download_speed<?= $j?>" required tabindex=16 onkeyup="disableTotalSpeed()" value="<?= ($this->input->post('download_speed') ? $this->input->post('download_speed'): $download_speed_kb); ?>">
            <label class="form-control-placeholder" for="download_speed">Download Speed</label>
          </div>
              <div class="col-md-3 form-group">
                <input type="text" name="upload_speed"  class="form-control upload_speed upload_speed<?= $j?>" required  tabindex=17 value="<?= ($this->input->post('upload_speed') ? $this->input->post('upload_speed'):$upload_speed_kb); ?>" onkeyup="disableTotalSpeed()">
                <label class="form-control-placeholder" for="upload_speed">Upload Speed</label>
              </div>
                <div class="col-md-3 form-group">
                  <input type="text" name="transfer_speed"  class="form-control transfer_speed transfer_speed<?= $j?>" required tabindex=18 onkeyup="disableOther()" value="<?= ($this->input->post('transfer_speed') ? $this->input->post('transfer_speed'): $transfer_speed_kb); ?>">
                 <label class="form-control-placeholder" for="transfer_speed">transfer speed</label></div>
                  <div class="col-md-2 form-group">
                    <select class="form-control speed_unit"  tabindex=19><option value="2" <?= ($secondry[$j]['speed_unit'] == '2')?'selected':''?>>Mb/s</option><option value="1" <?= ($secondry[$j]['speed_unit'] == '1')?'selected':''?>>Kb/s</option><option value="3" <?= ($secondry[$j]['speed_unit'] == '3')?'selected':''?>>Gb/s</option></select></div> </div></div>
                    <div class="col-md-6"><div class="row"><div class="col-md-6" id="datalimitselect"><div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="text" name="limit_in_no" class="form-control limit_in_no" required value="<?= $secondry[$j]['limit_in_no'] ?>" >
                           <label class="form-control-placeholder" for="limit_in_no">Limit</label>
                        </div>
                        </div>
                          <div class="col-md-4"><div class="form-group"><select class="form-control limit_validity_unit" name="limit_unit" id="limit_validity_unit" ><option value="">select</option><option value="1" <?= ($secondry[$j]['limit_unit'] == "1")?'selected':''?> >Days</option><option value="2" <?= ($secondry[$j]['limit_unit'] == "2")?'selected':''?> >Week</option><option value="3" <?= ($secondry[$j]['limit_unit'] == '3')?'selected':''?>>Month</option><option value="4" <?= ($secondry[$j]['limit_unit'] == '4')?'selected':''?>>Year</option></select>
                             <label class="form-control-placeholder" for="limit_unit">Limit unit</label>
                          </div></div>
                          <div class="col-md-4">
                            <div class="form-group">
                            <select class="form-control repeat_mode"  name="repeat_mode" id="repeat_mode"><option value="">Repeat Mode</option><option value="1" <?= ($secondry[$j]['repeat_mode'] == "1")?'selected':''?>">Once</option><option value="2" <?= ($secondry[$j]['repeat_mode'] == "2")?'selected':''?> >Unlimited</option></select>
                            <label class="form-control-placeholder" for="repeat_mode">Repeat mode</label>
                          </div> </div>
                          </div> </div>

                            <?php 

                            if($secondry[$j]['start_time']==0)
                            {
                              $plan_startH='' ;
                              $plan_startM='';
                            }
                            else
                            {
                              $result = explode(':',$secondry[$j]['start_time']); 
                              $plan_startH=$result[0];
                              $plan_startM=$result[1];
                            }
                            if($secondry[$j]['end_time']==0)
                            {
                              $plan_endH='' ;
                              $plan_endM='' ;

                            }
                            else
                            {
                              $result2 = explode(':',$secondry[$j]['end_time']); 
                              $plan_endH=$result2[0];
                              $plan_endM=$result2[1];
                            }
                            ?>

                            <div class="col-md-6">
                              <div class="input-group">
                                <input type="text" name="" placeholder="00 H" value="<?= $plan_startH ?>" class="form-control startH">
                                <input type="text" name="" placeholder="00 M"  value="<?= $plan_startM ?>"  class="form-control startM"><span class="input-group-text">To</span> 
                                <input type="text" name="" placeholder="23 H"  value="<?= $plan_endH ?>"  class="form-control endH">
                                <input type="text" name="" placeholder="59 M"   value="<?= $plan_endM ?>"  class="form-control endM"></div></div></div>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group"><select class="form-control burst_mode_array burst_mode<?= $j?>" name="burst" required id="burst_mode" tabindex=4 onchange="custom(<?= $j?>)"><option value="">Burst mode</option><option value="1" <?= ($secondry[$j]['burst_mode'] =='1')?'selected':''?>>disable</option><option value="2" <?= ($secondry[$j]['burst_mode'] =='2')?'selected':''?> >enable by double rate</option><option value="3" <?= ($secondry[$j]['burst_mode'] =='3')?'selected':''?> >custom</option></select>
                                      <label class="form-control-placeholder" for="burst">Burst mode</label>
                                      <span class="text-danger burst_error"></span>
                                    </div>
                                     <!-- <?= ($plan['data'][0]['burst_mode'] =='1')?'selected':''?> -->
                                  </div>
                                  <div class="col-md-9 pull-right">
                                    <label class="checkbox-inline" data-toggle="tooltip" title="Monday">
                                      <input type="checkbox"   class="monday" value="1" <?= ($secondry[$j]['monday'] == '1')?'checked':''?> >&nbsp M</label>&nbsp&nbsp 
                                      <label class="checkbox-inline" data-toggle="tooltip" title="Tuesday" <?= ($secondry[$j]['tuesday'] == '1')?'checked':''?>>
                                        <input type="checkbox" class="tuesday" value="1" <?= ($secondry[$j]['tuesday'] == '1')?'checked':''?> >&nbspT</label>&nbsp&nbsp <label class="checkbox-inline" data-toggle="tooltip" title="Wednesday">
                                          <input type="checkbox"  class="wednesday" value="1"<?= ($secondry[$j]['wednesday'] == '1')?'checked':''?>>&nbspW</label>&nbsp&nbsp <label class="checkbox-inline" data-toggle="tooltip" title="Thrusday">
                                            <input type="checkbox" class="thrusday" value="1" <?= ($secondry[$j]['thrusday'] == '1')?'checked':''?>>&nbspT</label>&nbsp&nbsp <label class="checkbox-inline" data-toggle="tooltip" title="Friday">
                                              <input type="checkbox" class="friday" value="1" <?= ($secondry[$j]['friday'] == '1')?'checked':''?>>&nbspF</label>&nbsp&nbsp  <label class="checkbox-inline" data-toggle="tooltip" title="Saturday">
                                                <input type="checkbox" class="saturday" value="1"<?= ($secondry[$j]['saturday'] == '1')?'checked':''?>>&nbspS</label>&nbsp&nbsp  <label class="checkbox-inline" data-toggle="tooltip" title="Sunday">
                                                  <input type="checkbox" class="sunday" value="1" <?= ($secondry[$j]['sunday'] == '1')?'checked':''?>>&nbspSu</label>
                                                  <button type="button" class="btn btn-danger form3row" data-row="row'+count+'">-</button>
                                                </div>
                                              </div>
                                            </div></div> </div>
                                            <div class="row">
                                              <div class="col-md-12"><div class="table-responsive"> <table class="table table-bordered"><tr><th></th><th>dl</th><th>ul</th><th>transfer</th></tr><tr><td> <span class="input-group-text">Burst limit</span></td><td><input type="text" class="form-control dlburstlimit dlburstlimit<?= $j ?>" tabindex="14"  value="<?= ($secondry[$j]['burst_limit_dl']) ?>"  onkeypress="return isNumberKey(event)" name="dlburstlimit"   /></td><td> <input type="text" class="form-control ulburstlimit ulburstlimit<?= $j ?>"  value="<?= ($secondry[$j]['burst_limit_ul']) ?>" tabindex="15" onkeypress="return isNumberKey(event)" name="ulburstlimit"  /></td><td><input type="text" class="form-control totalburstlimit totalburstlimit<?= $j ?>" tabindex="15" onkeypress="return isNumberKey(event)" value="<?= ($secondry[$j]['total_burst_limit']) ?>" name="totalburstlimit"  /></td></tr><tr><td> <span class="input-group-text"> Burst threshold</span></td><td><input type="text" class="form-control dlburstthreshold dlburstthreshold<?= $j ?>" value="<?= ($secondry[$j]['burst_threshold_dl']) ?>" onkeypress="return isNumberKey(event)" tabindex="16" name="dlburstthreshold"  /></td><td><input type="text" class="form-control ulburstthreshold ulburstthreshold<?= $j ?>"  value="<?= ($secondry[$j]['burst_threshold_ul']) ?>" tabindex="17" onkeypress="return isNumberKey(event)" name="ulburstthreshold"  /></td><td><input type="text" class="form-control totalburstthreshold totalburstthreshold<?= $j ?>"   value="<?= ($secondry[$j]['total_burst_threshold']) ?>" onkeypress="return isNumberKey(event)" tabindex="16" name="totalburstthreshold"  /></td></tr><tr><td> <span class="input-group-text"> Burst time (in sec )</span></td><td><input type="text" class="form-control dlbursttime dlbursttime<?= $j ?>" tabindex="18" onkeypress="return isNumberKey(event)"  value="<?= ($secondry[$j]['burst_time_dl']) ?>" name="dlbursttime" /></td><td><input type="text" class="form-control ulbursttime ulbursttime<?= $j ?>" value="<?= ($secondry[$j]['burst_time_ul']) ?>" tabindex="19" onkeypress="return isNumberKey(event)" name="ulbursttime" /></td><td><input type="text" class="form-control totalbursttime totalbursttime<?= $j ?>" value="<?= ($secondry[$j]['total_burst_time']) ?>" tabindex="19" onkeypress="return isNumberKey(event)" name="totalbursttime" /></td></tr><tr><td> <span class="input-group-text">Priority</span></td><td colspan="3"> <input type="text" class="form-control burst_priority burst_priority<?= $j ?>" name="priority" onkeypress="return isNumberKey(event)" tabindex="20" value="<?= ($secondry[$j]['burst_priority']) ?>" /></td></tr></table></div></div></div></div>
                                            <?php } ?>
                                            <div class="col-md-12" id="addRowsId"></div>
                                            <button type="button" class="btn btn-info pull-right"  id="addMultipleRow" style="display:none;" >Add More</button>

                                            <!-- <div class="row"><div class="col">Time</div></div> -->

                                            <div class="form-group">
                                              <div class="col-sm-offset-4 col-sm-5">
                                               <button type="button" class="btn btn-success" id="submit" onclick="updatePlan(event)" >update Plan</button>
                                             </div>
                                           </div>
                                         </form>
                                       </div>
                                     </div>

                                     <!-- <table><th>Amount</th></table> -->
                                     <script type="text/javascript">
                                      var amount_count="<?= count($amount_data) ?>";
  	// $('#enable_burst').click(function(){
  	// 	$('.burstmode').toggle();
  	// });





  	// $('#selected_validity').click(function(){

  	// });


  	function enableValidity()
  	{
  		var plan_name=$('#plan_name').val();
  		var plan_description=$('#discription').val();
  		var plan_type=$('#plan_type').val();
  		
  if(plan_name && plan_type && plan_description)
  {
  	$('#validity').prop("disabled",false);
  	$('#validity_unit').prop("disabled",false);
  	$('#amount').prop("disabled",false);
  	$('#validity').focus();  

  }


}
$(document).ready(function(){
	$('#ajax_indicator').hide();
  var plan_name=$('#plan_name').val();
      var plan_description=$('#discription').val();
      var plan_type=$('#plan_type').val();
      
  if(plan_name && plan_type && plan_description)
  {
    $('#validity').prop("disabled",false);
    $('#validity_unit').prop("disabled",false);
    $('#amount').prop("disabled",false);
    $('#validity').focus();  

  }
});
var number=1;
$('.addMutipleValidity').click(function(){
  var validity=$('#validity').val();
  var validity_unit=$('#validity_unit').val();
  var amount=$('#amount').val();
  var plan_name=$('#plan_name').val();
  var plan_description=$('#discription').val();
  var plan_type=$('#plan_type').val();
  var burst_mode=$('#burstmode').val();
  var validity_unit_sec;
  if(plan_name && plan_type && plan_description  && validity && validity_unit && amount )
  {
   $('#form_2').show();
   $('#form_3').show();
   $('#addMultipleRow').show();
   $("input[name=validity]").val('');
    // $("input[name=validity_unit]").val(' ');
    $('input[name=validity_unit]').prop('selectedIndex',0);
    $("input[name=amount]").val('');
    // $('validity').val(' ');
    // $('amount').val(' ');
   
    number = number + 1;
                var tax = parseInt(calculateTax(amount));
                total_amount = parseInt(amount) + parseInt(tax);
    
    console.log('unit'+validity_unit);
//      switch(validity_unit)
//      {
// case 1:
// validity_unit_sec="days";
// console.log(validity_unit_sec);
// break;
// case 2:
// validity_unit_sec="week";
// break;
// case 3:
// validity_unit_sec="month";
// break;
// case 4:
// validity_unit_sec="year";
// break;
//      }   
     if(validity_unit==1)
     {
      validity_unit_sec="days";
      }
      if(validity_unit==2)
      {
        validity_unit_sec="week";
      }      
      if(validity_unit==3)
      {
        validity_unit_sec="month";
      }
      if(validity_unit==4)
      {
        validity_unit_sec="year";
      }
      console.log('unit_name'+validity_unit_sec)    ;
    var plan_detail='<div class="row" id="row'+number+'"><div class="col-md-3"><div class="input-group"><span class="input-group-text">Validity</span><input type="text" name="" value="'+validity+'" class="form-control validity_sec"  id="validity" tabindex=7 readonly><span class="input-group-text">'+validity_unit_sec+'</span> </div></div><div class="col-md-3"><div class="input-group"><span class="input-group-text">Amount</span><input type="number"  class="form-control amount_sec" value="'+amount+'"  id="amount"  readonly tabindex=7> <span class="input-group-text"><i class="fa fa-inr"></i></span></div></div><input type="hidden" value="'+validity_unit+'"  class="validity_unit_sec" id="validity_unit"><div class="col-md-2"> <div class="input-group"><span class="input-group-text">Tax</span><input type="number" value="'+tax+'" class="form-control"  readonly id="tax" tabindex=8> </div></div><div class="col-md-3"><div class="input-group"><span class="input-group-text">Total Amount</span> <input type="text" value="'+total_amount+'" class="form-control"  readonly="readonly" id="total_amount" tabindex=9> <span class="input-group-text"><i class="fa fa-inr"></i></span></div></div><div class="col-md-1"><button type="button" class="btn btn-danger removeplanlist" onclick="removePlanAmountList()"  data-row="row'+number+'">-</button></div></div>';

    // calculateTotalAmount();
    $('#addValidityId').append(plan_detail);
  }
  else
  {
   alert('please fill all the field');
 }
});
function removePlanAmountList()
{
 $(document).on('click', '.removeplanlist', function(){
  var delete_rows = $(this).data("row");
  $('#' + delete_rows).remove();
});
}

var count=parseInt("<?= count($secondry) ?>")-1;
console.log(count);
$('#addMultipleRow').click(function(){
  count = parseInt(count) + 1;
  var newrow = '<div class="card" id="row'+count+'"><div class="card-body"><div class="row"><div class="col-md-6" id="add_row" > <div class="row boxstylerow"><div class="col-md-3 col-sm-3 "><input  type="text" name="download_data" placeholder="Download data"  class="form-control download_data_sec download_data'+count+'" onkeyup="disableTotalData('+count+');" tabindex=12 data-toggle="tooltip" title="bydefault download data limit is 0,here 0 indicate unlimited"></div><div class="col-md-3 col-sm-3"><input type="text" name="upload_data"  class="form-control upload_data_sec upload_data'+count+'"  placeholder="Upload data" onkeyup="disableTotalData('+count+');" tabindex=13 data-toggle="tooltip" title="bydefault upload data limit is 0,here 0 indicate unlimited"></div><div class="col-md-3 col-sm-3"><input type="text" name="data_transfer"  class="form-control data_transfer_sec data_transfer'+count+'" placeholder="Data Transfer" onkeyup="disableOther('+count+')" tabindex=14></div><div class="col-md-2 col-sm-2"><select class="form-control data_unit_sec" tabindex=15><option value="2">Mb</option><option value="1">Kb</option><option value="3">Gb</option></select> </div><div class="col-md-3"><input type="text" name="" placeholder="Download Speed"  class="form-control download_speed_sec download_speed'+count+'" tabindex=16 onkeyup="disableTotalSpeed('+count+')"></div><div class="col-md-3"><input type="text" name="upload_speed[]"  class="form-control upload_speed_sec upload_speed'+count+'" placeholder="Upload Speed" tabindex=17 onkeyup="disableTotalSpeed('+count+')"></div><div class="col-md-3"><input type="text" name="transfer_speed"  class="form-control transfer_speed_sec transfer_speed'+count+'" placeholder="Transfer Speed" tabindex=18 onkeyup="disableOther('+count+')" ></div><div class="col-md-2"><select class="form-control speed_unit_sec"  tabindex=19><option value="2">Mb/s</option><option value="1">Kb/s</option><option value="3">Gb/s</option></select></div> </div></div><div class="col-md-6"><div class="row"><div class="col-md-6" id="datalimitselect"><div class="row"><div class="col-md-4"><div class="form-group"><input type="text" name="" class="form-control limit_in_no_sec" placeholder="Limit"></div></div><div class="col-md-4"><div class="form-group"><select class="form-control limit_validity_unit_sec"  id="limit_validity_unit" ><option value="">select</option><option value="1">Days</option><option value="2">Week</option><option value="3">Month</option><option value="4">Year</option></select></div></div><div class="col-md-4"><div class="form-group"><select class="form-control repeat_mode_sec"  name="repeat_mode" id="repeat_mode"><option value="">Repeat Mode</option><option value="1">Once</option><option value="2">Unlimited</option></select></div> </div></div> </div> <div class="col-md-6"><div class="input-group"><input type="text" name="" placeholder="00 H" class="form-control startH_sec"><input type="text" name="" placeholder="00 M" class="form-control startM_sec"><span class="input-group-text">To</span> <input type="text" name="" placeholder="23 H" class="form-control endH_sec"><input type="text" name="" placeholder="59 M" class="form-control endM_sec"></div></div></div><div class="row"><div class="col-md-3"><div class="form-group"><select class="form-control burst_mode_array_sec burst_mode'+count+'" name="burst" required id="burst_mode" tabindex=4 onchange="custom('+count+')"><option value="">Burst mode</option><option value="1">disable</option><option value="2">enable by double rate</option><option value="3">custom</option></select><span class="text-danger burst_error"></span></div></div><div class="col-md-8 pull-right"><label class="checkbox-inline" data-toggle="tooltip" title="Monday"><input type="checkbox"   class="monday_sec" value="1" checked>&nbsp M</label>&nbsp&nbsp <label class="checkbox-inline" data-toggle="tooltip" title="Tuesday"><input type="checkbox" class="tuesday_sec" value="1" checked>&nbspT</label>&nbsp&nbsp <label class="checkbox-inline" data-toggle="tooltip" title="Wednesday"><input type="checkbox"  class="wednesday_sec" value="1" checked>&nbspW</label>&nbsp&nbsp <label class="checkbox-inline" data-toggle="tooltip" title="Thrusday"><input type="checkbox" class="thrusday_sec" value="1" checked>&nbspT</label>&nbsp&nbsp <label class="checkbox-inline" data-toggle="tooltip" title="Friday"><input type="checkbox" class="friday_sec" value="1" checked>&nbspF</label>&nbsp&nbsp  <label class="checkbox-inline" data-toggle="tooltip" title="Saturday"><input type="checkbox" class="saturday_sec" value="1" checked>&nbspS</label>&nbsp&nbsp  <label class="checkbox-inline" data-toggle="tooltip" title="Sunday"><input type="checkbox" class="sunday_sec" value="1" checked>&nbspSu</label></div><button type="button" class="btn btn-danger form3row" data-row="row' + count + '">-</button></div> </div></div> </div><div class="col-md-12"> <table class="table table-bordered"><tr><th></th><th>dl</th><th>ul</th><th>transfer</th></tr><tr><td> <span class="input-group-text">Burst limit</span></td><td><input type="text" class="form-control dlburstlimit_sec dlburstlimit'+count+'" tabindex="14"   onkeypress="return isNumberKey(event)" name="dlburstlimit"   /></td><td> <input type="text" class="form-control ulburstlimit_sec ulburstlimit'+count+'" tabindex="15" onkeypress="return isNumberKey(event)" name="ulburstlimit"  /></td><td><input type="text" class="form-control totalburstlimit_sec totalburstlimit'+count+'" tabindex="15" onkeypress="return isNumberKey(event)" name="totalburstlimit"  /></td></tr><tr><td> <span class="input-group-text"> Burst threshold</span></td><td><input type="text" class="form-control dlburstthreshold_sec dlburstthreshold'+count+'" onkeypress="return isNumberKey(event)" tabindex="16" name="dlburstthreshold"  /></td><td><input type="text" class="form-control ulburstthreshold_sec ulburstthreshold'+count+'" tabindex="17" onkeypress="return isNumberKey(event)" name="ulburstthreshold"  /></td><td><input type="text" class="form-control totalburstthreshold_sec totalburstthreshold'+count+'" onkeypress="return isNumberKey(event)" tabindex="16" name="totalburstthreshold"  /></td></tr><tr><td> <span class="input-group-text"> Burst time (in sec )</span></td><td><input type="text" class="form-control dlbursttime_sec dlbursttime'+count+'" tabindex="18" onkeypress="return isNumberKey(event)" name="dlbursttime" /></td><td><input type="text" class="form-control ulbursttime_sec ulbursttime'+count+'" tabindex="19" onkeypress="return isNumberKey(event)" name="ulbursttime" /></td><td><input type="text" class="form-control totalbursttime_sec totalbursttime'+count+'" tabindex="19" onkeypress="return isNumberKey(event)" name="totalbursttime" /></td></tr><tr><td> <span class="input-group-text">Priority</span></td><td colspan="3"> <input type="text" class="form-control burst_priority_sec burst_priority'+count+'" name="priority" onkeypress="return isNumberKey(event)" tabindex="20" value="8" /></td></tr></table></div></div>';
    // var newrow='<br><div class="row  boxstylerow" id="row'+count+'"><div class="col-md-3 col-sm-3 "><input type="text" name="download_data" placeholder="Download data"  class="form-control download_data" onkeyup="disableTotalData();"></div><div class="col-md-3 col-sm-3"><input type="text" name="upload_data"  class="form-control upload_data"  placeholder="Upload data" onkeyup="disableTotalData();"></div><div class="col-md-3 col-sm-3"><input type="text" name="data_transfer"  class="form-control data_transfer" placeholder="Data Transfer" onkeyup="disableOther()"></div><div class="col-md-2 col-sm-2"><select class="form-control"><option>Mb</option><option>Kb</option><option>Gb</option></select></div><div class="col-md-1"><button name="remove" data-row="row'+count+'" class="btn btn-danger remove">-</button></div><div class="col-md-3 "><input type="text" name="" placeholder="Download Speed"  class="form-control download_speed" onkeyup="disableTotalSpeed()"></div><div class="col-md-3"><input type="text" name="upload_speed[]"  class="form-control upload_speed" placeholder="Upload Speed" onkeyup="disableTotalSpeed()"></div><div class="col-md-3"><input type="text" name="transfer_speed"  class="form-control transfer_speed" placeholder="Transfer Speed" onkeyup="disableOther()" ></div><div class="col-md-2"><select class="form-control"><option>Mb/s</option><option>Kb/s</option><option>Gb/s</option></select></div></div> </div><div class="row"></div>';
    // var i=$('.boxstylerow').val();
    $('#addRowsId').append(newrow);
  });
   $(document).on('click', '.remove', function(){
     var delete_row = $(this).data("row");
     $('#' + delete_row).remove();
   });
   $(document).on('click', '.form3row', function(){
     var delete_row = $(this).data("row");
     $('#' + delete_row).remove();
   });
   function updatePlan(event)
   {
// $("#form" ).on( "submit", function( event ) {
	$("#ajax_indicator").show();
	event.preventDefault();
  var validity = [];
  var validity_unit = [];
  var amount = [];
	var download_data = [];
	var upload_data = [];
	var data_transfer = [];
	var upload_speed = [];
	var download_speed = [];
	var transfer_speed = [];
	var data_unit = [];
	var speed_unit = [];
	var start_hour = [];
	var start_minute = [];
	var end_hour = [];
	var end_minute = [];
	var sunday = [];
	var monday = [];
	var tuesday = [];
	var wednesday = [];
	var thrusday = [];
	var friday = [];
	var saturday = [];
 var limit_in_no=[];
 var limit_validity_unit=[];
 var repeat_mode=[];
 var plan_amount_id=[];
 var plan_id_all=[];

 var dlburstlimit=[];
 var ulburstlimit=[];
 var ulburstlimit=[];
 var dlburstthreshold=[];
 var ulburstthreshold=[];
 var dlbursttime=[];
 var ulbursttime=[];
 var burst_priority=[];
 var burst_mode_array=[];
 var totalburstlimit=[];
 var totalburstthreshold=[];
 var totalbursttime=[];

/* for if add validty more in edit time*/
var validity_sec=[];
var validity_unit_sec=[];
var amount_sec=[];


/*if add more plan than*/
var download_data_sec = [];
  var upload_data_sec = [];
  var data_transfer_sec = [];
  var upload_speed_sec = [];
  var download_speed_sec = [];
  var transfer_speed_sec = [];
  var data_unit_sec = [];
  var speed_unit_sec = [];
  var start_hour_sec = [];
  var start_minute_sec = [];
  var end_hour_sec = [];
  var end_minute_sec = [];
  var sunday_sec = [];
  var monday_sec = [];
  var tuesday_sec = [];
  var wednesday_sec = [];
  var thrusday_sec = [];
  var friday_sec = [];
  var saturday_sec = [];
 var limit_in_no_sec=[];
 var limit_validity_unit_sec=[];
 var repeat_mode_sec=[];
 var plan_amount_id_sec=[];
 var plan_id_all_sec=[];
 
 var dlburstlimit_sec=[];
 var ulburstlimit_sec=[];
 var ulburstlimit_sec=[];
 var dlburstthreshold_sec=[];
 var ulburstthreshold_sec=[];
 var dlbursttime_sec=[];
 var ulbursttime_sec=[];
 var burst_priority_sec=[];
 var burst_mode_array_sec=[];
 var totalburstlimit_sec=[];
 var totalburstthreshold_sec=[];
 var totalbursttime_sec=[];

/*----*/
// var item_price = [];
$('.validity').each(function(){
	validity.push($(this).val());
}); 
$('.amount').each(function(){
	amount.push($(this).val());
}); 
$('.validity_unit').each(function(){
	validity_unit.push($(this).val());
}); 
$('.download_data').each(function(){
  download_data.push($(this).val());
});
$('.upload_data').each(function(){
  upload_data.push($(this).val());
}); 
$('.data_transfer').each(function(){
  data_transfer.push($(this).val());
});
$('.upload_speed').each(function(){
  upload_speed.push($(this).val());
});
$('.download_speed').each(function(){
  download_speed.push($(this).val());
}); 
$('.transfer_speed').each(function(){
  transfer_speed.push($(this).val());
}); 
$('.data_unit').each(function(){
  data_unit.push($(this).val());
}); 
$('.speed_unit').each(function(){
	speed_unit.push($(this).val());
}); 
$('.startH').each(function(){
	start_hour.push($(this).val());
});
$('.startM').each(function(){
	start_minute.push($(this).val());
});
$('.endH').each(function(){
	end_hour.push($(this).val());
});
$('.endM').each(function(){
	end_minute.push($(this).val());
});
$('.sunday').each(function(){
	sunday.push(this.checked ? $(this).val() : 0);
});
$('.monday').each(function(){
	monday.push(this.checked ? $(this).val() : 0);
});
$('.tuesday').each(function(){
	tuesday.push(this.checked ? $(this).val() : 0);
});
$('.wednesday').each(function(){
	wednesday.push(this.checked ? $(this).val() : 0);
});
$('.thrusday').each(function(){
	thrusday.push(this.checked ? $(this).val() : 0);
});
$('.friday').each(function(){
	friday.push(this.checked ? $(this).val() : 0);
});
$('.saturday').each(function(){
	saturday.push(this.checked ? $(this).val() : 0);
});
$('.limit_in_no').each(function(){
  limit_in_no.push($(this).val());
});
$('.limit_validity_unit').each(function(){
  limit_validity_unit.push($(this).val());
});
$('.repeat_mode').each(function(){
  repeat_mode.push($(this).val());
});
$('.plan_amount_id').each(function(){
  plan_amount_id.push($(this).val());
});
$('.plan_id_all').each(function(){
  plan_id_all.push($(this).val());
});
$('.dlburstlimit').each(function() {
  dlburstlimit.push($(this).val());
});
$('.ulburstlimit').each(function() {
  ulburstlimit.push($(this).val());
});
$('.dlburstthreshold').each(function() {
  dlburstthreshold.push($(this).val());
});
$('.ulburstthreshold').each(function() {
  ulburstthreshold.push($(this).val());
});

$('.dlbursttime').each(function() {
  dlbursttime.push($(this).val());
});
$('.ulbursttime').each(function() {
  ulbursttime.push($(this).val());
});

$('.burst_priority').each(function() {
  burst_priority.push($(this).val());
});
$('.burst_mode_array').each(function() {
  burst_mode_array.push($(this).val());
});
$('.totalbursttime').each(function() {
  totalbursttime.push($(this).val());
});
$('.totalburstthreshold').each(function() {
  totalburstthreshold.push($(this).val());
});
$('.totalburstlimit').each(function() {
  totalburstlimit.push($(this).val());
});
$('.validity_sec').each(function() {
  validity_sec.push($(this).val());
});
$('.validity_unit_sec').each(function() {
  validity_unit_sec.push($(this).val());
});
$('.amount_sec').each(function() {
  amount_sec.push($(this).val());
});




/*for extra plan added*/
$('.download_data_sec').each(function(){
  download_data_sec.push($(this).val());
});
$('.upload_data_sec').each(function(){
  upload_data_sec.push($(this).val());
}); 
$('.data_transfer_sec').each(function(){
  data_transfer_sec.push($(this).val());
});
$('.upload_speed_sec').each(function(){
  upload_speed_sec.push($(this).val());
});
$('.download_speed_sec').each(function(){
  download_speed_sec.push($(this).val());
}); 
$('.transfer_speed_sec').each(function(){
  transfer_speed_sec.push($(this).val());
}); 
$('.data_unit_sec').each(function(){
  data_unit_sec.push($(this).val());
}); 
$('.speed_unit_sec').each(function(){
  speed_unit_sec.push($(this).val());
}); 
$('.startH_sec').each(function(){
  start_hour_sec.push($(this).val());
});
$('.startM_sec').each(function(){
  start_minute_sec.push($(this).val());
});
$('.endH_sec').each(function(){
  end_hour_sec.push($(this).val());
});
$('.endM_sec').each(function(){
  end_minute_sec.push($(this).val());
});
$('.sunday_sec').each(function(){
  sunday_sec.push(this.checked ? $(this).val() : 0);
});
$('.monday_sec').each(function(){
  monday_sec.push(this.checked ? $(this).val() : 0);
});
$('.tuesday_sec').each(function(){
  tuesday_sec.push(this.checked ? $(this).val() : 0);
});
$('.wednesday_sec').each(function(){
  wednesday_sec.push(this.checked ? $(this).val() : 0);
});
$('.thrusday_sec').each(function(){
  thrusday_sec.push(this.checked ? $(this).val() : 0);
});
$('.friday_sec').each(function(){
  friday_sec.push(this.checked ? $(this).val() : 0);
});
$('.saturday_sec').each(function(){
  saturday_sec.push(this.checked ? $(this).val() : 0);
});
$('.limit_in_no_sec').each(function(){
  limit_in_no_sec.push($(this).val());
});
$('.limit_validity_unit_sec').each(function(){
  limit_validity_unit_sec.push($(this).val());
});
$('.repeat_mode_sec').each(function(){
  repeat_mode_sec.push($(this).val());
});

$('.burst_mode_array_sec').each(function(){
  burst_mode_array_sec.push($(this).val());
});

$('.plan_amount_id_sec').each(function(){
  plan_amount_id_sec.push($(this).val());
});
$('.plan_id_all_sec').each(function(){
  plan_id_all_sec.push($(this).val());
});
$('.dlburstlimit_sec').each(function() {
  dlburstlimit_sec.push($(this).val());
});
$('.ulburstlimit_sec').each(function() {
  ulburstlimit_sec.push($(this).val());
});
$('.dlburstthreshold_sec').each(function() {
  dlburstthreshold_sec.push($(this).val());
});
$('.ulburstthreshold_sec').each(function() {
  ulburstthreshold_sec.push($(this).val());
});

$('.dlbursttime_sec').each(function() {
  dlbursttime_sec.push($(this).val());
});
$('.ulbursttime_sec').each(function() {
  ulbursttime_sec.push($(this).val());
});

$('.burst_priority_sec').each(function() {
  burst_priority_sec.push($(this).val());
});

$('.totalbursttime_sec').each(function() {
  totalbursttime_sec.push($(this).val());
});
$('.totalburstthreshold_sec').each(function() {
  totalburstthreshold_sec.push($(this).val());
});
$('.totalburstlimit_sec').each(function() {
  totalburstlimit_sec.push($(this).val());
});

/*...*/
var plan_name=$('#plan_name').val();
var plan_description=$('#discription').val();
var plan_type=$('#plan_type').val();
// console.log(plan_type);



var vacation_mode=$('#vacation_mode').val();

var priority=$('#priority').val();
var day_limit=$('#day_limit').val();
var after_expire=$('#after_expire').val();
// console.log(sunday);
if ($('#check').is(":checked")) {
                    // it is checked
                    var service = 1;
                  } else {
                    var service = 0;
                  }



                  $.ajax({
                   url:"<?= base_url() ?>plan/edit/<?= $plan['data'][0]['plan_id'] ?>",
                   method:"POST",
                   data:{
                    plan_description:plan_description,
                    plan_name:plan_name,
                    plan_type:plan_type,

                    validity:validity,
                    validity_unit:validity_unit,
                    amount:amount,
                    vacation_mode:vacation_mode,
                    priority:priority,
                    download_data:download_data,
                    upload_data:upload_data,
                    data_transfer:data_transfer,
                    upload_speed:upload_speed,
                    download_speed:download_speed,
                    transfer_speed:transfer_speed,
                    data_unit:data_unit,
                    speed_unit:speed_unit,
                    start_hour:start_hour,
                    start_minute:start_minute,
                    end_hour:end_hour,
                    end_minute:end_minute,
                    sunday:sunday,
                    monday:monday,
                    tuesday:tuesday,
                    wednesday:wednesday,
                    thrusday:thrusday,
                    friday:friday,
                    saturday:saturday,
                    after_expire:after_expire,
                    repeat_mode:repeat_mode,
                    limit_unit:limit_validity_unit,
                    limit_in_no:limit_in_no,
                    plan_amount_id:plan_amount_id,
                    status:service,
                    plan_id:plan_id_all,
                   
                   
                  
                    burst_limit_ul:ulburstlimit,
                    burst_limit_dl:dlburstlimit,
                    burst_threshold_ul:ulburstthreshold,
                    burst_threshold_dl:dlburstthreshold,
                    burst_priority:burst_priority,
                    burst_time_ul:ulbursttime,
                    burst_time_dl:dlburstlimit,
                    total_burst_time:totalbursttime,
                    total_burst_limit:totalburstlimit,
                    total_burst_threshold:totalburstthreshold,
                    burst_mode:burst_mode_array,
                    validity_sec:validity_sec,
                    validity_unit_sec:validity_unit_sec,
                    amount_sec:amount_sec,

                    /*add extra plan*/
                    download_data_sec:download_data_sec,
                    upload_data_sec:upload_data_sec,
                    data_transfer_sec:data_transfer_sec,
                    upload_speed_sec:upload_speed_sec,
                    download_speed_sec:download_speed_sec,
                    transfer_speed_sec:transfer_speed_sec,
                    data_unit_sec:data_unit_sec,
                    speed_unit_sec:speed_unit_sec,
                    start_hour_sec:start_hour_sec,
                    start_minute_sec:start_minute_sec,
                    end_hour_sec:end_hour_sec,
                    end_minute_sec:end_minute_sec,
                    sunday_sec:sunday_sec,
                    monday_sec:monday_sec,
                    tuesday_sec:tuesday_sec,
                    wednesday_sec:wednesday_sec,
                    thrusday_sec:thrusday_sec,
                    friday_sec:friday_sec,
                    saturday_sec:saturday_sec,
                    burst_mode_sec:burst_mode_array_sec,
                    repeat_mode_sec: repeat_mode_sec,
                    limit_unit_sec: limit_validity_unit_sec,
                    limit_in_no_sec: limit_in_no_sec,
                    burst_limit_ul_sec:ulburstlimit_sec,
                    burst_limit_dl_sec:dlburstlimit_sec,
                    burst_threshold_ul_sec:ulburstthreshold_sec,
                    burst_threshold_dl_sec:dlburstthreshold_sec,
                    burst_priority_sec:burst_priority_sec,
                    burst_time_ul_sec:ulbursttime_sec,
                    burst_time_dl_sec:dlburstlimit_sec,
                    total_burst_time_sec:totalbursttime_sec,
                    total_burst_limit_sec:totalburstlimit_sec,
                    total_burst_threshold_sec:totalburstthreshold_sec,


                  },

                  success: function (data) {
                    $("#ajax_indicator").hide();
                    console.log(data);

             // document.location.reload();
           },

         });
                }
                function disableTotalData(count) {
                  var upload_data = $('.upload_data'+count).val();
                  var download_data = $('.download_data'+count).val();
                  $('.data_transfer'+count).prop("disabled", false);

                  if (download_data || upload_data) {

                    $('.data_transfer'+count).prop("disabled", true);
                  }
                }

                function disableTotalSpeed(count) {
                  var upload_speed = $('.upload_speed'+count).val();
                  var download_speed = $('.download_speed'+count).val();
                  $('.transfer_speed'+count).prop("disabled", false);

                  if (download_speed || upload_speed) {
            // console.log("download_data");
            $('.transfer_speed'+count).prop("disabled", true);
          }
        }

        function disableOther(count) {
          var data_transfer = $('.data_transfer'+count).val();
          var transfer_speed = $('.transfer_speed'+count).val();
          $('.upload_speed'+count).prop("disabled", false);
          $('.download_speed'+count).prop("disabled", false);
          $('.upload_data'+count).prop("disabled", false);
          $('.download_data'+count).prop("disabled", false);
          if (transfer_speed) {
            $('.upload_speed'+count).prop("disabled", true);
            $('.download_speed'+count).prop("disabled", true);
          }
          if (data_transfer) {
            $('.upload_data'+count).prop("disabled", true);
            $('.download_data'+count).prop("disabled", true);
          }
        }

        /*open popup in custom burst select*/
// $('#burstmode').change(function(){
// 	var burstmode=$('#burstmode').val();
// 	if(burstmode=='custom_burst_mode')
// 	{
// 		$('#burstModal').show();
// 		$('#burstModal').modal();

// 	}


// });
// function calculateTotalAmount()
// {
// 	var amount=$('#amount').val();
// 	var tax_rate=0.18;
// 	var tax,total_amount;
// 	tax=amount*tax_rate;
// 	total_amount=parseInt(amount)+parseInt(tax);
// 	$('#tax').val(tax);
// 	$('#total_amount').val(total_amount);

// }
function custom(id)
{
// console.log($('.burst_mode'+id).val());
if($('.burst_mode'+id).val()==2)
{

  var transfer_speed= $('.transfer_speed'+id).val();
  var upload_speed= $('.upload_speed'+id).val();
  var download_speed= $('.download_speed'+id).val();

  console.log(transfer_speed);
  console.log(upload_speed);
  var double_transfer_limit=transfer_speed*2;
  var double_upload_limit=upload_speed*2;
  var double_download_limit=download_speed*2;
  var half_transfer_threshold=transfer_speed*.50;
  var half_upload_threshold=upload_speed*.50;
  var half_download_threshold=download_speed*.50;

  $('.dlburstlimit'+id).val(double_download_limit);
  $('.ulburstlimit'+id).val(double_upload_limit);
  $('.totalburstlimit'+id).val(double_transfer_limit);
  $('.dlburstthreshold'+id).val(half_download_threshold);
  $('.ulburstthreshold'+id).val(half_upload_threshold);
  $('.totalburstthreshold'+id).val(half_transfer_threshold);
  $('.dlbursttime'+id).val(12);
  $('.ulbursttime'+id).val(12);
  $('.totalbursttime'+id).val(12);
// $('.dlburstthreshold'+id).val(double_download_speed);

}
if($('.burst_mode'+id).val()==1)
{
  $('.dlburstlimit'+id).val(0);
  $('.ulburstlimit'+id).val(0);
  $('.totalburstlimit'+id).val(0);
  $('.dlburstthreshold'+id).val(0);
  $('.ulburstthreshold'+id).val(0);
  $('.totalburstthreshold'+id).val(0);
  $('.dlbursttime'+id).val(0);
  $('.ulbursttime'+id).val(0);
  $('.totalbursttime'+id).val(0);
}
if($('.burst_mode'+id).val()==3)
{
  $('.dlburstlimit'+id).val('');
  $('.ulburstlimit'+id).val('');
  $('.totalburstlimit'+id).val('');
  $('.dlburstthreshold'+id).val('');
  $('.ulburstthreshold'+id).val('');
  $('.totalburstthreshold'+id).val('');
  $('.dlbursttime'+id).val('');
  $('.ulbursttime'+id).val('');
  $('.totalbursttime'+id).val('');
}
}
function calculateTax(amo)
{
  var total=0;
  $.ajax({
    url: "<?= base_url() ?>account/get_tax",
    async:false,
    method:"GET",
    success: function(data)
    {

      var amount=amo;
      var obj=JSON.parse(data);

      for(var i=0;i<obj.length;i++)
      {

        total+=(Object.values(obj[i])*amount)/100;

      }
              // console.log(total);
            }
          });
  return total;
}


function calculateTaxAmount()
{
  console.log('count'+amount_count);
  for(var c=0;c<amount_count;c++)
  {


      // var amount=$('#amount'+c).val();
      var tax=Math.round(calculateTax($('#amount'+c).val()));
      console.log(tax);
      var total=parseInt(tax)+parseInt($('#amount'+c).val());
      $('#total_amount'+c).val(total);
      $('#tax'+c).val(tax);

    }


  }             

  function calculateTaxAmountKeypress(id)
  {
    console.log($('#amount'+id).val());
    var tax=Math.round(calculateTax($('#amount'+id).val()));
    var total=parseInt(tax)+parseInt($('#amount'+id).val());
    $('#total_amount'+id).val(total);
    $('#tax'+id).val(tax);
  }

</script>
<script type="text/javascript">

	$(document).ready(function() {
//Initialize Select2 Elements
$('.select2').select2();
//     var  plan_id_all=[];
//     $('.plan_id_all').each(function(){
//   plan_id_all.push($(this).val());

// }); 
//     console.log(plan_id_all);
  //   for(var i=0;i<amount;i++)
  //   {
  //   calculateTax(amount[i])
  // }
  calculateTaxAmount();

});
</script>