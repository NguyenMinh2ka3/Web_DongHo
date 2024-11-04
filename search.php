<?php require_once('header.php'); ?>

<style>
    .item1{
     position: relative;
     margin: 0;
     top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    }

.tieude{
    text-align: center;
}
.minh{
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: black;
 max-width: 1500px;
width: 95%;
margin: 30px auto;
display: flex;
flex-wrap: wrap;
justify-content:left;

text-align: center;
}

.card{
    margin-left: 20px;
    border: 0.5px solid red;
    box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.5);
}


.caption{
    color: black;
}
button{
    margin-bottom: 10px;
    border-radius: 10px;
     width: 150px;
     height:30px;
}
button:hover{
    background-color: aquamarine;
}
   
</style>

<?php
if(!isset($_REQUEST['search_text'])) {
    header('location: index.php');
    exit;
} else {
	if($_REQUEST['search_text']=='') {
		header('location: index.php');
    	exit;
	}
}
?>
<?php
    $search_text = strip_tags($_REQUEST['search_text']); 
    $search_text = '%' . $search_text . '%';
 $statement = $pdo->prepare("SELECT * FROM sanpham WHERE sp_ten LIKE ?");
 $statement->execute(array($search_text));
 $results = $statement->fetchAll(PDO::FETCH_ASSOC);
 $total_pages = $statement->rowCount();
?>

<div class="tieude"><h1><b>SẢN PHẨM CẦN TÌM</b></h1></div>
        <main class="minh">
        <?php if ($total_pages > 0): ?>
            <?php foreach($results as $row):?>
            <div class="card">
                <div class="image">
                    <img src="assets/uploads/<?php echo $row["sp_img"];?>" alt="">
                </div>
                <div class="caption">
                    <p class="product_name"><b><?php echo $row["sp_ten"];?></b></p>
                    <p class="price"><b><?php echo $row["sp_giamoi"];?></b></p>
                    <p class="discount"><del><?php echo $row["sp_giacu"];?></del></p>
                </div>
                <button class="add"><a href="product.php?id=<?php echo $row['sp_id'];?>"><b>Xem chi tiết</b></a></button>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
        <h1 class="text-danger">Không tìm thấy sản phẩm nào.</h1>
    <?php endif; ?>
        </main>
<?php require_once('footer.php'); ?>