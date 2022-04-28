<hr/>

<footer>

<?php

	// logo

	if ($site->logo()) {
		echo '<a href="'.Theme::siteUrl().'"><img src="'.$site->logo().'" alt="'.$site->title().'"></a>';
	} else {

	// site tile and link to the home page

	echo '<h3><a href="'.$site->url().'">'.$site->title().'</a></h3>';
	}

	// link to social media accounts

	echo '<nav>';
		echo '<ul>';
		foreach (Theme::socialNetworks() as $key=>$label) {
			echo'<li><a href="'.$site->{$key}().'" target="_blank">'.$label.'</a></li>';
		}
		echo '</ul>';
	echo '</nav>';

 // slogan and copyright notice

	echo '<p>'.$site->slogan().' '.$site->footer().'</p>';

?>

</footer>

<?php

	// theme javascript file

    echo Theme::js('js/engine.js');
?>
