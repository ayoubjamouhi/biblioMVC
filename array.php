<?php

class Post{
	
	public $title;

	public $published;

	public function __construct($title,$published)

	{

		$this->title = $title;

		$this->published = $published;
	}


}

$posts = [
	new Post('First Post',true),
	new Post('Second Post',true),
	new Post('Third post',true),
	new Post('Fourth post',false),
];
//var_dump($posts);

$unpublishedPost = array_filter($posts,function ($post)

	{

		return $post->published === false;
	});

//echo "<br>Break<br>";

//var_dump($unpublishedPost);

$titles = array_map(function($post){

	return $post->title;

}, $posts);

//var_dump($titles);

$titles1 = array_column($posts, 'title');

//var_dump($titles1);

foreach ($posts as $index => $post) 

{

	$posts[$index] = (array)$post;
}

var_dump($posts);