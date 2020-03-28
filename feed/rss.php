<?PHP
 
    //SET XML HEADER
    header('Content-type: text/xml');
	//header('Content-Type: application/rss+xml; charset=ISO-8859-1');
	//include_once('includes/config2.php');
	include_once('../includes/function.php');
	$dir = new DIR_LIB_2();
	$site = $dir->GetTableInfo('Domains','DomainName','DomainId',$domain_id);
	//$desc = $dir->GetTableInfo('Challenges','ChallengeDesc','ChallengeId',$domain_id);
 
    //CONSTRUCT RSS FEED HEADERS
    $output = '<rss version="2.0">';
    $output .= '<channel>';
    $output .= '<title>RSS Feed for '.$site.'</title>';
    $output .= '<description>'.$small_description.'</description>';
    $output .= '<link>'.$domainUrl.'</link>';
    $output .= '<copyright>copyright</copyright>';
 
    //BODY OF RSS FEED
  /* $output .= '<item>';
        $output .= '<title>Item Title</title>';
        $output .= '<description>Item Description</description>';
        $output .= '<link>Link to Item</link>';
        $output .= '<pubDate>Date Published</pubDate>';
   $output .= '</item> ';*/
   
   //$output .= $dir->GetRSS($domain_id);
	$output .= $dir->GetRSSUser($domain_id,'limit 0,2');
	$output .= $dir->GetRSSChallenge($domain_id,'limit 0,2');
	$output .= $dir->GetRSSApp($domain_id,'limit 0,2');
 
    //CLOSE RSS FEED
   $output .= '</channel>';
   $output .= '</rss>';
 
    //SEND COMPLETE RSS FEED TO BROWSER
    echo($output);
 
?>