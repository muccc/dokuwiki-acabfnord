<?
/*
<div id="menu">
  <div id='youarehere'><? tpl_youarehere_lv( ); ?></div>
  <div id='topbar'><? tpl_topbar( ); ?></div>
  <?php tpl_toc( ); ?>
</div>
 */

    $navi_items = array( 
    '/' => array( 'title' => 'Start' ),
    'pixelpate-werden' => array( 'title' => 'Pixelpaten!' ),
    'installation' => array( 'title' => 'Installation' ),
    'mitmachen' => array( 'title' => 'Mitmachen' ),
    'medien' => array( 'title' => 'Medien' ),
    'kontakt' => array( 'title' => 'Kontakt' ),
    'presse' => array( 'title' => 'Presse' ),
    );

    function tpl_navi_item( $t, $deff ) { 
        if( isset( $deff['groups'] )) {
            if( !$INFO['isadmin'] ) {
                // check grps or 
                continue;
            }
        } 
        $t_active = $_SERVER['REQUEST_URI'] == $t 
		|| strpos( $_SERVER['REQUEST_URI'], '/'.$t ) === 0 
		? 'current_page_item' : '';
        if( isset( $deff['title'] )) {
            $t_title = $deff['title'];
        } else {                                                                                     
            $t_title  = str_replace( '/index', '', $t );                                             
        }                                                                                            
        return "<li class='$t_active'><a href='$t' title='$t_title'>$t_title</a></li>";
    }

?><!-- sidebar -->
<aside id="side">
  <nav>
<ul><li class="page_item page-item-130"><a href="" title=""></a></li>
<? foreach( $navi_items as $t => $deff ) { echo tpl_navi_item( $t, $deff ); } ?>
<li class="page_item page-item-130"><a href="" title=""></a></li></ul>
  </nav>
</aside>

