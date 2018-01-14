<style>
/* CSS Document */

.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9,
.col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9,
.col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9,
.col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    float:right;
    font-family: IRANSans!important;
}
body {
    font-size:13px;
    font-family: IRANSans;
    font-weight: normal;
    background-color:  #fff;
    color:#444;
    margin:0;
    padding:0;
    direction: rtl;
    text-align: right;
    font-weight: 500;
    line-height: 28px;
}
h1, h2, h3, h4, h5, h6{
    font-family: Mj_DinarOneMedium!important;
}
a,
a:hover,
a:active,
a:focus {
    text-decoration:none;
    outline: none;
}
a{
    color: #007CA6;
}
button:focus,
button:active{
    outline: none!important;
    border: none!important
}
button {cursor: pointer;}
a:focus,
input[type="file"]:focus,
input[type="radio"]:focus,
input[type="checkbox"]:focus,
.btn:focus,
.btn:active:focus,
.btn.active:focus{
  outline: none;
}
section {
    display: block;
}
.carousel-item {
  min-height: 300px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.topbar{
    background-color: {{$colors->layout_background ?? 'black'}};
    display: block;
    float: right;
    width: 100%;
    padding: 5px 0px;
}
.topbar .contact ul{
    margin: 0;
    padding: 0;
    display: flex;
}
.topbar .contact ul li{
    list-style: none;
    font-weight: 300;
}
.topbar .contact ul li:last-child{
    margin-left: 0;
}
.topbar .contact ul li i{
    float: left;
    display: block;
    margin: 6px 5px 0 0;
    color: #007CA6;
}
.topbar .contact ul li a{
    color: #fff;
}
.topbar .contact ul li a:hover{
    color: #007CA6;
}
.topbar .contact ul li.phone{
    direction: ltr;
}
.topbar .contact form{
    background-color: #fff;
    border-radius: 3px;
    width: 100%;
    margin-top: 7px;
    padding: 3px 0px;
}
.topbar .contact form input{
    width: 89%;
    background-color: transparent;
    border: none;
    font-size: 12px;
    padding: 0px 5px;
}
.topbar .contact form button{
    width: 10%;
    padding: 0px 5px;
    background-color: transparent;
    font-family: FontAwesome;
    color: {{$colors->organ_color_1 ?? 'blue'}};
}
.portal .flash-title{
    float: right;
    color: #fff;
    margin-left: 5px;
}
.portal .flash-title img{
    float: left;
    width: 55px;
    height: 50px;
}
.portal .flash-title p{
    width: 100%;
    float: left;
    text-align: left;
    font-weight: 300;
}
.portal ul{
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap
}
.portal ul li{
    list-style:none;
    margin: 3px;
    width: 33px;
    height: 33px;
}
.portal ul li a img{
    border-radius: 3px;
    width: 33px;
    height: 33px;
    opacity: 0.8;
    transition: 0.3s;
}
.portal ul li a:hover img{
    opacity: 1;
}
.social{
    background-color: #fff;
    border-radius: 4px;
    margin-top: 10px;
    padding: 0px 6px;
    display: block;
    min-height: 56px;
}

.social ul{
    margin: 0;
    padding: 15px 0 0 0;
    display: flex;
    flex-direction: row;
    justify-content: center;
}
.social ul li{
    list-style: none;
    direction: ltr;
    font-size: 12px;
    text-align: center;
    line-height: 20px
}
.social ul li a{
    color: #333;
}
.social ul li a i.fa.fa-telegram{
    color: {{$colors->organ_color_2 ?? 'blue'}};
    font-size: 26px;
    margin: 0px 0px 0px 5px;
    transition: 0.3s;
}
.social ul li a i.fa.fa-instagram{
    color: {{$colors->organ_color_2 ?? 'blue'}};
    font-size: 26px;
    margin: 0px 5px 0px 0px;
    transition: 0.3s;
}
.social ul li a i.fa.fa-telegram:hover,
.social ul li a i.fa.fa-instagram:hover{
    color: {{$colors->organ_color_1 ?? 'blue'}};
}
.user .cart{
    background-color: #fff!important;
    border-radius: 4px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    padding: 0 6px;
    margin-top: 10px;
    min-height: 56px;
}
.cart i{
    color: {{$colors->organ_color_1 ?? 'blue'}};
    font-size: 16px;
    margin: 20px 0 0 0;
    text-align: center!important;
}
.cart p{
    margin: 15px 7px 0 0;
    text-align: center!important;
}
.user-box{
    background-color: #fff;
    border-radius: 4px;
    margin: 10px 0px 0px 0px;
    text-align: center;
    min-height: 56px;
}
.user-box i{
    color: {{$colors->organ_color_1 ?? 'blue'}};
    font-size: 16px;
    margin-left: 7px;
}
.user-box .dropdown button{
    font-size: 12px!important;
    margin: 11px 0 0 0;
    background-color: transparent
}
.user .col-xl-4.col-lg-4.col-md-4.col-xs-12{
    padding: 0px 7px;
}
nav.navbar.navbar-expand-lg .container button{
    background-color: {{$colors->layout_background ?? 'black'}};
}
nav.navbar.navbar-expand-lg .container button i{
    color: #fff
}
.navbar-expand-lg{
    border-bottom: solid 1px #EDEDED
}
.dropdown-item,
.dropdown-menu{
    text-align: right;
    direction: rtl;
}
.dropdown-item{
    padding: 0
}
.dropdown-menu{
    padding: 7px 12px;
    font-size: 12px
}
.clear{
    background-color: #FAFAFA;
    color: transparent
}
.navbar .container, .navbar .container-fluid{
    flex-direction: row-reverse
}
.navbar-brand img{
    float: left
}
.navbar-brand .title{
    float: left;
}
.navbar-brand{
    text-align: left;
    direction: rtl;
}
.navbar-brand h1{
    font-size: 20px;
    color: #373839;
    width: 100%;
    display: block;
    padding: 15px 0px 12px 10px;
    text-align: center
}
.navbar-brand h2{
    font-size: 14px;
    color: #373839;
    width: 100%;
    padding-left: 10px;
    text-align: center
}
li.nav-item i{
    display: block;
    font-size: 18px;
}
li.nav-item{
    text-align: center
}
.navbar-nav{
    padding: 0;
    margin: 0
}
.navbar-nav li a{
    color: #373839;
}
.navbar-nav li a:hover{
    color: {{$colors->organ_color_1 ?? 'blue'}}
}
.boxes{
    background-color: #FAFAFA;
    padding: 80px 0px;
}

.srsl{
    background-color: #FAFAFA;
    padding: 0px 0px 40px 0px;
}
.boxes .box{
    width: 20%;
    border-left: solid 1px #E8E6E6;
    padding: 0px 15px;
}
.boxes .box:last-child{
    border-left: none;
}
.boxes .box i{
    font-size: 56px;
    margin-bottom: 15px;
    color: {{$colors->organ_color_2 ?? 'blue'}};
}
.boxes .box h3{
    color: #637F83;
    font-size: 17px;
}
.boxes .box p{
    font-weight: 300
}
.boxes .box:hover i{
    color: {{$colors->organ_color_1 ?? 'blue'}};
}
.srsl .search{
    background-color: {{$colors->organ_color_1 ?? 'blue'}};
    border-radius: 5px;
    padding: 15px;
    color: #fff;
    text-align: center;
}
.srsl .search h4{
    font-size: 18px;
}
.srsl .search form.search{
    border: solid 1px #F0B068;
    padding: 0;
    color: #F0B068;
}
.srsl .search form.search input{
    background-color: transparent;
    border: none;
    width: 78%;
    color: #fff;
    padding: 0px 5px;
}
.srsl .search form.search button{
    background-color: transparent;
    width: 20%;
    color: #fff;
}
.srsl .search form.sby{
    width: 100%;
    display: flex;
    flex-direction: column;
    margin: 20px 0px;
}
.srsl .search form.sby select.form-input{
    border-radius: 3px;
    border: none;
    height: 40px;
    margin-bottom: 15px;
}
.srsl .search form.sby select.form-input{
    -webkit-appearance: none!important;
    -moz-appearance: none!important;
    appearance: none!important;
    background-image: url(../../images/arrow.png)!important;
    background-repeat: no-repeat;
    background-position: 7px 16px;
    font-size: 13px;
    border: 1px solid #eee;
}
.srsl .slider{
    background-color: {{$colors->organ_color_2 ?? 'blue'}};
    border-radius: 5px;
}
.srsl .col-xl-3.col-lg-3.col-md-6.col-xs-12{
    padding-right: 0;
}
.srsl .col-xl-9.col-lg-9.col-md-6.col-xs-12{
    padding-left: 0;
}
.srsl .slider .bg{
    background-size: cover;
    background-position: center
}
.srsl .slider .carousel-inner .carousel-item{
    padding: 100px;
    color: #fff;
    text-align: center;
    min-height: 543px
}
.srsl .slider .carousel-inner .carousel-item h4{
    font-size: 30px;
    margin-bottom: 50px;
}
.srsl .slider .carousel-inner .carousel-item p{
    font-size: 16px;
    margin-bottom: 50px;
}
.srsl .slider .carousel-inner .carousel-item .btn{
    background-color: #F6F6F6;
    padding: 7px 25px;
    color: #444;
    font-size: 22px;
}
.srsl .slider .carousel-inner .carousel-item .btn:hover{
    background-color: {{$colors->organ_color_1 ?? 'blue'}};
}
.srsl .slider .carousel-inner .carousel-item .btn a{
    color: #444;
}
.carousel-control-prev:before{
    content:"\f104";
    font-family:'FontAwesome';
    font-size: 40px;
}
.carousel-control-next:before{
    content:"\f105";
    font-family:'FontAwesome';
    font-size: 40px;
}
.news{
    padding: 80px 0px;
    border-bottom: solid 1px #E8E6E6;
    width: 100%;
}
.news .content{
    background-color: #F6F6F6;
    width: 100%;
}
.news .content form.search{
    width: 85%;
    display: flex;
    flex-direction: row;
    float: left;
    background-color: {{$colors->organ_color_1 ?? 'blue'}};
    height: 40px;
}
.news .content form.search input{
    width: 114px;
    background-color: {{$colors->organ_color_1 ?? 'blue'}}!important;
    border: none;
    padding-right: 7px;
    color: #222;
}
.news .content form.search button{
    background-color: {{$colors->organ_color_1 ?? 'blue'}};
    border: none;
    border-left: solid 1px #fad763;
    border-radius: 0;
    color: #fff;
}
.news .content form.search .group:last-child button{
    border-left: none;
}
.news .content .newtit{
    width: 15%;
    border: solid 1px {{$colors->organ_color_1 ?? 'blue'}};
    height: 40px;
    text-align: center;
    padding-top: 5px;
    font-size: 15px;
}
.news .content .contbox{
    margin: 30px 20px 20px 20px;
    background-color: #fff;
    padding: 15px 0px 25px 0px;
}
.news .content .contbox ol.carousel-indicators,
.introduction .tabs ol.carousel-indicators{
    bottom: -10px
}
.shop ol.carousel-indicators {
    bottom: -20px
}
ol.carousel-indicators{
    padding: 0;
    margin: 0;
}
.news .content .contbox ol.carousel-indicators li,
.introduction .tabs  ol.carousel-indicators li,
.shop ol.carousel-indicators li{
    background-color: #333;
}
.news .content .contbox ol.carousel-indicators li.active,
.introduction .tabs ol.carousel-indicators li.active,
.shop ol.carousel-indicators li.active{
    background-color: #999
}
.news .content .contbox .col-xl-7.col-lg-7.col-md-6.col-xs-12 img{
    float: right;
    display: block;

}
.news .content .contbox .col-xl-7.col-lg-7.col-md-6.col-xs-12 h4{
    font-size: 18px;
}
.news .content .contbox .col-xl-7.col-lg-7.col-md-6.col-xs-12 p{
    text-align: justify;
    font-weight: 300;
    line-height: 23px;
}
.news .content .contbox .col-xl-5.col-lg-5.col-md-6.col-xs-12 .col-xl-12.col-lg-12.col-md-12.col-xs-12 img{
    margin-bottom: 10px;
}
.news .content form.search.pazi,
.news .content form.search.pazi input,
.news .content form.search.pazi button{
    background-color: #0079A3!important;
}
.news .content form.search.pazi button{
    border-left: solid 1px #1c98c3;
}
.news .content .newtit.pazi{
    border: solid 1px #1c98c3;
}
.introduction{
    background-color: #FAFAFA;
    padding: 80px 0px;
}
.introduction.about{
    background-color: #fff;
}
.layout-title{
    width: auto;
    margin: auto;
    text-align: center;
    margin-bottom: 0 !important;
}
.layout-title h2{
    font-size: 36px;
    margin: auto;
    display: inline-block;
    border-bottom: solid 3px {{$colors->organ_color_2 ?? 'blue'}};
    padding-bottom: 10px;
}
.introduction.about .title h4{
    border-bottom: solid 3px {{$colors->organ_color_1 ?? 'blue'}};
}
.introduction .tabs{
    width: 100%;
    margin-top: 40px;

}
.introduction .tabs ul{
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    padding: 0;
    margin: 0;
}
.introduction .tabs ul li{
    margin: 0px 20px;
}
.introduction .tabs ul li.nav-item a{
    border: solid 1px transparent;
}
.introduction .tabs ul li.nav-item a.active{
    background-color: transparent;
    border-radius: 0px;
    border: solid 1px {{$colors->organ_color_2 ?? 'blue'}};
    color: #333;
}
.introduction.about .tabs ul li.nav-item a.active{
    border: solid 1px {{$colors->organ_color_1 ?? 'blue'}};
}
.introduction .tabs .tab-content{
    padding-top: 30px;
}
.introduction .tabs p{
    text-align: justify;
}
.text-center.abo h3{
    text-align: center;
    color: {{$colors->organ_color_1 ?? 'blue'}};
    margin-top: 15px;
    font-size: 22px;
    transition: 0.3s;
}
.text-center.abo p{
    text-align: center;
    color: #A1ACC2;
    transition: 0.3s;
}
.text-center.abo img{
    border-radius: 50%;
    width: 132px;
    height: 132px;
    opacity: 0.8;
    transition: 0.3s;
}
.text-center.abo:hover img{
    opacity: 1;
}
.text-center.abo:hover h3{
    color: {{$colors->organ_color_2 ?? 'blue'}};
}
.text-center.abo:hover p{
    color: #444;
}
.text-center .project{
    border: solid 1px #eee;
    border-radius: 5px;
    padding: 10px;
    transition: 0.3s;
}
.text-center .project h3{
    text-align: center;
    color: {{$colors->organ_color_1 ?? 'blue'}};
    margin-top: 15px;
    font-size: 22px;
    transition: 0.3s;
}
.text-center .project p{
    text-align: center;
    color: #2a2a2a;
    transition: 0.3s;
}
.text-center .project img{
    border-radius: 50%;
    width: 132px;
    height: 132px;
    opacity: 0.8;
    transition: 0.3s;
}
.text-center .project:hover img{
    opacity: 1;
}
.text-center .project:hover{
    background-color: #eee;
}
.text-center .project:hover h3{
    color: {{$colors->organ_color_2 ?? 'blue'}};
}
.text-center .project:hover p{
    color: #444;
}
.introduction.contact{
    background-image: {{ $contact_us->background_path ? 'url(../../welcome/'.$contact_us->background_path.')' : 'url(../../welcome_images/contact-bg.jpg)'}};
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center top;
}
.introduction.contact .title {
    width: 100%;
    float: right;
    text-align: right
}
.introduction.contact .title h4{
    text-align: right
}
.introduction.contact .tabs ul{
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
}
.contactinfo .social ul{
    padding-top: 12px;
}
.introduction.contact button{
    background-color: {{$colors->organ_color_1 ?? 'blue'}};
    border: none;
}
.text-center .catalog{
    z-index: 1;
    background-color: #F7F7F7;
    transition: 0.3s;
}
.text-center .catalog img{
    width: 100%;
}
.text-center .catalog .title{
    z-index: 2;
    position: relative;
    max-height: 70px;
    height: 70px;
    background-color: rgba(0,0,0,0.5);
    width: 100%;
    top: -70px;
    padding-top: 10px;
    transition: 0.3s;
}
.text-center .catalog .title a{
    color: {{$colors->organ_color_1 ?? 'blue'}};
}
.text-center .catalog .title h3{
    color: #fff;
    font-size: 16px;
}
.text-center .catalog p{
    margin-top: -60px;
    padding: 10px 10px 20px 10px;
    color: #999;
    text-align: center;
}
.text-center .catalog:hover{
    background-color: #eee;
}
.text-center .catalog:hover .title{
    background-color: rgba(0,0,0,0.8);
}
.introduction.support{
    background-color: #1C1C1C;
    background-image: url(../../images/support.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center top;
}
.introduction.support h4{
    color: #fff;
}
.introduction.support .tabs ul li.nav-item a{
    color: #fff;
}
.introduction.support form .input-ticket{
    display: flex;
    flex-direction: column;
    font-size: 13px!important;
}
.introduction.support.about .tabs form .input-ticket input{
    background-color: transparent;
    border-radius: 0;
    border-bottom: solid 1px #444!important;
    border: none;
    color: #fff;
    font-size: 12px;
    margin-bottom: 10px;
    width: 80%;
}
.introduction.support.about .tabs form .input-ticket textarea{
    background-color: transparent;
    border-radius: 0;
    border-bottom: solid 1px #444!important;
    border: none;
    color: #fff;
    font-size: 12px;
    margin-bottom: 10px;
    width: 80%;
}
.introduction.support.about .tabs form button.btn.yellow{
    bottom: -110px;
    position: relative;
    background-color: {{$colors->organ_color_1 ?? 'blue'}};
    border-radius: 0px;
    padding: 7px 30px;
    font-size: 13px;
}
.ticket-list ul{
    margin: 0;
    padding: 0;
    display: flex!important;
    flex-direction: column!important;
    width: 100%;
}
.ticket-list ul li{
    list-style: none;
    background-color: #444;
    margin-bottom: 10px!important;
    transition: 0.3s;
    padding: 7px;
    color: #fff;
    width: 100%;
}
.ticket-list ul li i{
    font-size: 26px;
    margin: 5px 5px 5px 20px;
    border-left: solid 1px #666;
    padding-left: 10px;
    color: {{$colors->organ_color_1 ?? 'blue'}};
}
.ticket-list ul li a{
    color: #eee;
    transition: 0.3s;
}
.ticket-list ul li a:hover{
    color: {{$colors->organ_color_1 ?? 'blue'}};
}
.ticket-list ul li:hover{
    background-color: #555;
}
.shop .desc{
    margin: 20px 0px;
    color: #666;
}
.shop .card-body{
    padding: 10px;
    font-weight: 300;
    line-height: 23px;
    text-align: center;
}
.shop .card.h-100 {
    border-radius: 0px;
    box-shadow: 3px 3px 3px #eee;
}
.shop .card.h-100 img{
    border-radius: 0px;
}
.shop .card-footer{
    padding: 10px 10px 0px 10px;
}
.shop .card-footer .blue{
    border-radius: 0px;
    background-color: {{$colors->organ_color_2 ?? 'blue'}};
    font-size: 13px;
    float: right;
    margin-left: 20px;
    margin-bottom: 0
}
.shop .card-footer p{
    color: #F7941D;
    text-align: left;
    float: left
}
.shop .title h4{
    font-size: 30px;
}
.btnshop{
    margin-top: 100px;
    width: 100%;
    text-align: center;
    display: block;
}
.btnshop a{
    border-radius: 3px;
    background-color: {{$colors->organ_color_1 ?? 'blue'}};
    padding: 10px 40px;
    font-size: 16px;
    color: #444;
    transition: 0.3s;
    width: 100%;
    display: block;
}
.btnshop a:hover{
    background-color: {{$colors->organ_color_2 ?? 'blue'}};
    color: #fff;
}
.footer-wrapper{
    background-color: {{$colors->layout_background ?? 'black'}}!important;
    padding-top: 50px;
    float: right;
    width: 100%;
}
.copyright .royan{
    text-align: left;
}
.footer{
    width: 100%;
    float: right;
    padding-bottom: 30px;
}
.footer h3{
    font-size: 18px;
    margin-bottom: 15px;
    color: #FAFAFA;
}
.footer p{
    color: #ccc;
    font-weight: 300;
    line-height: 23px;
    text-align: justify;
}
.footer ul{
    margin: 0;
    padding: 0
}
.footer ul li{
    list-style: none;
    font-weight: 300;
    font-size: 12px;
}
.footer ul li a:before{
    content:"\f104";
    font-family:'FontAwesome';
    color: #fff;
    padding-left: 10px;
}
.footer ul li a{
    color: #ccc;
    padding: 3px 7px;
    transition: 0.3s;
}
.footer ul li a:hover{
    background-color: #3B4F63;
    border-radius: 3px;
    color: #fff;
}
.copyright{
    border-top: solid 1px #3A4B5D;
    font-size: 12px;
    color: #8E969F;
    padding-top: 10px;
    width: 100%;
    float: right
}
.cnfix{
    transition: 0.3s;
    position: fixed;
    top: 25%;
    background-color: {{$colors->organ_color_1 ?? 'blue'}};
    text-align: center;
    padding: 4px 10px;
    border-radius: 5px 0px 0px 5px;
    z-index: 9999;
}
.cnfix i{
    margin-left: 5px;
}
.cnfix a{
    color: #fff;
}
.cnfix:hover{
    background-color: {{$colors->organ_color_2 ?? 'blue'}};
}
.sticky{
    font-size: 10px;
    padding: 0
}
.sticky img{
    width: 50px;
    height: 54px;
}
.sticky h1,
.sticky h2{
    display: none
}

.category a {
    display: block;
    position: relative;
    text-align: center;
}

.category a p{
    color: {{$colors->organ_color_2 ?? 'blue'}};
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    line-height: 3em;
    display: none;
    transition: 0.6s;
}
.category a p span:first-of-type {
    text-shadow: 2px 2px 6px black;
    font-family: Mj_DinarOneMedium!important;
    font-weight: bold;
}
.category a p span:last-of-type {
    color: black;
}

.category img {
    transition: 0.6s;
}

.category a:hover img {
    opacity: 0.3;
    transform: scale(1.1);
}
.category a:hover p {
    display: block;
}

.bg-first{
    background-color: {{$colors->organ_color_1 ?? 'black'}};
}
.bg-second{
    background-color: {{$colors->organ_color_2 ?? 'black'}};
}
</style>
