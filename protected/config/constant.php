<?php
/**
 * 项目常量表
 * 
 * @author leig
 */
/*页面路径常量*/
// bootstrap根路径
define('YC_BOOTSTRAP_PATH', "/static/bootstrap/");
// bootstrapCSS样式路径
define('YC_BOOTSTRAP_CSS', "/static/bootstrap/css/");
// bootstrapJS路径
define('YC_BOOTSTRAP_JS', "/static/bootstrap/js/");

// 主题根路径
define('YC_THEME_PATH', "theme/");

/*请求结果返回字段常量*/
// 运行状态-失败
define('YC_STATUS_NG', -1);
// 运行状态-成功
define('YC_STATUS_OK', 1);


/*数据字段常量*/
// 操作字段-停用
define('YC_OPEFLAG_DISABLED', 4);
// 操作字段-启用
define('YC_OPEFLAG_ENABLED', 2);

// 删除字段-已删除
define('YC_DELFLAG_DELETE', 4);
// 删除字段-未删除
define('YC_DELFLAG_NORMAL', 2);