<?php

/*
* Shortcode: jkc_contributor
* @return: Single Contributor HTML
*/
function render_jkc_contributor($atts) {
	extract(shortcode_atts(array(
		'id' => null
	), $atts));

	if(empty($id)) return;

	// get the user
	$user = get_user_by('id', $id);
	if(empty($user)) return;

	// get user social links
	$userSocialLinks = array();
	foreach(get_user_meta($id, 'userSocialLinks', true) as $social) {
		$userSocialLinks[$social->LinkType] = $social->LinkUrl;
	}

	// Show output
	$content = '';
	$content .= 
	'<div class="contributors">
		<div class="staff-item">
			<div class="row">
				<div class="col-10 columns">
					<div class="info-wrap">

						<h2><a class="list-title" href="'.get_author_posts_url('url', $id).'" title="'.$user->data->display_name.'">'.$user->data->display_name.'</a></h2>
						<div class="job-title">
							'.get_user_meta($id, 'userJobTitle', true).'
						</div>

						<div class="desc">
							 '.substr(get_user_meta($id, 'description', true), 0, 222).'
						</div>

						<div class="social">
							<a rel="nofollow" href="'.get_author_posts_url($id).'" title="'.$user->data->display_name.'">Bio</a>';
							if(!empty($userSocialLinks['Email'])) {
								$content .= '<span>|</span>
							<a rel="nofollow" target="_blank" itemprop="follows" href="mailto:'.$userSocialLinks['Email'].'" title="Send email to '.$user->data->display_name.'">Email</a>';
							}
							if(!empty($userSocialLinks['Facebook'])) {
								$content .= '<span>|</span>
							<a rel="nofollow" target="_blank" itemprop="follows" href="'.$userSocialLinks['Facebook'].'">Facebook</a>';
							}
							if(!empty($userSocialLinks['Twitter'])) {
								$content .= '<span>|</span>
							<a rel="nofollow" target="_blank" itemprop="follows" href="'.$userSocialLinks['Twitter'].'" title="Follow '.$user->data->display_name.' on Twitter">Twitter</a>';
							}
							if(!empty($userSocialLinks['Google+'])) {
								$content .= '<span>|</span>
							<a rel="nofollow" target="_blank" itemprop="follows" href="'.$userSocialLinks['Google+'].'" title="Follow '.$user->data->display_name.' on Google Plus">Google Plus</a>';
							}
							$content .= '
						</div>
					</div>
				</div>
				<div class="col-2 columns">
					<div class="img-wrap">
						<a href="/contributors/jean-jennings/" title="Jean Jennings">
						<img class="img" src="http://image.yetiplatform.com/f/2305844941765389817/jean-jennings.jpg" alt="Jean Jennings" onerror="this.src=\'/img/noimage.jpg\'" height="auto" width="113">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	';

	return $content;
}
add_shortcode('jkc_contributor', 'render_jkc_contributor');