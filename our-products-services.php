<?php require_once('common/config/config.inc.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Development Company | Software Engineering Firm</title>
    <meta name="description"
        content="Are you looking for the best software development company near me? We are an award winning Digital Consulting & Product Engineering Firm offering end-to-end software development solutions." />
    <meta name="keywords"
        content="offshore, consulting, software, development, outsourcing, outsource, custom, bespoke, developers, company, services, Website, web, Application, programming, it services" />
    <link rel="shortcut icon" href="images/small-favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <?php if( !isMobile() ) : ?>
    <link rel="preload stylesheet" href="css/owl.carousel.min.css" as="style" defer>
    <?php endif; ?>
    <link rel="preload stylesheet" href="css/all.css?<?php echo time(); ?>" as="style" defer>
    <link rel="preload stylesheet" href="css/style.css?<?php echo time(); ?>" as="style" defer>
    <?php if( !isMobile() ) : ?>

    <?php endif; ?>

    <?php if( isMobile() ) : ?>
    <link rel="stylesheet" type="text/css" href="css/glider.min.css" />
    <?php endif; ?>
</head>

<body class="homepge productpge <?php echo ( isMobile() ) ? ' mobile-tpl' : ' desktop-tpl'; ?>">

    <header class="header header-bg">
        <div class="container">
            <div class="heder-inner">
                <div class="logo">
                    <a href="https://www.vinove.com">
                    our-products-services

                    </a>
                </div>
                <div class="push-left">
                    <button id="menu-toggler" data-class="menu-active" class="hamburger">
                        <span class="hamburger-line hamburger-line-top"></span>
                        <span class="hamburger-line hamburger-line-middle"></span>
                        <span class="hamburger-line hamburger-line-bottom"></span>
                    </button>
                    <div class="nav">
                        <nav>
                            <ul id="primary-menu" class="menu nav-menu">
                                <!-- <li class="menu-item current-menu-item"><a href="/betasite/">Home</a></li> -->
                                <li class="menu-item"><a href="#">Home</a></li>
                                <li class="menu-item"><a href="/about-us">About Us</a></li>
                                <li class="menu-item"><a href="/our-products-services">Our Products</a></li>
                                <li class="menu-item"><a href="/careers">Careers</a></li>
                                <li class="menu-item"><a href="/mindscape/">Blog</a></li>
                                <li class="menu-item"><a href="/contact-us">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fullpage">
        <!-- hero-slider-section -->
        <section class="section hero-slider-section">
            <div class="hero-slider-outer">
                <div class="banner-content">
                    <div class="container">
                        <h1>Modern Business Problems <br />with Advanced Business Solutions</h1>
                        <?php if(!isMobile()) { ?>
                        <div class="award-slider-section  in-desktop">
                            <h4>Awards and partnership</h4>
                            <div class="award-slider product-award-slider owl-carousel owl-theme">

                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/iso-logo.webp">
                                        <source type="image/png" srcset="images/iso-logo.png">
                                        <img width="71" height="58" src="images/iso-logo.png" alt="logo">
                                    </picture>
                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/red-herring-logo.webp">
                                        <source type="image/png" srcset="images/red-herring-logo.png">
                                        <img width="79" height="75" src="images/red-herring-logo.png" alt="logo">
                                    </picture>
                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/workplace-logo.webp">
                                        <source type="image/png" srcset="images/workplace-logo.png">
                                        <img width="120" height="92" src="images/workplace-logo.png" alt="logo">
                                    </picture>

                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/ind-eretail-logo-logo.webp">
                                        <source type="image/png" srcset="images/ind-eretail-logo-logo.png">
                                        <img width="122" height="81" src="images/ind-eretail-logo-logo.png" alt="logo">
                                    </picture>
                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/mongo-bd-logo.webp">
                                        <source type="image/png" srcset="images/mongo-bd-logo.png">
                                        <img width="195" height="53" src="images/mongo-bd-logo.png" alt="logo">
                                    </picture>
                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/google-cloud-logo.webp">
                                        <source type="image/png" srcset="images/google-cloud-logo.png">
                                        <img width="185" height="31" src="images/google-cloud-logo.png" alt="logo">
                                    </picture>
                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/amazon-logo.webp">
                                        <source type="image/png" srcset="images/amazon-logo.png">
                                        <img width="151" height="56" src="images/amazon-logo.png" alt="logo">
                                    </picture>
                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/docker-logo.webp">
                                        <source type="image/png" srcset="images/docker-logo.png">
                                        <img width="75" height="64" src="images/docker-logo.png" alt="logo">
                                    </picture>
                                </div>

                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/iso-logo.webp">
                                        <source type="image/png" srcset="images/iso-logo.png">
                                        <img width="71" height="58" src="images/iso-logo.png" alt="logo">
                                    </picture>
                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/red-herring-logo.webp">
                                        <source type="image/png" srcset="images/red-herring-logo.png">
                                        <img width="79" height="75" src="images/red-herring-logo.png" alt="logo">
                                    </picture>
                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/workplace-logo.webp">
                                        <source type="image/png" srcset="images/workplace-logo.png">
                                        <img width="120" height="92" src="images/workplace-logo.png" alt="logo">
                                    </picture>

                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/ind-eretail-logo-logo.webp">
                                        <source type="image/png" srcset="images/ind-eretail-logo-logo.png">
                                        <img width="122" height="81" src="images/ind-eretail-logo-logo.png" alt="logo">
                                    </picture>
                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/mongo-bd-logo.webp">
                                        <source type="image/png" srcset="images/mongo-bd-logo.png">
                                        <img width="195" height="53" src="images/mongo-bd-logo.png" alt="logo">
                                    </picture>
                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/google-cloud-logo.webp">
                                        <source type="image/png" srcset="images/google-cloud-logo.png">
                                        <img width="185" height="31" src="images/google-cloud-logo.png" alt="logo">
                                    </picture>
                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/amazon-logo.webp">
                                        <source type="image/png" srcset="images/amazon-logo.png">
                                        <img width="151" height="56" src="images/amazon-logo.png" alt="logo">
                                    </picture>
                                </div>
                                <div>
                                    <picture>
                                        <source type="image/webp" srcset="images/docker-logo.webp">
                                        <source type="image/png" srcset="images/docker-logo.png">
                                        <img width="75" height="64" src="images/docker-logo.png" alt="logo">
                                    </picture>
                                </div>



                            </div>
                        </div>
                        <?php } ?>
                        <div class="follow-us">
                            <span class="follow-txt">Follow <span class="line"></span></span>
                            <span class="follow-link">
                                <a href="https://www.instagram.com/vinove_softwares"><i
                                        class="fab fa-instagram"></i></a>
                                <a href="https://www.facebook.com/Vinove"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/vinove"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/company/vinove/"><i class="fab fa-linkedin-in"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <?php if( !isMobile() ) : ?>
                <div class="hero-slider product-slider owl-carousel owl-theme">
                    <div>
                        <picture>
                            <source type="image/webp" srcset="images/banner-slider-1.webp">
                            <source type="image/png" srcset="images/banner-slider-1.png">
                            <img width="1857" height="1080" src="images/banner-slider-1.png" alt="Banner 1">
                        </picture>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- valuecoders-section -->
        <section class="section about-us-section padding-tb-100">
            <div class="container">
                <div class="flexbox">
                    <div class="img-box">
                        <picture>
                            <source type="image/webp" srcset="images/product-img.webp">
                            <source type="image/png" srcset="images/product-img.png">
                            <img loading="lazy" width="720" height="712" src="images/product-img.png" alt="About Image">
                        </picture>
                    </div>
                    <div class="right-box">
                        <div class="head">
                            <h2>ValueCoders</h2>
                        </div>
                        <div class="inner-content">
                            <p>ValueCoders is an award-winning Indian software engineering company with expertise in
                                outsourcing software development and engineering teams.</p>
                            <p>ValueCoders has been delivering expert IT outsourcing services worldwide. You get
                                business domain knowledge, proven methodologies and technology expertise of 650+ skilled
                                software professionals combined to yield high-quality solutions that add value to your
                                business.</p>
                        </div>

                        <div class="list-item">
                            <ul>
                                <li>13,800+ Successful Projects</li>
                                <li>97% Customer retention rate</li>
                                <li>ISO 9001:2008 Certified Company</li>
                                <li>500+ Full-time Experienced Employees</li>
                            </ul>
                        </div>

                        <div class="button-box">
                            <a href="https://www.valuecoders.com/" target="_blank" class="default-btn">View More <i class="fal fa-angle-right angle-icon"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <!-- Workstatus-section -->
        <section class="section about-us-section order-mob padding-tb-100">
            <div class="container">
                <div class="flexbox">
                    <div class="img-box">
                        <div class="head">
                            <h2>Workstatus</h2>
                        </div>
                        <div class="inner-content">
                            <p>WorkStatus is an employee monitoring and productivity tracking software curated for
                                entreprises, SMBs, and Freelancers. It offers customizable solutions to more than 15
                                industries and business types. It lets you track in-house, on-field, and remote
                                workforce. The employee productivity monitoring software aids in enhancing employee
                                productivity and business output.</p>
                            <p>It aims to automate monitoring and management activities for both employers and employees
                                for better productivity.</p>
                        </div>

                        <div class="list-item list-item-3">
                            <ul>
                                <li>Geofencing</li>
                                <li>GPS tracking</li>
                                <li>Online timesheets</li>
                                <li>GPS tracking</li>
                                <li>Project budgeting</li>
                                <li>Employee scheduling</li>
                            </ul>
                        </div>

                        <div class="button-box">
                            <a href="https://www.workstatus.io/" target="_blank" class="default-btn">View More <i class="fal fa-angle-right angle-icon"></i></a>
                        </div>
                    </div>
                    <div class="right-box">
                        <picture>
                            <source type="image/webp" srcset="images/workstatus-img.webp">
                            <source type="image/png" srcset="images/workstatus-img.png">
                            <img loading="lazy" width="720" height="712" src="images/workstatus-img.png"
                                alt="About Image">
                        </picture>


                    </div>
                </div>
            </div>
        </section>


        <!-- pixelcrayons-section -->
        <section class="section about-us-section padding-tb-100">
            <div class="container">
                <div class="flexbox">
                    <div class="img-box">
                        <picture>
                            <source type="image/webp" srcset="images/pixelcrayons-img.webp">
                            <source type="image/png" srcset="images/pixelcrayons-img.png">
                            <img loading="lazy" width="720" height="712" src="images/pixelcrayons-img.png"
                                alt="About Image">
                        </picture>

                    </div>
                    <div class="right-box">
                        <div class="head">
                            <h2>Pixelcrayons</h2>
                        </div>
                        <div class="inner-content">
                            <p>We are a digital Consulting & Engineering Firm offering end-to-end software solutions to
                                enterprises, ISVs, Digital Agencies, and Startups.</p>
                            <p>Since 2004, we have catered our services to 6800+ customers across 38+ countries. Our
                                clients highly recommend us for our agile/DevOps development process, SLA-driven
                                approach, and on-time project delivery.</p>
                        </div>

                        <div class="list-item">
                            <ul>
                                <li>Pre-Vetted Developers</li>
                                <li>Ongoing Internal L&D Programs</li>
                                <li>On-time Delivery</li>
                                <li>Flexible Engagement Options</li>
                            </ul>
                        </div>

                        <div class="button-box">
                            <a href="https://www.pixelcrayons.com/" target="_blank" class="default-btn">View More <i class="fal fa-angle-right angle-icon"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <!-- Invoicera-section -->
        <section class="section about-us-section order-mob padding-tb-100">
            <div class="container">
                <div class="flexbox">
                    <div class="img-box">
                        <div class="head">
                            <h2>Invoicera</h2>
                        </div>
                        <div class="inner-content">
                            <p>Invoicera is an online invoicing software that enables freelancers, SMEs and
                                entrepreneurs to streamline their workflow and cash flow simultaneously. It aims to
                                unify business processes from the beginning of task scheduling or estimate management.
                                You save time, money and efforts by automating invoice scheduling, payment reminders,
                                expense management, staff management, approval processes and reporting. </p>
                            <p>It aims to automate monitoring and management activities for both employers and employees
                                for better productivity.</p>
                        </div>

                        <div class="list-item">
                            <ul>
                                <li>Automated recurring billing</li>
                                <li>Project and client management</li>
                                <li>Online invoice approval process</li>
                                <li>15+ International payment gateways</li>

                            </ul>
                        </div>

                        <div class="button-box">
                            <a href="https://www.invoicera.com/" target="_blank" class="default-btn">View More <i class="fal fa-angle-right angle-icon"></i></a>
                        </div>
                    </div>
                    <div class="right-box">
                        <picture>
                            <source type="image/webp" srcset="images/invoicera-img.webp">
                            <source type="image/png" srcset="images/invoicera-img.png">
                            <img loading="lazy" width="720" height="712" src="images/invoicera-img.png"
                                alt="About Image">
                        </picture>

                    </div>
                </div>
            </div>
        </section>



        <!-- client-section -->
        <section class="section client-section padding-tb-100">
            <div class="container">
                <div class="head text-center">
                    <h3>OUR AWARDS</h3>
                    <h2>Awards and Partnership</h2>
                </div>
                <div class="client-icon-box">
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo1.webp">
                            <source type="image/png" srcset="images/product-client-logo1.png">
                            <img loading="lazy" width="172" height="95" src="images/product-client-logo1.png"
                                alt="Client Logo">
                        </picture>
                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo2.webp">
                            <source type="image/png" srcset="images/product-client-logo2.png">
                            <img loading="lazy" width="172" height="32" src="images/product-client-logo2.png"
                                alt="Client Logo">
                        </picture>

                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo3.webp">
                            <source type="image/png" srcset="images/product-client-logo3.png">
                            <img loading="lazy" width="92" height="130" src="images/product-client-logo3.png"
                                alt="Client Logo">
                        </picture>
                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo4.webp">
                            <source type="image/png" srcset="images/product-client-logo4.png">
                            <img loading="lazy" width="224" height="34" src="images/product-client-logo4.png"
                                alt="Client Logo">
                        </picture>
                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo5.webp">
                            <source type="image/png" srcset="images/product-client-logo5.png">
                            <img loading="lazy" width="87" height="70" src="images/product-client-logo5.png"
                                alt="Client Logo">
                        </picture>
                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo6.webp">
                            <source type="image/png" srcset="images/product-client-logo6.png">
                            <img loading="lazy" width="151" height="60" src="images/product-client-logo6.png"
                                alt="Client Logo">
                        </picture>

                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo7.webp">
                            <source type="image/png" srcset="images/product-client-logo7.png">
                            <img loading="lazy" width="92" height="93" src="images/product-client-logo7.png"
                                alt="Client Logo">
                        </picture>

                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo8.webp">
                            <source type="image/png" srcset="images/product-client-logo8.png">
                            <img loading="lazy" width="123" height="88" src="images/product-client-logo8.png"
                                alt="Client Logo">
                        </picture>

                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo9.webp">
                            <source type="image/png" srcset="images/product-client-logo9.png">
                            <img loading="lazy" width="195" height="53" src="images/product-client-logo9.png"
                                alt="Client Logo">
                        </picture>

                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo10.webp">
                            <source type="image/png" srcset="images/product-client-logo10.png">
                            <img loading="lazy" width="185" height="31" src="images/product-client-logo10.png"
                                alt="Client Logo">
                        </picture>

                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo11.webp">
                            <source type="image/png" srcset="images/product-client-logo11.png">
                            <img loading="lazy" width="150" height="56" src="images/product-client-logo11.png"
                                alt="Client Logo">
                        </picture>
                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo12.webp">
                            <source type="image/png" srcset="images/product-client-logo12.png">
                            <img loading="lazy" width="114" height="114" src="images/product-client-logo12.png"
                                alt="Client Logo">
                        </picture>
                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo13.webp">
                            <source type="image/png" srcset="images/product-client-logo13.png">
                            <img loading="lazy" width="91" height="78" src="images/product-client-logo13.png"
                                alt="Client Logo">
                        </picture>
                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo14.webp">
                            <source type="image/png" srcset="images/product-client-logo14.png">
                            <img loading="lazy" width="71" height="122" src="images/product-client-logo14.png"
                                alt="Client Logo">
                        </picture>
                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo15.webp">
                            <source type="image/png" srcset="images/product-client-logo15.png">
                            <img loading="lazy" width="152" height="61" src="images/product-client-logo15.png"
                                alt="Client Logo">
                        </picture>
                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo16.webp">
                            <source type="image/png" srcset="images/product-client-logo16.png">
                            <img loading="lazy" width="107" height="46" src="images/product-client-logo16.png"
                                alt="Client Logo">
                        </picture>
                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo17.webp">
                            <source type="image/png" srcset="images/product-client-logo17.png">
                            <img loading="lazy" width="159" height="46" src="images/product-client-logo17.png"
                                alt="Client Logo">
                        </picture>
                    </div>
                    <div class="client-logo">
                        <picture>
                            <source type="image/webp" srcset="images/product-client-logo18.webp">
                            <source type="image/png" srcset="images/product-client-logo18.png">
                            <img loading="lazy" width="195" height="54" src="images/product-client-logo18.png"
                                alt="Client Logo">
                        </picture>
                    </div>
                </div>
            </div>
        </section>

        <footer class="section fp-auto-height footer">
        <div class="container">
            <div class="footer-inner">
                <div class="left-footer">
                    <p>Copyright © <?php echo date("Y"); ?> Vinove. All rights reserved.</p>
                    <span class="follow-link">
                        <a href="https://www.instagram.com/vinove_softwares"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.facebook.com/Vinove"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/vinove"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/company/vinove/"><i class="fab fa-linkedin-in"></i></a>
                    </span>
                </div>
            </div>
            
        </div>
    </footer>

    </div>
    <?php if( !isMobile() ) : ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/script.js?<?php echo time(); ?>"></script>
    <?php endif; ?>

    <?php if( isMobile() ) : ?>
    <script src="js/glider.min.js"></script>
    <script>
    window.addEventListener('load', function() {
        document.querySelector('.glider').addEventListener('glider-slide-visible', function(event) {
            var glider = Glider(this);
            //console.log('Slide Visible %s', event.detail.slide)
        });
        document.querySelector('.glider').addEventListener('glider-slide-hidden', function(event) {
            //console.log('Slide Hidden %s', event.detail.slide)
        });
        document.querySelector('.glider').addEventListener('glider-refresh', function(event) {
            //console.log('Refresh')
        });
        document.querySelector('.glider').addEventListener('glider-loaded', function(event) {
            //console.log('Loaded')
        });

        window._ = new Glider(document.querySelector('.glider'), {
            slidesToShow: 2,
            slidesToScroll: 2,
            rewind: true,
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    });
    document.getElementById('menu-toggler').onclick = function() {
        if (document.querySelector("body").classList.contains("menu-active")) {
            document.querySelector("body").classList.remove("menu-active");
        } else {
            document.querySelector("body").classList.add("menu-active");
        }
    }
    </script>
    <?php endif; ?>
</body>

</html>