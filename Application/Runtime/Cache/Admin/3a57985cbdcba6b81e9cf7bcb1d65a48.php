<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="renderer" content="webkit">
		<title>拼图后台管理-后台管理</title>
		<link rel="stylesheet" href="/Public/admin/css/pintuer.css">
		<link rel="stylesheet" href="/Public/admin/css/admin.css">
		<link rel="stylesheet" href="/Public/admin/css/henry.css">
		<script src="/Public/admin/js/jquery.js"></script>
		<script src="/Public/admin/js/pintuer.js"></script>
		<script src="/Public/admin/js/admin.js"></script>
		<link rel="stylesheet" href="/Public/admin/sweetalert/sweetalert.css">
		<script src="/Public/admin/sweetalert/sweetalert.min.js"></script>
	</head>

	<body>
		<div class="lefter">
			<div class="logo">
				<a href="http://www.pintuer.com" target="_blank"><img src="/Public/admin/images/logo.png" alt="后台管理系统" /></a>
			</div>
		</div>
		<div class="righter nav-navicon" id="admin-nav">
			<div class="mainer">
				<div class="admin-navbar">
					<span class="float-right">
                    <a class="button button-little bg-main" href="" target="_blank">前台首页</a>
                    <a class="button button-little bg-yellow" href="<?php echo U('Index/logout');?>">注销登录</a>
                </span>
					<ul class="nav nav-inline admin-nav">
						<li <?php if(empty($controller)): ?>class="active"<?php endif; ?>>
							<a href="index.html" class="icon-home"> 开始</a>
							<ul>
								<li><a href="<?php echo U('Article/index');?>">文章管理</a></li>
								<li><a href="<?php echo U('User/index');?>">管理员管理</a></li>
							</ul>
						</li>
						<?php if(is_array($menu_list)): foreach($menu_list as $key=>$vo): ?><li <?php if($controller == 'Article'): ?>class="active"<?php endif; ?>>
							<a href="<?php echo U($vo['title']);?>" class="icon-file-text"><?php echo ($vo["name"]); ?></a>
							<ul>
								<?php if(is_array($menu_list)): foreach($menu_list as $key=>$val): ?><li <?php if($menu_active == $val.title): ?>class="active"<?php endif; ?>><a href="<?php echo U($val['title']);?>"><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; ?>
							</ul>
						</li><?php endforeach; endif; ?>
					</ul>
				</div>
				<div class="admin-bread">
					<span>您好，admin，欢迎您的光临。</span>
					<ul class="bread">
						<li><a href="index.html" class="icon-home"> 开始</a></li>
						<li>后台首页</li>
					</ul>
				</div>
			</div>
		</div>
<style>
    .list_pic{
        width:50px;
        height:30px;
    }
</style>
<div class="admin">
    <form method="post">
        <div class="panel admin-panel">
            <div class="panel-head"><strong>菜单列表</strong></div>
            <div class="padding border-bottom">
                <a href="<?php echo U('User/addMenu');?>" class="button button-small border-green">添加菜单</a>
                <a href="<?php echo U('User/refreshMenu');?>" class="button button-small border-red">更新菜单</a>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>菜单名</th>
                    <th>权限</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                        <td><?php echo ($vo['_name']); ?></td>
                        <td><?php echo ($vo['title']); ?></td>
                        <td>
                            <?php if($vo["_level"] == 1): ?><a class="button border-blue button-little" href="<?php echo U('User/addMenu',array('pid'=>$vo['id']));?>">添加子菜单</a><?php endif; ?>
                            <?php if($vo["title"] != 'User/listMenu' AND $vo["title"] != 'User/addMenu' AND $vo["title"] != 'User/addRule' AND $vo["title"] != 'User/listRule'): ?><a class="button border-blue button-little" href="<?php echo U('User/editMenu',array('id'=>$vo['id']));?>">修改</a>
                            <a class="button border-blue button-little" href="javascript:if(confirm('确定删除？'))location='<?php echo U('User/dropMenu',array('id'=>$vo['id']));?>'">删除</a><?php endif; ?>
                        </td>
                    </tr><?php endforeach; endif; ?>
            </table>
        </div>
    </form>
</div>
</body>

</html>