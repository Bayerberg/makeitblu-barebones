<?php

// no content

if (empty($content)){
	echo '<section id="no-content">';
		echo '<h2>'.$language->p('No pages found').'</h2>';
	echo '</section>';
}

	// hero section - displayed only on landing page

if (($WHERE_AM_I == 'home') && (Paginator::currentPage() == 1)) {

	echo '<section id="hero">';

	// site slogan

		echo '<h2>'.$site->slogan().'</h2>';

		// site description

		if ($site->description()) {
			echo '<h3>'.$site->description().'</h3>';
		}

		echo '</section>';

		echo '<hr/>';
}

 // posts

echo '<section id="content"> ';

foreach ($content as $page) {

	echo '<div class="blog-post">';

	// plugins

	Theme::plugins('pageBegin');

	// post title

	echo'<h2><a href="'.$page->permalink().'">'.$page->title().'</a></h2>';

	// cover image thumbnail

	if ($page->coverImage()) {
		echo'<a href="'.$page->permalink().'"><img alt="'.$page->title().'" src="'.$page->thumbCoverImage().'" class="scale-me" /></a>';
	}

	// meta details

	echo '<p class="meta">';

	// author photo

	echo'<img class="avatar" src="'.($page->user('profilePicture')?$page->user('profilePicture'):Theme::src('img/no-user-image.png')).'" height="40" width="40" alt="'.($page->user('nickname')).'">';

	// post date

	if ($page->dateModified()) {
		echo'<time itemprop="dateModified" datetime="'.$page->dateModified().'">'.date($site->dateFormat(), strtotime($page->dateModified())).'</time> ';
	} else {
		echo '<time itemprop="datePublished" datetime="'.$page->dateRaw().'">'.$page->date().'<time> ';
	}

	// post category

  if ($page->category()) { echo '<span>'.$L->get('Category') . ': <a href="'.DOMAIN_CATEGORIES.$page->categoryKey().'">'.$page->category().'</a></span>'; };

	// reading time

	echo '<span>'.$L->get('reading time') . ': ' .$page->readingTime().'</span>';

	echo '</p>';

	// description
	// if there is a description display its contents
	// if not truncate the content of the post with read more function - see init.php file

	if ($page->description()) {
		echo '<p>'.$page->description().'</p>';
	} else {
		echo '<p>'.read_more($page->contentRaw()).'</p>';
	}

	echo'<p><a href="'.$page->permalink().'">'.$L->get('Read more').' &raquo;</a></p>';

	Theme::plugins('pageEnd');
	echo '</div>';
	}
echo '</section> ';

// paginator

if (Paginator::numberOfPages()>1) {
echo '<section id="pagination">';

	if (Paginator::showPrev()) {
		echo '&laquo; <a href="'.Paginator::previousPageUrl().'" tabindex="-1">'.$L->get('Previous').'</a> ';
	}
	if (Paginator::showNext()){
		echo ' <a href="'.Paginator::nextPageUrl().'">'.$L->get('Next').'</a> &raquo;';
	}

echo '</section>';
}
?>
