<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>秘密实验室服务器人数查询</title>
    <style>
    /* 2024.7.9 by 开朗的火山河123 */
        /* 全局样式 */
        body {
            font-family: Arial, sans-serif; /* 设置全局字体 */
            background-color: #f0f0f0; /* 背景色 */
            background-image: url('bj.png'); /* 背景图片 */
            background-size: cover; /* 背景图片大小 */
            background-repeat: no-repeat; /* 背景图片不重复 */
            background-attachment: fixed; /* 固定背景图片 */
            padding: 20px; /* 页面内边距 */
            margin: 0; /* 页面外边距 */
            display: flex; /* 使用flex布局 */
            justify-content: center; /* 水平居中 */
            align-items: center; /* 垂直居中 */
            min-height: 100vh; /* 最小高度100%视口高度 */
        }

        /* 卡片样式 */
        .card {
            background-color: #fff; /* 卡片背景色 */
            border-radius: 10px; /* 圆角 */
            padding: 20px; /* 内边距 */
            margin-bottom: 20px; /* 底部外边距 */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* 阴影 */
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(0, 0, 0, 0.1) 100%), url('sand-texture.png'); /* 渐变背景与覆盖 */
            background-blend-mode: overlay; /* 背景混合模式 */
            background-size: cover; /* 背景图片大小 */
            text-align: center; /* 文字居中 */
        }

        /* 服务器信息样式 */
        .server {
            margin-bottom: 10px; /* 底部外边距 */
            padding: 10px; /* 内边距 */
            background-color: rgba(255, 255, 255, 0.8); /* 背景色 */
            border: 1px solid #ccc; /* 边框 */
            border-radius: 5px; /* 圆角 */
        }

        /* 标题样式 */
        h2 {
            color: #333; /* 文字颜色 */
        }

        /* 页脚样式 */
        .footer {
            margin-top: 20px; /* 顶部外边距 */
            font-size: 14px; /* 字体大小 */
            color: #666; /* 文字颜色 */
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>秘密实验室服务器人数查询</h2>
        <?php
        // 设置API相关信息
        $api_url = 'https://scp.manghui.net/list/';
        $serverIp = '127.0.0.1,192.168.1.1';

        // 构建API请求URL
        $request_url=api_url . '?serverIp=' . urlencode($servers);

        // 发送请求并获取响应
        $response = file_get_contents($request_url);

        // 处理API响应
        if ($response !== false) {
            // 如果API调用成功，解析服务器人数
            $server_counts = explode(',', $response);
            
            $server1_count = (int) trim($server_counts[0]);
            $server2_count = (int) trim($server_counts[1]);
            
            $total_players = $server1_count + $server2_count;
            
            // 服务器按个数以此类推
            echo '<div class="server">';
            echo '<p>一服 当前在线人数：<strong>' . $server1_count . '</strong> 人</p>';
            echo '</div>';
            
            echo '<div class="server">';
            echo '<p>二服 当前在线人数：<strong>' . $server2_count . '</strong> 人</p>';
            echo '</div>';
            
            // 显示总在线人数
            echo '<p><strong>总在线人数：</strong>' . $total_players . ' 人</p>';
        } else {
            // 如果API调用失败
            echo '<p>无法从API获取数据。</p>';
        }
        ?>
        <div class="footer">
            <p>by: <a href="https://home.kldhsh.top/" target="_blank">开朗的火山河123</a></p>
        </div>
    </div>
</body>
</html>
