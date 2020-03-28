<style>

.slide-box { width:42%; float:left; height:150px; background:#fff; padding:5px; position:relative; border:1px solid #E2E2E2;
margin:0 30px 30px 0;box-shadow: rgba(0,0,0,0.5) 0px 0px 14px;text-align:left;
} 
.slide-box a.close{ position:absolute; top:10px; right:10px; background:url(../images/close-circ.png) no-repeat; width:13px; 
height:13px;z-index:8000; cursor:pointer;}
.slide-box a:hover.close{ background:url(../images/close-circ.png) no-repeat 0 -13px;}
.slide-box .thumb{ text-align:center; }
.slide-box .thumb img{ border:none; margin-bottom:5px;padding: 0px;margin: 0;width:230px;height:90px;}
.slide-box .text-bot { margin:0px;padding:0px;width:99%; float:left;
background: rgb(255,255,255); /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNlNWU1ZTUiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(left,  rgba(255,255,255,1) 0%, rgba(229,229,229,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(229,229,229,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(left,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* IE10+ */
background: linear-gradient(left,  rgba(255,255,255,1) 0%,rgba(229,229,229,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e5e5e5',GradientType=1 ); /* IE6-8 */

}
.slide-box .text-bot-left { width:100%; float:left;} 
.slide-box .text-bot-left .text-bot-info { font-size:10px; line-height:12px; margin-bottom:10px; color:#999;text-align:right;}
.slide-box .text-bot-left .text-bot-info span{ color:#333;}
.slide-box .text-bot-left .text-bot-info div.points{float:left;width:80px;height:10px;text-align:left;font-size:13px;}
.slide-box .text-bot-left .text-bot-info-name { padding:5px 0px 3px 5px;font-size:15px;color:#333;font-weight:bold;margin-bottom:5px}
.slide-box .text-bot-thumb { width:45px; float:right;} 
.slide-box .text-bot-thumb img{ width:45px !important; border:0;}
.col2{width:70%;line-height:15px;font-size:11px;}


/* BROWSE PAGE HOVER*/
.ic_container{
    vertical-align:baseline;
    
    position:relative;
    /*-moz-border-radius:10px;
    -webkit-border-radius:10px;
    -khtml-border-radius:10px;
    -moz-box-shadow: 0 1px 3px #888;
    -webkit-box-shadow: 0 1px 3px #888;*/
}
.overlay{
    opacity:0.3;
    position:absolute;
    top:0px;
    bottom:0px;
    left:0px;
    right:0px;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50);
}
.ic_caption{
    position:absolute;    
    opacity:0.8;   
    overflow:hidden;
    margin:0px;
    padding:0px;
    left:0px;
    right:0px;
    cursor:default;
    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=60);
}
.ic_category{
    text-transform:uppercase;
    font-size:12px;
    letter-spacing:1px;
    padding:5px;
    margin:0px;
}
.ic_caption h3{
    padding:0px 5px 5px 5px;
    margin:0px;
    font-size:18px;
}
.ic_text{
    padding:5px;
    margin:0px;
    text-align:justify;
    font-size:11px;

}
/* END BROWSE PAGE HOVER*/

/*pagination*/
.pagination{ padding: 10px; margin: 5px 0 0 48px; }
.pagination ul{ margin: 0; padding: 0; text-align: right; /*Set to "right" to right align pagination interface*/ font-size: 12px; }
.pagination li{ list-style-type: none; display: inline; padding-bottom: 1px; padding: 1px; }
.pagination a, .pagination a:visited{ padding: 1px 5px; text-decoration: none;  color: gray; }
.pagination a:hover, .pagination a:active{ border: 1px solid gray; color: #000; background-color: #E6E6E6;}
.pagination li.currentpage{ font-weight: bold; padding: 0 5px; border: 1px solid gray; color: gray; }
.pagination li.disablepage{ padding: 0 5px; border: 1px solid #929292; color: #929292; }
.pagination li.nextpage{ font-weight: bold;	}

</style>
<script type="text/javascript" src="http://mychallenge.com/js/jquery.capSlide.js"></script>
<br>

    <p class="p-title"><?=$dir->GetTableInfo('ChallengeCategory','CategoryName','ChallengeCategoryId',$categoryid)?> Related Challenges</p>
    <div class="jsection">        
    	<?php
			include('includes/Pagination.php');
			$pag = 1;	$size = 6;
			if(isset($_GET['pag'])){
				$pag = (int) $_GET['pag'];
			}
			$id = $_GET['id'];
			
			$sql = "SELECT * FROM `Challenges` where CategoryId='".$categoryid."' order by ChallengeTitle";
			
			$total_records_get = mysql_query($sql) or die(mysql_error());
			$pagination = new Pagination();
			$pagination->setLink("browse.html?pag=%s");
			$pagination->setPage($pag);
			$pagination->setSize($size);
			$pagination->setTotalRecords(mysql_num_rows($total_records_get));	
			
			$navigation = $pagination->create_links();
			echo $navigation; // will draw our page navigation
			echo $dir->ShowEarthBrowse($sql." ".$pagination->getLimitSql());		
		?>
    </div>

<script type="text/javascript">
   $(function() {
		$("#capslide1,#capslide2,#capslide3,#capslide4,#capslide5,#capslide6,#capslide7,#capslide8").capslide({
         caption_color	: 'white',
         caption_bgcolor	: 'black',
         overlay_bgcolor : 'black',
         border			: '',
         showcaption	    : false
      });
   });
</script>
