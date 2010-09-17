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

    if( !$response ) return false;

    $R->doc .= '<div class="acabfnord">';
    $R->doc .= $response;
    $R->doc .= '</div>';
    }
}
