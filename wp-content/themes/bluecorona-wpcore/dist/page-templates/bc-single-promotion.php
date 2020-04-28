<?php
/**
 * Template Name: Single Promotions Template
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="icon" href="<?php echo bc_get_theme_mod('bc_theme_options', 'bc_favicon_upload',false, get_template_directory_uri().'/img/favicon.ico'); ?>">

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
    <script data-search-pseudo-elements defer src="https://use.fontawesome.com/releases/latest/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
</head>
<body>
<style type="text/css">@media print{.no-print, .no-print *{display: none !important;}}</style>
<script type="text/javascript">function printPreview(){window.print();}</script>
	<main>
		<div class="container-fluid" >
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 mt-2 px-5">
						<div class="row text-center">
							<div class="col-sm-12 p-2 text-center">
								<div class="bc_color_secondary bc_color_primary_bg p-3 mb-3">
									<div class="py-4 px-3 pt-0 border-white bc_coupon_container">
										<span class="pb-3  bc_font_alt_1 bc_text_36 d-block">Coupon 1</span>
										<span class="bc_text_30 d-block my-2">$50 OFF</span>
										<span class="mt-3 bc_text_16">expires 00/00/00</span>
									</div>
								</div>
							</div>
						</div>
						<div class="no-print">
							<button class="btn bc_color_tertiary_bg p-3 mr-2 mb-2" onclick="printPreview()">
							<span class=""><i class="fa fa-print" style="font-size:1em" aria-hidden="true"></i>&nbsp;Print</span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>
