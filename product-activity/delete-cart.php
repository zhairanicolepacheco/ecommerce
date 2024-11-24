<?php
include("config.php");
session_start();

if(isset($_GET['deleteId'])){
    $id = $_GET['deleteId'];
?>

<script>
    var confirmation = confirm("Are you sure you want to delete this item?");
    if (confirmation) {
        window.location = "delete-cart.php?confirmedDeleteId=<?php echo $id; ?>";
    } else {
        window.location = "user-cart.php";
    }
</script>

<?php
}

if(isset($_GET['confirmedDeleteId'])) {
    $id = $_GET['confirmedDeleteId'];

    $delete = "DELETE FROM cart WHERE id = $id";
    mysqli_query($mysqli, $delete);

    echo "<script>alert('ITEM DELETED SUCCESSFULLY!');
    window.location = 'user-cart.php';</script>";
}
?>
