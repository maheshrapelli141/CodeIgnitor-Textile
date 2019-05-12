<?php
?>
<div class="container"><br><br>
    <h2>Categories :</h2><hr>
    <a href="index.php/category/add" class="btn btn-primary">Add</a><br><br>
    <?php
    if(isset($emptydata) && $emptydata!=""){
        echo '<h3>No products uploaded yet!</h3>';
    }
    else {
    ?>
    <table class="table table-bordered">
        <thead>
        <th>Sr no.</th>
        <th>Category</th>
        <th>Edit / Delete</th>
        </thead>
        <?php
        $i = 1;
        foreach ($categories as $category): ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $category['category'];?></td>
                <td>
                    <a href="<?php echo base_url("/index.php/category/updateproduct/".$category['id']); ?>" onclick="return confirm('Are you sure to edit');">
                        <span class="badge badge-warning">Edit</span>
                    </a> /
                    <a href="<?php echo base_url("/index.php/category/deleteproduct/".$category['id']); ?>" onclick="return confirm('Are you sure to delete');">
                        <span class="badge badge-danger">Delete</span>
                    </a>
                </td>
            </tr>
        <?php
        $i++;
        endforeach; ?>
    </table>
    <?php } ?>
</div>

