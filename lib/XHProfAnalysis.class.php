<?php
/**
 * XHProf分析逻辑
 *
 * @author  yaoxiaowei
 */
class   XHProfAnalysis {

    /**
     * XHProf性能分析模块启用脚本特征
     */
    private static  $_xhprofMark    = '';

    /**
     * 初始化XHProf模块
     *
     * @param   string  $mark   标识
     */
    public  static  function initialize ($mark) {
    
        if (defined('XHPROF_RATIO') && XHPROF_RATIO > 0 && 1 == mt_rand(1, XHPROF_RATIO)) {

            xhprof_enable(XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
            self::$_xhprofMark  = $mark;
        }
    }

    /**
     * 保存数据
     */
    public  static  function save () {

        if (self::$_xhprofMark !== '') {

            $xhprofData     = xhprof_disable();
            require_once    XHPROF_LIB . '/xhprof_lib/utils/xhprof_lib.php';
            require_once    XHPROF_LIB . '/xhprof_lib/utils/xhprof_runs.php';
            $xhprofRuns     = new XHProfRuns_Default();
            $runId          = $xhprofRuns->save_run($xhprofData, self::$_xhprofMark);
        }
    }
}
