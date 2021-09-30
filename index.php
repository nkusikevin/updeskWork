<?php

header("X-Frame-Options: SAMEORIGIN");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("Access-Control-Allow-Methods: POST, GET");
//header("Content-Type: text/html;"); // for displaying symbols in drop down menu options

header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");

header("Cache-Control: max-age=31536000");
header("Referrer-Policy: no-referrer-when-downgrade");

// header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.19/jquery.scrollify.min.js https://cdn.jsdelivr.net https://*.tawk.to www.googletagmanager.com https://www.google-analytics.com/analytics.js; img-src 'self' https://cdn.jsdelivr.net/ https://www.googletagmanager.com https://*.tawk.to https://www.google-analytics.com; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://fonts.googleapis.com https://*.tawk.to; connect-src 'self' https://*.tawk.to wss://*.tawk.to; frame-src 'self' https://va.tawk.to; font-src 'self' data: https://static-v.tawk.to https://fonts.gstatic.com https://fonts.googleapis.com https://fonts.googleapis.com ");

// add security headers
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 1);


/*
 * contact form
 */
require("../send-email.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['message'])){

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // fields in contact form
        processContactForm($name, $phone, $email, $message);
    }

    if(isset($_POST['buildNowForm'])){
      
      if(isset($_POST['name'])){
         $name = $_POST['name'];
      } else {
         $name = "";
      }

      if(isset($_POST['company'])){
         $company = $_POST['company'];
      } else {
         $company = "";
      }

      if(isset($_POST['phone'])){
         $phone = $_POST['phone'];
      } else {
         $phone = "";
      }

      if(isset($_POST['email'])){
         $email = $_POST['email'];
      } else {
         $email = "";
      }

      if(isset($_POST['state'])){
         $state = $_POST['state'];
      } else {
         $state = "";
      }

      if(isset($_POST['country'])){
         $country = $_POST['country'];
      } else {
         $country = "";
      }
       
      if(isset($_POST['industry'])){
         $industry = $_POST['industry'];
      } else {
         $industry = "";
      }

      if(isset($_POST['processes'])){
         $processes = $_POST['processes'];
      } else {
         $processes = ""; 
      }

      if(isset($_POST['etherNet'])){
         $etherNet = $_POST['etherNet'];
      } else {
         $etherNet = "";
      }
      
      if(isset($_POST['modbusRTU'])){
         $modbusRTU = $_POST['modbusRTU'];
      } else {
         $modbusRTU = ""; 
      }

      if(isset($_POST['modbusTC'])){
         $modbusTC = $_POST['modbusTC'];
      } else {
         $modbusTC = "";
      }
      
      if(isset($_POST['profinet'])){
         $profinet = $_POST['profinet'];
      } else {
         $profinet = "";
      }
      
      if(isset($_POST['profibus'])){
         $profibus = $_POST['profibus'];
      } else {
         $profibus = "";
      }
     
      $emailBody = $name . "<br/>\n" . $company . "<br/>\n" . $phone . "<br/>\n" . $email . "<br/>\n" . $state . "<br/>\n" . $country . "<br/>\n<br/>\n<br/>\n";
      $emailBody = $emailBody . $industry . "<br/>\n" . $processes . "<br/>\n";
      $emailBody = $emailBody . "EtherNet: " . $etherNet . "<br/>\n";
      $emailBody = $emailBody . "Modbus RTU: " . $modbusRTU . "<br/>\n";
      $emailBody = $emailBody . "Modbus TCP: " . $modbusTC . "<br/>\n";
      $emailBody = $emailBody . "Profinet: " . $profinet . "<br/>\n";
      $emailBody = $emailBody . "Profibus: " . $profibus . "<br/>\n";      
      
      $success = sendEmail("Gibbs Energy Build Now Form", $emailBody, $email);
    }
}

