<section id="1" class="container gallery">
<header class="title">
    <span class="col-sm-3 txt">Galeria</span>
</header>
<article class="col-sm-12">
<div class="viewport">
    <ul class="list-inline">
        <? for ($i = 0; $i <count($res) ; $i++): ?>
        <li class="col-sm-3 box-content">
            <a href="<?= site_url('galeria/' . $res[$i]['slug']); ?>#1"><img src="assets/upload/gallery/<?= $res[$i]['slug'] ?>/<?= $this->utils->thumbnail($res[$i]['file_name']); ?>" alt="<?= $res[$i]['title'] ?>"></a>
            <div class="box-txt">
                <span class="name"><?= $res[$i]['title']; ?></span>
                <p><?= $this->utils->get_year($res[$i]['date']); ?></p>
            </div>
        </li>
        <? endfor; ?>
    </ul>
</div>
</article>
</section>


		<script type="text/javascript">
			 $(document).ready(function(){
			 $("#page-gallery").addClass("active");
			 $("#page-gallery-mobile").addClass("active");
			 });
	    </script>