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
    require_once 'admin/inc/config.php';
    $sql = $pdo->prepare("SELECT * FROM sanpham");
    $sql ->execute();
    $tatca_sp=$sql->fetchAll(PDO::FETCH_ASSOC)
?>
 

<div class="item1" >
                <div class="bs-slider-overlay"><img src="assets/uploads/BannerVip1.jpg" alt=""></div>
                <div class="container">
                    <div class="row">
                        <div class="slide-text">
                            <a href=""></a>
                        </div>
                    </div>
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
<div class="tieude"><h1><b>SẢN PHẨM</b></h1></div>
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
                <button class="add" ><b>Thêm giỏ hàng</b></button>
            </div>
            <?php }?>
        </main>
     





    </div>
</div>



<?php require_once('footer.php'); ?>