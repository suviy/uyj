<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 17 : intval($cid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(1,$cid); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
<script type="text/javascript">
$(function(){
    $(".caselist a.img img").LoadImage({width:100,height:80});
});
</script>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet"  href="css/case.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<!-- header-->
<?php require_once('header.php'); ?>
<!-- /header-->
<!-- banner-->
<div class="subBanner"> <img src="images/9.jpg" /></div>
<!-- /banner-->
<!-- notice-->
<!-- <div class="subnotice"><strong>网站公告：</strong><?php echo Info(1); ?></div> -->
<!-- /notice-->
<!-- mainbody-->
<div class="subBody">
	<div class="subTitle"> <span class="catname"><?php echo GetCatName($cid); ?></span> <span class="fr">您当前所在位置：<?php echo GetPosStr($cid); ?></span>
		<div class="cl"></div>
	</div>
	<div class="second-title"> 
           <?php 
            $row = $dosql->GetOne("SELECT * FROM pmw_nav WHERE id=5 AND  checkinfo=true ORDER BY orderid ASC   LIMIT 0,1 "); ?>
            <p class="Solution-p"><?php echo $row['classname']; ?></p>
  </div>
    
    <div class="content">
     <div class="container">
       <div class="row">

         <?php
			$dosql->Execute("SELECT * FROM pmw_infolist WHERE classid=17 AND  delstate='' AND checkinfo=true ORDER BY orderid ASC   LIMIT 0,5");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
			?>
      
        <div class="col-lg-4 col-md-4 col-xs-4">
            <div class="onePic"><a href=""><img src="<?php echo $row['picurl']; ?>">
                  <h4><?php echo $row['title']; ?></a></h4>
            </div>
        </div>
        <!-- <div class="col-lg-4 col-md-4 col-xs-4">
            <div class="twoPic"><img src="images/10.jpg"><h4>怀化市第一人民医院艾默生模块化机房</h4></div>
        </div>
               <div class="col-lg-4 col-md-4 col-xs-4">
            <div class="threePic"><img src="images/12.jpg"><h4>观摩室</h4></div>
               </div> -->
               <?php
	}
  ?>
       </div>
     </div>  
      <div class="container">
       <div class="row"> 
         <?php
			$dosql->Execute("SELECT * FROM pmw_infolist WHERE classid=17 AND  delstate='' AND checkinfo=true ORDER BY orderid ASC   LIMIT 3,2");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
			?>
        <div class="col-lg-4 col-md-4 col-xs-4">
            <div class="onePic"><img src="<?php echo $row['picurl']; ?>">
                  <h4><?php echo $row['title']; ?></h4>
            </div>
        </div>
        <?php
	}
  ?>
      </div>
      </div>
    </div>
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