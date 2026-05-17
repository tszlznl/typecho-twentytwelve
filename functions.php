<?php
/**
 * Twenty Twelve - Typecho Theme Functions
 *
 * @package TwentyTwelve
 * @author 移植自 WordPress Twenty Twelve
 * @version 1.0.0
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function twentytwelve_body_class($archive)
{
    $classes = array();

    if ($archive->is('index')) {
        $classes[] = 'home';
    } elseif ($archive->is('post')) {
        $classes[] = 'single';
    } elseif ($archive->is('page')) {
        $classes[] = 'page';
    } elseif ($archive->is('archive') || $archive->is('search')) {
        $classes[] = 'archive';
    }

    try {
        $db = Typecho_Db::get();
        $row = $db->fetchRow($db->select('COUNT(*) as cnt')->from('table.users'));
        if ($row['cnt'] <= 1) {
            $classes[] = 'single-author';
        }
    } catch (Exception $e) {
    }

    try {
        if ($archive->is('page') && isset($archive->fields->template)
            && $archive->fields->template == 'full-width') {
            $classes[] = 'full-width';
        }
    } catch (Exception $e) {
    }

    return implode(' ', $classes);
}
