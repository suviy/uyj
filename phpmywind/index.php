<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/slideplay.js"></script>
<script type="text/javascript" src="templates/default/js/srcollimg.js"></script>
<script type="text/javascript" src="templates/default/js/loadimage.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet"  href="css/home.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<!-- header-->
<?php require_once('header.php'); ?>
<!-- /header-->
<!--start 图片轮播-->

<div id="myCarousel" class="carousel slide">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>   
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="images/banner1.jpg" alt="First slide">
        </div>
        <div class="item">
            <img src="images/banner2.jpg" alt="Second slide">
        </div>
        <div class="item">
            <img src="images/banner3.jpg" alt="Third slide">
        </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="carousel-control left" href="#myCarousel" 
       data-slide="prev">
    <img src="images/left-arrow.png" alt="">
    </a>
    <a class="carousel-control right" href="#myCarousel" 
       data-slide="next">
       <img src="images/right-arrow.png" alt="">
    </a>
 </div>
 
 <!--end 图片轮播-->
<!-- start 解决方案 -->
		<div class="title">
				 <?php
					if($cfg_isreurl!='Y') $gourl = 'solution.php';
					else $gourl = 'solution.html';
					?>
				    <a href="<?php echo $gourl; ?>">
				    <p>解决方案/Solution More</p></a>
		</div>

		 <div class="container">
		      <div class="row">
		      <div class="solution">
		      <?php
			$dosql->Execute("SELECT * FROM pmw_infolist WHERE classid=14  AND  flag LIKE '%a%'  AND  delstate='' AND checkinfo=true ORDER BY orderid ASC   LIMIT 0,3");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'solutionshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'solutionshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
			?>
		      
		         <div class="col-lg-4 col-md-4 col-xs-4">
		             <a href="<?php echo $gourl; ?>"><div class="pic"><img src="<?php echo $row['picurl']; ?>" alt="<?php echo $row['title']; ?>">
		                  <h4><?php echo $row['title']; ?></h4>
		             </div></a>
		         </div>
		
		      <?php
			  }
			  ?>
		      </div>
		      </div>     
        </div>
<!-- end 解决方案 -->
<!-- start  关于我们 -->
 <div class="title">
			 <?php
			  if($cfg_isreurl!='Y') $gourl = 'aboutus.php';
			  else $gourl = 'aboutus.html';
			?>
					<a href="<?php echo $gourl; ?>">
			 <p>关于我们/About Us More</p></a>
 </div>
         <div class="container">
             <div class="row">
               <div class="aboutus"> 
            <?php
			$dosql->Execute("SELECT * FROM pmw_infolist WHERE classid=15 AND  delstate='' AND checkinfo=true ORDER BY orderid ASC   LIMIT 0,4");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'aboutUs-honno.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'aboutUs-honno-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
			?>
                <div class="col-lg-3"> <a href="<?php echo $gourl; ?>"><img src="<?php echo $row['picurl']; ?>" alt="<?php echo $row['title']; ?>"><p><?php echo $row['title']; ?></p></a></div>
                <!-- <div class="col-lg-3"><img src="images/chairmen.png" alt=""><p>荣誉资质</p></div> 
                <div class="col-lg-3"><img src="images/host.png" alt=""><p>董事长致辞</p></div>
                <div class="col-lg-3"><img src="images/enterprise.png" alt=""><p>企业文化</p></div> -->
                <?php
			   }
			   ?>   
            </div> 
            
         </div> 
          
        </div>
<!--end 关于我们 -->
<!-- start新闻资讯 -->
 <div class="title">
  <?php
								if($cfg_isreurl!='Y') $gourl = 'new.php';
								else $gourl = 'new.html';
								?>
					<a href="<?php echo $gourl; ?>">
     <p>新闻咨询/News More</p></a>
 </div>
          <div class="container">
             <div class="row">
            <?php 
            $row = $dosql->GetOne("SELECT * FROM pmw_infolist WHERE classid=16 AND  delstate='' AND checkinfo=true ORDER BY orderid ASC   LIMIT 0,1 "); ?>
                <div class="col-lg-6">
	                <aside class="news-left">
				         <img src="<?php echo $row['picurl']; ?>">
				        <p><?php echo $row['content']; ?></p>
	                </aside>
                </div>

                <div class="col-lg-6">
	                <aside class="news-right">
	                    <?php
			$dosql->Execute("SELECT * FROM pmw_infolist WHERE classid=16 AND  delstate='' AND checkinfo=true ORDER BY orderid ASC   LIMIT 1,6");
			while($row = $dosql->GetArray())
			{
				if($row['linkurl']=='' and $cfg_isreurl!='Y')
						$gourl = 'newsshow.php?cid='.$row['classid'].'&id='.$row['id'];
					else if($cfg_isreurl=='Y')
						$gourl = 'newsshow-'.$row['classid'].'-'.$row['id'].'-1.html';
					else
						$gourl = $row['linkurl'];
			?>
				           <ul>
				            <li><a href="<?php echo $gourl; ?>"><em></em><?php echo $row['title']; ?><span><?php echo GetDateTime($row['posttime']); ?></span></a></li>
				           <!--  <li><em></em>教师的"铁饭碗"将不保？各省份将破除教师资格"终身制"？<span>2015-10-09</span></li>
				           <li><em></em>互联网巨头涉足医疗产业助力解决"看病难"<span>2015-09-13</span></li>
				           <li><em></em>可穿戴医疗将在2016年呈爆发式增长<span>2016-07-12</span></li>
				           <li><em></em>公司与同方合作承建的"互联网+"项目调试成功<span>2017-11-12</span></li>
				           <li><em></em>《2017年教育信息化工作要点<span>2017-05-12</span></li>     -->
				           </ul>
				            <?php
			   }
			   ?>   
	               </aside>
               </div> 
             </div>
          </div>  
<!-- end新闻资讯 -->
<!-- /mainbody-->
<?php require_once('footer.php'); ?>
</body>
</html>
