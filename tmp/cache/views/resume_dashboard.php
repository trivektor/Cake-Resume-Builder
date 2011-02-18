<!--cachetime:1292005242--><?php
			App::import('Controller', 'Dashboard');
			$controller =& new DashboardController();
				$controller->plugin = $this->plugin = '';
				$controller->helpers = $this->helpers = unserialize('a:8:{i:0;s:8:"Markdown";i:1;s:5:"Cache";i:2;s:7:"Session";i:3;s:4:"Html";i:4;s:4:"Form";s:16:"DebugKit.Toolbar";a:4:{s:6:"output";s:20:"DebugKit.HtmlToolbar";s:8:"cacheKey";s:45:"toolbar_cache1bbebe4c2167f72cbfc12da806b0ee45";s:11:"cacheConfig";s:9:"debug_kit";s:11:"forceEnable";b:0;}i:5;s:6:"Number";i:6;s:20:"DebugKit.SimpleGraph";}');
				$controller->base = $this->base = '/resume';
				$controller->layout = $this->layout = 'default';
				$controller->webroot = $this->webroot = '/resume/';
				$controller->here = $this->here = '/resume/dashboard';
				$controller->params = $this->params = unserialize(stripslashes('a:8:{s:10:\"controller\";s:9:\"dashboard\";s:5:\"named\";a:0:{}s:4:\"pass\";a:0:{}s:6:\"action\";s:5:\"index\";s:6:\"plugin\";N;s:4:\"form\";a:0:{}s:3:\"url\";a:1:{s:3:\"url\";s:9:\"dashboard\";}s:6:\"models\";a:11:{i:0;s:6:\"Resume\";i:1;s:7:\"Message\";i:2;s:7:\"Profile\";i:3;s:8:\"Activity\";i:4;s:4:\"User\";i:5;s:7:\"Profile\";i:6;s:9:\"ResumeTip\";i:7;s:11:\"JobCategory\";i:8;s:3:\"Job\";i:9;s:11:\"FavoriteJob\";i:10;s:4:\"Blog\";}}'));
				$controller->action = $this->action = unserialize('s:5:"index";');
				$controller->data = $this->data = unserialize(stripslashes('N;'));
				$controller->theme = $this->theme = '';
				Router::setRequestInfo(array($this->params, array('base' => $this->base, 'webroot' => $this->webroot)));
				$loadedHelpers = array();
				$loadedHelpers = $this->_loadHelpers($loadedHelpers, $this->helpers);
				foreach (array_keys($loadedHelpers) as $helper) {
					$camelBackedHelper = Inflector::variable($helper);
					${$camelBackedHelper} =& $loadedHelpers[$helper];
					$this->loaded[$camelBackedHelper] =& ${$camelBackedHelper};
					$this->{$helper} =& $loadedHelpers[$helper];
				}
		?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<title>Resume Builder - Welcome Tri!</title>
	
	<link href="/resume/favicon.ico" type="image/x-icon" rel="icon" /><link href="/resume/favicon.ico" type="image/x-icon" rel="shortcut icon" /><link rel="stylesheet" type="text/css" href="/resume/css/master.css" />
	<script type="text/javascript" src="/resume/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/resume/js/jquery-ui-1.8.5.custom.min.js"></script>
	<script type="text/javascript" src="/resume/js/master.js"></script>
</head>
<body id="dashboard">
	<div id="container">
		
		<!-- Starting to render - header -->

<div id="header_wrapper">
	
	<div id="header">
	
		<h1><a href="/resume/home">Killer Resume Builder</a></h1>
	
				<ul id="top_panel">
			
				<!-- User is logged in -->		
				<li><a href="/resume/users/logout">Logout</a></li>

				<li><a href="/resume/account_settings">Account Settings</a></li>

				<li><a href="/resume/profile/trivektor">Profile</a>
				<li><a href="/resume/profile/trivektor">Hi trivektor!</a></li> 
			
		</ul>
		<div class="clearfloat"></div>
		
				
				
		<ul class="main_nav">
			<li><a href="/resume/dashboard" class="home">Home</a></li>
			<li><a class="blog" href="/resume/blog">Blog</a></li>
			<li><a class="tour" href="#">Tour</a></li>
			<li><a class="help" href="#">Help</a></li>
			<li><a class="feedback" href="#">Feedback</a></li>
		</ul>
		
	</div>
	
</div>
<!-- Finished - header -->
		
		<!-- Starting to render - main_nav -->

