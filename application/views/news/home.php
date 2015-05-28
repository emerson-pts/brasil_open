<section id="1" class="container noticias">

  <article class="">
  
  <header class="title"><p>NOTÍCIAS</p></header>
  
  <ul class="list-inline">
          
          <? foreach ($res as $res): ?>
           <li class="col-sm-4 box-content">
            <img src="/assets/upload/news/<?= $res->slug; ?>/<?= $this->utils->thumbnail($res->file_name); ?>" alt="<?= $res->title; ?>">
            <div class="box-txt">
                <span class="date"><?= $this->utils->date($res->date); ?></span>
                <h3 class="txt-1"><?= $res->title; ?></h3>
                <h4 class="txt-2"><?= $res->call; ?></h4>
                <button class="btn view-more" onClick="parent.location='<?= site_url('noticias/' . $res->slug); ?>#1'">veja mais</button>
            </div>
          </li>
           <? endforeach; ?>

         </ul>

         <?= $this->pagination->create_links(); ?>
  </article>
</section>

				<script type="text/javascript">
			 $(document).ready(function(){
			 $("#page-news").addClass("active");
			 $("#page-news-mobile").addClass("active");
			 });
	    </script>
