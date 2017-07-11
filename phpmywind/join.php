<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo GetHeader(1,0,0,'人才招聘'); ?>
<link href="templates/default/style/webstyle.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="templates/default/js/top.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
    <link rel="stylesheet"  href="css/joinus.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<!-- header-->
<?php require_once('header.php'); ?>
<!-- /header-->
<!-- banner-->
<div class="subBanner"> <img src="images/16.jpg" alt=""> </div>
<!-- /banner-->
<!-- notice-->
<!-- <div class="subnotice"><strong>网站公告：</strong><?php echo Info(1); ?> </div> -->
<!-- /notice-->
<!-- mainbody-->
<div class="subBody">
	<div class="subTitle"> <span class="catname">加入奥昇</span> <span>您当前所在位置：<a href="<?php echo $cfg_webpath; ?>">首页</a> &gt; <a href="join.php">加入奥昇</a></span>
		<div class="cl"></div>
	</div>
	 <div class="foreword">
             <h1>前言</h1>
             <p>湖南奥昇信息技术有限公司专注于教育、医疗卫生等领域的软硬件开发、生产、销售、运营服务及相关大数据开发应用，为客户提供“软件+硬件+运营服务+资金”的专业综合性解决方案。 目前，公司已拥有几十项相关软件著作权，现又与多所高校及企事业单位形成产、学、研深度合作模式，助力创新研发生产、实践创新运营服务，旨在为教育、医疗卫生等领域提供一流的产品和服务。</p>
             <h3>请输入职位<input type="text" name="text" id="text" value="关键字..."><input type="button" name="search" value="搜索" id="search"></h3>
        </div>
<div class="content">	
			<div class="news_list">
				<ul>
					<?php
					$dopage->GetPage("SELECT * FROM pmw_job WHERE checkinfo=true ORDER BY orderid DESC",7);
					while($row = $dosql->GetArray())
					{
						if($cfg_isreurl!='Y') $gourl = 'joinshow.php?id='.$row['id'];
						else $gourl = 'joinshow-'.$row['id'].'.html';
						
					?>
					<li><!-- <span>[<?php echo GetDateMk($row['posttime']); ?>]</span><strong>&gt;&gt;</strong><a href="<?php echo $gourl; ?>"><?php echo $row['title']; ?></a> -->
                    <div class="position">
             <h1><?php echo $row['title']; ?></h1>
             <p class="matter">职位描述：<br>
             <!-- 1、5年以上开发经验、3年以上带团队经验、曾任研发部部门经理优先； 2、3年以上监控、流媒体行业经验，有流媒体或者监控成功项目优先； 3、擅长软件架构，系统分析； 4、清楚项目管理流程，具备多个项目全线参与的经验； 5、理解软件行业产品、具备产品管理基础理念，懂得产品分析，产品规划； 6、具备较强的创新能力、沟通能力、洞察能力、抗压能力； 7、具备技术人力管理能力，有丰富的面试软件开发人员经验，擅长人力分配； 8、在工作中以身作责，能树立威信，能带动士气。 -->
             <?php echo $row['workdesc']; ?></p>
             <p class="time1">发布时间:</p><i><?php echo GetDateMk($row['posttime']); ?></i>&nbsp;<p class="time2">有效时间</em><p class="time3"><?php echo $row['usefullife']; ?></p>
                   </div>
					</li>
					<?php
					}
					?>
				</ul>
			</div>
			<?php echo $dopage->GetList(); ?>
	<div class="cl"></div>
</div>	
</div>
<!-- /mainbody-->
<!-- footer-->
<?php require_once('footer.php'); ?>
<!-- /footer-->
</body>
</html>