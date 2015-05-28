<section id="1" class="container breve">
	<? foreach ($res as $res): ?>
	<?
		if($res->type == 0){
			$type = 'Qualifying';
		} else if($res->type == 1){
			$type = 'Simples';
		} else if($res->type == 2){
			$type = 'Duplas';
		}
	?> 
		<a href="/assets/upload/key/<?= $res->slug; ?>/<?= $res->file_name; ?>" target="_blank"><h3><?= $type; ?></h3></a>	
	<? endforeach; ?>
</section>


<script type="text/javascript">
	$(document).ready(function(){
		 $("#page-keys").addClass("active");
		 $("#page-keys-mobile").addClass("active");
	 });
</script>