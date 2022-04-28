<header>

	<?php

	// if the logo is uploaded show the logo

	if ($site->logo()) {
		echo '<a href="'.Theme::siteUrl().'"><img src="'.$site->logo().'" alt="'.$site->title().'"></a>';
	} else {

	// if not display site title

 		echo '<h1><a href="'.Theme::siteUrl().'">'.$site->title().'</a></h1>';
	}


	// main navigation

	echo '<nav>';
		echo '<ul>';

	// categories

		$items = getCategories();
		foreach ($items as $category) {
			if (count($category->pages())>0) {
				echo '<li><a href="'. $category->permalink().'">'.$category->name().'</a></li>';
			}
		}

	// pages

		foreach ($staticContent as $staticPage) {
			if (!$staticPage->isChild()) {
				echo'<li><a href="'.$staticPage->permalink().'">'.$staticPage->title().'</a></li>';
			}
		}

		echo '</ul>';
	echo '</nav>';
?>

</header>

<hr/>
