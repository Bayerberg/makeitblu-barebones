<section id="blog-post">

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

	// post meta

	echo '<p class="meta">';

	// post date

	if ($page->dateModified()) {
		echo'<time itemprop="dateModified" datetime="'.$page->dateModified().'">'.date($site->dateFormat(), strtotime($page->dateModified())).'</time> ';
	} else {
		echo '<time itemprop="datePublished" datetime="'.$page->dateRaw().'">'.$page->date().'<time> ';
	}

	//post author

	if (($page->user('firstName')) || ($page->user('lastName')) ) {
		echo'<span>'.$L->get('Author') . ': ';
		echo $page->user('firstName').' ';
		echo $page->user('lastName');
		echo' </span>';
	}
	else{
		echo '<span>'.$L->get('Author') . ': '.($page->user('nickname')).'</span>';
	}

	// post category

	if ($page->category()) { echo '<span>'.$L->get('Category') . ': <a href="'.DOMAIN_CATEGORIES.$page->categoryKey().'">'.$page->category().'</a></span>'; };

	//post tags

	if ($page->tags(true)) {
		echo'<span>'.$L->get('Tags') . ':';
		foreach ($page->tags(true) as $tagKey=>$tagName) {
			echo ' <a href="'.DOMAIN_TAGS.$tagKey.'" rel="tag" >'.$tagName.'</a>';
		}
		echo'</span>';
	}

	echo '</p>';

	// post cover image

	if ($page->coverImage()) {
		echo '<picture><img src="'.$page->coverImage().'" alt="'.$page->title().'" class="scale-me"/><picture>';
	}

	// content

	echo $page->content();

	//plugins

	Theme::plugins('pageEnd');
?>

</section>
