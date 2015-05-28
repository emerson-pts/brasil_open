<section id="1" class="container breve">
	<? foreach ($res as $res): ?>
	<h2><a target="_blank" href="/assets/upload/programming/<?= $res->slug; ?>/<?= $res->file_name; ?>"><?= $res->title; ?></a></h2>
	<? endforeach; ?>

</section>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#page-programing").addClass("active");
			$("#page-programing-mobile").addClass("active");
		});
	</script>