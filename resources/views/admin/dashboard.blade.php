
@include('admin.includes.header')
<style>
    .info-card {
        margin-bottom: 23px;
        border: 1px solid #000;
    }
    .iconBorder {
        border: 5px solid #FFE000;
        border-radius: 50%;
        font-size: 40px;
        padding: 10px;
    }
    .card-title {
        font-size: 18px;
        font-weight: 600;
    }
    .valueWithName {
        font-size: 20px;
    }
</style>


<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex align-items-center justify-content-between">
                    <div class="page_title_left">
                        <h4 class="f_s_30 f_w_700 text_white">Dashboard</h4>                        
                    </div>
                    <!-- <a href="#" class="white_btn3">Create Report</a> -->
                    @if(Session::has('message'))
                    <p class="alert alert-success"><span style="font-weight: 600;"> Success !! </span>{{ Session::get('message') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <section class="dashboard">
        <div class="row">
            <div class="col-xxl-4 col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Cars</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa fa-car iconBorder"></i>
                            </div>
                            <div class="ps-3 valueWithName">
                                <h3>2000</h3>
                                <span class="text-success small pt-1 fw-bold"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title f_s_30">Total Brands</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <!-- <i class="bi bi-cart"></i> -->
                                <i class="fa fa-car iconBorder"></i>
                            </div>
                            <div class="ps-3 valueWithName">
                                <h3>10</h3>
                                <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                                <span class="text-success small pt-1 fw-bold"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-3">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Categories</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa fa-car iconBorder"></i>
                            </div>
                            <div class="ps-3 valueWithName">
                                <h3>11</h3>
                                <span class="text-success small pt-1 fw-bold"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-3">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Service Types</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa fa-car iconBorder"></i>
                            </div>
                            <div class="ps-3 valueWithName">
                                <h3>11</h3>
                                <span class="text-success small pt-1 fw-bold"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Agents</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <!-- <i class="bi bi-currency-dollar"></i> -->
                                <i class="fa fa-car iconBorder"></i>
                            </div>
                            <div class="ps-3 valueWithName">
                                <h3>25</h3>
                                <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                                <span class="text-success small pt-1 fw-bold"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-3">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Deals</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa fa-car iconBorder"></i>
                            </div>
                            <div class="ps-3 valueWithName">
                                <h3>250</h3>
                                <span class="text-success small pt-1 fw-bold"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-3">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Total User</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fa fa-car iconBorder"></i>
                            </div>
                            <div class="ps-3 valueWithName">
                                <h3>26</h3>
                                <span class="text-success small pt-1 fw-bold"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('admin.includes.footer')

