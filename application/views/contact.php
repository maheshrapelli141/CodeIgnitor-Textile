<?php
?>
<style>
    .contact-details .fa {
        font-size: 36px;
    }
    .contact-details p {
        font-size: 15px;
    }
    .contact-form {
        padding: 20px;
    }
    .col-sm-7 , .col-sm-5 {
        padding: 15px;
    }
    .wrapper {
        padding: 60px 0px;
    }
    .breadcrumb{
        display: block;
    }
    .breadcrumb-item{
        display: inline;
    }
</style>

<div class="wrapper" style="background-color: #eeeeee;text-align: center;">
    <div>
    <h1>Contact</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/')?>">Home</a></li>
        <li class="breadcrumb-item">Contact</li>
    </ol>
    </div>
</div>
<div class="container"><br><br>
    <div class="row contact-form">
        <div class="col-sm-7">
            <form action="#" method="post">
                <label for="">Name</label>
                <input type="text" class="form-control">
                <label for="">Email</label>
                <input type="email" class="form-control">
                <label for="">Mobile</label>
                <input type="number" class="form-control">
                <label for="">Message</label>
                <textarea class="form-control"></textarea><br>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
        <div class="col-sm-5">
            <div class="contact-details">
                <i class="fa fa-map-marker" aria-hidden="true" style="font-size: 24px"></i><p> A/2 , Gala No 1, Jayaraj Comp, Opp Pragati Quarry,Kharbaw Road,Kalwar, Bhiwandi,Thane, Maharashtra.</p><br>
                <i class="fa fa-envelope" aria-hidden="true" style="font-size: 24px"></i><p> chaganpatil@hotmail.com <br> dharmendrashah1909@gmail.com</p><br>
                <img src="<?php echo base_url('./assets/img/whatsapp.svg')?>" height="24px" width="24px"><p> Whatsapp :  7045368999</p><br>
                <i class="fa fa-phone" aria-hidden="true"></i><p> Customer Service : 8104092178</p><br>
                <i class="fa fa-address-book" aria-hidden="true"></i><p> Office : 02522 278457</p><br>
            </div>
        </div>
    </div>
    <div class="contact-location">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.8352799039267!2d73.02623249986945!3d19.289528136901758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7bcfa0aa1a6fd%3A0x2e5413343015403d!2sJairaj+Complex+(Ganraj+Developer)!5e0!3m2!1sen!2sin!4v1557502914430!5m2!1sen!2sin" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
