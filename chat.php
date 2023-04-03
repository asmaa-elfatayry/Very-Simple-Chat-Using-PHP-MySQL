<?php
include './db.php';
$query="SELECT * FROM chatroom ORDER BY id DESC";
$run=$con->query($query);

if($run->num_rows > 0){
    while($row=$run->fetch_array()): ?>

<div id="chat-data">
    <p class='name'> <?php echo $row['name']. ': ';?></p>
    <p class="msg"> <?php echo " ". $row['msg'];?></p>
    <p class='date'> <?php echo formatData( $row['date']);?></p>
</div>

<?php endwhile;
} else {
    echo "No chat messages available.";
}
?>