<?php
$connect = mysqli_connect("localhost", "root", "");
mysqli_select_db($connect, "posts");

//Getting autocomplete tags
$autocompleteQuery = "SELECT postTitle FROM posts WHERE 1";
$autocompleteQueryResult = mysqli_query($connect, $autocompleteQuery) or die("no query");

$autocompleteQueryResult_array = array();

echo "
			<script>
			var searchAutocomplete = [";

while ($autocompleteQueryRow = mysqli_fetch_assoc($autocompleteQueryResult)) {
	echo '"' . $autocompleteQueryRow['postTitle'] . '",';
}

echo '
			"Programing", "Animation", "Robotics", "Other"];
			</script>';
?>
<div id="topBar" id="blogSiteOptions">
	<div id="topBarTitle">
		<a style="color: #000000; text-decoration: none;" href="http://www.noahhuppert.com/index.php"><strong style="color: #000000;text-decoration: none;">Noah Huppert</strong></a>
	</div>
	<div id="topBarMenu">
		<div class='topBarSite' id="topBarBlogOptions">
			<div class="topBarsiteTitle" id="portfolioSite">
				<strong><a href='http://www.noahhuppert.com/portfolio/index.php' style="color: #000000;text-decoration: none;">Portfolio</a></strong>
			</div>
			<a href="archive.php?catagory=programming" class="topBarMenuOption topMenuOptionPortfolio"> Programing&nbsp; </a>
			<a href="archive.php?catagory=animation" class="topBarMenuOption topMenuOptionPortfolio"> Animation&nbsp; </a>
			<a href="archive.php?catagory=robotics" class="topBarMenuOption topMenuOptionPortfolio"> Robotics&nbsp; </a>
			<a href="archive.php?catagory=other" class="topBarMenuOption topMenuOptionPortfolio"> Other&nbsp; </a>
			<a href="archive.php?catagory=archive" class="topBarMenuOption topMenuOptionPortfolio" ><strong>Archive</strong></a>&nbsp;

			<!--<form  class="topBarMenuOption" action="search.php" method="post">
			<img id="searchBar" src="search-icon.png">
			<input id="searchEntry" name="search" placeholder="Search"/>
			</form>-->
		</div>
	</div>

	<div class='topBarSite' id="topBarBlogOptions" style="float: right;">
		<div class="topBarsiteTitle" id="blogSite">
			<strong><a href='http://www.noahhuppert.com/index.php' style="color: #000000;text-decoration: none;">Blog</a></strong>
		</div>
		<a href="archive.php?catagory=programming" class="topBarMenuOption topMenuOptionBlog"> Programing&nbsp; </a>
		<a href="archive.php?catagory=animation" class="topBarMenuOption topMenuOptionBlog"> Animation&nbsp; </a>
		<a href="archive.php?catagory=robotics" class="topBarMenuOption topMenuOptionBlog"> Robotics&nbsp; </a>
		<a href="archive.php?catagory=other" class="topBarMenuOption topMenuOptionBlog"> Other&nbsp; </a>
		<a href="archive.php?catagory=archive" class="topBarMenuOption topMenuOptionBlog" ><strong>Archive</strong></a>&nbsp;

		<!--<form  class="topBarMenuOption" action="search.php" method="post">
		<img id="searchBar" src="search-icon.png">
		<input id="searchEntry" name="search" placeholder="Search"/>
		</form>-->
	</div>
</div>
</div>
<script>
	//Search Box
	/*$('#searchEntry').hide();
	 $('#searchEntry').autocomplete({
	 source : searchAutocomplete
	 });
	 $('#searchBar').click(function() {
	 $('#searchEntry').toggle('slow');
	 $('#searchEntry').focus();
	 });*/
	$('.topMenuOptionBlog').hide();
	$('#blogSite').click(function() {
		$('.topMenuOptionBlog').toggle();
		$('.topMenuOptionPortfolio').toggle();
	});
	$('#portfolioSite').click(function() {
		$('.topMenuOptionPortfolio').toggle();
		$('.topMenuOptionBlog').toggle();
	});
 
</script>