<?	include('header_index.php'); ?>
<?	include('index_lander.php');?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.wrap-feature').css({'min-height': (($(window).height()))+'px'});
		$(window).resize(function(){
			$('.wrap-feature').css({'min-height': (($(window).height()))+'px'});
		});

		$('.wrap-index2').css({'min-height': (($(window).height()))+'px'});
		$(window).resize(function(){
			$('.wrap-index2').css({'min-height': (($(window).height()))+'px'});
		});
		
		
		jQuery('.challengeBoxFeature').hover(
                function(){
                    jQuery(this).find('.challengeBoxDetails').stop(true,false).fadeIn();
                },
                function(){
                    jQuery(this).find('.challengeBoxDetails').stop(true,false).fadeOut();
                }
            );
		
	}); 
</script>
<script type="text/javascript" src="/js/jquery.newsTicker.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var nt_example2 = $('#nt-example2').newsTicker({
            row_height: 60,
            max_rows: 1,
            speed: 300,
            duration: 6000,
            prevButton: $('#nt-example2-prev'),
            nextButton: $('#nt-example2-next'),
            hasMoved: function() {
                $('#nt-example2-infos-container').fadeOut(200, function(){
                    $('#nt-example2-infos .infos-hour').text($('#nt-example2 li:first span').text());
                    $('#nt-example2-infos .infos-text').text($('#nt-example2 li:first').data('infos'));
                    $(this).fadeIn(400);
                });
            },
            pause: function() {
                $('#nt-example2 li i').removeClass('fa-play').addClass('fa-pause');
            },
            unpause: function() {
                $('#nt-example2 li i').removeClass('fa-pause').addClass('fa-play');
            }
        });

        $('#nt-example2-infos').hover(function() {
            nt_example2.newsTicker('pause');
        }, function() {
            nt_example2.newsTicker('unpause');
        });
    });
</script>


<section class="section-2">
	<div class="container">
		<?	include('index_main_content.php');?>
		<?	include('index_featured_challenges.php');?>
	</div>
</section>
<!--<section class="section-between-2">
    <div class="overlayPages-2">
        <div class="container">
            <?//	include('index_rolling_blog.php');?>
        </div>
    </div>
</section>-->
<section class="section-2">
	<div class="container">
		<?	include('index_featured_sites.php');?>
	</div>
</section>
<?	include('index_footer.php');?>
<? //	include('subscribe2.php');?>