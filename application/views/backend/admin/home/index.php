<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?php echo $system_name; ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><?php echo get_phrase('Dashboard'); ?></li>
            </ol>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Info box -->
<!-- ============================================================== -->
<!-- .row -->
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-uppercase">HTML Course</h5>
                <div class="text-right"> <span class="text-muted">Monthly Fees</span>
                    <h2><sup><i class="ti-arrow-up text-success"></i></sup> $1200</h2>
                </div>
                <span class="text-success">20%</span>
                <div class="progress">
                    <div class="progress-bar bg-success" style="width: 20%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-uppercase">Web Development Course</h5>
                <div class="text-right"> <span class="text-muted">Monthly Fees</span>
                    <h2><sup><i class="ti-arrow-down text-primary"></i></sup> $5000</h2>
                </div>
                <span class="text-primary">30%</span>
                <div class="progress">
                    <div class="progress-bar bg-primary" style="width: 30%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-uppercase">Web Designing Course</h5>
                <div class="text-right"> <span class="text-muted">Monthly Fees</span>
                    <h2><sup><i class="ti-arrow-up text-info"></i></sup> $8000</h2>
                </div>
                <span class="text-info">60%</span>
                <div class="progress">
                    <div class="progress-bar bg-info" style="width: 40%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-uppercase">App Development Course</h5>
                <div class="text-right"> <span class="text-muted">Yearly Fees</span>
                    <h2><sup><i class="ti-arrow-up text-inverse"></i></sup> $12000</h2>
                </div>
                <span class="text-inverse">80%</span>
                <div class="progress">
                    <div class="progress-bar bg-inverse" style="width: 40%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- ============================================================== -->
<!-- End Info box -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Over Visitor, Our income , slaes different and  sales prediction -->
<!-- ============================================================== -->
<!-- .row -->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title text-uppercase">University Earnings<br><small class="text-muted">All Earnings are in million $</small></h5>
                    <div class="ml-auto">
                        <ul class="list-inline font-12">
                            <li><i class="fa fa-circle text-dark"></i> Arts</li>
                            <li><i class="fa fa-circle text-info"></i> Commerse</li>
                            <li><i class="fa fa-circle text-success"></i> Science</li>
                        </ul>
                    </div>
                </div>
                <div id="morris-bar-chart" style="height:375px;"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card m-b-15">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Earning From Medical college</h5>
                        <div class="row">
                            <div class="col-6 m-t-30">
                                <h1 class="text-info">$64057</h1>
                                <p class="text-muted">APRIL 2017</p> <b>(150 Sales)</b> </div>
                            <div class="col-6">
                                <div id="sparkline2dash" class="text-right"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-info m-b-15">
                    <div class="card-body">
                        <h5 class="text-white card-title text-uppercase">Earning From Engineering college</h5>
                        <div class="row">
                            <div class="col-6 m-t-30">
                                <h1 class="text-white">$30447</h1>
                                <p class="text-white">APRIL 2017</p> <b class="text-white">(110 Sales)</b> </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <div id="sales1" class="text-right"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- ============================================================== -->
