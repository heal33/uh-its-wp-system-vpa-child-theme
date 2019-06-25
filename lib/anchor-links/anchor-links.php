<?php
/**
 * mwm_aalAdminPanel - Admin Section for Better Anchor Links
 *
 * @package Better Anchor Links
 * @author Luděk Melichar
 * @copyright 2011
 * @since 1.1.0
 */

class mwm_aal {
	var $links= array();
	var $findh = true;
	var $findAnchor = true;
	var $tag = "mwm-aal-display";
	var $htmltag = "<!--mwm_aal_display-->";
	var $isTagUsed = false;
        function __construct() {

        }
	function mwm_aal(){
		add_filter('the_content', array(&$this,'find_content_links'));
		add_shortcode($this->tag, array(&$this,'output_content_links'));
		//add_shortcode($this->htmltag, array(&$this,'output_content_links'));
	}

	function find_content_links($content){

		$this->find_content_name_links($content);
		$content = $this->add_anchors_to_content($content);

		return $content;
	}

	function find_content_name_links($content){
		$pattern='#<h([1-])(?: [^>]+)?>(.+?)</h\1>#is';
		preg_match_all($pattern,$content, $matches, PREG_SET_ORDER);
		$this->links = $matches;



		return $content;
	}

	function add_anchors_to_content($content){
		if(count($this->links) >= 1){
			foreach ($this->links as $val) {
				$rtext='<a class="sub-section anchor-container" id="'.urlencode($this->toAscii(strip_tags($val[2]))).'"></a>';
				$pos = strpos($content, $val[0]);
				$content = substr_replace($content, $rtext, $pos, 0);
			}
		}
		return $content;

	}

	function auto_output_content_links($content){
		if(count($this->links) >= 1){
			$output = $this->output_content_links();
			if(strpos($content, $this->htmltag)){
				$content = $output.$content;
			} else {
				$content = $output.$content;
			}
		}
		return $content;
	}

	function output_content_links(){
		$info = "";

		if(count($this->links) >= 1){
			$info = '<div class="anchor-links-container"><ul>';
			foreach ($this->links as $val) {
					if(empty($minule)) {
						$minule = $val[1];
						$prvni = $val[1];
						$ind = --$prvni;
					}else{$ind = $val[1]-$minule;}
					while ($ind > 0) {$info .='<ul>'; $ind-- ;}
					while ($ind < 0) {$info .='</ul></li>'; $ind++ ;}
					$minule = $val[1];
				$urlval = urlencode($this->toAscii(strip_tags($val[2])));
				$info.='<li><a href="#'.$urlval.'">'.strip_tags($val[2]).'</a>';
			}
			while ($ind < 0) {$info .='</li>'; $ind++ ;}
		$info .= '</ul></div>';
		}
		return $info;
	}

	function output_sidebar_links(){

		if ((count($this->links) >= 1) && (is_single())){
			$info = '<div class="mwm-aal-sidebar-container">';
				foreach ($this->links as $val) {
				$urlval = urlencode($this->toAscii(strip_tags($val[2])));
					$info.='<li><a href="#'.$urlval.'">'.strip_tags($val[2]).'</a></li>';
				}
			$info .= '</ul></div>';
			echo $info;
		}
	}

	function toAscii($str, $replace=array(), $delimiter='-') {
		if( !empty($replace) ) {
			$str = str_replace((array)$replace, ' ', $str);
		}

		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

		return $clean;
	}

}

//Start Loader
global $mwm_aal;
$mwm_aal = new mwm_aal();
$mwm_aal->mwm_aal(); //set hooks

?>
