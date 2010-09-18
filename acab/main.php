<? 
    $t = plugin_load( 'action', 'templatefnordhelper' );

    $sidebar = $ACT == 'show' ? true : false;
    #$sidebar = function( ) use ( &$ACT ) { return $ACT == 'show' ? true : false; }

    require_once('header.php');
?>
<header>
<? 
if (file_exists(DOKU_PLUGIN.'displaywikipage/code.php')) include_once(DOKU_PLUGIN.'displaywikipage/code.php');
if (function_exists('dwp_display_wiki_page')) {
    #$t_here = str_replace( ':', '_', $ID );
    #$t_here  = str_replace( '_index', '', $t_here );
    $page = ':acab:layout:widgets01';
    echo "<div id='widgets01' class='widgets $t_here'>";
    if( $INFO['isadmin'] ) {
        // TODO show create buttons for specific pages ...
    }
    dwp_display_wiki_page( $page );
    echo "</div>";
} 
?>
<h1><span class="r">A</span><span class="g">l</span><span class="b">l</span>Colours<span class="r">A</span><span class="g">r</span><span class="b">e</span>Beautiful</h1>
<h3>mit Euch beleuchten wir M&uuml;nchen</h3>
</header>
<div class="topbar">
  <?php html_msgarea();?>
  <?php if( isset( $INFO['userinfo']['pass'] ) && $INFO['userinfo']['pass'] ) { ?>
  <div class="user">
    <!-- <?php tpl_userinfo();?> -->
    <?php tpl_actionlink('edit');?>
    <?php tpl_actionlink('subscription');?>
    <?php tpl_actionlink('profile');?>
    <?php tpl_actionlink('admin');?>
    <?php tpl_actionlink('login');?>
  </div>
    <?php /* <div class="search"><?php tpl_searchform();?></div> */ ?>
  <?php } ?>
</div>




<? $sidebar && require_once('sidebar.php'); ?>

<div id="content" class="dokuwiki act-<?= $ACT ?>">
<? tpl_content( false );?>
<br style='clear:  both; margin: 10px 0; height: 10px;' />
</div>
<? require_once('footer.php');?>
