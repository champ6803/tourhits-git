@extends('layout.main')
@section('page_title','Search Tour')
@section('main-content')

<style type="text/css">
    .filter-tabcard .nav-tabs {  width: 50%; margin-left:auto; margin-right: auto; } 
    .filter-tabcard .nav-tabs > li.active > a, .filter-tabcard .nav-tabs > li.active > a:focus, .filter-tabcard .nav-tabs > li.active > a:hover {color: #fff; background: #EC2424; border: none; box-shadow: 0 0px 5px rgba(112, 112, 112, 0.3); transform: scale(1.005); } <!--กด-->
    .filter-tabcard .nav-tabs > li > a { border: none; color: #515050; background: #fff;  } <!--ยังไม่ได้กด--> 
    .filter-tabcard .nav-tabs > li.active > a,.filter-tabcard .nav-tabs > li > a:hover { border: none;  color: #fff !important; background: #EC2424; }
    .filter-tabcard .nav-tabs > li > a::after { content: ""; background: #F58A1F; height: 3px; position: absolute; width: 100%; left: 0px; bottom: -8px; transition: all 250ms ease 0s; transform: scale(0); }
    .filter-tabcard .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
    .filter-tabcard .tab-nav > li > a::after { background: #5a4080 none repeat scroll 0% 0%; color: #fff; }
    .filter-tabcard .tab-pane { padding: 15px 0; }
    .filter-tabcard .tab-content {
        padding:10px; 
        height: auto; 
        /*width: 880px;*/ 
        border-radius: 10px;         
        border: 2px solid #F58A1F;
        margin-left: 50px;
        margin-right: 50px;
        margin-top:  25px;
        margin-bottom: 25px;
    }
    .filter-tabcard .nav-tabs > l   i  {width:20%; text-align:center;  }
    .filter-tabcard .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 2px 0px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }

    .filter-tabcard .nav-tabs > li > a {
        color: #515050;
        border-left: 1px solid #fff;        
    }

    @media all and (max-width:724px){
        /*        .filter-tabcard .nav-tabs{
                    width: 300px;
                }*/
        .nav-tabs > li > a > span {display:none;}	
        .nav-tabs > li > a {padding: 0px 0px;}
    }

    .filter-tabcard{
        margin-top: 40px;
    }

    .btn-ratepreice{
        border-radius: 8px;
        width: auto;
        margin: 0 5px 0 5px;
        color: #fff;
        background-color: #F58A1F;
        border-color: #F58A1F;
        font-size: 20px;
    }

    .pull-right{
        margin-left: 10px;
        line-height: 1;
        font-size: 20px;
    }

    .price{
        font-size: 20px;
        font-weight: 600;
        color: #1D1D1D;
        padding-right: 10px;
    }

    .dropdown-pos .dropdown-menu{
        width: 100%;
        text-align: center;
    }

    .dropdown-pos{
        /*    text-align: center;
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            width: 100%;*/
    }

    .alert-danger{ background-color: rgba(248,115,0,0.6); }
    .alert { border: 0px solid transparent; }

    .filter-pickdate{
        padding-top: 10px;
        position: relative; 
    }

    .filter-pickdate i {
        position: absolute; 
        bottom: 12px; 
        right: 12px; 
        top: auto; 
        cursor: pointer;
        color: black;
    }

    .card-airline img { max-height: 34px; }

</style>

<style>
    .page-sidebar .sidebar-title{
        border-top-color: #ea1c24;
    }

    #owl-demo .tag-item{
        background: #d7d7d7;
        width: auto;
        margin-right: 10px;
        border-radius: 15px;
        -webkit-border-radius: 15px;
        -moz-border-radius: 15px;
        text-align: center;
        margin: 10px;
        border: 1px solid #d7d7d7;
        -webkit-transition: all 1s ease;
        -o-transition: all 1s ease;
        transition: all 1s ease;
        /*    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);*/
    }

    #owl-demo .tag-item:hover{
        background-color: #363636;
        opacity: 0.8;

    }

    #owl-demo .tag-item:hover a{
        color : #fff; 
    }


    #owl-demo .tag-item a{
        color : #363636;
        font-size: 17px;
        font-weight: bold;
        padding: 5px 10px;
        line-height: 2;   
    }
    .filter-page__content .trip-item .item-body .item-title h2 a:hove{color: #c33132;}
    .filter-box {display: none;}
    .filter-box .searchtoggle {display: none;}
    .trip-item:hover .item-body .item-title h2 a{color: #c33132;}
    .filter-page__content .country img{height: 47px;} 

    @media screen and ( max-width: 768px ) {
        #owl-demo .tag-item>a {font-size: 12px;}
        .owl-theme .owl-controls .owl-page{zoom:0.5;}
        .filter-page__content .country h6{font-size: 15px; line-height: 1;}
        .filter-page__content .country img{height: 34px;} 
        .tour-local-wrapper .swiper-button-next{font-size: 14px;}
        .tour-local-wrapper .swiper-button-prev{font-size: 14px;}   
    }

    @media (min-width: 1200px) {
        .container {width: 1400px;}
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .container {width: 1200px;}
        .trip-item{height: 488px;}
    }

    @media screen and ( max-width: 991px ) {

        .filter-box {
            position: relative;
            white-space: nowrap;
            display: inline-block;
            float: right;
            padding: 7px 15px 0px 0px;
            margin-top: 10px;
        }
        .filter-box .searchtoggle {
            display: inline;
            padding: 0px 6px;
            /*            width: 60px;
                        height: 78px;*/
            font-size: 19px;
            font-weight: bold;
            color: #363636;
            text-align: center;
            border-left: 1px solid #D4D4D4;
            border-right: 1px solid #D4D4D4;
            cursor: pointer;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }
        .page-sidebar .filter-tittle  {display: none;}
        .page-sidebar .left-bar3    {display: none;}

        .filterModal .modal-body .filter-bar .option{font-size: 17px; line-height: 2.3;}
        .filterModal .modal-body .filter-bar .slider.slider-horizontal{width: 100%;}
        .filterModal .modal-header .close{margin-top: 4px;}
        .filterModal .modal-body .filter-bar .filter-header-text{font-size: 19px;}
        .filterModal .modal-body .filter-bar .filter-route{padding: 3px 0 13px 0;}
        .filterModal .filter-bar{padding-bottom:0px;}
        .modal-footer .cancel{
            font-size: 21px;
            color: #fff;
            width: 50%;
            border-radius: 50px;
            background-color: #c33132;
            border: 1px solid #c33132;
            opacity: 0.8;
        }
    }



    .modal.in .modal-dialog{margin-top: 100px;}
</style>

<!-- HEADING PAGE -->
<section class="awe-parallax category-heading-section-demo">
    <div class="awe-overlay"></div>
    <div class="container">
        <div class="category-heading-content category-heading-content__2 text-uppercase">
        </div>
    </div>
</section>
<!-- END / HEADING PAGE -->

<section class="filter-page">
    <div class="container">
        <div class="container">
            <div class="row">   
                <div class="col-md-12 tour-local-wrapper">
                    <div id="owl-demo" class="tag-container owl-carousel owl-theme">

                        <div class="tag-item"><a href="">ทัวร์ญี่ปุ่นราคาถูก</a></div>
                        <div class="tag-item"><a href="">ทัวร์โตเกียว</a></div>
                        <div class="tag-item"><a href="">ทัวร์ญี่ปุ่นฟุกุโอกะ</a></div>
                        <div class="tag-item"><a href="">ทัวร์วันปีใหม่ญี่ปุ่น</a></div>
                        <div class="tag-item"><a href="">ทัวร์ญุ่ปุ่น ตุลาคม</a></div>
                        <div class="tag-item"><a href="">ทัวร์ญี่ปุ่น การบินไทย</a></div>
                        <div class="tag-item"><a href="">ทัวร์ญี่ปุ่น ฤดูใบไม้ผลิ</a></div>
                        <div class="tag-item"><a href="">ทัวร์ญี่ปุ่น ตุลาคม</a></div>
                        <div class="tag-item"><a href="">ทัวร์ญี่ปุ่น การบินไทย</a></div>
                        <div class="tag-item"><a href="">ทัวร์ญี่ปุ่น ฤดูใบไม้ผลิ</a></div>
                        <div class="tag-item"><a href="">ทัวร์โตเกียว</a></div>
                        <div class="tag-item"><a href="">ทัวร์ญี่ปุ่นฟุกุโอกะ</a></div>

                    </div>
                    <div class="swiper-button-next next"><i class="fa fa-angle-right"></i></div>
                    <div class="swiper-button-prev swiper-button-disabled prev"><i class="fa fa-angle-left"></i></div>

                </div>                           
            </div> 
        </div>

        <!--กลาง-->
        <div class="col-md-6 col-md-push-3">
            <div id="loading" class="row">
                <div class="col-md-12 text-center">
                    <img style="padding-top:100px" src="../images/search-loading.gif">
                </div>
            </div>
            <div hidden class="filter-page__content card_show">
                <div class="row">
                    <div class="col-md-12">
                        <div class="country">
                            <img id="package_country_image" style="float: left; margin-right: 10px; border:#d7d7d7 solid 1px; border-radius: 8px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);" class="lazyloaded" src="../images/flags/Japan.png">
                            <h6 id="package_country"></h6>
                        </div>
                    </div>                    
                </div>

                <div id="sorting" class="row card_show">
                    <div class="col-md-12">
                        <div class="page-top">
                            <select class="awe-select">
                                <option>ราคาถูกที่สุด</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- FILTER BOX -->
                        <div class="filter-box">
                            <span class="searchtoggle" data-toggle="modal" data-target="#filterModal">คัดกรอง <i class="fas fa-filter" style="font-size: 15px"></i></span>
                        </div> 
                    </div>
                    <!-- Modal -->
                    <!--                    <div class="modal fade filterModal" id="filterModal" role="dialog">
                                            <div class="modal-dialog">
                                                 Modal content
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                                        <h4 class="modal-title"><i class="fas fa-filter"></i> คัดกรอง</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="box-content">
                                                            <div class="filter-bar">    
                                                                <div class="filter-price">
                                                                    <div class='filter-header'>
                                                                        <span class='filter-header-text'><i class="fas fa-exchange-alt"></i> กำหนดช่วงราคา</span>
                                                                    </div>     
                                                                    <div class="textpricesm"><span id="price_from">0</span> ถึง <span id="price_to">80,000</span> บาท</div>
                                                                    <input id="price" data-slider-id='priceSlider' type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/> 
                                                                </div>
                    
                                                                <hr>
                    
                                                                <div class="filter-route">
                                                                    <div class='filter-header'>
                                                                        <span class='filter-header-text'><i class="far fa-map"></i> เส้นทาง</span>
                                                                    </div>
                                                                    <div id="filter-route">
                                                                        <div class="option-all">
                                                                            <label for="route_all" class="label-cbx">
                                                                                <input id="route_all" type="checkbox" class="invisible" checked>
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span>แสดงทั้งหมด</span>
                                                                            </label>
                                                                        </div>
                                                                        @foreach ($routeList as $route)
                                                                        <div class="option">
                                                                            <label for="route_{{ $route->r_id }}" class="label-cbx">
                                                                                <input id="route_{{$route->r_id }}" value="{{ $route->r_name }}" type="checkbox" class="route_checkbox invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">{{ $route->r_name }}</span>
                                                                                <span class="count">({{$route->r_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                        </div>
                                                                        @endforeach
                                                                        <div id="expandToggleRoute" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreRoute">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>                                                                                      
                                                                    </div>
                                                                </div>
                    
                                                                <hr>
                    
                                                                <div class="filter-date">
                                                                    <div class='filter-header'>
                                                                        <span class='filter-header-text'><i class="far fa-calendar-alt"></i> วันเดินทาง ไป-กลับ</span>
                                                                    </div>
                                                                    <div class='filter-pickdate'>
                                                                        <input type="text" id="date_picker" placeholder="กรุณาเลือกวันเดินทาง ไป - กลับ" class="form-control">
                                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                                    </div>
                                                                                เว้นไว้ใส่ปฎิทิน
                                                                    <div id="filter-date">
                                                                        <div class="option-all">
                                                                            <label for="holiday_all" class="label-cbx">
                                                                                <input id="holiday_all" type="checkbox" class="invisible" checked>
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span>แสดงทั้งหมด</span>
                                                                            </label>
                                                                        </div>
                                                                        @foreach ($holidayList as $holiday)
                                                                        <div class="option">
                                                                            <label for="holiday_{{ $holiday->holiday_id }}" class="label-cbx">
                                                                                <input id="holiday_{{ $holiday->holiday_id }}" value="{{ $holiday->start_date }}||{{ $holiday->end_date }}" type="checkbox" class="holiday_checkbox invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">{{ $holiday->holiday_name }}</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                        </div>
                                                                        @endforeach
                    
                                                                    </div>
                                                                    <div id="expandToggleHoliday" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreHoliday">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                                                                </div>
                    
                                                                <hr>
                    
                                                                <div class="filter-month">
                                                                    <div class='filter-header'>
                                                                        <span class='filter-header-text'><i class="far fa-calendar-check"></i> เดือน</span>
                                                                    </div>
                                                                    <div id="filter-month">
                                                                        <div class="option-all">
                                                                            <label for="month_all" class="label-cbx">
                                                                                <input id="month_all" type="checkbox" class="invisible" checked>
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span>แสดงทั้งหมด</span>
                                                                            </label>
                                                                        </div>
                                                                        @foreach ($monthList as $month)
                                                                        <div class="option">
                                                                            @if ($month->m_month === 1)
                                                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">มกราคม</span>
                                                                                <span class="count">({{$month->m_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                            @elseif ($month->m_month === 2)
                                                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">กุมภาพันธ์</span>
                                                                                <span class="count">({{$month->m_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                            @elseif ($month->m_month === 3)
                                                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">มีนาคม</span>
                                                                                <span class="count">({{$month->m_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                            @elseif ($month->m_month === 4)
                                                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">เมษายน</span>
                                                                                <span class="count">({{$month->m_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                            @elseif ($month->m_month === 5)
                                                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">พฤษภาคม</span>
                                                                                <span class="count">({{$month->m_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                            @elseif ($month->m_month === 6)
                                                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">มิถุนายน</span>
                                                                                <span class="count">({{$month->m_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                            @elseif ($month->m_month === 7)
                                                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">กรกฎาคม</span>
                                                                                <span class="count">({{$month->m_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                            @elseif ($month->m_month === 8)
                                                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">สิงหาคม</span>
                                                                                <span class="count">({{$month->m_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                            @elseif ($month->m_month === 9)
                                                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">กันยายน</span>
                                                                                <span class="count">({{$month->m_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                            @elseif ($month->m_month === 10)
                                                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">ตุลาคม</span>
                                                                                <span class="count">({{$month->m_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                            @elseif ($month->m_month === 11)
                                                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">พฤศจิกายน</span>
                                                                                <span class="count">({{$month->m_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                            @elseif ($month->m_month === 12)
                                                                            <label for="month_{{ $month->m_month }}" class="label-cbx">
                                                                                <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">ธันวาคม</span>
                                                                                <span class="count">({{$month->m_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                            @endif
                                                                        </div>
                                                                        @endforeach
                    
                                                                    </div>
                                                                    <div id="expandToggleMonth" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreMonth">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                                                                </div>
                    
                                                                <hr>
                    
                                                                <div class="filter-countdate">
                                                                    <div class='filter-header'>
                                                                        <span class='filter-header-text'><i class="far fa-clock"></i> จำนวนวัน</span>
                                                                    </div>
                                                                    <div id="filter-countdate">
                                                                        <div class="option-all">
                                                                            <label for="day_all" class="label-cbx">
                                                                                <input id="day_all" type="checkbox" class="invisible" checked>
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span>แสดงทั้งหมด</span>
                                                                            </label>
                                                                        </div>
                                                                        @foreach ($dayList as $day)
                                                                        <div class="option">
                                                                            <label for="day_{{ $day->duration }}" class="label-cbx">
                                                                                <input id="day_{{ $day->duration }}" type="checkbox" class="invisible days_checkbox">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">{{ $day->duration }} วัน</span>
                                                                                <span class="count">({{$day->sum}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <div id="expandToggleDates" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreDates">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                                                                </div>
                    
                                                                <hr>
                    
                                                                <div class="filter-airline">
                                                                    <div class='filter-header'>
                                                                        <span class='filter-header-text'><i class="far fa-paper-plane"></i> สายการบิน</span>
                                                                    </div>
                                                                    <div id="filter-airline">
                                                                        <div class="option-all">
                                                                            <label for="airline_all" class="label-cbx">
                                                                                <input id="airline_all" type="checkbox" class="invisible" checked>
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span>แสดงทั้งหมด</span>
                                                                            </label>
                                                                        </div>
                                                                        @foreach ($airlineList as $airline)
                                                                        <div class="option">
                                                                            <label for="airline_{{ $airline->a_id }}" class="label-cbx">
                                                                                <input id="airline_{{ $airline->a_id }}" type="checkbox" class="invisible airline_checkbox">
                                                                                <div class="checkbox">
                                                                                    <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                                                    <polyline points="4 11 8 15 16 6"></polyline>
                                                                                    </svg>
                                                                                </div>
                                                                                <span class="name">{{ $airline->a_name }}</span>
                                                                                <span class="count">({{$airline->a_num}})</span>
                                                                                <span class="clear"></span>
                                                                            </label>
                                                                        </div>
                                                                        @endforeach
                    
                                                                    </div>
                                                                    <div id="expandToggleAirline" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreAirline">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                                                                </div>
                    
                    
                                                                                            end filter-bar                                                                           
                                                            </div>
                                                        </div>    
                                                    </div>
                                                    <div class="modal-footer" style="text-align:center;">
                                                        <button type="button" class="awe-btn cancel" data-dismiss="modal">เสร็จสิ้น</button>
                                                    </div>
                                                </div>
                    
                                            </div>
                                        </div>-->

                </div>    
                <br>

                <div id="card_area" class="card_show filter-item-wrapper">
                </div>


                <!-- PAGINATION -->
                <!--                <div class="page__pagination">
                                    <span class="pagination-prev"><i class="fa fa-caret-left"></i></span>
                                    <span class="current">1</span>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#" class="pagination-next"><i class="fa fa-caret-right"></i></a>
                                </div>-->

                <div class="row card_show">
                    <div class="col-md-12">
                        <ul class="pagination" id="search_tour_pager"></ul>
                    </div>
                </div>
                <!-- END / PAGINATION -->
            </div>
        </div>

        <!--                    bar ซ้าย-->
        <div class="col-md-3 col-md-pull-6">
            <div class="page-sidebar">
                <div class="sidebar-title hidden-xs filter-tittle">
                    <h3><i class="fas fa-filter"></i> คัดกรอง :</h3>      
                </div>         

                <div class="left-bar3 mobile-version hidden-xs">
                    <div class="box-content">
                        <div class="filter-bar">
                            <div class="filter-text">
                                <div class='filter-header'>
                                    <span class='filter-header-text'><i class="fa fa-comments"></i> ค้นหา</span>
                                </div>
                                <div class="input-group">
                                    <input id="search_text" type="text" class="form-control" placeholder="ค้าหาชื่อแพ็คเกจทัวร์">
                                    <span class="input-group-btn">
                                        <button id="search_btn" class="btn btn-danger" type="button" style="height: 40px;"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </div>

                            <hr>

                            <div class="filter-price">
                                <div class='filter-header'>
                                    <span class='filter-header-text'><i class="fas fa-exchange-alt"></i> กำหนดช่วงราคา</span>
                                </div>     
                                <div class="textpricesm"><span id="price_from">0</span> ถึง <span id="price_to"></span> บาท</div>
                                <input id="price" data-slider-id='priceSlider' type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/> 
                            </div>

                            <hr>

                            <div class="filter-route">
                                <div class='filter-header'>
                                    <span class='filter-header-text'><i class="far fa-map"></i> เส้นทาง</span>
                                </div>
                                <div id="filter-route">
                                    <div class="option-all">
                                        <label for="route_all" class="label-cbx">
                                            <input id="route_all" type="checkbox" class="invisible" checked>
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span>แสดงทั้งหมด</span>
                                        </label>
                                    </div>
                                    @foreach ($routeList as $route)
                                    <div class="option">
                                        <label for="route_{{ $route->r_id }}" class="label-cbx">
                                            <input id="route_{{$route->r_id }}" value="{{ $route->r_name }}" type="checkbox" class="route_checkbox invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">{{ $route->r_name }}</span>
                                            <span class="count">({{$route->r_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    @endforeach
                                    <div id="expandToggleRoute" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreRoute">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>                                                                                      
                                </div>
                            </div>

                            <hr>

                            <div class="filter-date">
                                <div class='filter-header'>
                                    <span class='filter-header-text'><i class="far fa-calendar-alt"></i> วันเดินทาง ไป-กลับ</span>
                                </div>
                                <div class='filter-pickdate'>
                                    <input type="text" id="date_picker" placeholder="กรุณาเลือกวันเดินทาง ไป - กลับ" class="form-control">
                                    <i id="clear_calendar" class="fa fa-calendar-times"></i>
                                </div>
                                <!--            เว้นไว้ใส่ปฎิทิน-->
                                <div id="filter-date">
                                    <div class="option-all">
                                        <label for="holiday_all" class="label-cbx">
                                            <input id="holiday_all" type="checkbox" class="invisible" checked>
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span>แสดงทั้งหมด</span>
                                        </label>
                                    </div>
                                    @foreach ($holidayList as $holiday)
                                    <div class="option">
                                        <label for="holiday_{{ $holiday->holiday_id }}" class="label-cbx">
                                            <input id="holiday_{{ $holiday->holiday_id }}" value="{{ $holiday->start_date }}||{{ $holiday->end_date }}" type="checkbox" class="holiday_checkbox invisible">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">{{ $holiday->holiday_name }}</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    @endforeach

                                </div>
                                <div id="expandToggleHoliday" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreHoliday">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                            </div>

                            <hr>

                            <div class="filter-month">
                                <div class='filter-header'>
                                    <span class='filter-header-text'><i class="far fa-calendar-check"></i> เดือน</span>
                                </div>
                                <div id="filter-month">
                                    <div class="option-all">
                                        <label for="month_all" class="label-cbx">
                                            <input id="month_all" type="checkbox" class="invisible" checked>
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span>แสดงทั้งหมด</span>
                                        </label>
                                    </div>
                                    @foreach ($monthList as $month)
                                    <div class="option">
                                        @if ($month->m_month === 1)
                                        <label for="month_{{ $month->m_month }}" class="label-cbx">
                                            <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">มกราคม</span>
                                            <span class="count">({{$month->m_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                        @elseif ($month->m_month === 2)
                                        <label for="month_{{ $month->m_month }}" class="label-cbx">
                                            <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">กุมภาพันธ์</span>
                                            <span class="count">({{$month->m_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                        @elseif ($month->m_month === 3)
                                        <label for="month_{{ $month->m_month }}" class="label-cbx">
                                            <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">มีนาคม</span>
                                            <span class="count">({{$month->m_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                        @elseif ($month->m_month === 4)
                                        <label for="month_{{ $month->m_month }}" class="label-cbx">
                                            <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">เมษายน</span>
                                            <span class="count">({{$month->m_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                        @elseif ($month->m_month === 5)
                                        <label for="month_{{ $month->m_month }}" class="label-cbx">
                                            <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">พฤษภาคม</span>
                                            <span class="count">({{$month->m_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                        @elseif ($month->m_month === 6)
                                        <label for="month_{{ $month->m_month }}" class="label-cbx">
                                            <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">มิถุนายน</span>
                                            <span class="count">({{$month->m_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                        @elseif ($month->m_month === 7)
                                        <label for="month_{{ $month->m_month }}" class="label-cbx">
                                            <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">กรกฎาคม</span>
                                            <span class="count">({{$month->m_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                        @elseif ($month->m_month === 8)
                                        <label for="month_{{ $month->m_month }}" class="label-cbx">
                                            <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">สิงหาคม</span>
                                            <span class="count">({{$month->m_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                        @elseif ($month->m_month === 9)
                                        <label for="month_{{ $month->m_month }}" class="label-cbx">
                                            <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">กันยายน</span>
                                            <span class="count">({{$month->m_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                        @elseif ($month->m_month === 10)
                                        <label for="month_{{ $month->m_month }}" class="label-cbx">
                                            <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">ตุลาคม</span>
                                            <span class="count">({{$month->m_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                        @elseif ($month->m_month === 11)
                                        <label for="month_{{ $month->m_month }}" class="label-cbx">
                                            <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">พฤศจิกายน</span>
                                            <span class="count">({{$month->m_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                        @elseif ($month->m_month === 12)
                                        <label for="month_{{ $month->m_month }}" class="label-cbx">
                                            <input id="month_{{ $month->m_month }}" value="{{ $month->m_month }}" type="checkbox" class="invisible month_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">ธันวาคม</span>
                                            <span class="count">({{$month->m_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                        @endif
                                    </div>
                                    @endforeach

                                </div>
                                <div id="expandToggleMonth" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreMonth">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                            </div>

                            <hr>

                            <div class="filter-countdate">
                                <div class='filter-header'>
                                    <span class='filter-header-text'><i class="far fa-clock"></i> จำนวนวัน</span>
                                </div>
                                <div id="filter-countdate">
                                    <div class="option-all">
                                        <label for="day_all" class="label-cbx">
                                            <input id="day_all" type="checkbox" class="invisible" checked>
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span>แสดงทั้งหมด</span>
                                        </label>
                                    </div>
                                    @foreach ($dayList as $day)
                                    <div class="option">
                                        <label for="day_{{ $day->duration }}" class="label-cbx">
                                            <input id="day_{{ $day->duration }}" value="{{ $day->duration }}" type="checkbox" class="invisible days_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">{{ $day->duration }} วัน</span>
                                            <span class="count">({{$day->sum}})</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div id="expandToggleDates" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreDates">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                            </div>

                            <hr>

                            <div class="filter-airline">
                                <div class='filter-header'>
                                    <span class='filter-header-text'><i class="far fa-paper-plane"></i> สายการบิน</span>
                                </div>
                                <div id="filter-airline">
                                    <div class="option-all">
                                        <label for="airline_all" class="label-cbx">
                                            <input id="airline_all" type="checkbox" class="invisible" checked>
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span>แสดงทั้งหมด</span>
                                        </label>
                                    </div>
                                    @foreach ($airlineList as $airline)
                                    <div class="option">
                                        <label for="airline_{{ $airline->a_id }}" class="label-cbx">
                                            <input id="airline_{{ $airline->a_id }}" value="{{ $airline->a_name }}" type="checkbox" class="invisible airline_checkbox">
                                            <div class="checkbox">
                                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                                </svg>
                                            </div>
                                            <span class="name">{{ $airline->a_name }}</span>
                                            <span class="count">({{$airline->a_num}})</span>
                                            <span class="clear"></span>
                                        </label>
                                    </div>
                                    @endforeach

                                </div>
                                <div id="expandToggleAirline" class="expand-toggle"><a href="javascript:void(0)" id="loadMoreAirline">ดูเพิ่มเติม <i class="fas fa-caret-down"></i></a></div>
                            </div>


                            <!--                            end filter-bar-->                                                                           
                        </div>
                    </div> 
                </div>

                <!--                <div class="sidebar-title hidden-xs">
                                    <h3>ทัวร์ขายดี :</h3>
                                </div>
                                <div class="left-bar1">
                                    <div class="box-content hidden-xs">
                                        <div class="tour-left-bar-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="" title="">
                                                        <img class="media-object lazy" src="https://images.unsplash.com/photo-1519882189396-71f93cb4714b?ixlib=rb-0.3.5&s=0b977d67f187eec17eb555555ef59a6d&auto=format&fit=crop&w=500&q=60" 
                                                             alt="ทัวร์ญี่ปุ่น โอไดบะ ขึ้นภูเขาไฟฟูจิ ชมทุ่งดอกลาเวนเดอร์ นมัสการและขอพรวัดนาริตะและวัดอาซากุสะ" style="display: inline-block;">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">
                                                        <a href="" title="">ทัวร์ญี่ปุ่น โอไดบะ ขึ้นภูเขาไฟฟูจิ ชมทุ่งดอกลาเวนเดอร์ นมัสการ...</a>
                                                    </h6>
                                                    <div class="peroid">เริ่มเดินทาง 21 มิ.ย. 61</div>
                                                    <div class="price"><span>14,900</span> บาท</div>
                                                </div>                                        
                                            </div>
                                        </div>
                
                                        <div class="tour-left-bar-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="" title="">
                                                        <img class="media-object lazy" src="{{ asset('images/tour/1-tour6.jpg')}}" 
                                                             alt="ทัวร์ญี่ปุ่น โอไดบะ ขึ้นภูเขาไฟฟูจิ ชมทุ่งดอกลาเวนเดอร์ นมัสการและขอพรวัดนาริตะและวัดอาซากุสะ" style="display: inline-block;">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">
                                                        <a href="" title="">ทัวร์ญี่ปุ่น ออนเซน ภูเขาไฟฟูจิ ชมดอกไม้บาน...</a>
                                                    </h6>
                                                    <div class="peroid">เริ่มเดินทาง 10 ต.ค. 61</div>
                                                    <div class="price"><span>20,900</span> บาท</div>
                                                </div>                                        
                                            </div>
                                        </div>
                
                                        <div class="tour-left-bar-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="" title="">
                                                        <img class="media-object lazy" src="{{ asset('images/tour/1-tour1.jpg')}}" 
                                                             alt="ทัวร์ญี่ปุ่น โอไดบะ ขึ้นภูเขาไฟฟูจิ ชมทุ่งดอกลาเวนเดอร์ นมัสการและขอพรวัดนาริตะและวัดอาซากุสะ" style="display: inline-block;">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">
                                                        <a href="" title="">ทัวร์ญี่ปุ่น วัดฟุกุสึ เที่ยวชมซากุระบาน...</a>
                                                    </h6>
                                                    <div class="peroid">เริ่มเดินทาง 30 ธ.ค. 61</div>
                                                    <div class="price"><span>48,000</span> บาท</div>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>-->

                <div class="sidebar-title hidden-xs">
                    <h3>ทัวร์แนะนำ :</h3>         
                </div>
                <div class="left-bar2">
                    <div class="box-content hidden-xs">
                        <div class="swiper-wrapper tour-local-nav" style="transform: translate3d(0px, 0px, 0px);">
                            <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                <a href="" title="" class="">ทัวร์ญี่ปุ่นราคาถูก</a>
                            </div>
                            <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                <a href="" title="" class="">ทัวร์โตเกียว</a>
                            </div>
                            <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                <a href="" title="" class="">ทัวร์ญี่ปุ่นฟุกุโอกะ</a>
                            </div>
                            <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                <a href="" title="" class="">ทัวร์วันปีใหม่ญี่ปุ่น</a>
                            </div>
                            <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                <a href="" title="" class="">ทัวร์ญุ่ปุ่น ตุลาคม</a>
                            </div>
                            <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                <a href="" title="" class="">ทัวร์ญี่ปุ่น การบินไทย</a>
                            </div>
                            <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                <a href="" title="" class="">ทัวร์ญี่ปุ่น ฤดูใบไม้ผลิ</a>
                            </div>
                            <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                <a href="" title="" class="">ทัวร์วันปีใหม่ญี่ปุ่น</a>
                            </div>
                            <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                <a href="" title="" class="">ทัวร์ญุ่ปุ่น ตุลาคม</a>
                            </div>
                            <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                <a href="" title="" class="">ทัวร์ญี่ปุ่น การบินไทย</a>
                            </div>
                            <div class="swiper-slide local-nav-item" style="margin-right: 10px;">
                                <a href="" title="" class="">ทัวร์ญี่ปุ่น ฤดูใบไม้ผลิ</a>
                            </div>                                   
                        </div> 
                    </div>
                </div>    


            </div>
        </div>

        <!--                    bar ขวา-->
        <div class="col-md-3">
            <div class="page-sidebar">
                <div class="sidebar-title hidden-xs">
                    <h3>สถานที่ยอดนิยม :</h3>
                </div>
                <div class="right-bar">
                    <div class="box-content hidden-xs">
                        <div class="tour-left-bar-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="" title="">
                                        <img class="media-object lazy" src="https://images.unsplash.com/photo-1516464488897-e67174edf7e7?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=05e319452c7a94849374b80813bcf118&auto=format&fit=crop&w=500&q=60" 
                                             alt="" style="display: inline-block;">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">
                                        <a href="" title="">ออนเซน (48)</a>
                                    </h6>
                                </div>                                        
                            </div>
                        </div>

                        <div class="tour-left-bar-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="" title="">
                                        <img class="media-object lazy" src="https://images.unsplash.com/photo-1511543865714-5a5a5ce51a94?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=af1dad982f43aeb20daf60a966268317&auto=format&fit=crop&w=500&q=60" 
                                             alt="" style="display: inline-block;">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">
                                        <a href="" title="">ขาปูยักษ์ (31)</a>
                                    </h6>
                                </div>                                        
                            </div>
                        </div>

                        <div class="tour-left-bar-item">
                            <div class="media">
                                <div class="media-left">
                                    <a href="" title="">
                                        <img class="media-object lazy" src="https://images.unsplash.com/photo-1527650285468-3301061c3a5d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e19ffc9b9bb4dbfa12f57c6830944198&auto=format&fit=crop&w=500&q=60" 
                                             alt="" style="display: inline-block;">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">
                                        <a href="" title="">ภูเขาไฟฟูจิ (40)</a>
                                    </h6>
                                </div>                                        
                            </div>
                        </div>

                    </div>    
                </div>
            </div>
        </div>

    </div>
</section>
@stop

@section('footer_scripts')
<script>
    $(document).ready(function () {

        var owl = $("#owl-demo");

        owl.owlCarousel({
            items: 5, //5 items above 1000px browser width
            autoWidth: true,
            loop: true,
            autoPlay: 4500,
            stopOnHover: true,
            margin: 5,
            transitionStyle: "fade",
            itemsTablet: [768, 3],
            itemsMobile: [479, 2]

        });

        // Custom Navigation Events
        $(".next").click(function () {
            owl.trigger('owl.next');
        })
        $(".prev").click(function () {
            owl.trigger('owl.prev');
        })
        $(".play").click(function () {
            owl.trigger('owl.play', 1000); //owl.play event accept autoPlay speed as second parameter
        })
        $(".stop").click(function () {
            owl.trigger('owl.stop');
        })
        var test = <?php echo json_encode($dayList); ?>;
        console.log(test);
    });
    var price_most = <?php echo json_encode($price_most); ?>;
</script>
<script type="text/javascript" src="{{ asset('js/filter/search-tour.js') }}"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
@endsection