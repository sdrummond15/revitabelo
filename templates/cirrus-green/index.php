<?php
/**
 * @subpackage    Cirrus Green v1.6 HM02J
 * @copyright    Copyright (C) 2010-2013 Hurricane Media - All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');
$LeftMenuOn = ($this->countModules('position-4') or $this->countModules('position-5') or $this->countModules('position-7'));
$RightMenuOn = ($this->countModules('position-6') or $this->countModules('position-8'));
$TopNavOn = ($this->countModules('position-13'));
$app = JFactory::getApplication();
$sitename = $app->getCfg('sitename');
$logopath = $this->baseurl . '/templates/' . $this->template . '/images/logo-demo-green.gif';
$logo = $this->params->get('logo', $logopath);
$logoimage = $this->params->get('logoimage');
$sitetitle = $this->params->get('sitetitle');
$sitedescription = $this->params->get('sitedescription');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>"
      lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <jdoc:include type="head"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css"
          type="text/css"/>
    <link rel="stylesheet"
          href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/all.min.css"
          type="text/css"/>
    <script type="text/javascript"
            src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/sfhover.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-24132529-25', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>

<div id="wrapper">

    <!-- TopNav -->
    <?php if ($TopNavOn): ?>
        <div id="topnav_wrap">
            <div id="topnav">
                <jdoc:include type="modules" name="position-13" style="xhtml"/>
            </div>
        </div>
    <?php endif; ?>


    <div id="header_wrap">
        <div id="header">
            <!-- Logo -->
            <div id="logo">

                <?php if ($logo && $logoimage == 1): ?>
                    <a href="<?php echo $this->baseurl ?>"><img src="<?php echo htmlspecialchars($logo); ?>"
                                                                alt="<?php echo $sitename; ?>"/></a>
                <?php endif; ?>
                <?php if (!$logo || $logoimage == 0): ?>

                    <?php if ($sitetitle): ?>
                        <a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitetitle); ?></a><br/>
                    <?php endif; ?>

                    <?php if ($sitedescription): ?>
                        <div class="sitedescription"><?php echo htmlspecialchars($sitedescription); ?></div>
                    <?php endif; ?>

                <?php endif; ?>

            </div>

                <!-- Search -->
                <div id="search">
                    <jdoc:include type="modules" name="position-0"/>
                </div>

                <!-- Topmenu -->
                <div id="topmenu_wrap">
                    <div id="topmenu">
                        <jdoc:include type="modules" name="position-1"/>
                    </div>

                    <div class="gotomenu">
                        <div id="gotomenu">
                            <i class="fa fa-bars smallmenu" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

        </div>
        <div class="menuresp">
            <jdoc:include type="modules" name="position-1"/>
        </div>
    </div>


    <!-- Breadcrumbs -->
    <?php if ($this->countModules('position-2')): ?>
        <div id="breadcrumbs">
            <jdoc:include type="modules" name="position-2"/>
        </div>
    <?php endif; ?>

    <!-- Content/Menu Wrap -->
    <div id="content-menu_wrap_bg">
        <div id="content-menu_wrap">


            <!-- Left Menu -->
            <?php if ($LeftMenuOn): ?>
                <div id="leftmenu">
                    <jdoc:include type="modules" name="position-7" style="xhtml"/>
                    <jdoc:include type="modules" name="position-4" style="xhtml"/>
                    <jdoc:include type="modules" name="position-5" style="xhtml"/>
                </div>
            <?php endif; ?>


            <!-- Contents -->
            <?php if ($LeftMenuOn AND $RightMenuOn): ?>
            <div id="content-w1">
                <?php elseif ($LeftMenuOn OR $RightMenuOn): ?>
                <div id="content-w2">
                    <?php else: ?>
                    <div id="content-w3">
                        <?php endif; ?>

                        <?php if ($this->countModules('position-12')): ?>
                            <div id="content-top">
                                <jdoc:include type="modules" name="position-12"/>
                            </div>
                        <?php endif; ?>

                        <jdoc:include type="message"/>
                        <jdoc:include type="component"/>
                    </div>


                    <!-- Right Menu -->
                    <?php if ($RightMenuOn): ?>
                        <div id="rightmenu">
                            <jdoc:include type="modules" name="position-6" style="xhtml"/>
                            <jdoc:include type="modules" name="position-8" style="xhtml"/>
                            <jdoc:include type="modules" name="position-3" style="xhtml"/>
                        </div>
                    <?php endif; ?>


                </div>
            </div>


            <!-- Footer -->
            <div id="footer_wrap">
                <div id="footer">
                    <jdoc:include type="modules" name="position-14"/>
                </div>
            </div>


            <!-- Banner/Links -->
            <div id="box_wrap">
                <div id="box1">
                    <jdoc:include type="modules" name="position-9" style="xhtml"/>
                </div>
                <div id="box_placeholder">
                    <div id="box">
                        <div id="box2">
                            <jdoc:include type="modules" name="position-10" style="xhtml"/>
                        </div>
                        <div id="box3">
                            <jdoc:include type="modules" name="position-11" style="xhtml"/>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Page End -->


        <div id="copyright">
            <?php echo date('Y'); ?> <?php echo $sitename; ?> | Todos os direitos reservados <a>
        </div>

        <div class="sd">
            <div class="sdint">
                <a href="http://www.sdrummond.com.br" target="blank">
                    <img src="images/sd.png" alt="SDrummond"/>
                </a>
            </div>
        </div>
        <script>
            jQuery.noConflict();
            jQuery(window).load(function () {
                var altura = jQuery(window).height();
                var header_wrap = jQuery('#header_wrap').height();
                var box_placeholder = jQuery('#box_placeholder').height();
                var copyright = jQuery('#copyright').height();
                jQuery('#content-menu_wrap_bg').css('min-height', altura - header_wrap - box_placeholder - (copyright * 5)+1);

                jQuery(window).on('resize', function () {
                    var altura = jQuery(window).height();
                    var header_wrap = jQuery('#header_wrap').height();
                    var box_wrap = jQuery('#box_wrap').height();
                    var copyright = jQuery('#copyright').height();
                    jQuery('#content-menu_wrap_bg').css('min-height', altura - header_wrap - box_placeholder - (copyright * 5)+1);
                }).trigger('resize');
            });

            jQuery(function () {
                jQuery(window).on('resize', function () {
                    var cabecalho = jQuery('#header_wrap').height();
                    var rodape = jQuery('#box_wrap').height();
                    var tela = jQuery(window).height();
                    jQuery('#content-menu_wrap_bg').css('min-height', tela - (cabecalho+rodape) );
                }).trigger('resize');
            });

            jQuery(document).ready(function ($) {
                var nextDiv = $('#header_wrap').next();
                $(window).on('resize', function () {
                    nextDiv.css('padding-top', $('#header_wrap').height()-1);
                }).trigger('resize');

                /*MENU RESPONSIVO*/
                $(window).on('resize', function () {
                    var menuresp = $(".gotomenu");
                    menuresp.each(function () {
                        if (!$(this).is(':visible')) {
                            $('.menuresp').hide();
                            $('#nav-icon').removeClass('open');
                        }
                    });
                }).trigger('resize');

                $('.menuresp').hide();

                $("#gotomenu").click(function () {
                    $('.menuresp').slideToggle();
                });


                $('.moduletable-menu-servicos h3').append(' <i class="fa fa-angle-down" aria-hidden="true"></i>\n');
                $('.moduletable-menu-servicos h3').click(function () {
                    $(this).siblings('ul').slideToggle("slow");
                    $(".fa-angle-down, .fa-angle-up").toggleClass("fa-angle-down fa-angle-up");
                });


            });
        </script>
</body>
</html>

