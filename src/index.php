<?php
/**
 *
 * This code for prod server for correct work of the language translation
 *
**/

require './translate.php'; ?>

<?php
$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
parse_str($parts['query'], $query);

$lang = $query['lang'] ?: 'eng';
$result = $translate[$lang];
?>

<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="//kuwait.nexfit.com/img/favicon.png" type="image/x-icon">
    <title>EMS Personal Fitness Training - Trial Session | Nexfit Kuwait</title>
    <link href="./css/style.bundle.ce3fdde90a4ad6790e37.css" rel="stylesheet">
</head><!-- Google Tag Manager -->
<script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start':
                new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            '//www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-WJBM8SL');</script><!-- End Google Tag Manager --></html>
<body><!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WJBM8SL" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript><!-- End Google Tag Manager (noscript) -->
<div class="loader"><img class="loader__img" src="img/loader.gif"></div>
<div class="section section--first">
    <div class="section__content section-offer">
        <div class="section-offer__header header"><a class="header__logo" href="/"><img class="header__logo-img"
                                                                                        src="//kuwait.nexfit.com/img/logo.png"></a>
            <div class="header__language-container"><a class="header__instagram-container"
                                                       href="//www.instagram.com/nexfitkw" target="_blank"><img
                            class="header__instagram-logo" src="//kuwait.nexfit.com/img/homeinsta.png">
                    <div class="header__instagram-account">@nexfitkw</div>
                </a>
                <div class="logo-with-language">
                    <div class="language-selector">
                        <div class="language-selector__item language-selector__item-en <?= ($lang === 'eng') ? 'language-selector__item--selected' : '' ?>">
                            <img class="language-selector__country" src="//kuwait.nexfit.com/img/united-kingdom.svg"
                                 alt=""><img class="language-selector__arrow"
                                             src="//kuwait.nexfit.com/img/arrow-point-to-right.png" alt=""></div>
                        <div class="language-selector__item language-selector__item-ae language-selector__item <?= ($lang === 'ar') ? 'language-selector__item--selected' : '' ?>"><img
                                    class="language-selector__country" src="//kuwait.nexfit.com/img/kuwait.svg"
                                    alt=""><img class="language-selector__arrow"
                                                src="//kuwait.nexfit.com/img/arrow-point-to-right.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-offer__main">
            <div class="section-offer__left-column offer">
                <div class="offer__title"><?php echo $result['offer__title'] ?></div>
                <div class="offer__description"><?php echo $result['offer__description'] ?></div>
                <div class="offer__bullets">
                    <div class="offer__bullet offer__bullet-first"><?php echo $result['offer__bullet-first'] ?></div>
                    <div class="offer__bullet offer__bullet-second"><?php echo $result['offer__bullet-second'] ?></div>
                    <div class="offer__bullet offer__bullet-third"><?php echo $result['offer__bullet-third'] ?></div>
                </div>
                <fieldset class="offer__book-session">
                    <legend class="offer__limited-offer-legend"><img class="offer__limited-offer pc-hidden"
                                                                     src="img/mobile-limited-offer.png"></legend>
                    <img class="offer__limited-offer mobile-hidden" src="img/limited-offer.png">
                    <div class="offer__limited-offer-description">
                        <?php echo $result['offer__limited-offer-description'] ?>
                    </div>
                </fieldset>
                <div class="offer__book-addition"><?php echo $result['offer__book-addition'] ?></div>
            </div>
            <div class="section-offer__right-column">
                <form class="form">
                    <div class="form__title"><?php echo $result['form__title'] ?></div>
                    <input class="form__input" type="text" placeholder="<?php echo $result['placeholders']['form__input[name="name"]'] ?>" name="name" required="required"
                           id="for_make_active"><input class="form__input" type="email" placeholder="<?php echo $result['placeholders']['form__input[name="email"]'] ?>"
                                                       name="email" required="required"><input class="form__input"
                                                                                               type="tel"
                                                                                               placeholder="<?php echo $result['placeholders']['form__input[name="phone"]'] ?>"
                                                                                               name="phone"
                                                                                               required="required">
                    <input class="form__input" type="hidden" name="language-type" value="<?php echo $lang ?>"><input
                            class="form__submit" type="submit" value="<?php echo $result['inputs']['form__submit'] ?>"></form>
            </div>
        </div>
    </div>
