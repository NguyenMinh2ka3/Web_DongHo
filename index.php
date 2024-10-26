<?php require_once('header.php'); ?>

<style>
    .item1{
        display: flex;
     margin: 0;
     top: 0;
    left: 0px;
    text-align: center;
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
   
.anhbanner {
    flex: 2; 
    background-color: #e0e0e0;
}

.left-menu {
    flex: 1; 
    width: 200px;
    background-color: #f8f8f8;
    padding: 15px;
    border: 1px solid #ccc;
    font-family: Arial, sans-serif;
    
}

.left-menu h3 {
    font-size: 18px;
    margin-bottom: 10px;
    color: #333;
}

.left-menu ul {
    list-style-type: none;
    padding-left: 0;
}

.left-menu ul li {
    margin-bottom: 8px;
}

.left-menu ul li a {
    color: #555;
    text-decoration: none;
}




</style>





<?php  
    require_once 'admin/inc/config.php';
    $sql = $pdo->prepare("SELECT * FROM sanpham where sp_id BETWEEN 1 AND 10");
    $sql ->execute();
    $tatca_sp=$sql->fetchAll(PDO::FETCH_ASSOC);

    $sql1 = $pdo->prepare("SELECT * FROM sanpham where sp_id BETWEEN 11 AND 20");
    $sql1 ->execute();
    $tatca_sp1=$sql1->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = $pdo->prepare("SELECT * FROM sanpham where sp_id BETWEEN 21 AND 30");
    $sql2 ->execute();
    $tatca_sp2=$sql2->fetchAll(PDO::FETCH_ASSOC)
   
?>
 
<div class="item1" >
<div class="left-menu">
    <h3>Danh Mục Sản Phẩm</h3>
    <ul>
        <li><a href="index.php?#selection1">Sản phẩm bán chạy</a></li>
        <li><a href="index.php?#selection2">Hàng mới về</a></li>
        <li><a href="index.php?#selection3">Mẫu cổ điển</a></li>     
    </ul>
</div>   
    <div class="anhbanner">
               <img src="assets/uploads/BannerVip2.jpg" alt="">  
               </div>
                        
</div>
   <div class="service bg-gray">
    <div class="container">
        <div class="row">
            
                    <div class="col-md-4">
                        <div class="item">
                            <div class="photo"><img src="assets/uploads/mienphivanchuyen.png" alt="Miễn phí vận chuyển"></div>
                            <h3><?php echo "Miễn phí vận chuyển" ?></h3>
                            <p>
                                <?php echo "Tận hưởng giao hàng miễn phí ở Việt Nam. Nhiều quốc gia sẽ được bổ sung sớm trong thời gian tới." ?>
                            </p>
                        </div>
                    </div>            
            <div class="col-md-4">
                <div class="item">
                    <div class="photo"><img src="assets/uploads/giaohangnhanh.png" title="Giao hàng nhanh"></div>
                    <h3><?php echo "Giao hàng nhanh" ?></h3>
                    <p>
                        <?php echo "Các loại đồng hồ sẽ được giao đến quý khách trong vòng 24h" ?>
                    </p>
                </div>
            </div>   
            <div class="col-md-4">
                <div class="item">
                    <div class="photo"><img src="assets/uploads/baohanh11.png" alt="Bảo hành đổi trả"></div>
                    <h3><?php echo "Bảo hành đổi trả" ?></h3>
                    <p>
                        <?php echo "Các chính sách bảo hành chính hãng 1 đổi 1 nếu lỗi do nhà sản xuất !!!" ?>
                    </p>
                </div>
            </div>  
              </div>
              </div>             
        </div>
<div class="tieude" id="selection1"><h1><b>SẢN PHẨM BÁN CHẠY</b></h1></div>
                         
        <main class="minh">
            <?php foreach($tatca_sp as $row){ ?>
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
            <?php }?>
        </main>
    
        <div class="tieude" id="selection2"><h1><b>HÀNG MỚI VỀ</b></h1></div>
                         
                         <main class="minh">
                             <?php foreach($tatca_sp1 as $row){ ?>
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
                             <?php }?>
                         </main>

       <div class="tieude" id="selection3"><h1><b>MẪU CỔ ĐIỂN</b></h1></div>
                         
                         <main class="minh">
                             <?php foreach($tatca_sp2 as $row){ ?>
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
                             <?php }?>
                         </main>         
                           
    </div>
</div>



<?php require_once('footer.php'); ?>