<!-- Finished - main_nav -->
		
		<div id="content">
			
			
			
<!-- Thoughtbox starts -->
<h2 id="thoughtbox_header">
	<img src="/resume/img/main/shareThoughtHeader.png" alt="Share your thought" /></h2>
<div id="thoughtbox_wrapper" class="blue_region">
	<img src="/resume/userphoto/user_2421223370_abdfac0fcf_b.jpg" class="user_image" alt="" />	<div id="thoughtbox">
		<div id="thoughtbox_left">
			<div id="thoughtbox_right">
				<input type="text" id="thoughtbox_message" rel="Type your thought here..." value="Type your thought here..." />
			</div>
		</div>
		<img src="/resume/img/main/gobutton.png" id="share_thought" alt="" />	</div>
	<div class="clearfloat"></div>
	<div id="thoughts_chars_count_wrapper"><span id="thoughts_chars_count">140</span> characters left</div>
	<div class="clearfloat"></div>
</div>
<!-- Thoughtbox ends -->

<div class="clearfloat"></div>

<!-- Left col starts -->
<div id="dashboard_left_col">

	<!-- Resumes list starts -->
	
		<div id="your_resumes" class="blue_region">
	
			<p>You have 2 resumes</p>
	
			<ul id="resumes_list" class="resume_list">
									<li>
						<a href="/resume/resumes/edit/2" class="resume_title">Tri Vuong&#039;s resume</a><a href="/resume/resumes/delete/2" class="delete" title="Delete">Delete</a><a href="/resume/resumes/view/trivuong" class="view_live" title="View" target="_blank">View Live</a><a href="/resume/resumes/edit/2" class="edit" title="Edit">Tri Vuong&#039;s resume</a><a href="/resume/resumes/analytic/2" class="analytic" title="Analytics">Tri Vuong&#039;s resume</a>					</li> 
									<li>
						<a href="/resume/resumes/edit/1" class="resume_title">Vuong Tri&#039;s resume</a><a href="/resume/resumes/delete/1" class="delete" title="Delete">Delete</a><a href="/resume/resumes/view/trivektor" class="view_live" title="View" target="_blank">View Live</a><a href="/resume/resumes/edit/1" class="edit" title="Edit">Vuong Tri&#039;s resume</a><a href="/resume/resumes/analytic/1" class="analytic" title="Analytics">Vuong Tri&#039;s resume</a>					</li> 
							</ul>
			<a href="/resume/create"><img src="/resume/img/main/createResumeButton.png" id="create_resume_btn" alt="Create A Resume" /></a>
		</div>
	
	<!-- Resumes list ends -->

	<!-- What's going on starts -->
			<h2 id="whats_going_on_header"><img src="/resume/img/main/whatsGoingOnHeader.png" alt="What&#039;s going on" /></h2>

		<div id="dashboard_activity_feed" class="blue_region">
	
					<div class="activity_feed_row">
				<img src="/resume/img/resume/male.png" class="user_image" alt="" />				<div class="activity_feed_details">
					<a href="/resume/profile/jobseeker">jobseeker</a> likes your resume <a href="/resume/resumes/view/trivektor">Vuong Tri&#039;s resume</a>					<p class="activity_feed_stamp">December 06, 2010</p>
				</div>
				<img src="/resume/img/Basic_set_PNG/delete_16.png" class="hide_activity_feed_details" title="Alright! I got it" rel="1" alt="" />			</div>
		
							<div class="activity_feed_row">
				<img src="/resume/img/resume/male.png" class="user_image" alt="" />				<div class="activity_feed_details">
					<a href="/resume/profile/batman1984">batman1984</a> likes your resume <a href="/resume/resumes/view/trivektor">Vuong Tri&#039;s resume</a>					<p class="activity_feed_stamp">December 06, 2010</p>
				</div>
				<img src="/resume/img/Basic_set_PNG/delete_16.png" class="hide_activity_feed_details" title="Alright! I got it" rel="2" alt="" />			</div>
		
					
		</div>
		<!-- What's going on ends -->

	<!-- Your favorites jobs starts -->
	<h2><img src="/resume/img/main/yourFavJobsHeader.png" alt="Your Favorites Jobs" /></h2>
	<div id="your_favorites_jobs" class="blue_region">
					<ul id="fav_jobs_list">
				<!-- Starting to render - job_item -->