</div>
<div class="section section--second">
    <div class="section__content section-transform">
        <div class="section__title section-transform__title section__title--white">
            <?php echo $result['section-transform__title'] ?>
        </div>
        <div class="section__devider section-transform__devider section__devider--white"></div>
        <div class="section-transform__images">
            <div class="section-transform__image-container"><img class="section-transform__image"
                                                                 src="img/Before-After_1.png"></div>
            <div class="section-transform__image-container"><img class="section-transform__image"
                                                                 src="img/Before-After_2.png"></div>
            <div class="section-transform__image-container"><img class="section-transform__image"
                                                                 src="img/Before-After_3.png"></div>
            <div class="section-transform__image-container"><img class="section-transform__image"
                                                                 src="img/Before-After_4.png"></div>
        </div>
        <a class="section-transform__link" id="link_make_active">
            <div class="section-transform__cta"><?php echo $result['section-transform__cta'] ?></div>
        </a>
        <div class="section-transform__motivation"><?php echo $result['section-transform__motivation'] ?></div>
    </div>
</div>
<div class="section section--third">
    <div class="section__content section-helping">
        <div class="section__title section-helping__title">
            <?php echo $result['section-helping__title'] ?>
        </div>
        <div class="section__devider section-helping__devider"></div>
        <div class="section-helping__images">
            <div class="section-helping__image-container"><img class="section-helping__image" src="img/running.png">
                <div class="section-helping__alt section-helping__weight-loss"><?php echo $result['section-helping__weight-loss'] ?></div>
            </div>
            <div class="section-helping__image-container"><img class="section-helping__image" src="img/muscles.png">
                <div class="section-helping__alt section-helping__build-muscles"><?php echo $result['section-helping__build-muscles'] ?></div>
            </div>
            <div class="section-helping__image-container"><img class="section-helping__image" src="img/diabetes.png">
                <div class="section-helping__alt section-helping__diabetes"><?php echo $result['section-helping__diabetes'] ?></div>
            </div>
            <div class="section-helping__image-container"><img class="section-helping__image" src="img/Circulation.png">
                <div class="section-helping__alt section-helping__blood-circulation"><?php echo $result['section-helping__blood-circulation'] ?></div>
            </div>
            <div class="section-helping__image-container"><img class="section-helping__image" src="img/back_pain.png">
                <div class="section-helping__alt section-helping__back-pain"><?php echo $result['section-helping__back-pain'] ?></div>
            </div>
            <div class="section-helping__image-container"><img class="section-helping__image"
                                                               src="img/osteoporosis.png">
                <div class="section-helping__alt section-helping__osteoporosis"><?php echo $result['section-helping__osteoporosis'] ?></div>
            </div>
        </div>
    </div>
