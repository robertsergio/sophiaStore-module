<table border="0" width="100%">
  <tr>
    <td width="257" rowspan="3" valign="top">
      <?php include_partial('categories', array('categories' => $categories)) ?>
      <br />
      <?php include_partial('tag_cloud') ?>
    </td>
    <td width="15" rowspan="3">&nbsp;</td>
    <td width="695" height="204" align="center" >
      <?php include_partial('slider_store') ?>
    </td>
  </tr>
  <tr><td style="font-size:1.3em; height:3px">&nbsp;</td></tr>
  <tr>
    <td align="center" valign="top" style="background:#F2F2F2">
      <table width="100%" border="0">
        <?php include_partial('path',array('paths'=>$paths));?>
        <tr><td colspan="3" style="font-size:0.5em; padding-left:20px">
          <div id="controls"></div>
          <div id="loading"></div>
          <div id="slideshow" style="margin-left: 10px;margin-top: 10px;"></div>
          <div id="caption"></div>
          <div id="thumbs" style="margin: 10px;">
            <ul class="thumbs noscript">
              <?php $images = $article->getAllArticleImage();?>
              
              <?php include_partial('article_thumbnails',array('images'=>$images,'thumbnails'=>$article->getAllThumbnail('thumbnail')));?>
            </ul>
        </div>  
        </td>
          <td width="318" align="center" valign="top">
          <table width="100%" border="0" height="100%">
            <tr>
              <td class="detail_title" align="left"><?php echo $article->getName();?>
                <div style="color:#000; font-size:0.7em"></div>
              </td>
            </tr>
            <tr>
              <td><a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'addToCart','article_id'=>$article->getId())); ?>">
                  <div style="background:url(/img/bgr_title_detail.gif); height:32px; padding-top:9px; color:#FFF; width:50%; float:left; text-align:center">Agregar al carro</div>
                  <div style="background:url(/img/bgr_title_detail.gif); height:32px; padding-top:9px; color:#FFF; width:49%; float:right; color:#FF0; font-weight:bold; border-left:1px solid #CCC; text-align:center">$US <?php echo $article->getPrice();?></div>
                </a></td>
            </tr>
            <tr>
              <td align="left" class="txtDetail">
                <b>Descripci&oacute;n</b><br />
              <?php echo str_replace('\n','<br/><br/><br/>',$article->getDescription());?>
              <br />
              
              <div class="article_detail">
                
                <?php foreach ($article->getArticleAttributeArticles() as $article_attribute_article):?>
                
                  * <b><?php echo $article_attribute_article->getArticleAttribute()->getArticleAttributeTypeIdName();?>:</b>
                  <?php echo $article_attribute_article->getArticleAttribute()->getName();?><br/>
                
                <?php endforeach;?>
                
              </div>
              </td>
            </tr>
          </table></td>
        </tr>
        </table>
      <br/>
      <?php include_partial('related_articles',array('relatedArticles'=>$relatedArticles));?>
    </td>
  </tr>
</table>

<script type="text/javascript">
			$(window).load(function() {
			// We only want these styles applied when javascript is enabled
			$('div.navigation').css({'width' : '940px', 'float' : 'left'});
			$('div.content').css('display', 'block');
	
			// Initially set opacity on thumbs and add
			// additional styling for hover effect on thumbs
			var onMouseOutOpacity = 0.67;
			$('#thumbs ul.thumbs li').opacityrollover({
				mouseOutOpacity:   onMouseOutOpacity,
				mouseOverOpacity:  1.0,
				fadeSpeed:         'fast',
				exemptionSelector: '.selected'
			});
			
			// Initialize Advanced Galleriffic Gallery
			var gallery = $('#thumbs').galleriffic({
				delay:                     1000,
				numThumbs:                 12,
				preloadAhead:              12,
				enableTopPager:            false,
				enableBottomPager:         false,
				maxPagesToShow:            6,
				imageContainerSel:         '#slideshow',
				captionContainerSel:       '#caption',
				renderSSControls:          false,
				renderNavControls:         false,
				playLinkText:              'Play Slideshow',
				pauseLinkText:             'Pause Slideshow',
				prevLinkText:              'Prev',
				nextLinkText:              'Next',
				nextPageLinkText:          'Next',
				prevPageLinkText:          'Prev',
				enableHistory:             false,
				autoStart:                 false,
				syncTransitions:           true,
				defaultTransitionDuration: 0,
				onSlideChange:             function(prevIndex, nextIndex) {
					// 'this' refers to the gallery, which is an extension of $('#thumbs')
					this.find('ul.thumbs').children()
						.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
						.eq(nextIndex).fadeTo('fast', 1.0);
				},
				onPageTransitionOut:       function(callback) {
					//this.fadeTo('fast', 0.0, callback);
				},
				onPageTransitionIn:        function() {
					//this.fadeTo('fast', 0.0);
				}
			});
		});
</script>