<li class="job_item">
	<h3><a href="/resume/jobs/view/company:mailout-interactive/slug:software-developer">Software Developer </a></h3>
	<p>at Mailout Interactive - <span class="activity_feed_stamp">December 10, 2010</span></p>
	<img src="/resume/img/Basic_set_PNG/heart_16.png" class="fav_job" title="This is your favorite job" alt="" /><img src="/resume/img/Basic_set_PNG/delete_16.png" class="remove_fav_job" title="Remove this job" rel="9" alt="" /></li>
<!-- Finished - job_item -->
<!-- Starting to render - job_item -->
<li class="job_item">
	<h3><a href="/resume/jobs/view/company:dpra/slug:intermidiate-web-developer">Intermediate Web Developer</a></h3>
	<p>at DPRA - <span class="activity_feed_stamp">December 09, 2010</span></p>
	<img src="/resume/img/Basic_set_PNG/heart_16.png" class="fav_job" title="This is your favorite job" alt="" /><img src="/resume/img/Basic_set_PNG/delete_16.png" class="remove_fav_job" title="Remove this job" rel="7" alt="" /></li>
<!-- Finished - job_item -->
<!-- Starting to render - job_item -->
<li class="job_item">
	<h3><a href="/resume/jobs/view/company:citeeze-dot-com/slug:senior-php-web-developer">Senior PHP web developer at Citeeze.com</a></h3>
	<p>at Citeeze.com - <span class="activity_feed_stamp">December 10, 2010</span></p>
	<img src="/resume/img/Basic_set_PNG/heart_16.png" class="fav_job" title="This is your favorite job" alt="" /><img src="/resume/img/Basic_set_PNG/delete_16.png" class="remove_fav_job" title="Remove this job" rel="8" alt="" /></li>
<!-- Finished - job_item -->
			</ul>
			</div>
	<!-- Your favorites jobs ends -->

	<!-- Other job posts starts -->
			<h2><img src="/resume/img/main/otherJobsHeader.png" alt="Other jobs" /></h2>
		<div id="other_job_posts" class="blue_region">
			<ul>
				<!-- Starting to render - job_item -->
<li class="job_item">
	<h3><a href="/resume/jobs/view/company:mailout-interactive/slug:software-developer">Software Developer </a></h3>
	<p>at Mailout Interactive - <span class="activity_feed_stamp">December 10, 2010</span></p>
	<img src="/resume/img/Basic_set_PNG/buy_16.png" class="fav_job" title="Add to favorites" rel="9" alt="" /></li>
<!-- Finished - job_item -->
<!-- Starting to render - job_item -->
<li class="job_item">
	<h3><a href="/resume/jobs/view/company:citeeze-dot-com/slug:senior-php-web-developer">Senior PHP web developer at Citeeze.com</a></h3>
	<p>at Citeeze.com - <span class="activity_feed_stamp">December 10, 2010</span></p>
	<img src="/resume/img/Basic_set_PNG/buy_16.png" class="fav_job" title="Add to favorites" rel="8" alt="" /></li>
<!-- Finished - job_item -->
<!-- Starting to render - job_item -->
<li class="job_item">
	<h3><a href="/resume/jobs/view/company:dpra/slug:intermidiate-web-developer">Intermediate Web Developer</a></h3>
	<p>at DPRA - <span class="activity_feed_stamp">December 09, 2010</span></p>
	<img src="/resume/img/Basic_set_PNG/buy_16.png" class="fav_job" title="Add to favorites" rel="7" alt="" /></li>
<!-- Finished - job_item -->
<!-- Starting to render - job_item -->
<li class="job_item">
	<h3><a href="/resume/jobs/view/company:big-bang-technology/slug:full-frontal-interface-developer">Full Frontal Interface Developer</a></h3>
	<p>at Big Bang Technology - <span class="activity_feed_stamp">December 09, 2010</span></p>
	<img src="/resume/img/Basic_set_PNG/buy_16.png" class="fav_job" title="Add to favorites" rel="6" alt="" /></li>
<!-- Finished - job_item -->
<!-- Starting to render - job_item -->
<li class="job_item">
	<h3><a href="/resume/jobs/view/company:yogen-fruz/slug:seo-specialist-senior-web-developer">SEO Specialist / Senior Web Developer</a></h3>
	<p>at Yogen Fruz - <span class="activity_feed_stamp">December 09, 2010</span></p>
	<img src="/resume/img/Basic_set_PNG/buy_16.png" class="fav_job" title="Add to favorites" rel="5" alt="" /></li>
