<?PHP

// http://api.tumblr.com/v2/tagged?tag=fluffy-chicken

function get_liked_posts( $user ) {
	// http://api.tumblr.com/v2/blog/fluffychickenlikes.tumblr.com/likes?api_key=n

	$base_url = 'http://api.tumblr.com/v2/';

	$query_data = array(
		'api_key' => 'API_KEY_GOES_HERE',
	);

	$request_url = $base_url . "blog/$user.tumblr.com/likes?" . http_build_query( $query_data );
	$json = file_get_contents( $request_url );

	return json_decode( $json )->response;
}

function get_tagged_posts( $tag ) {
	$base_url = 'http://api.tumblr.com/v2/';

	$query_data = array(
		'api_key' => 'API_KEY_GOES_HERE',
		'tag' => $tag,
		// 'filter' => 'text',
	);

	$request_url = $base_url . "tagged?" . http_build_query( $query_data );
	$json = file_get_contents( $request_url );

	return json_decode( $json )->response;
}

function parse_posts( $posts ) {
	$html = '';
	foreach ($posts as $i => $post) {
		$url = $post->post_url;
		$type = $post->type;

		$html .= '<div data-post-id="'. $post->id .'" class="post '. $type .'">';

		$html .= '<a class="blog-name" target="_blank" rel="external" href="'.$post->post_url.'">'. $post->blog_name .'</a>';
		// $html .=  '<a rel="external" target="_blank" href="'. $url .'">'. "$url ($type)" .'</a>';

		if ( $post->title ) {

			if ( $post->url ) {
				$html .= '<a target="_blank" rel="external" href="'. $post->url .'">';
			}

			$html .= '<div class="title">';
			$html .= $post->title;
			$html .= '</div>';

			if ( $post->url ) {
				$html .= '</a>';
			}

		}

		if ( $post->question ) {
			$html .= '<div class="question">';
			$html .= $post->question;
			$html .= '</div>';
		}

		if ( $post->answer ) {
			$html .= '<div class="answer">';
			$html .= $post->answer;
			$html .= '</div>';
		}

		if ( $post->body ) {
			$html .= '<div class="body">';
			$html .= $post->body;
			$html .= '</div>';
		}

		if ( $post->text ) {
			$html .= '<div class="text">';
			$html .= $post->text;
			$html .= '</div>';
		}
		if ( $post->source ) {
			$html .= '<div class="source">';
			$html .= $post->source;
			$html .= '</div>';
		}

		if ( $post->photos ) {
			$html .= '<div class="photos">';

			foreach ($post->photos as $i => $photo) {
				$html .= '<div class="photo">';
					$html .= '<img src="'. $photo->alt_sizes[0]->url .'" alt="" />';

					$html .= '<div class="caption">';
					$html .= $photo->caption;
					$html .= '</div>';

				$html .= '</div>';
			}

			$html .= '</div>';
		}

		if ( $post->player ) {
			$html .= '<div class="player">';
			$html .= $post->player[0]->embed_code;
			$html .= '</div>';
		}

		if ( $post->caption ) {
			$html .= '<div class="caption">';
			$html .= $post->caption;
			$html .= '</div>';
		}


		// $html .= $post->type;

		$html .= '</div>';

	}

	return $html;
}

/*if ( isset( $_GET['debug'] ) ) {
	print_r( get_tagged_posts( $_GET['tag'] ) );
}*/
