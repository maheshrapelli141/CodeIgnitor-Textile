<?php
?>
<style>
    .wrapper {
        padding: 60px 0px;
    }
    .breadcrumb{
        display: block;
    }
    .breadcrumb-item{
        display: inline;
    }
    .about-container{
        margin-top: 52px;
    }
    .about-container p {
        text-align: justify;
        font-size: 16px;
    }
    .points ul li {
        font-size: 16px;
        padding : 10px 0px;
    }
    .col-sm-6 {
        padding: 15px;
    }
    .points-box {
        position: relative;
        background-image: url("<?php echo base_url('./assets/img/about-bg.jpg'); ?>");
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        width: 100%;
    }
    .points{
        padding-left: 50%;
        padding-top: 48px;
        padding-bottom: 48px;
        padding-right: 36px;
        text-align: justify;
    }
    @media only screen and (max-width: 640px) {
        .points {
            padding: 15px;}
    }
</style>
<div class="wrapper" style="background-color: #eeeeee;text-align: center;">
    <div>
        <h1>About</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/')?>">Home</a></li>
            <li class="breadcrumb-item">About</li>
        </ol>
    </div>
</div>
<div class="container about-container">
    <div class="row">
        <div class="col-sm-6 col-md-8">
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Rohit Textiles</b> is a young company based in Bhiwandi, Thane District of Maharashtra which is a Industrial
                Belt comprising one of India’s biggest yarn manufacturer’s. Bhiwandi has emerged has the most favored
                manufacturing, Warehousing, Transportation destination for all the leading brands and companies with
                access to the Nhava Sheva Port and Rail connectivity across the country.<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rohit Textiles has been making polyester yarn (inhouse facility of 50000 sq feet).Rohit Textiles has now
                diversified into making Cotton Carry Bags for the Domestic and Export Market.<br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rohit Textiles foresees quantum growth in the carry bag market due to the ban on plastic bags across
                the country. We have established strong inhouse manufacturing facility for exclusively making carry
                bags.
            </p>
        </div>
        <div class="col-sm-6 col-md-4"><img src="<?php echo base_url('./assets/img/about.jpg'); ?>" width="100%"></div>
    </div>
    <p>

    <h2>Our Mission</h2><hr>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;“To Emerge as the Leading Bag Manufacturer in the country with the aim of protecting the Environment
        by making High Quality Cotton Carry Bags at great prices.”<br>
        Corporate Social Responsibilities<br>
        Rohit Textiles would be providing Employment to Women Entrepreneur’s by providing machinery and
        training in making carry bags at their houses.
        <br>

    </p>

</div>
<div class="points-box">
    <!--    <img src="--><?php //echo base_url('./assets/img/about-bg.jpg'); ?><!--" width="100%">-->
    <div class="points">
        <h4>Rohit Textiles would be Different from others in the following way :-</h4>
        <ul>
            <li> We create products that are affordable, natural, reusable and appealing – to enable people to go eco-
                friendly.</li>
            <li> All Rohit Textiles products are made from fabrics that are durable,kind to the environment and in
                ethically-audited manufacturing facilities.</li>
            <li> We develop innovative fabrics – recycled cotton to make the products better for the environment.</li>
            <li> The bags are made of the highest quality and even the smallest ones can hold up to 10 Kg of weight and
                the bigger bags weight upto 20 kgs.</li>
            <li> Our bags are designed to be quirky yet thought-provoking,with each design rooted in an existing
                environmental issue – that makes the customer cognizant of the harm plastic does to the environment.</li>
            <li> Manufacturing Capacity per Day</li>
            <li> Inhouse Printing for speedier and faster production.</li>
        </ul>
    </div>
</div>
