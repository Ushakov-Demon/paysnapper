<?php
$contacts = $section['cus_contacts'];

if ( empty( $contacts ) ) {
	return;
}

$section_id = $section['cus_section_id'] ?: uniqid();
?>
<section class="contacts-section" id="<?php echo $section_id?>">
	<div class="container d-flex justify-content-center flex-wrap">
		<h2><?php echo $section['cus_title']?></h2>

		<?php
		if ( ! empty( $section['cus_desc'] ) ) :
			?>
			<p class="main"><?php echo $section['cus_desc']?></p>
			<?php
		endif;
		?>

		<div class="col-12 d-flex justify-content-center flex-wrap messengers">
			<?php
			foreach ( $contacts as $contact ) :
				?>
				<a href="<?php echo $contact['cus_item_href']?>" target="_blank"><?php echo $contact['cus_item_label']?></a>
				<?php
			endforeach;
			?>
		</div>
	</div>
</section>