</div>
<div class="parallax parallax--first"></div>
<div class="section section--fifth">
    <div class="section__content section-pluses">
        <div class="section__title section-pluses__title"><?php echo $result['section-pluses__title'] ?></div>
        <div class="section__devider section-pluses__devider"></div>
        <div class="pluses">
            <div class="pluses__images"><img class="pluses__first-image mobile-hidden"
                                             src="//kuwait.nexfit.com/img/ems-computer.png"><img
                        class="pluses__second-image pc-hidden" src="//kuwait.nexfit.com/img/ems-training.png"></div>
            <div class="pluses__container pluses__pc-container">
                <div class="plus"><img class="plus__image" src="img/arrow.png">
                    <div class="plus__title plus__title-sixth"><?php echo $result['plus__title-sixth'] ?></div>
                </div>
                <div class="plus"><img class="plus__image" src="img/arrow.png">
                    <div class="plus__title plus__title-seventh"><?php echo $result['plus__title-seventh'] ?></div>
                </div>
            </div>
            <div class="pluses__container pluses__pc-container">
                <div class="plus"><img class="plus__image" src="img/arrow.png">
                    <div class="plus__title plus__title-fourth"><?php echo $result['plus__title-fourth'] ?></div>
                </div>
                <div class="plus"><img class="plus__image" src="img/arrow.png">
                    <div class="plus__title plus__title-fifth"><?php echo $result['plus__title-fifth'] ?></div>
                </div>
            </div>
            <div class="pluses__container pluses__mobile-container">
                <div class="plus"><img class="plus__image" src="img/arrow.png">
                    <div class="plus__title plus__title-seventh"><?php echo $result['plus__title-seventh'] ?></div>
                </div>
                <div class="plus"><img class="plus__image" src="img/arrow.png">
                    <div class="plus__title plus__title-fifth"><?php echo $result['plus__title-fifth'] ?></div>
                </div>
                <div class="plus"><img class="plus__image" src="img/arrow.png">
                    <div class="plus__title plus__title-sixth"><?php echo $result['plus__title-sixth'] ?></div>
                </div>
                <div class="plus"><img class="plus__image" src="img/arrow.png">
                    <div class="plus__title plus__title-fourth"><?php echo $result['plus__title-fourth'] ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section section--sixth">
    <div class="section__content section-feature">
        <div class="section__title section-feature__title">
            <?php echo $result['section-feature__title'] ?>
        </div>
        <div class="section__devider section-feature__devider"></div>
        <div class="section-feature__container">
            <div class="feature"><img class="feature__image" src="img/training_1.png">
                <div class="feature__container feature__first-container">
                    <div class="feature__title feature__body">
                        <?php echo $result['feature__body'] ?>
                    </div>
                    <div class="feature__description feature__description-body-1">
                        <?php echo $result['feature__description-body-1'] ?>
                    </div>
                    <div class="feature__description feature__description-body-2 feature__description--v2">
                        <?php echo $result['feature__description-body-2'] ?>
                    </div>
                    <div class="feature__description feature__description-body-3 feature__description-body">
                        <?php echo $result['feature__description-body-3'] ?>
                    </div>
                </div>
            </div>
            <div class="feature"><img class="feature__image" src="img/training_2.png">
                <div class="feature__container feature__second-container">
                    <div class="feature__title feature__health">
                        <?php echo $result['feature__health'] ?>
                    </div>
                    <div class="feature__description feature__description-health-1">
                        <?php echo $result['feature__description-health-1'] ?>
                    </div>
                    <div class="feature__description feature__description-health-2 feature__description--v2">
                        <?php echo $result['feature__description-health-2'] ?>
                    </div>
                    <div class="feature__description feature__description-health-3 feature__description-health">
                        <?php echo $result['feature__description-health-3'] ?>
                    </div>
                </div>
            </div>

            <div class="feature"><img class="feature__image" src="img/training_3.png">
                <div class="feature__container feature__third-container">
                    <div class="feature__title feature__lifestyle">
                        <?php echo $result['feature__lifestyle'] ?>
                    </div>
                    <div class="feature__description feature__description-lifestyle-1">
                        <?php echo $result['feature__description-lifestyle-1'] ?>
                    </div>
                    <div class="feature__description feature__description-lifestyle-2 feature__description--v2">
                        <?php echo $result['feature__description-lifestyle-2'] ?>
                    </div>
                    <div class="feature__description feature__description-lifestyle-3 feature__description-lifestyle">
                        <?php echo $result['feature__description-lifestyle-3'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="parallax parallax--second"></div>

<div class="section section--eighth">
    <div class="section__content section-request">
        <div class="section-request__container">
            <div class="section-request__title"><?php echo $result['section-request__title'] ?></div>
            <div class="section-request__addition"><?php echo $result['section-request__addition'] ?></div>
            <a class="section-request__link" href="#"><?php echo $result['section-request__link'] ?></a>
            <img class="section-request__logo pc-hidden" src="img/fit-logo.png"></div>
    </div>
</div>
<footer class="footer">
<!--    <a class="footer__franchise-link" href="/franchise/">--><?php //echo $result['footer__franchise-link'] ?><!--</a>-->
    <div class="footer__copyright"><?php echo $result['footer__copyright'] ?></div>
</footer>

<script type="text/javascript" src="./js/bundle.81d6ea1f86b1a03860e6.js"></script>
<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>

<script>
    <?php if ($lang === 'ar') { ?>
    document.title = 'تدريبات التحفيز الكهربائي للعضلات للياقة البدنية - الجلسة التجريبية | نكسفيت الكويت';
    jQuery('body').addClass('body-ar');
    jQuery('.language-selector__item-en').appendTo('.language-selector');
    jQuery('.offer__limited-offer.mobile-hidden').attr('src', '//kuwait.nexfit.com/img/limited-offer-ar.png');
    jQuery('.offer__limited-offer.pc-hidden').attr('src', '//kuwait.nexfit.com/img/mobile-limited-offer-ar.png');
    <?php } else { ?>
    jQuery('.offer__limited-offer.mobile-hidden').attr('src', '//kuwait.nexfit.com/img/limited-offer.png');
    jQuery('.offer__limited-offer.pc-hidden').attr('src', '//kuwait.nexfit.com/img/mobile-limited-offer.png');
    <?php } ?>

    let result = JSON.parse(atob('<?php echo base64_encode(json_encode($result)); ?>'));
    let selector = '';

    jQuery('.form__title').html(result['form__title']);
    Object.keys(result.inputs).forEach(function (e) {
        selector = ("." + e);
        jQuery(selector).attr("value", result.inputs[e]);
    });
    Object.keys(result.placeholders).forEach(function (e) {
        selector = ("." + e);
        jQuery(selector).attr("placeholder", result.placeholders[e]);
    });
</script>

</body>
