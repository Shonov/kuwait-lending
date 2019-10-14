<?php
/**
 * Created by PhpStorm.
 * User: Виталий Шонов
 * Date: 31.01.2019
 * Time: 12:04
 */


header('Access-Control-Allow-Origin: *');
if ($_GET['action']) {
}

$translate = array(
    'eng' => array(
        'placeholders' => array(
            'form__input[name="name"]' => 'Your Name',
            'form__input[name="email"]' => 'Your Email',
            'form__input[name="phone"]' => 'Contact Number',
        ),
        'inputs' => array(
            'form__submit' => 'Claim The Offer',
        ),
        'offer__title' => 'GET IN SHAPE<br>AND BE HEALTHY',
        'offer__description' => 'TRANSFORM YOUR<div class="text-red text-bold">&nbsp;BODY&nbsp;</div>TO BECOME<div class="text-red text-bold">&nbsp;FIT&nbsp;</div>AND <div class="text-red text-bold">HEALTHY&nbsp;</div>WITH JUST<div class="text-red text-bold">&nbsp;20 MINUTES&nbsp;</div>PER WEEK',
        'offer__bullet-first' => '<img class="offer__bullet-image" src="//kuwait.nexfit.com/img/red-curcle.png">Lose Weight &amp; Burn Fats Faster Than Ever',
        'offer__bullet-second' => '<img class="offer__bullet-image" src="//kuwait.nexfit.com/img/red-curcle.png">High-Intensity, all muscle group workout',
        'offer__bullet-third' => '<img class="offer__bullet-image" src="//kuwait.nexfit.com/img/red-curcle.png">Build Strength &amp; Endurance',
        'form__title' => 'CLAIM LIMITED<br>TIME OFFER',
        'offer__limited-offer-description' => '<div class="offer__limited-offer-description--center">BOOK YOUR TRIAL SESSION FOR&nbsp;<div class="text-red text-bold">KD 9 ONLY,&nbsp;</div>INSTEAD OF KD 19</div><div class="offer__text"><div class="text-red text-bold">+ Get 45%&nbsp;</div>discount on membership</div><div class="offer__text"><div class="text-red text-bold">+ Free 2&nbsp;</div>months freeze option</div><div class="offer__text"><div class="text-red text-bold">+ Free EMS&nbsp;</div>Fitness sportswear</div><div class="offer__text"><div class="text-red text-bold">+ 4 free sessions&nbsp;</div>for family/friends</div>',
        'offer__book-addition' => 'Offer valid for first 100 customers only',
        'section-transform__title' => 'TO LIVE<br class="pc-hidden"><span class="indent">&ensp;</span>HEALTHY<br class="pc-hidden"><span class="indent">&ensp;</span>IS A CHOICE',
        'section-transform__cta' => 'YOU COULD BE NEXT',
        'section-transform__motivation' => 'TRANSFORM YOURSELF',
        'section-helping__title' => 'NEXFIT EMS PERSONAL FITNESS<br class="mobile-hidden">&ensp;TRAINING WILL HELP YOU WITH',
        'section-helping__weight-loss' => 'Weight loss',
        'section-helping__build-muscles' => 'Build muscles',
        'section-helping__diabetes' => 'Diabetes',
        'section-helping__blood-circulation' => 'Blood Circulation',
        'section-helping__back-pain' => 'Back Pain',
        'section-helping__osteoporosis' => 'Osteoporosis',
        'section-pluses__title' => 'WHAT YOU&ensp;<br class="pc-hidden">GET WITH<br class="pc-hidden"><span class="section-pluses__red-text section-pluses__text-margin">NEXFIT</span>EMS<br><span class="section-pluses__red-text">PERSONAL<br class="pc-hidden">&ensp;FITNESS&ensp;<br class="pc-hidden">TRAINING?</span>',
        'plus__title-first' => 'Certified Personal Trainer',
        'plus__title-fourth' => 'Multiple EMS Sessions per Week',
        'plus__title-fifth' => 'Full Body Evaluation',
        'plus__title-sixth' => 'Nutrition<br>Plan',
        'plus__title-seventh' => 'Personalized Training Plan',
        'section-feature__title' => 'WHAT ARE BENEFITS FOR <i style="color: red;">ME</i> FROM <br class="mobile-hidden" />EMS PERSONAL FITNESS TRAINING?',
        'feature__body' => 'BODY',
        'feature__health' => 'HEALTH',
        'feature__lifestyle' => 'LIFESTYLE',
        'feature__description-body-1' => 'NEXFIT EMS gets your body in shape quick and without any health risk.',
        'feature__description-body-2' => 'A study by the Cologne Sports University confirms that EMS whole-body training has a particularly positive effect on waist and stomach.',
        'feature__description-body-3' => 'This way you can reach a sustainable body shaping in a short time by high-intensity workout. Therefore, you loose weight and burn calories faster.',
        'feature__description-health-1' => 'Do you have a back, neck or joints pain? Well, then EMS training by NEXFIT is for YOU. Our Fitness Training stimulates deep lying muscles and thus ideally train your entire back muscles. Strong back muscles can prevent from back pain.',
        'feature__description-health-2' => 'A study by the University of Munich shows the following results: 80% back pain reduction after 2 months with 2 training sessions per week.',
        'feature__description-health-3' => 'EMS also helps you with blood circulation, diabetes and osteoporosis.',
        'feature__description-lifestyle-1' => 'EMS is the lifestyle that only healthy and fit people choose to have. You get your body fit, healthy improved, and energized quicker than ever before.',
        'feature__description-lifestyle-2' => 'Our EMS fitness training combats cellulite, stimulates collagen production and effectively eliminates annoying fat pads on hips.',
        'feature__description-lifestyle-3' => 'NEXFIT EMS training gives your body a short break from a stressful everyday life.',        'section-request__title' => 'TRANSFORM&ensp;<br>YOUR&ensp;<div class="text-red">BODY&ensp;</div>AND&ensp;<br class="mobile-hidden">BECOME&ensp;<div class="text-red">FIT</div>&ensp;AND&ensp;<div class="text-red">HEALTHY&ensp;</div>AGAIN',
        'section-request__addition' => 'START YOUR&nbsp;<div class="text-red text-bold">TRIAL&nbsp;</div>SESSION FOR&nbsp;<br class="mobile-hidden"><div class="text-red text-bold">KD 9&nbsp;</div>ONLY, INSTEAD OF KD 19',
        'section-request__link' => 'Start Now!',
        'footer__franchise-link' => 'Become a franchise',
        'footer__copyright' => 'Copyright © ' . date('Y') . ' NEXFIT',
    ),
    'ar' => array(
        'placeholders' => array(
            'form__input[name="name"]' => 'الاسم',
            'form__input[name="email"]' => 'البريد الإلكتروني',
            'form__input[name="phone"]' => 'رقم التواصل',
        ),
        'inputs' => array(
            'form__submit' => 'اطلب العرض',
        ),
        'offer__title' => 'احصل على قوام<br>رشيق وصحي',
        'offer__description' => 'قم بتغيير جسمك <br class="pc-hidden">ليصبح رشيقًا وصحيًا<br>في 20 دقيقة أسبوعيًا فقط',
        'offer__bullet-first' => '<img class="offer__bullet-image" src="//kuwait.nexfit.com/img/red-curcle.png">لتعزيز القوة والقدرة على التحمل',
        'offer__bullet-second' => '<img class="offer__bullet-image" src="//kuwait.nexfit.com/img/red-curcle.png">تمارين مكثفة لكافة مجموعات العضلات',
        'offer__bullet-third' => '<img class="offer__bullet-image" src="//kuwait.nexfit.com/img/red-curcle.png">لإنقاص الوزن وحرق الدهون أسرع من أي وقت مضى',
        'form__title' => 'اطلبه الآن<br>(العرض لفترة محدودة)',
        'offer__limited-offer-description' => '<div class="offer__limited-offer-description--main">احجز جلستك التجريبية مقابل <br class="pc-hidden"> 9  دينار فقط ،بدلًا من 19 دينار</div><div class="offer__limited-offer-description--path">+ احصل على خصم 45% على العضوية<br>+ خيار تجميد العضوية لمدة شهرين مجانا<br>+ ملابس رياضية مجانية<br>+ 4 جلسات مجانية للعائلة والأصدقاء</div>',
        'offer__book-addition' => 'العرض ساري لأول 100 عميل فقط',
        'section-transform__title' => 'الحياة الصحية <br class="pc-hidden"> هي اختيار',
        'section-transform__cta' => 'يمكن أن تكون أنت التالي',
        'section-transform__motivation' => 'قم بتغيير نفسك',
        'section-helping__title' => 'ستقوم تمارين التحفيز الكهربائي للعضلات للياقة<br class="mobile-hidden"> البدنية نكسفيت بمساعدتك على:',
        'section-helping__weight-loss' => 'فقدان الوزن',
        'section-helping__build-muscles' => 'بناء العضلات',
        'section-helping__diabetes' => 'علاج مرض<br class="mobile-hidden">السكري',
        'section-helping__blood-circulation' => 'تنشيط الدورة<br class="mobile-hidden">الدموية',
        'section-helping__back-pain' => 'علاج آلام الظهر',
        'section-helping__osteoporosis' => 'علاج هشاشة العظام',
        'plus__title-first' => 'مدرب شخصي معتمد',
        'plus__title-fourth' => 'جلسات متعددة<br> أسبوعيًا في التحفيز<br>الكهربائي للعضلات',
        'plus__title-fifth' => 'تحليل<br> كامل للجسم',
        'plus__title-sixth' => 'نظام غذائي',
        'plus__title-seventh' => 'خطة تدريبية متخصصة',
        'section-pluses__title' => 'ما الذي ستحصل عليه في نكسفيت لتدريبات<br>اللياقة البدنية في التحفيز الكهربائي للعضلات؟',
        'section-feature__title' => 'ما هي فوائد تمارين التحفيز الكهربائي<br class="mobile-hidden"> للعضلات للياقة البدنية؟',
        'feature__body' => 'أسلوب حياة',
        'feature__health' => 'الصحة',
        'feature__lifestyle' => 'الجسم',
        'feature__description-body-1' => 'التحفيز الكهربائي للعضلات هو أسلوب حياة يختاره الأصحاء والرياضيين فقط.',
        'feature__description-body-2' => ' يمكنك الحصول على جسم رشيق وصحي ونشيط بأسرع من أي وقت مضى.',
        'feature__description-body-3' => 'تمارين التحفيز الكهربائي للعضلات لدينا تحارب السيلولييت ، وتحفز إنتاج الكولاجين وتزيل بفعالية تكتلات الدهون المزعجة في الفخذين. ستمنح تمارين التحفيز الكهربائي للعضلات جسمك استراحة قصيرة من الحياة اليومية المجهدة.',
        'feature__description-health-1' => 'هل تعاني من آلام الظهر والرقبة والمفاصل؟ إذًا تمارين التحفيز الكهربائي العضلي من نكسفيت يمكنها مساعدتك.',
        'feature__description-health-2' => ' تحفز تدريباتنا للياقة البدنية العضلات العميقة وبالتالي يمكن تدريب عضلات الظهر بالكامل بشكل مثالي. وبإمكان عضلات الظهر القوية منع حدوث آلام الظهر. توضح دراسة أجرتها جامعة ميونخ النتائج التالية: يمكن لجلستين تدريبيتين أسبوعيًا تقليل آلام الظهر بنسبة 80% بعد شهرين من التدريب.',
        'feature__description-health-3' => ' وأيضًا تساعد تمارين التحفيز الكهربائي العضلي في تنشيط الدورة الدموية وعلاج مرض السكري وهشاشة العظام.',
        'feature__description-lifestyle-1' => 'تمارين التحفيز الكهربائي العضلي ستجعل جسمك رشيقًا ومتناسقًا بسرعة وبدون أي مخاطر صحية.',
        'feature__description-lifestyle-2' => ' تؤكد دراسة أجرتها جامعة كولونيا سبورتس أن تمارين التحفيز الكهربائي العضلي للجسم كله له تأثير إيجابي بشكل خاص على الخصر والمعدة. وبهذه الطريقة ، يمكنك الوصول إلى قوام رشيق في وقت قصير من خلال تمارين رياضية عالية الكثافة.',
        'feature__description-lifestyle-3' => 'لذلك ، يمكنك فقدان الوزن وحرق السعرات الحرارية في وقت قصير.',
        'section-request__title' => 'قم بتغيير جسمك ليصبح مرة أخري رشيقاً وصحياً',
        'section-request__addition' => 'احصل على جلستك التجريبية<br>مقابل 9 دينار فقط ، بدلًا من 19 دينار',
        'section-request__link' => 'ابدأ الآن',
        'footer__franchise-link' => 'احصل على حق الامتياز',
        'footer__copyright' => date('Y') . ' حقوق الطبع محفوظة نكسفيت',
    ),
);

if ($_GET['lang']) {
    $language = $_GET['lang'];
} else {
    $language = 'eng';
}

if ($_GET['action']) {
    echo json_encode($translate[$language]);
}
