<?php include_once('common/header.php');?>

<?php include_once('common/menu.php');?>
<style>
    .flip {
        perspective: 800;
        position: relative;
        text-align: center;
    }

    .flip .card.flipped {
        transform: rotatey(-180deg);
    }

    .flip .card {
        margin-top: 20px;
        width: 270px;
        height: 178px;
        transform-style: preserve-3d;
        transition: 0.5s;
        background-color: #fff;
    }

    .flip .card .face {
        backface-visibility: hidden;
        z-index: 2;
    }

    .flip .card .front {
        position: absolute;
        width: 270px;
        z-index: 1;
    }

    .flip .card .img {
        position: relaitve;
        width: 270px;
        height: 178px;
        z-index: 1;
        border: 2px solid #000;
    }

    .flip .card .back {
        padding-top: 3%;        
        background-color: #fff;
        border-radius: 10px;
        transform: rotatey(-180deg);
    }

    .inner {
        margin: 0px !important;
    }
</style>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> PC or Laptop Booking</h1>
            <p>Booking Of PC or Laptop & Already Booked System View Section...</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?=base_url('booking')?>">book pc</a></li>
        </ul>
    </div>
    <div class="row">
        <?php 
                                $i=0;
                                $allpcsz=sizeof($allpcs);
                                $bkdsz=sizeof($bookedpc);
                                           
                                 while($i<$allpcsz){
                                     $j=0;
                                     $ipval='';
                                     while($j<$bkdsz){
                                         if($bookedpc[$j]->ip==$allpcs[$i]->ip){
                                            $name=$allpcs[$i]->name;
                                            $systemtype=$allpcs[$i]->systemtype;
                                            $uname=$allpcs[$i]->uname;
                                            $password=$allpcs[$i]->password;
                                            $ip=$allpcs[$i]->ip;
                                            $networktype=$allpcs[$i]->networktype;
                                             
                                            $ipval=$bookedpc[$j]->ip;
                                    ?> 
                                        <div class="col-sm-3">
                                            <div class="flip">
                                                <div class="card">
                                                    <div class="face front">
                                                        <div class="inner">
                                                            <?php if($systemtype=="Desktop"){      
                                                                        echo '<img src="/vms/assets/img/desktop.png" style="filter: grayscale(1);">';     
                                                            }
                                                            else{
                                                                        echo '<img src="/vms/assets/img/laptop.png" style="filter: grayscale(1);">';    
                                                            }
                                                            ?>  
                                                        </div>
                                                        <i class="fa fa-desktop-2x"></i>
                                                    </div>
                                                    <div class="face back">
                                                        <div class="inner text-center">
                                                            <p>
                                                                <strong>System Name :</strong> <?php echo $name; ?> <br/>
                                                                <strong>IP :</strong> <?php echo $ip; ?> <br/> 
                                                                <strong> Network :</strong> <?php echo $networktype; ?> <br/> 
                                                                <strong> Username :</strong> <?php echo $uname; ?> <br/> <strong>Password :</strong> <?php echo $password; ?>
                                                            </p>
                                                           <a href="#" class="btn btn-danger"><i class="fa fa-frown-o"></i>Already Booked</a> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php        
                                         }
                                         $j++;
                                     }
                                     if($allpcs[$i]->ip!=$ipval){
                                         $name=$allpcs[$i]->name;
                                         $systemtype=$allpcs[$i]->systemtype;
                                         $uname=$allpcs[$i]->uname;
                                         $password=$allpcs[$i]->password;
                                         $ip=$allpcs[$i]->ip;
                                         $networktype=$allpcs[$i]->networktype; 
                                    ?>
                                    <div class="col-sm-3">
                                        <div class="flip">
                                            <div class="card">
                                                <div class="face front">
                                                    <div class="inner">
                                                        <?php if($systemtype=="Desktop"){      
                                                                    echo '<img src="/vms/assets/img/desktop.png">';     
                                                        }
                                                        else{
                                                                    echo '<img src="/vms/assets/img/laptop.png">';    
                                                        }
                                                        ?>  
                                                    </div>
                                                    <i class="fa fa-desktop-2x"></i>
                                                </div>
                                                <div class="face back">
                                                    <div class="inner text-center">
                                                        <p>
                                                            <strong>System Name :</strong> <?php echo $name; ?> <br/>
                                                            <strong>IP :</strong> <?php echo $ip; ?> <br/> 
                                                            <strong> Network :</strong> <?php echo $networktype; ?> <br/> 
                                                            <strong> Username :</strong> <?php echo $uname; ?> <br/> <strong>Password :</strong> <?php echo $password; ?>
                                                        </p>
                                                       <a href="<?=base_url('booking/bookme/'.$ip)?>"class="btn btn-primary"><i class="fa fa-smile-o"></i>Book Me</a>                                                                                               
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php   
                                     }
                                     $i++;                                     
                                 }        
                            ?>                          
    </div>
</main>
<?php include_once('common/footer.php');?>
<script type="text/javascript">
    $('.flip').hover(function(){
        $(this).find('.card').toggleClass('flipped');

    });
</script>