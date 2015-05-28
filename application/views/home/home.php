<section class="container news">

 <article class="news-stage col-sm-12">
  <header class="title icon"><p>ÚLTIMAS NOTÍCIAS</p></header>
  <ul class="list-inline">
          <? foreach ($news as $news): ?>
          <li class="col-sm-4 box-content">
            <img src="assets/upload/news/<?= $news->slug; ?>/<?= $this->utils->thumbnail($news->file_name); ?>" alt="<?= $news->title; ?>">
            <div class="box-txt">
                <span class="date"><?= $this->utils->date($news->date); ?></span>
                <h3 class="txt-1"><?= $news->title; ?></h3>
                <h4 class="txt-2"><?= $news->call; ?></h4>
                <button class="btn view-more" onClick="parent.location='<?= site_url('noticias/' . $news->slug); ?>#1'">veja mais</button>
            </div>
          </li>
          <? endforeach; ?>
         </ul>
 </article>
</section>


<section class="container champions">

<header class="title">
    <span class="col-sm-3 txt">TODOS OS CAMPEÕES</span>
    <span class="col-sm-9 bg-1"></span>
</header>

<article class="all-champions" id="slider1">
<div class="viewport">
         <ul class="list-inline overview">
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/014.jpg" alt="#">
            <div class="box-txt">
                <span class="name">Federico Delbonis</span>
                <p>2014</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/013.jpg" alt="#">
            <div class="box-txt">
                <span class="name">RAFAEL NADAL</span>
                <p>2013</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/012.jpg" alt="#">
            <div class="box-txt">
                <span class="name">Nicolás Almagro</span>
                <p>2012</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/011.jpg" alt="#">
            <div class="box-txt">
                <span class="name">Nicolás Almagro</span>
                <p>2011</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/010.jpg" alt="#">
            <div class="box-txt">
                <span class="name">Juan Ferrero</span>
                <p>2010</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/009.jpg" alt="#">
            <div class="box-txt">
                <span class="name">Tommy Robredo</span>
                <p>2009</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/008.jpg" alt="#">
            <div class="box-txt">
                <span class="name">Nicolás Almagro</span>
                <p>2008</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/007.jpg" alt="#">
            <div class="box-txt">
                <span class="name">Guillermo Cañas</span>
                <p>2007</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/006.jpg" alt="#">
            <div class="box-txt">
                <span class="name">Nicolás Massú</span>
                <p>2006</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/005.jpg" alt="#">
            <div class="box-txt">
                <span class="name">RAFAEL NADAL</span>
                <p>2005</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/004.jpg" alt="#">
            <div class="box-txt">
                <span class="name">Gustavo Kuerten</span>
                <p>2004</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/003.jpg" alt="#">
            <div class="box-txt">
                <span class="name">Sjeng Schalken</span>
                <p>2003</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/002.jpg" alt="#">
            <div class="box-txt">
                <span class="name">Gustavo Kuerten</span>
                <p>2002</p>
            </div>
          </li>
          <li class="col-sm-3 box-content">
            <img src="assets/images/imgs/champions/001.jpg" alt="#">
            <div class="box-txt">
                <span class="name">Jan Vacek</span>
                <p>2001</p>
            </div>
          </li>
         </ul>
</div>
 <a class="buttons prev" href="#"><i class="fa fa-angle-left"></i></a>
 <a class="buttons next" href="#"><i class="fa fa-angle-right"></i></a>

</article>
</section>
<iframe style="width: 250px; height: 250px; overflow:hidden;position:fixed; bottom:0; margin-top:-125px;right:0;z-index:1000;" scrolling="no" frameborder="0" src="http://adservice.depassaporte.com.br/content/9f6dd295ea2f251aea320f904dfd05eb"></iframe>
<script type="text/javascript">
     $(document).ready(function(){
     $("#page-home").addClass("active");
     $("#page-home-mobile").addClass("active");
     $('#slider1').tinycarousel();
     });
</script>