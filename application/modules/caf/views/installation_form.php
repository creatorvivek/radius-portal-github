<style type="text/css">

</style>
<div class="row">

  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">ADD ONE TIME INSTALLMENT PARTICULAR</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <?= form_open('caf/add_installment_fee',array("class"=>"form-horizontal")) ?>
        <div class="row"> 
          <div class="col-md-3">
            <label  class="col-md-12 control-label"><span class="text-danger">*</span>item name</label>
            <div class="form-group">
              <input type="text" value="<?php echo $this->input->post('i_name'); ?>" class="form-control i_name" id="i_name" required  autofocus />
              <span class="text-danger i_name_error"></span>
            </div>
          </div>
          <div class="col-md-3">
            <label  class="col-md-12 control-label"><span class="text-danger">*</span>Price</label>
            <div class="form-group">
              <input type="text" name="price" value="<?php echo $this->input->post('price'); ?>" class="form-control price" id="price" required onkeypress="return isNumberKey(event)"   />
              <span class="text-danger price_error"></span>
            </div>
          </div>
          <div class="col-md-3">
            <label  class="col-md-12 control-label"><span class="text-danger">*</span>Policy</label>
            <div class="form-group">
              <select class="form-control policy" name="policy">
               <option value="1">Refundable</option>
               <option value="2">Non Refundable</option>
             </select>
             <span class="text-danger f_name_error"></span>
           </div>
         </div>
         <div class="col-md-3">
          <label for="ticket" class="col-md-12 control-label"> </label>
          <button type="button" class="btn btn-success  add">Add</button>
        </div>


    
    <div class="col-md-12"><div id="add_form_row"></div></div>
        <div class="col-md-6">
          <label  class="col-md-12 control-label">Paid</label>
         <div class="form-group">
          <input type="text" name="paid" value="<?php echo $this->input->post('paid'); ?>" class="form-control paid" id="paid" onkeypress="return isNumberKey(event)" required   />
        </div>


      </div>
     <div class="col-md-3">
  <div class="form-group">
     <label  class="col-md-12 control-label">Payment Type</label>
<select name="pay_type" id="pay_type" required=""  class="form-control">
    <option value="">--select--</option>
   <?php 
   $length=count($payment_type);
    for($i=0;$i<$length;$i++)
   { ?>
    <option value="<?= $payment_type[$i]['id'] ?>"><?= $payment_type[$i]['name'] ?></option>
    
<?php   } ?>
    
</select>
</div>
</div>
<div class="col-md-3">
  <div class="form-group">
     <label  class="col-md-12 control-label">Attend Type</label>
  <select name="attend_type" id="attend_type" required="" class="form-control">
    <option value="">- select -</option>
    <option value="1">walkin</option>
    <option value="2">call</option>
    <option value="3">sms</option>
    <option value="4">mail</option>
    <option value="5">whatsapp</option>
    <option value="6">website</option>
</select>
</div>
</div>
      </div>
    <input type="hidden" name="caf" value="<?= $caf ?>">
    <input type="hidden" name="item_name" value="" class="item_name_h">
    <input type="hidden" name="price" value="" class="item_price_h">
    <input type="hidden" name="policy" value="" class="policy_h">
    <button class="btn btn-info save">Submit</button>
  </div><!-- /card-body -->

</div><!-- /card -->
</div><!-- /col -->
</div><!-- /row main -->
<script type="text/javascript">
	var count=1;
  $('.add').click(function(){

   var formRow='<div class="row" id="row'+count+'"> <div class="col-md-3"><div class="form-group"><input type="text"  placeholder="item name" class="form-control i_name" id="i_name" required  autofocus /><span class="text-danger i_name_error"></span></div></div><div class="col-md-3"><div class="form-group"><input type="text" name="price" placeholder="Price" class="form-control price" id="price" required   /><span class="text-danger price_error"></span></div></div><div class="col-md-3"><div class="form-group"><select class="form-control policy" name="policy"><option value="1">Refundable</option><option value="2">Non Refundable</option></select><span class="text-danger f_name_error"></span></div></div><div class="col-md-3"><button type="button" class="btn btn-danger remove" data-row="row'+count+'">-</button></div>';

    // calculateTotalAmount();
    $('#add_form_row').append(formRow);	

  });	

  $(document).on('click', '.remove', function(){
    var delete_rows = $(this).data("row");
    $('#' + delete_rows).remove();
  });

  $(".save").click(function( event ) {

  // event.preventDefault();
  var item_name=[];
  var price=[];
  var policy=[];
  $('.i_name').each(function(){
    item_name.push($(this).val());
  });
  $('.price').each(function(){
   price.push($(this).val());
 });
  $('.policy').each(function(){
   policy.push($(this).val());
 });
  $('.item_name_h').val(item_name);
  $('.item_price_h').val(price);
  $('.policy_h').val(policy);
});
</script>