<!-- Comment - table -->
<!-- ============================================================== -->
<!-- row -->
<div class="row">
    <div class="col-md-3">
        <img class="img-responsive" alt="user" src="<?php echo base_url(); ?>university/images/big/c2.jpg">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Web Designing</h5>
                <div class="m-b-30">
                    <a class="link list-icons" href="#">
                        <i class="ti-alarm-clock"></i> 2 Year
                    </a>
                    <a class="link list-icons m-l-10 m-r-10" href="#">
                        <i class="fa fa-heart-o"></i> 38
                    </a>
                    <a class="link list-icons m-l-10 m-r-10" href="#">
                        <i class="fa fa-usd"></i> 50
                    </a>
                </div>
                <p>
                    <span><i class="ti-alarm-clock"></i> Duration: 6 Months</span>
                </p>
                <p>
                    <span><i class="ti-user"></i> Professor: Jane Doe</span>
                </p>
                <p>
                    <span><i class="fa fa-graduation-cap"></i> Students: 200+</span>
                </p>
                <button class="btn btn-success btn-rounded waves-effect waves-light m-t-10">More Details</button>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <img class="img-responsive" alt="user" src="<?php echo base_url(); ?>university/images/big/c1.jpg">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ios Development</h5>
                <div class="m-b-30">
                    <a class="link list-icons" href="#">
                        <i class="ti-alarm-clock"></i> 2 Year
                    </a>
                    <a class="link list-icons m-l-10 m-r-10" href="#">
                        <i class="fa fa-heart-o"></i> 38
                    </a>
                    <a class="link list-icons m-l-10 m-r-10" href="#">
                        <i class="fa fa-usd"></i> 50
                    </a>
                </div>
                <p>
                    <span><i class="ti-alarm-clock"></i> Duration: 6 Months</span>
                </p>
                <p>
                    <span><i class="ti-user"></i> Professor: Jane Doe</span>
                </p>
                <p>
                    <span><i class="fa fa-graduation-cap"></i> Students: 200+</span>
                </p>
                <button class="btn btn-success btn-rounded waves-effect waves-light m-t-10">More Details</button>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <img class="img-responsive" alt="user" src="<?php echo base_url(); ?>university/images/big/c4.jpg">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Android Development</h5>
                <div class="m-b-30">
                    <a class="link list-icons" href="#">
                        <i class="ti-alarm-clock"></i> 2 Year
                    </a>
                    <a class="link list-icons m-l-10 m-r-10" href="#">
                        <i class="fa fa-heart-o"></i> 38
                    </a>
                    <a class="link list-icons m-l-10 m-r-10" href="#">
                        <i class="fa fa-usd"></i> 50
                    </a>
                </div>
                <p>
                    <span><i class="ti-alarm-clock"></i> Duration: 6 Months</span>
                </p>
                <p>
                    <span><i class="ti-user"></i> Professor: Jane Doe</span>
                </p>
                <p>
                    <span><i class="fa fa-graduation-cap"></i> Students: 200+</span>
                </p>
                <button class="btn btn-success btn-rounded waves-effect waves-light m-t-10">More Details</button>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <img class="img-responsive" alt="user" src="<?php echo base_url(); ?>university/images/big/c3.jpg">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Web Development</h5>
                <div class="m-b-30">
                    <a class="link list-icons" href="#">
                        <i class="ti-alarm-clock"></i> 2 Year
                    </a>
                    <a class="link list-icons m-l-10 m-r-10" href="#">
                        <i class="fa fa-heart-o"></i> 38
                    </a>
                    <a class="link list-icons m-l-10 m-r-10" href="#">
                        <i class="fa fa-usd"></i> 50
                    </a>
                </div>
                <p>
                    <span><i class="ti-alarm-clock"></i> Duration: 6 Months</span>
                </p>
                <p>
                    <span><i class="ti-user"></i> Professor: Jane Doe</span>
                </p>
                <p>
                    <span><i class="fa fa-graduation-cap"></i> Students: 200+</span>
                </p>
                <button class="btn btn-success btn-rounded waves-effect waves-light m-t-10">More Details</button>
            </div>
        </div>
    </div>
</div>
<!-- row -->
<!-- ============================================================== -->
<!-- End Comment - chats -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
<div class="right-sidebar">
    <div class="slimscrollright">
        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
        <div class="r-panel-body">
            <ul id="themecolors" class="m-t-20">
                <li><b>With Light sidebar</b></li>
                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
            </ul>
            <ul class="m-t-20 chatonline">
                <li><b>Chat option</b></li>
                <li>
                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>university/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>university/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>university/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>university/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>university/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>university/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>university/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="<?php echo base_url(); ?>university/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->