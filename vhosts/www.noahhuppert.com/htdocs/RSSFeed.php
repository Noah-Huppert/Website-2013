<?php
$connect = mysqli_connect("localhost", "root", "");
mysqli_select_db($connect, "posts");
$query = mysqli_query($connect, "SELECT * FROM `posts` ORDER BY 'postDate'");
echo '
<?xml version="1.0" encoding="ISO-8859-1" ?>
<rss version="2.0">
	<channel>
		<title>Noah Huppert</title>
    <link>www.noahhuppert.com</link>
    <description>Noah Hupperts blog and portfolio</description>';
    	while ($row = mysqli_fetch_array($query)) {
    		echo '
    		<item>
    			<title>' . $row['postTitle'] . '</title>
    			<link>viewPost.php?postKey=' . $row['postKey'] . '</link>
    			<description>' . substr($row['postContent'], 0, 250) . '</description>
    		</item>
    			';
    	}
		echo '
 </channel>
</rss>';
?>