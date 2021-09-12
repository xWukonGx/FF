<?php
if (isset($_COOKIE['username'])){
   
     header("location:site/accounts.php");
}

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/session.css" />
    <title>FOX STORE</title>
  </head>
  <body>
    <nav>
      <a style="border-right: 1px solid white" href="">FOX <b>STORE</b></a>

      <a href="site/signup.php">البدء</a>
      <a href="site/login.php">الدخول</a>
      <a style="float: right" id="aboutt" href="#about">حول</a>
      <a
        style="float: right; border-left: 0.4px solid white"
        id="contactt"
        href="#contact"
        >من نحن</a
      >
    </nav>

    <div id="about" class="desc">
      <div class="content">
        <div class="fox">
          <h1>متجر فوكس</h1>
          <p>
            موقعنا هو موقع يقوم بعرض حسابات لعدة مواقع بهدف بيعها أو بهدف
            التبادل بها، بشكل مجاني تماما بالطبع يتواجد مميزات اخرى مدفوعة في
            الموقع كالمتاجر الخاصة التي توفر لك خواص تزيد من فاعلية البيع . كما
            يمكنك بدء عمل تجاري خاص بك لبيع حسابات بالجملة او الشراء و اعادة
            البيع نأمل أن نصل الى مستوى توقعاتكم .
          </p>
          <a href="">البدء</a>
        </div>
        <img src="imaages/pexels-photo-2764678.jpeg" alt="" />
      </div>
    </div>

    <div
      style="
        background-image: url('imaages/Renard_roux_full_moon_2048x.jpg');
        background-position: bottom;
      "
      class="desc"
    >
      <div id="contact" class="content">
        <div class="fox">
          <h1>من نحن ؟</h1>
          <p>
            يتم تسيير موقع متجر فوكس عبر أحد شركاء مدير الموقع حيث يعمل على
            تسيير العمليات اليدوية القليلة كالتحقق من صحة الاعلانات من عدمها
            بينما يقوم مدير الموقع بتطوير الموقع برمجيا واضافة خواص جديدة
            للمساعدة في توفير جربة أكثر مرونة في الأستخدام
          </p>
          <a href="#cardss">تواصل معنا</a>
        </div>
        <img src="imaages/300b211800b1299e8640620dbb783270.jpg" alt="" />
      </div>
    </div>
    <div id="cardss" style="background-image: none" class="desc">
      <div class="cards">
        <div class="card">
          <img src="imaages/sans.png" alt="" />
          <h3>SANS</h3>
          <hr />
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel
            debitis at id iste voluptatibus in temporibus laudantium,
            cupiditate, veritatis sint, aspernatur illum doloribus tempore
            explicabo. Non repellat dolorem officiis quaerat.
          </p>
          <a href="https://web.facebook.com/abdoou.sdk">CONTACT ME</a>
        </div>
        <div class="card">
          <img src="imaages/wukong.jpg" alt="" />
          <h3>WUKONG</h3>
          <hr />
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel
            debitis at id iste voluptatibus in temporibus laudantium,
            cupiditate, veritatis sint, aspernatur illum doloribus tempore
            explicabo. Non repellat dolorem officiis quaerat.
          </p>
          <a href="https://web.facebook.com/mehdi.bf.5283/">CONTACT ME</a>
        </div>
      </div>
    </div>
    <footer>CODED BY WUKONG</footer>
  </body>
</html>
