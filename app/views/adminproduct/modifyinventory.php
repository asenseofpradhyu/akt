<?php require APPROOT . '/views/admininc/adminheader.php'; ?>
<?php require APPROOT . '/views/admininc/adminnavbar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group">
                            <a class="btn btn-success" href="<?php echo URLROOT; ?>/AdminProduct/addinventory"> <i class="fa fa-plus"></i> Add Inventory</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php
                        $formUrl = (!empty($inventory)) ?  URLROOT . '/AdminProduct/updateInventory/' . $data['inventory']->id : URLROOT . '/AdminProduct/addInventory';
                        ?>
                        <form action="<?php echo $formUrl  ?>" method="post">
                        <div class="row">
                            <input type="hidden" name="product_id" value="<?php echo $data['product_id']; ?>">
                            <?php if(!empty($data['inventory'])):?>
                            <input type="hidden" name="id" value="<?php echo $data['inventory']->id; ?>">
                            <?php endif; ?>
                            <div class="form-group col-sm-6">
                                <label for="color">Color</label>
                                <select name="color_id" class="form-control" id="color_id">
                                    <?php foreach($data['colors'] AS $color): ?>
                                    <option value="<?php echo $color->color_id; ?>" <?php if(!empty($data['inventory']) && $data['inventory']->color_id == $color->color_id) echo 'selected'; ?>><?php echo $color->color; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="size">Size</label>
                                <select name="size_id" class="form-control" id="size_id">
                                    <?php foreach($data['sizes'] AS $size): ?>
                                    <option value="<?php echo $size->id; ?>" <?php if(!empty($data['inventory']) && $data['inventory']->size_id == $size->id) echo 'selected'; ?>><?php echo $size->title; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="stock">Stock</label>
                                <input type="text" name="stock" id="stock" class="form-control" value="<?php echo (!empty($inventory)) ? $data['inventory']->stock : ''; ?>">
                            </div>
                        </div>
                        <div class="row text-center">

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-success" value="<?php echo (!empty($inventory)) ? 'Update' : 'Add'; ?>">
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php require APPROOT . '/views/admininc/adminfooter.php'; ?>