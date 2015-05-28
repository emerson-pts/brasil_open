<section id="1" class="container gallery-open">
<header class="title">
    <span class="col-sm-3 txt">Galeria</span><a href="javascript:window.history.go(-1)"><i class="fa fa-mail-reply"></i>Voltar</a>
</header>

<article id="slider1">
<div class="viewport">
         <ul class="list-inline overview">
            <? foreach ($res as $res): ?>
          <li class="col-sm-3 box-content">
            <a href="#" data-toggle="modal" data-target="#lightbox<?= $res->gallery_id; ?>">
             <img src="/assets/upload/gallery/<?= $res->slug; ?>/<?= $res->file_name; ?>" alt="<?= $res->title; ?>">
            </a>
            <div class="box-txt">
                <span class="name"><?= $res->title; ?></span>
            </div>
          </li>
        <? endforeach; ?>
         </ul>
         
</div>
 <a class="buttons prev" href="#"><i class="fa fa-angle-left"></i></a>
 <a class="buttons next" href="#"><i class="fa fa-angle-right"></i></a>


 
<? foreach ($modal as $modal): ?>
<div id="lightbox<?= $modal->gallery_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <img src="/assets/upload/gallery/<?= $modal->slug; ?>/<?= $modal->file_name; ?>">
        <div class="lightbox-caption"><p></p></div>
    </div>
</div>
<? endforeach; ?>

</article>
</section>


        <script type="text/javascript">
             $(document).ready(function(){
             $("#page-gallery").addClass("active");
             $("#page-gallery-mobile").addClass("active");
             $('#slider1').tinycarousel();
             });
             
        </script>