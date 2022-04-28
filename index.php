<!DOCTYPE html>
<html lang="<?php echo Theme::lang() ?>">

<head>
<?php include(THEME_DIR_PHP.'head.php'); ?>
</head>

<body>
<?php

// plugins

Theme::plugins('siteBodyBegin');

// site header

include(THEME_DIR_PHP.'navbar.php');

// templates 

if ($WHERE_AM_I == 'page') {
	if ($page->type() == 'static'){

	// static page template

		include(THEME_DIR_PHP.'page.php');
	}	else {

		// blog post template

  	include(THEME_DIR_PHP.'post.php');
	}
} else {

	// home page template

	include(THEME_DIR_PHP.'home.php');
}

// site footer

include(THEME_DIR_PHP.'footer.php');

// plugins

Theme::plugins('siteBodyEnd');

?>
</body>

</html>
