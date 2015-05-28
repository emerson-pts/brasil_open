<section id="1" class="container noticias">

  <article class="">
  
  <header class="title"><p>NOTÍCIAS</p> <a href="javascript:window.history.go(-1)"><i class="fa fa-mail-reply"></i>Voltar</a></header>
  
  
   <div class="box-content">
    <h2><?= $res->title; ?></h2>
    <? if(!empty($res->subtitle)): ?><h4><?= $res->subtitle; ?></h4><? endif; ?>
    
    
    <img src="/assets/upload/news/<?= $res->slug; ?>/<?= $this->utils->full($res->file_name); ?>">
    <span>São Paulo, <?= $this->utils->full_date($res->date); ?></span>
    <p style="max-width:670px;"><?= $res->description; ?></P>
   </div>
  </article>
</section>

    <script type="text/javascript">
       $(document).ready(function(){
       $("#page-news").addClass("active");
       $("#page-news-mobile").addClass("active");
       });
      </script>