<!-- Finished - job_item -->
			</ul>
			<a href="/resume/jobs"><img src="/resume/img/main/viewOtherJobs.png" id="view_other_jobs_btn" alt="" /></a>
		</div>
		<!-- Other job posts ends -->
	
	<!-- From our blog starts -->
		<h2><img src="/resume/img/main/fromBlogHeader.png" alt="From our blog" /></h2>
	<div id="from_our_blog" class="blue_region">
		
							<div class="white_region">
					<div class="blog_post_date">
						<div class="blog_post_month">Dec</div>
						<div class="blog_post_day">01</div>
					</div>
					<div class="latest_blog_content">
						<h3><a href="/resume/dashboard/third-blog-post">Third Blog Post</a></h3>
						<div style="margin-bottom:5px"><p>third blog post</p>
</div>
						<a href="/resume/blog/third-blog-post">read more...</a>					</div>
					<div class="clearfloat"></div>
				</div>
							<div class="white_region">
					<div class="blog_post_date">
						<div class="blog_post_month">Nov</div>
						<div class="blog_post_day">28</div>
					</div>
					<div class="latest_blog_content">
						<h3><a href="/resume/dashboard/second-blog-post">Second Blog Post</a></h3>
						<div style="margin-bottom:5px"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</div>
						<a href="/resume/blog/second-blog-post">read more...</a>					</div>
					<div class="clearfloat"></div>
				</div>
							<div class="white_region">
					<div class="blog_post_date">
						<div class="blog_post_month">Nov</div>
						<div class="blog_post_day">28</div>
					</div>
					<div class="latest_blog_content">
						<h3><a href="/resume/dashboard/first-blog-post">First Blog Post</a></h3>
						<div style="margin-bottom:5px"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</div>
						<a href="/resume/blog/first-blog-post">read more...</a>					</div>
					<div class="clearfloat"></div>
				</div>
					
	</div>
		<!-- From our blog ends -->


</div>
<!-- Left col ends -->

<!-- Right col starts -->
<div id="dashboard_right_col">
	
	<!-- Profile starts -->
	<div id="your_profile" class="blue_region">
		<div class="white_region">
			<div class="clearfloat"></div>
				<img src="/resume/userphoto/user_2421223370_abdfac0fcf_b.jpg" class="user_image" alt="" />
								<ul id="your_profile_header">
					<li id="your_profile_name">
						Tri Vuong					</li>
					<li>
						PHP developer					</li>
					<li>
						Your location is yet specified. <a href="/resume/profile/edit/1">Do it now</a>					</li>
					<li>
						Information Technology					</li>
				</ul>
				<div class="clearfloat"></div>
		</div>
	</div>
	<!-- Profile ends -->
	
	<!-- Resume Tips starts -->
	<h2 id="resume_tips_header">
		<img src="/resume/img/main/resumeTipsHeader.png" alt="Resume Tips" />	</h2>
	<div id="resume_tips" class="blue_region">
								<div class="white_region">
				<span class="resume_tip_title">Use Titles or Headings That Match The Jobs You Want</span>
				<p>With employers receiving hundreds of resumes you must make sure that your resume hooks an employer's attention within a 5-second glance. A great way to do this is to use job titles and skill headings that relate to and match the jobs you want. For example, compare the headings Roger used in his before resume to the headings used in his after resume.
Before Resume:
Accounting / Recordkeeping
Administrative
Computer Skills 	After Resume:
Management of A/R and A/P Accounts
Computerized Accounting Applications
Departmental Administration / Recordkeeping
Which set of headings are the strongest for an Accounts Payable / Receivable Manager position?

Even though Roger's title was Accounting Assistant, he actually managed over 1,000 A/R and A/P accounts. Using skill headings that market the true nature of Roger's job duties will generate him more interviews and higher salary offers.</p>
				<div class="resume_tip_credit">
											from <a href="http://www.free-resume-tips.com/10tips.html" target="_blank">http://www.free-resume-tips.com/10tips.html</a>
									</div>
			</div>
							<img src="/resume/img/main/submitResumeTip.png" alt="Submit A Resume Tip" id="submit_resume_tip" />	</div>
	<!-- Resume Tips ends -->
	

</div>

<!-- Right col ends -->

<div class="clearfloat"></div>


		</div>
		
		<!-- Starting to render - footer -->
<div id="footer">
	&copy; Killer Resume Builder, 2010. All rights reserved.
</div>
<!-- Finished - footer -->
		
	</div>
	<div id="overlay" style="display:none"></div>
	
		
	
</body>
</html>