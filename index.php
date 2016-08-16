<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
	<meta charset="UTF-8">
	<title>Peyton's Fluffy Chicken Countdown</title>
	<meta name="viewport" content="width=device-width" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
	<link rel="stylesheet" href="progress-polyfill.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
<?PHP
include 'count_notes.php';
$note_count = count_notes( 'thatsmoderatelyraven', 41563238114 );
$total = 500000;
$percentage = $note_count/$total*100;

$to_go = $total-$note_count;
?>

	<h1>Peyton's Fluffy Chicken Countdown</h1>
	<!-- <h2 class="subtitle show-js">Updated every five seconds</h2>
	<h2 class="subtitle show-no-js">Refresh to update</h2> -->

	<p>We did it! Peyton's original post gathered</p>
	<p><span class="count"><?PHP echo number_format($note_count); ?></span> out of <?PHP echo number_format($total); ?> notes!</p>
	<!-- <p>That's <span class="percentage"><?PHP echo number_format($percentage, 2); ?>%</span> of the way there!</p>
	<p>Only <span class="to-go"><?PHP echo number_format($to_go); ?></span> to go!</p> -->
	<p>That's <span class="to-go"><?PHP echo number_format( abs( $to_go) ); ?></span> more than necessary!</p>
	<progress max="100" value="<?PHP echo $percentage; ?>"><?PHP echo $note_count; ?></progress>

	<div class="tagged">
		<h2>What people are saying about the fluffy chicken</h2>
		<h3>(via <a target="_blank" rel="external" href="http://tumblr.com/tagged/fluffy-chicken">#fluffy chicken</a>)</h3>

		<div class="posts">
			<?PHP
			include( 'tagged_posts.php' );
			echo parse_posts( get_tagged_posts( 'fluffy chicken' ) );
			?>
		</div>
	</div>

	<a class="reblog" target="_blank" rel="external" href="http://thatsmoderatelyraven.tumblr.com/post/41563238114">
	<p>Reblog to show your support!</p>
	<img src="img/post.png" alt="Fluffy Chicken" />
	</a>

	<footer>Created by <a target="_blank" rel="external" href="http://JoeAnzalone.com">Joe Anzalone</a></footer>

	<script type="text/javascript" src="js/progress-polyfill.min.js"></script>
	<!-- <script type="text/javascript" src="js/main.js"></script> -->
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24988957-18']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>