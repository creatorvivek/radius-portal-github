
<style type="text/css">
  
 /* .row
  { 
    position: relative;
    top:50%;
    left:20%;

  }*/
</style>





<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header"><h5>Assign Plan</h5></div>
      <div class="card-body">
      <form id="form" method="post" action="<?= base_url() ?>plan/assign">
        <div class="col-md-6">
          <div class="form-group">
            <label for="remark" class="col-md-6 control-label"><span class="text-danger">*</span>Caf id</label>
            <input type="text" name="caf_id" readonly value="<?= $caf_id ?>" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="remark" class="col-md-6 control-label"><span class="text-danger">*</span>Plan</label>
            <select class="form-control" name="plan" id="plan" required  >
              <?php
              $length=count($plan);
              // echo $length;
              if($length==0)
              { ?>
                <option value="">--no plans -</option>
             <?php  }  else {
              for($i=0;$i<$length;$i++)
              {    ?>
              
              <option value="<?= $plan[$i]['id'].','.$plan[$i]['amount'].','.$plan[$i]['validity_actual'].','.$plan[$i]['name'] ?>" data-toggle="tooltip" title="<?= $plan[$i]['description']   ?>"><?= $plan[$i]['name'].'  '.$plan[$i]['amount'].'&#8377'    ?></option>
              
              <?php } }?>
            </select>
          </div>
        <!-- /div>
         <div class="col-md-4">
           <label for="remark" class="col-md-12 control-label">Date select</label>
          <div class="form-group">
            <select class="form-control date" name="date"  onchange="planActivator()">
              <option value="1">auto</option><option value="2">now</option><option value="3">manual</option>
            </select>
          </div>
        </div> -->
       <!--  <div class="col-md-4">
           <div class="form-group">
          <input type="text" name="start_date" class="start_date form-control" id="dob" >
        </div>
        </div> -->
        <!-- <div class="col-md-4">
           <div class="form-group">
          <input type="text" name="end_date" class="end_date form-control" value="<?= $end_date ?>">
        </div>
        </div> -->

<!-- <div class="col-md-4"><div class="form-group manual"></div></div> -->
         
          <div class="col-md-6">
            <div class="form-group">
              <input type="submit" value="submit"  class="btn btn-info" >
            </div>
          </div>
        
      </form>
    </div>
    </div>
  </div>
</div>
<script src="<?= base_url() ?>assets/admin/plugins/jqueryui/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



<script type="text/javascript">
  
var startDateNow= "<?= date('Y-m-d H:i:s') ?>";

  $(document).ready(function() {

   
          $("#dob").datepicker({
         //    flat: true,
         //   date: '2008-07-31',
         // current: '2008-07-31',
          dateFormat: "dd-mm-yy",
          changeMonth: true,
          changeYear: true,
         // yearRange: '1950:2012'
         // maxDate: "+0d",
         // shortYearCutoff: 50
         // minDate: "-1d"
         // constrainInput: false


      });
    });


function planActivator()
{
    

    var id=$('.date').val();
      console.log(id);

      if(id==3)
      {
        $('.manual').show();
       $('.manual').html('<input type="text" name="start_date" id="dob" class="start_date form-control">');

      }
      else
      {
        $('.manual').hide();
      }

//for now


  

}

</script>