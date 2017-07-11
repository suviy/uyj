<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 14 : intval($cid);
$id  = empty($id)  ? 0 : intval($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(1,$cid,$id); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<link href="templates/default/style/lightbox.css" type="text/css" rel="stylesheet" />
<!--[if IE 6]><link href="templates/default/style/lightbox.ie6.css" rel="stylesheet" type="text/css"/><![endif]-->
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/slidespro.js"></script>
<script type="text/javascript" src="templates/default/js/lightbox.js"></script>
<script type="text/javascript" src="templates/default/js/comment.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript">
$(function(){
	jQuery('.lightbox').lightbox();
	$(".picarr .picture img").LoadImage({width:530,height:350});
	$(".picarr .preview img").LoadImage({width:58,height:45});
	$(".small").click(function(){$("#textarea").css('font-size','12px');});
	$(".big").click(function(){$("#textarea").css('font-size','14px');});
});
</script>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet"  href="css/solution.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<!-- header-->
<?php require_once('header.php'); ?>
<!-- /header--> 
<!-- banner-->
<div class="subBanner"> <img src="images/4.jpg" /></div>
<!-- /banner--> 
<!-- notice-->
<!-- <div class="subnotice"><strong>网站公告：</strong><?php echo Info(1); ?></div> -->
<!-- /notice--> 
<!-- mainbody-->
<div class="subBody">
	<div class="subTitle"> <span class="catname"><?php echo GetCatName($cid); ?></span> <a href="javascript:history.go(-1);" class="goback">&gt;&gt; 返回</a> <span class="fr">您当前所在位置：<?php echo GetPosStr($cid,$id); ?></span>
		<div class="cl"></div>
	</div>
<div class="second-title"> 
           <?php 
            $row = $dosql->GetOne("SELECT * FROM pmw_nav WHERE id=3 AND  checkinfo=true ORDER BY orderid ASC   LIMIT 0,1 "); ?>
            <p class="Solution-p"><?php echo $row['classname']; ?></p></div>
<div class="content" >
  <?php
			$dosql->Execute("SELECT * FROM pmw_infolist WHERE classid=14  AND  flag LIKE '%a%'  AND  delstate='' AND checkinfo=true ORDER BY orderid ASC   LIMIT 0,3");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
			?>
<div class="container">
   <div class="row">   
   <div class="content-top">
       <div class="col-lg-3 col-md-3 col-xs-3">
           <a href="<?php echo $gourl; ?>"><div class="pic-left"><img src="<?php echo $row['picurl']; ?>"></div></a>
       </div>
       <div class="col-lg-9 col-md-9 col-xs-9">
           <div class="pic-right">
           <a href="solutionshow.php?cid=14&id=20">
           <b>
           <!-- 湖南奥昇信息互联网＋监督项目… -->
           <?php echo $row['title']; ?>
           </b>
           </a>
	       <p><!-- 2017－03－28 -->时间：<?php echo GetDateTime($row['posttime']); ?></p>
		   <p><!-- 互联网＋监督是践行党的群众路线，密切干群关系最直接的体现。其实优势表现在通过大数据分析对各种数据进行排查，提炼各种有效信息，协助纪律检查部门缩小排查范围，有针对性的对各种违纪违章情况进行查处。并通过互联网的手段，使得群众亦可不出家门便对掌握的信息进行反馈和跟踪。这是一种趋势，是适应大数据… -->
		   <?php echo $row['description']; ?>
		   </p>
		   </div>
       </div>
   </div>
   </div>
</div>
 <?php
	}
  ?>

</div>	
	<!-- <div class="TwoOfTwo">
		<?php require_once('lefter.php'); ?>
	</div> -->
	<div class="cl"></div>
</div>
<!-- /mainbody--> 
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>