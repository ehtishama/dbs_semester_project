<?php
require_once("views/libs/header.php");
if(isset( $data['error'] )){
?>

<div class="alert alert-danger">
    <?php echo $data['error']; ?>
</div>


<?php }else { ?>

    <div class="alert alert-success">
        Welcome <?php echo $_SESSION['user']['username']; ?>
    </div>
<form class="" action="<?php echo APPROOT ?>/lab2/table" method="post">


    <select class="tablesList" name="tableName">
            <?php foreach($data['list'] as $option) { ?>
        <option value="<?php echo $option ?>">
            <?php echo $option ?>
        </option>
            <?php } ?>

    </select>

    <input type="submit" name="submit" value="Apply">


</form>

    <?php
        if(isset($data['table']))
        {
            $table = $data['table'];
    ?>

<table class="table table-bordered table-hover table-striped">
    <thead class="thead thead-dark">
        <?php foreach($data['heads'] as $head) { ?>
            <th><?php echo $head ?></th>
        <?php }?>
        <th></th>
        <th></th>

    </thead>
        <?php foreach ($table as $row){ ?>
    <tr>
            <?php foreach ($row as $cell){ ?>
            <td><?php echo $cell ?></td>
            <?php } ?>
        <td style="text-align: center">
            <a  href="#" class="btn btn-success">Edit</a>
         </td>
        <td style="text-align: center">
            <a  href="<?php echo APPROOT?>/lab2/remove/<?php echo $data['tableName']?>/<?php echo $row[0] ?>" class="btn btn-danger">Remove</a>
        </td>
    </tr>
        <?php } ?>

</table>




    <?php } ?>

<?php } ?>







<?php
require_once("views/libs/footer.php");
