<!-- <?php var_dump($category['data']); ?> -->
<?= form_open('category/add',array("class"=>"form-horizontal")); ?>
<div class="form-group">
  <label for="name" class="col-md-4 control-label"><span class="text-danger">*</span>Category Name</label>
  <div class="col-md-3">
    <input type="text" name="catname" value="<?php echo $this->input->post('catname'); ?>" class="form-control" id="catname" required  autofocus "/>
    <span class="text-danger name_error"></span>
  </div>
</div>
<div class="form-group">
  <label for="category" class="col-md-4 control-label"><span class="text-danger">*</span>Select Parent Category</label>
  <div class="col-md-3">
   <select name="paraent_cat_id" class="form-control">
    <option value="0"> no parent category</option>
   <?php  foreach($category['data'] as $row)
   { ?>
    <option value="<?= $row['id'] ?>" > <?= $row['name'] ?></option>
   <?php } ?>
   </select>
    <span class="text-danger name_error"></span>
  </div>
</div>
<button class="btn btn-info">Add</button>

<?= form_close() ?>


      