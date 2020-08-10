
<?php

$var = \Core\Show\View::$var;
?>
<script>
$(document).ready(function(){
	<?php
	foreach($var["menu"] as $item_menu)
	{
		echo "$('#".$item_menu."').click(function(){
			$('.".$item_menu."').slideToggle(300);      
			return false;
		});";
	}
	?>
});



		jQuery(function($){
	$(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $(".a_menuLvl2"); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
		    && div.has(e.target).length === 0) { // и не по его дочерним элементам
			div.hide(); // скрываем его
		}
	});
});
</script>