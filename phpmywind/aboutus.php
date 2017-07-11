<?php
require_once(dirname(__FILE__).'/include/config.inc.php');

//初始化参数检测正确性
$cid = empty($cid) ? 18 : intval($cid);
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
    <link rel="stylesheet"  href="css/aboutus.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<!-- header-->
<?php require_once('header.php'); ?>
<!-- /header--> 
<!-- banner-->
<div class="subBanner"> <img src="images/15.jpg" /></div>
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
	            $row = $dosql->GetOne("SELECT * FROM pmw_nav WHERE id=6 AND  checkinfo=true ORDER BY orderid ASC   LIMIT 0,1 "); ?>
	            <p class="Solution-p"><?php echo $row['classname']; ?></p>
	</div>
<div class="content" >
 

       <div class="container">
           <div class="row">
              <div class="col-lg-3 col-md-3 col-xs-3">
               <div class="content-left">
                   <div class="aboutus-p2"><p>关于我们/About Us</p></div>
                   <div class="content-nav"> 
                   <?php
			$dosql->Execute("SELECT * FROM pmw_infolist WHERE classid=18 AND  delstate='' AND checkinfo=true ORDER BY orderid ASC   LIMIT 0,7");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'aboutUs-honno.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'aboutUs-honno-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
			?>
                       <ul>
                        <li><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?></a></li>
                        <!-- <li><a href="aboutUs-honno.html">荣誉资质</a></li>
                        <li><a href="#">企业文化</a></li>
                        <li><a href="#">董事长致辞</a></li>
                        <li><a href="#">公司风采</a></li>
                        <li><a href="#">合作伙伴</a></li>
                        <li><a href="#">公司地址</a></li> -->
                       </ul>
                     <?php
	                      }
                         ?>  
                   </div>
               </div>
               </div>
               <div class="col-lg-9 col-md-9 col-xs-9">
                  <div class="content-text">
                    <p><!-- 2015年10月湖南奥昇信息技术有限公司成立，注册资金5000万元。公司专注于教育、医疗卫生等领域的软硬件开发、生产、销售、运营服务及相关大数据开发应用，为客户提供“软件+硬件+运营服务+资金”的专业综合性解决方案。</p>
                     <p>2016年6月，在长沙市天心区湘府西路（省政府南门斜对面）设立长沙研发中心，投资2000万元，可容纳200名研发人员，强助研发力量。
                     </p>
                     <p>目前，公司已拥有几十项相关软件著作权，现又与多所高校及企事业单位形成产、学、研深度合作模式，助力创新研发生产、实践创新运营服务，旨在为教育、医疗卫生等领域提供一流的产品和服务。 --> 
                     <?php 
            $row = $dosql->GetOne("SELECT content FROM pmw_infolist WHERE classid=18 AND  delstate='' AND checkinfo=true ORDER BY orderid ASC   LIMIT 0,1 "); 
              
              echo $row['content'];
                     ?>
                     </p> 
                  </div>
              </div>
        </div>
    </div>
 

</div>	
	<div class="cl"></div>
</div>
<!-- /mainbody--> 
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>