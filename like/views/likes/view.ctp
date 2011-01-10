<div id="like">
<? if($vote == 0):?>
<?=$ajax->link($num,'/likes/add/'.$_model.'/'.$_foreignKey, array( 'update' => 'like'));  ?>
<? else:?>
<?= $num?>
<? endif;?>
</div>