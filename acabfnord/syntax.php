<?
if(!defined('DOKU_INC')) die();
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

require_once (DOKU_INC.'inc/HTTPClient.php');

require_once(DOKU_PLUGIN.'syntax.php');
class syntax_plugin_acabfnord extends DokuWiki_Syntax_Plugin {

  function getInfo(){
    return array(
        'author' => 'ai',
        'email'  => 'ai',
        'date'   => '2010-01-07',
        'name'   => 'acab utils',
        'desc'   => 'fnord',
        'url'    => 'muc.ccc.de',
    );
  }

  function getType(){
    return 'substition';
  }
                                                                                                                                      
  function getSort(){
    return 859;
  }   

  function connectTo($mode) {
    $this->Lexer->addSpecialPattern( '<acab_pixelpaten>', $mode, 'plugin_acabfnord' );
    $this->Lexer->addSpecialPattern( '<acab_camstream>', $mode, 'plugin_acabfnord' );
  } 

  function handle( $match, $state, $pos, &$handler){
    $action = substr( $match, 6, -1 );
    return array(
        'action' => $action,
    );
  }

  function render($mode, &$R, $data){
    if($mode != 'xhtml') return false;
    if(is_null($data)) return false;
    if( $data['action'] == 'pixelpaten' ) {
        $http = new DokuHTTPClient();
        $http->max_bodysize = 2097152;
        $http->timeout = 25; //max. 25 sec
        $http->header[HTTP_HOST] = $this->getConf( 'pixelpaten_url' );
        $response = $http->get( $this->getConf( 'pixelpaten_url' ));
    }
    if( $data['action'] == 'camstream' ) {
        $http = new DokuHTTPClient();
        $http->max_bodysize = 2097152;
        $http->timeout = 25; //max. 25 sec
        $http->header[HTTP_HOST] = $this->getConf( 'pixelpaten_url' );

        $response = '
<div class="acab-camstream">
<object type="application/x-shockwave-flash" height="300" width="400" id="live_embed_player_flash" data="http://www.justin.tv/widgets/live_embed_player.swf?channel=allcoloursarebeautiful" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://www.justin.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="channel=allcoloursarebeautiful&auto_play=false&start_volume=25" /></object><a href="http://www.justin.tv/allcoloursarebeautiful#r=-rid-&s=em" class="trk" style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px; text-decoration:underline; text-align:center;">Watch live video from AllColoursAreBeautiful on Justin.tv</a>
</div>
            ';
    }

    if( !$response ) return false;

    $R->doc .= '<div class="acabfnord">';
    $R->doc .= $response;
    $R->doc .= '</div>';
    }
}
