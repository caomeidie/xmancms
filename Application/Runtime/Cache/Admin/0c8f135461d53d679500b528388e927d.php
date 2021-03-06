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
						<li <?php if(0 == $menu): ?>class="active"<?php endif; ?>>
							<a href="<?php echo U('Home/index');?>" class="icon-home"> 开始</a>
							<ul>
								<li <?php if($menu_active == 'Home/index'): ?>class="active"<?php endif; ?>><a href="<?php echo U('Home/index', array('menu'=>0));?>">平台首页</a></li>
								<?php if(!empty($start_menu_list)): if(is_array($start_menu_list)): foreach($start_menu_list as $key=>$vo): ?><li><a href="<?php echo U($vo['title'], array('menu'=>$vo['pid']));?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; endif; ?>
							</ul>
						</li>
						<?php if(is_array($menu_list)): foreach($menu_list as $key=>$vo): ?><li <?php if($vo['id'] == $menu): ?>class="active"<?php endif; ?>>
							<a href="<?php echo U($vo['title'], array('menu'=>$vo['id']));?>" class="icon-file-text"><?php echo ($vo["name"]); ?></a>
							<ul>
								<?php if(is_array($vo["_data"])): foreach($vo["_data"] as $key=>$val): ?><li <?php if($menu_active == $val['title']): ?>class="active"<?php endif; ?>><a href="<?php echo U($val['title'], array('menu'=>$val['pid']));?>"><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; ?>
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
<script type="text/javascript" charset="utf-8" src="/Public/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/admin/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="admin">
    <div class="tab">
        <div class="tab-head">
            <ul class="tab-nav">
                <li class="active"><a href="#tab-base">编辑文章栏目</a></li>
            </ul>
        </div>
        <form method="post" class="form-x" action="<?php echo U('Article/editArticleColumn', array('id'=>$info['column_id']));?>">
            <div class="tab-body">
                <br />
                <div class="tab-panel active" id="tab-base">
                    <div class="form-group">
                        <div class="label">
                            <label for="column_name">栏目名称</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input" id="column_name" name="column_name" value="<?php echo ($info["column_name"]); ?>" size="50" placeholder="请填写栏目名称" data-validate="required:请填写栏目名称" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label for="en_name">英文名称</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input" id="en_name" name="en_name" value="<?php echo ($info["en_name"]); ?>" size="50" placeholder="请填写栏目英文名称" data-validate="required:请填写栏目英文名称" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label>导航栏显示</label>
                        </div>
                        <div class="field">
                            <div class="button-group button-group-small radio">
                                <label class="button <?php if($info["is_show"] == 1): ?>active<?php endif; ?>">
                                <input name="is_show" value="1" <?php if($info["is_show"] == 1): ?>checked="checked"<?php endif; ?>type="radio"><span class="icon icon-check"></span> 显示</label>
                                <label class="button <?php if($info["is_show"] == 0): ?>active<?php endif; ?>">
                                <input name="is_show" value="0" <?php if($info["is_show"] == 0): ?>checked="checked"<?php endif; ?>type="radio"><span class="icon icon-times"></span> 不显</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label for="sort">排序</label>
                        </div>
                        <div class="field">
                            <input type="text" class="input" id="sort" name="sort" size="10" value="<?php echo ($info["sort"]); ?>" placeholder="请填写排序" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-button">
                <button class="button bg-main" type="submit">提交</button>
            </div>
        </form>
    </div>
</div>
</body>

</html>