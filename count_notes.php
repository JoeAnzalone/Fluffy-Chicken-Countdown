<?PHP

// http://thatsmoderatelyraven.tumblr.com/post/41563238114

$post_id = $_GET['post_id'];
$blog = $_GET['blog'];

$echo = $_GET['echo'];

function count_notes( $blog, $post_id ) {
	$base_url = 'http://api.tumblr.com/v2/';

	$query_data = array(
		'api_key' => 'API_KEY_GOES_HERE',
		'id' => $post_id,
	);

	$blog_domain = "$blog.tumblr.com";
	$request_url = $base_url . "blog/$blog_domain/posts/?" . http_build_query( $query_data );
	$json = file_get_contents( $request_url );

	$note_count = json_decode( $json )->response->posts[0]->note_count;

	// return 149999;
	return $note_count;
}

if ( $echo ) {
	echo count_notes( $blog, $post_id );
}