<?php
header("Content-type: text/xml");
echo'<?xml version=\'1.0\' encoding=\'UTF-8\'?>';
echo'   <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
?>
<url>
       <loc><?php echo BASE_URL?></loc>
       <lastmod>2013-09-16T07:13:36+00:00</lastmod>
       <changefreq>daily</changefreq>
       <priority>1.0000</priority>
  </url>
   <url>
       <loc><?php echo BASE_URL?>home</loc>
       <lastmod>2013-09-16T07:13:36+00:00</lastmod>
       <changefreq>daily</changefreq>
       <priority>0.8000</priority>
  </url>
  
  <url>
       <loc><?php echo BASE_URL?>home/about</loc>
       <lastmod>2013-09-16T07:13:36+00:00</lastmod>
       <changefreq>daily</changefreq>
       <priority>0.8000</priority>
  </url>
  <url>
       <loc><?php echo BASE_URL?>home/contact</loc>
       <lastmod>2013-09-16T07:13:36+00:00</lastmod>
       <changefreq>daily</changefreq>
       <priority>0.8000</priority>
  </url>
  <url>
       <loc><?php echo BASE_URL?>home/howtosponsor</loc>
       <lastmod>2013-09-16T07:13:36+00:00</lastmod>
       <changefreq>daily</changefreq>
       <priority>0.8000</priority>
  </url>
  <url>
       <loc><?php echo BASE_URL?>home/staffing</loc>
       <lastmod>2013-09-16T07:13:36+00:00</lastmod>
       <changefreq>daily</changefreq>
       <priority>0.8000</priority>
  </url>

  

</urlset>