require_once '../vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';
$detect = new Mobile_Detect;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" >
   <head>
      <title>Gibbs Energy</title>

      <meta charset="utf-8">
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="google-site-verification" content="ZUw7p7aJFxQCanDHk-NnNrCRNL280WpR9EMsldayMjk" />
      <meta name="description" content="Gibbs Energy delivers climate change solutions from an economically-centric approach to reduce energy consumption and green house gas emissions.">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

      <meta property="og:image" content="" />
      <meta property="og:title" content="Gibbs Energy" />
      <meta property="og:url" content="https://energygivvs.com/industries" />
      <meta property="og:locale" content="en_US" />
      <meta property="og:site_name" content="Gibbs Energy" />
      <meta property="og:type" content="website" />
      <meta name="twitter:site" content="@gibbsenergy" />
      <meta name="twitter:card" content="summary_large_image" />
      <link rel="stylesheet" media="all" href="/src/gibbs/css/product.css"/>
      <link rel="stylesheet" media="all" href="/src/gibbs/css/gibbs.css"/>
   </head>
   <body class="page-hub-max template-product-page page_has--scroll_locking page_has--first_screen-in_viewport page_has--parallax scroll_locking--enabled tds-menu-header-transparent--light tcl-parallax-effect--off site-body animate-onscroll i18n-en_us" id="page-hub-max">
      <div class="dialog-off-canvas-main-canvas" data-off-canvas-main-canvas>
         <?php require ('./menu.php'); ?>
         <main class="site-content site-content-legacy">
            <div id="main" class="layout-main clearfix">
               <main id="content" class="column main-content" role="main">
                  <section class="section">
                     <a id="main-content" tabindex="-1"></a>
                     <div data-drupal-messages-fallback class="hidden"></div>
                     <div class="block block-system block-system-main-block">
                        <div class="layout layout--onecol">
                           <div  class="layout__region layout__region--content">
                              <div class="block-region-content">
                                 <div class="block block-ctools block-entity-viewnode">
                                    <section class="layout__region layout-builder--layout__region showcase-screen feature" id="gibbs" data-gtm-event="element-scroll" data-gtm-drawer="gibbs" data-color-theme="dark"  data-drawer-static-nav-color="default" data-title="Gibbs">
                                       <div class="block block-gibbs-blocks block-inline-blockhero-showcase">
                                          <section data-gtm-key="gibbs-hero-showcase-95" class="animate-onscroll hero hero--with-banner hero--with-callouts" id="gibbs-hero-showcase-95" style="--media-height: 100vh;">
                                             <div class="banner banner--bottom tds-scrim--white">
                                                <div class="banner-image">
                                                   <div class="hero-regions--wrapper">
                                                      <div class="hero-regions">
                                                         <div id="cover-img" class="industries-img hero-region--center hero-region--with-callouts">
                                                            <div class="hero-region--center-top">
                                                            </div>
                                                            <div class="hero-region--center-bottom">
                                                               <div class="hero-callouts hero-callouts--medium hero-callouts--white">
                                                                  <div class="callout--divider-line"></div>
                                                                 
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="banner-content tds-content_container">
                                                   <div class="tds-flex">
                                                      <div class="tds-flex-item tds-flex--col_1of3">
                                                         <!-- <header> -->
                                                            <!-- <h2 class="banner-header s2"
                                                               style="--cmp-banner-item: 0;">Utility</h2> -->
                                                            <!-- <h1 class="banner-subheader s2-head tds-text--h4" style="--cmp-banner-item: 0;">Reduce Energy. Lower Costs. Go Green.</h1> -->
                                                            <h1 class="banner-subheader s2-head tds-text--h4" style="--cmp-banner-item: 0;">Reduce Energy.</h1>
                                                            <h1 class="banner-subheader s2-head tds-text--h4" style="--cmp-banner-item: 0;">Lower Costs.</h1>
                                                            <h1 class="banner-subheader s2-head tds-text--h4" style="--cmp-banner-item: 0;">Go Green.</h1>
                                                            <!-- <h1 class="banner-subheader s2-head tds-text--h2" style="--cmp-banner-item: 0;">Lower Costs</h1>
                                                            <h1 class="banner-subheader s2-head tds-text--h2" style="--cmp-banner-item: 0;">Go Green</h1> -->
                                                         <!-- </header> -->
                                                      </div>
                                                      <div class="tds-flex-item">
                                                         <h1 class="banner-subheader s2-head tds-text--h5" style="--cmp-banner-item: 0;">Delivering climate change solutions through an economically-centric approach.</h1>
                                                         <!-- <p class="banner-copy tds-text--normal tds-text--body banner-copy--desktop"
                                                            style="--cmp-banner-item: 0;">Delivering climate change solutions through an economically-centric approach.
                                                         </p>
                                                         <p class="banner-copy tds-text--normal tds-text--body banner-copy--mobile"
                                                            style="--cmp-banner-item: 0;">Delivering climate change solutions through an economically-centric approach.
                                                         </p> -->
                                                         <div class="banner-component"
                                                            style="--cmp-banner-item: 1;">
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </section>
                                       </div>
                                    </section>
                                    <section class="layout__region layout-builder--layout__region showcase-screen feature" id="services" data-gtm-event="element-scroll" data-gtm-drawer="services" data-color-theme="light"  data-drawer-static-nav-color="default" data-title="Services">
                                       <div class="block block-gibbs-blocks block-inline-blockhero-annotations-showcase">
                                          <section  data-gtm-key="gibbs-hero-annot-18" class="animate-onscroll hero hero-annotations hero--with-banner hero-annotations--services" id="gibbs-hero-annot-18" style="--media-height: 100vh;">
                                             <div class="banner banner--left tds-scrim--white">
                                                <div class="banner-image">
                                                   <div class="asset-wrapper hero-picture">
                                                        <div class="vfds-img industries-img"></div>
                                                   </div>
                                                </div>
                                                <div class="banner-content tds-content_container">
                                                   <div class="tds-flex">
                                                        <div class="tds-flex-item tds-flex--col_1of3">
                                                            <header>
                                                                <h1 class="banner-subheader s2-head tds-text--h2"
                                                               style="--cmp-banner-item: 0;">VFDs fileZila testing</h1>
                                                            </header>
                                                            <div
                                                            class="banner-buttons banner-buttons--preferred"
                                                            style="--cmp-banner-item: 2;">
                                                            </div>
                                                        </div>
                                                        <div class="tds-flex-item">
                                                            <p class="banner-copy tds-text--normal tds-text--body banner-copy--desktop " style="--cmp-banner-item: 0;">
                                                                Inputs
                                                                <ul class="">
                                                                    <li> VFD Speed (Hz) </li>
                                                                    <li> VFD Torque </li>
                                                                    <li> T type thermocouple </li>
                                                                </ul>
                                                            </p>
                                                            <p class="banner-copy tds-text--normal tds-text--body banner-copy--desktop " style="--cmp-banner-item: 0;">Outputs
                                                                <ul class="">
                                                                    <li> Maximize Paint Yield in mixing tanks </li>
                                                                </ul>
                                                            </p>
                                                            <p class="banner-copy tds-text--normal tds-text--body banner-copy--desktop" style="--cmp-banner-item: 0;">Drives provide troves of data in assembly line, motor, and pump applications and are often the device where parameter tuning can have the greatest impact on a process.
                                                            </p>
                                                            <p class="banner-copy tds-text--normal tds-text--body banner-copy--desktop" style="--cmp-banner-item: 0;">The gibbs Industrial Performance and Optimization System’s (IPOS) patent-pending technology provides you the exact parameter values to set to meet your objective. See which parameters are most influential in your process through gibbs Heatmaps. 
                                                            </p>
                                                            <p class="banner-copy tds-text--normal tds-text--body banner-copy--desktop" style="--cmp-banner-item: 0;">Beautifully visualize with gibbs Insights, allowing you to observe precise VFD metrics — like bus voltage, current, and frequency — alongside other IO captured from endpoint devices. By inspecting millisecond-resolution data, gibbs gives you the tools necessary to optimize your process.
                                                            </p>

                                                            <p class="banner-copy tds-text--normal tds-text--body banner-copy--mobile" style="--cmp-banner-item: 0;">Drives provide troves of data in assembly line, motor, and pump applications and are often the device where parameter tuning can have the greatest impact on a process.   
                                                            </p>
                                                            <p class="banner-copy tds-text--normal tds-text--body banner-copy--mobile" style="--cmp-banner-item: 0;">The gibbs Industrial Performance and Optimization System’s (IPOS) patent-pending technology provides you the exact parameter values to set to meet your objective. See which parameters are most influential in your process through gibbs Heatmaps. 
                                                            </p>
                                                            <p class="banner-copy tds-text--normal tds-text--body banner-copy--mobile" style="--cmp-banner-item: 0;">Beautifully visualize with gibbs Insights, allowing you to observe precise VFD metrics — like bus voltage, current, and frequency — alongside other IO captured from endpoint devices. By inspecting millisecond-resolution data, gibbs gives you the tools necessary to optimize your process.
                                                            </p>
                                                            <div class="banner-component"
                                                                style="--cmp-banner-item: 1;">
                                                            </div>
                                                            <div
                                                                class="banner-buttons "
                                                                style="--cmp-banner-item: 2;">
                                                            </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </section>
                                       </div>
                                    </section>
                                    <section class="layout__region layout-builder--layout__region showcase-screen feature" id="applications" data-gtm-event="element-scroll" data-gtm-drawer="applications" data-color-theme="dark"  data-drawer-static-nav-color="default" data-title="Applications">
                                       <div class="block block-layout-builder block-inline-blockhero-showcase">
                                          <section  data-gtm-key="gibbs-hero-showcase-109" class="animate-onscroll hero hero--with-banner hero--with-callouts hero-annotations--applications" id="gibbs-hero-showcase-109" style="--media-height: 100vh;">
                                             <div class="banner banner--right tds-scrim--white">
                                                <div class="banner-image">
                                                   <div class="asset-wrapper hero-picture">
                                                        <div id="io-img" class="industries-img"></div>
                                                   </div>
                                                </div>
                                                <div>
                                                    <div class="hero-regions--wrapper">
                                                      <div class="hero-regions">
                                                         <div class="hero-region--center hero-region--with-callouts">
                                                            <div class="hero-region--center-top">
                                                            </div>
                                                            <div class="hero-region--center-bottom">
                                                               <div class="hero-callouts hero-callouts--medium hero-callouts--white">
                                                                  <div
                                                                     class="callout  callout--left callout--divider"
                                                                     data-should-open=""
                                                                     style="--cmp-callout-item: 0; --callout-width: 33%;">
                                                                     <div class="callout-container">
                                                                     </div>
                                                                  </div>
                                                                  <div class="callout--divider-line"></div>
                                                                  <div
                                                                     class="callout  callout--left callout--divider"
                                                                     data-should-open=""
                                                                     style="--cmp-callout-item: 1; --callout-width: 33%;">
                                                                     <div class="callout-container">
                                                                     </div>
                                                                  </div>
                                                                  <div class="callout--divider-line"></div>
                                                                  <div
                                                                     class="callout  callout--left "
                                                                     data-should-open=""
                                                                     style="--cmp-callout-item: 2; --callout-width: 33%;">
                                                                     <div class="callout-container">
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="banner-content tds-content_container">
                                                   <div class="tds-flex">
                                                      <div class="tds-flex-item tds-flex--col_1of3">
                                                         <!-- <header> -->
                                                            <h1 class="banner-subheader s2-head tds-text--h2" style="--cmp-banner-item: 0;">IO</h1>
                                                         <!-- </header> -->
                                                         <div
                                                            class="banner-buttons banner-buttons--preferred"
                                                            style="--cmp-banner-item: 2;">
                                                         </div>
                                                      </div>


                                                      <div class="tds-flex-item">
                                                        <p class="banner-copy tds-text--normal tds-text--body banner-copy--desktop " style="--cmp-banner-item: 0;">
                                                            Inputs
                                                            <ul class="">
                                                                <li> Thermocouple J Type </li>
                                                                <li> PLC Tag – Humidity Calculation </li>
                                                                <li> PLC Tag - Flow Meter </li>
                                                            </ul>
                                                        </p>
                                                        <p class="banner-copy tds-text--normal tds-text--body banner-copy--desktop " style="--cmp-banner-item: 0;">Outputs
                                                            <ul class="">
                                                                <li> Minimize impurity of chemicals produced. </li>
                                                            </ul>
                                                        </p>
                                                        <p class="banner-copy tds-text--normal tds-text--body banner-copy--desktop" style="--cmp-banner-item: 0;">
                                                            Terminus intakes all data captured from either HubMax or HubMini to execute artificial intelligence algorithms to learn your process. Knowing no two processes are the same, Terminus selects the best algorithm to use based off your data in realtime.  This learned model is then fed into our optimization software to solve for your tuned input parameters to meet your selected objective. A state-of-the-art algorithm pipeline to make your process run at its best. 
                                                        </p>
                                                        <p class="banner-copy tds-text--normal tds-text--body banner-copy--desktop" style="--cmp-banner-item: 0;">
                                                            Compare historical data from your manufacturing process to gain insight into inefficiencies and optimal parameters. By utilizing EasyTag on gibbs Insights, you can save detailed timestamps for future analysis.
                                                        </p>

                                                        <p class="banner-copy tds-text--normal tds-text--body banner-copy--mobile" style="--cmp-banner-item: 0;">
                                                            Terminus intakes all data captured from either HubMax or HubMini to execute artificial intelligence algorithms to learn your process. Knowing no two processes are the same, Terminus selects the best algorithm to use based off your data in realtime.  This learned model is then fed into our optimization software to solve for your tuned input parameters to meet your selected objective. A state-of-the-art algorithm pipeline to make your process run at its best. 
                                                        </p>
                                                        <p class="banner-copy tds-text--normal tds-text--body banner-copy--mobile" style="--cmp-banner-item: 0;">
                                                            Compare historical data from your manufacturing process to gain insight into inefficiencies and optimal parameters. By utilizing EasyTag on gibbs Insights, you can save detailed timestamps for future analysis.
                                                        </p>
                                                        <div class="banner-component"
                                                            style="--cmp-banner-item: 1;">
                                                        </div>
                                                        <div
                                                            class="banner-buttons "
                                                            style="--cmp-banner-item: 2;">
                                                        </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </section>
                                       </div>
                                    </section>
                                    <section class="layout__region layout-builder--layout__region showcase-screen feature" id="contact" data-gtm-event="element-scroll" data-gtm-drawer="contact" data-color-theme="light"  data-drawer-static-nav-color="default" data-title="Contact Us">
                                       <div class="block block-gibbs-blocks block-inline-blockhero-annotations-showcase">
                                          <section  data-gtm-key="gibbs-hero-annot-18" class="animate-onscroll hero hero-annotations hero--with-banner hero-annotations--contact" id="gibbs-hero-annot-18" style="--media-height: 100vh;">
                                             <div class="banner banner--left tds-scrim--white">
                                                <div class="banner-image">
                                                    <div id="contact-container">
                                                      <form id="contact-form" method="post" novalidate>
                                                         <input type="hidden" name="csrf-token" value="1">

                                                         <div class="form-inputs">
                                                            <div class="contact-information">
                                                               <div class="contact-input">
                                                                  <div class="nb-contact-form__field name">
                                                                        <label class="nb-contact-form__field-lable name" for="name">Name</label>
                                                                        <input class="nb-contact-form__field-input" id="name" name="name" type="text" placeholder="Name" required>
                                                                  </div>
                                                               </div>
                                                               <div class="contact-input">
                                                                  <div class="nb-contact-form__field phone">
                                                                        <label class="nb-contact-form__field-lable phone" for="phone">Phone</label>
                                                                        <input class="nb-contact-form__field-input" id="phone" name="phone" type="text" placeholder="Phone" required>
                                                                  </div>
                                                               </div>
                                                               <div class="contact-input">
                                                                  <div class="nb-contact-form__field email">
                                                                        <label class="nb-contact-form__field-lable email" for="email">Email</label>
                                                                        <input class="nb-contact-form__field-input" id="email" name="email" type="email" placeholder="Email" required>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                               <div class="nb-contact-form__field textarea">
                                                                     <label class="nb-contact-form__field-lable volume contains-summary" for="message">Message</label>
                                                                     <textarea class="nb-contact-form__field-textarea" name="message" id="message" required placeholder="Inquire about product info, quotes, demos, or just say hi."></textarea>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                               <div class="nb-contact-form__button-container">
                                                                     <button 
                                                                        class="g-recaptcha nb-contact-form__button"
                                                                        data-sitekey="6LflPLYUAAAAAKQhQBr-bSbDBddAhPLlJxGv6Zcz" 
                                                                        data-callback='onContactUsSubmit' 
                                                                        data-action='submit'>
                                                                        Submit
                                                                     </button>
                                                               </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                         </div>
                                                      </form>
                                                   </div>
                                                </div>
                                                <div class="banner-content tds-content_container">
                                                   <div class="tds-flex">
                                                        <div class="tds-flex-item tds-flex--col_1of3">
                                                            <h2 class="nb-contact-form__title">
                                                               Contact us for a free assessment to reduce your energy consumption.
                                                            </h2>
                                                            <h2 class="nb-contact-form__field-lable">
                                                               Miami, FL USA
                                                            </h2>
                                                        </div>
                                                        <div class="tds-flex-item">
                                                            <!-- <h2 class="nb-contact-form__title">
                                                               <a id="contactUs">Contact Us</a>
                                                            </h2> -->
                                                         </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </section>
                                       </div>
                                    </section>
                                    
                                    <div class="layout layout--onecol">
                                       <div  class="layout__region layout__region--content">
                                          <div class="block block-layout-builder block-inline-blocksticky-navigation">
                                             <label class="tds--is_hidden gibbs-product-block-label" data-block-id="gibbs_product:sticky_navigation">Sticky Navigation</label>
                                             <div class="sticky-nav--edit-mode">
                                                <h1 class="sticky-nav--logo_container">
                                                   <a href="/" class="sticky-nav--logo" title="Gibbs Energy, LLC">
                                                   <i class="tds-icon tds-icon-wordmark tds-icon--jumbo" aria-hidden="true"></i>
                                                   </a>
                                                </h1>
                                             </div>
                                             <nav class="sticky-nav--mobile animate_scrolltop--to_reveal ">
                                                <h1 class="sticky-nav--logo_container">
                                                   <a href="/" class="sticky-nav--logo" title="Gibbs Energy, LLC">
                                                   <i class="tds-icon tds-icon-wordmark tds-icon--jumbo" aria-hidden="true"></i>
                                                   </a>
                                                   <a href="javascript:void(0)" class="sticky-nav--arrow" data-gtm-event="widget-interaction" data-gtm-drawer="hero"
                                                      data-gtm-interaction="jump to top">
                                                      <svg class="tds-icon" viewBox="0 0 100 100" width="20" height="20" aria-labelledby="btn-mobile--return_to_top">
                                                         <title id="btn-mobile--return_to_top"></title>
                                                         <path
                                                            d="M0 52.5c0-1.3.5-2.6 1.5-3.5L50 .5 98.5 49c2 2 2 5.1 0 7.1s-5.1 2-7.1 0L50 14.6 8.5 56.1c-2 2-5.1 2-7.1 0-.9-1-1.4-2.3-1.4-3.6z" />
                                                      </svg>
                                                   </a>
                                                </h1>
                                                <div class="sticky-nav--buttons">
                                                </div>
                                             </nav>
                                             <nav class="sticky-nav--desktop ">
                                                <h1 class="sticky-nav--logo_container">
                                                   <a href="/" class="sticky-nav--logo" title="Gibbs Energy, LLC">
                                                   <i class="tds-icon tds-icon-wordmark tds-icon--jumbo" aria-hidden="true"></i>
                                                   </a>
                                                   <a href="javascript:void(0)" class="sticky-nav--arrow" data-gtm-event="widget-interaction" data-gtm-drawer="hero"
                                                      data-gtm-interaction="jump to top">
                                                      <svg class="tds-icon" viewBox="0 0 100 100" width="20" height="20" aria-labelledby="btn--return_to_top">
                                                         <title id="btn--return_to_top"></title>
                                                         <path
                                                            d="M0 52.5c0-1.3.5-2.6 1.5-3.5L50 .5 98.5 49c2 2 2 5.1 0 7.1s-5.1 2-7.1 0L50 14.6 8.5 56.1c-2 2-5.1 2-7.1 0-.9-1-1.4-2.3-1.4-3.6z" />
                                                      </svg>
                                                   </a>
                                                </h1>
                                             </nav>
                                          </div>
                                          <div class="block block-layout-builder block-inline-blockdrawer-navigation">
                                          </div>
                                       </div>
                                    </div>
                                    <ul class="side_nav-container tds-list">
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </main>
            </div>
         </main>
      </div>
      <script src="/src/3rdparty/jquery/jquery-3.2.1.min.js"></script>
      <script src="/src/gibbs/js/main.js"></script>
      <!-- <script src="/src/gibbs/js/product.js"></script> -->
   </body>
</html>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147550849-1"></script>
<script src="/src/gibbs/js/google-analytics.js"></script>
