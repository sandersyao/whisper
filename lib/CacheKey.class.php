<?php
/**
 * 缓存键管理
 *
 * @author  yaoxiaowei
 */
class   CacheKey {

    /**
     * 含变量
     */
    const   PREFIX_WEIXIN_ACCESS_TOKEN  = 'weixin_access_token_%s';
    const   PREFIX_WEIXIN_OAUTH2_TOKEN  = 'weixin_oauth2_token_%s|%s';
    const   PREFIX_WEIXIN_SESSION       = 'weixin_session_%s|%s';

    /**
     * 不含变量
     */
    const   NONE                        = 'NONE';
}
