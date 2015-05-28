<?php
global $sd_data;
	//Twitter OAUTH
		$username = $sd_data['twitter_username'];
		$consumer_key = $sd_data['consumer_key'];
		$consumer_secret = $sd_data['consumer_secret'];
		$access_token = $sd_data['access_token'];
		$access_token_secret = $sd_data['access_token_secret'];
		$tweetscount = '3';
		
		if($username && $consumer_key && $consumer_secret && $access_token && $access_token_secret && $tweetscount) { 
		$transName = 'sd_twitter_feed';
		$cacheTime = 10;
		delete_transient($transName);
		if(false === ($twitterData = get_transient($transName))) {
		     // require the twitter auth class
		     @require_once 'twitteroauth/twitteroauth.php';
		     $twitterConnection = new TwitterOAuth(
							$consumer_key,	// Consumer Key
							$consumer_secret,   	// Consumer secret
							$access_token,       // Access token
							$access_token_secret    	// Access token secret
							);
		    $twitterData = $twitterConnection->get(
							  'statuses/user_timeline',
							  array(
							    'screen_name'     => $username,
							    'count'           => $tweetscount,
							    'exclude_replies' => false
							  )
							);
			if($twitterConnection->http_code != 200)
		     {
		          $twitterData = get_transient($transName);
		     }
		}
		// Save our new transient.
		     set_transient($transName, $twitterData, 60 * $cacheTime);
		};
		$twitter = get_transient($transName);
	function ago($time)
	{
	   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	   $lengths = array("60","60","24","7","4.35","12","10");

	   $now = time();

	       $difference     = $now - $time;
	       $tense         = "ago";

	   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
	       $difference /= $lengths[$j];
	   }

	   $difference = round($difference);

	   if($difference != 1) {
	       $periods[$j].= "s";
	   }

	   return "$difference $periods[$j] ago ";
	}	
?>

<div class="twitter-container">
	<div class="container">
		<div class="row">
			<div class="twitter-feed">
				<?php foreach($twitter as $tweet): ?>
				<div class="tweet sd-droid-serif"> <em>
					<?php
				$latestTweet = $tweet->text;
				$latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '&nbsp;<a href="http://$1" target="_blank">http://$1</a>&nbsp;', $latestTweet);
				$latestTweet = preg_replace('/https:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '&nbsp;<a href="https://$1" target="_blank">https://$1</a>&nbsp;', $latestTweet);
				$latestTweet = preg_replace('/@([a-z0-9_]+)/i', '&nbsp;<a href="http://twitter.com/$1" target="_blank">@$1</a>&nbsp;', $latestTweet);
				echo $latestTweet;
			?>
					<?php
				$twitterTime = strtotime($tweet->created_at);
				$timeAgo = ago($twitterTime);
			?>
					</em> <br />
					<a class="time-ago" href="http://twitter.com/<?php echo $tweet->user->screen_name; ?>/statuses/<?php echo $tweet->id_str; ?>" ><?php echo $timeAgo; ?></a> </div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
