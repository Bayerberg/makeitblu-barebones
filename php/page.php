<section id="page-post">

	<?php

	// plugins

	Theme::plugins('pageBegin');

	// title

	echo '<h2>'.$page->title().'</h2>';

	// description

	if ($page->description()){
		echo '<hr/>';
		echo '<h3>'.$page->description().'</h3>';
	}

	// submenu - related pages

 	if ($page->hasChildren()) {
		echo '<hr/><nav><ul>';
		$children = $page->children();
		foreach ($children as $child) {
			echo '<li>&raquo; <a href="'.$child->permalink().'">'.$child->title().'</a></li>';
	 	}
		echo '</ul></nav><hr/>';
 	}

 	if ($page->isChild()) {
	 	echo '<hr/><nav><ul>';
	 	echo '<li>&laquo; <a href="'.$page->parentMethod('permalink').'">'.$page->parentMethod('title').'</a></li>';
	 	echo '</ul></nav><hr/>';
 	}

	// cover image

 	if ($page->coverImage()){
		echo '<img src="'.$page->coverImage().'" alt="'.$page->title().'" class="scale-me"/>';
 	}

	// content

	echo $page->content();

	// plugins

 	Theme::plugins('pageEnd');

	?>

</section>
