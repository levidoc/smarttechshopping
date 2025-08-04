<?php 
class website_theme{
    public function preview_theme(){
        
        //echo @$this->construct_header(); 
        $preview_file = dirname(__FILE__)."/bin/preview.pxy";
        $structure = file_get_contents($preview_file); 
        $x = 
        str_ireplace([
            "[MENU]"
        ],[
            $this->construct_block("MENU")
        ],$structure); 
        echo $x; 
    }

    public function export_block_to_html($block){
        // Function to parse the string and generate HTML
        function parseHeader($dataString) {
            // Replace header tags
            $html = preg_replace('/\[header\]/', '<header>', $dataString);
            $html = preg_replace('/\[\/header\]/', '</header>', $html);
            
            // Replace header-container tags
            $html = preg_replace('/\[header-container\]/', '<div class="header_content container">', $html);
            $html = preg_replace('/\[\/header-container\]/', '</div>', $html);
            
            // Replace header-logo tag
            $html = preg_replace_callback('/\[header-logo\](.*?)\[\/header-logo\]/', function($matches) {
                // Extract img attributes
                //[@img #({$data-alt}="Website Logo",{$data-src}="http://localhost/online-store.varsitymarket.package/control-panel/34cdc5ddd600874f7ac6a5b00361640a4e6bb31ab57ec28ef19ba759b07d6d7ddU1zYnhnMVNxOWpnNVNsWk9hYkt6Zk92YW02ai9ldmtpZFNGczFnd2VqcDBSejFkeWNrMmduUzlUdnAyMFU3SU5mdkpyY2I5MlBFY0RIenNVRW4wWmZ6OXdRNXJVUzBCcWd3SE5JVnhuN2s9/favicon.png")]</logo>

                preg_match('/\[@img #\((.*?)\)\]/', $matches[1], $imgMatches);
                parse_str(str_replace(['{$data-alt}=', '{$data-src}='], ['', ''], str_replace(['(', ')'], ['', ''], $imgMatches[1])), $imgAttributes);
                #print_r($imgAttributes);
                $e = array(array_flip($imgAttributes)); 
                $parts = []; 
                foreach ($e as $key => $value) {
                    $o = (json_encode($value[""],JSON_PRETTY_PRINT));
                    $parts = array_map('trim', explode(',', ($o)));
                    # code...
                }

                #echo json_decode('['.json_encode($e,JSON_PRETTY_PRINT).']',JSON_PRETTY_PRINT); 
                $imgAttributes['data-alt'] = strip_tags($parts[0]);
                $imgAttributes['data-src'] = substr($parts[1],2,(strlen($parts[1]) - 4)); 
               # print_r($imgAttributes)
                return '<logo class="header-logo"><img src=' . $imgAttributes['data-src'] . ' alt=' . $imgAttributes['data-alt'] . '></logo>';
            }, $html);
            
            // Replace header-nav tags
            $html = preg_replace('/\[header-nav\]/', '<nav class="header-nav">', $html);
            $html = preg_replace('/\[\/header-nav\]/', '</nav>', $html);
            
            // Replace header-nav-link tags
            $html = preg_replace_callback('/\[header-nav-link\]\((.*?)\)\[\/header-nav-link\]/', function($matches) {
                parse_str(str_replace(['{$data-link}=', '{$data-anchor}='], ['', ''], $matches[1]), $linkAttributes);
                $e = array(array_flip($linkAttributes)); 
                $parts = []; 
                foreach ($e as $key => $value) {
                    $o = (json_encode($value[""],JSON_PRETTY_PRINT));
                    $parts = array_map('trim', explode(',', stripslashes($o)));
                    # code...
                }

                #echo json_decode('['.json_encode($e,JSON_PRETTY_PRINT).']',JSON_PRETTY_PRINT); 
                $linkAttributes['data-link'] = substr($parts[0],1,(strlen($parts[0]) - 1));
                $linkAttributes['data-anchor'] = substr($parts[1],1,(strlen($parts[1]) - 3));
                return '<a href=' . $linkAttributes['data-link'] . ' class="header-nav-link">' . $linkAttributes['data-anchor'] . '</a>';
            }, $html);
            
            return $html;
        }

        // Generate the HTML
        $headerHTML = parseHeader($block);
        return $headerHTML;
    }

    public function construct_block($guide) {
        $block_file = dirname(__FILE__) . "/bin/" . strtolower($guide) . ".block.pack";
        
        // Check if block file exists
        if (!file_exists($block_file)) {
            throw new Exception("Block file does not exist: $block_file");
        }
        
        $block_data = file_get_contents($block_file); 
        return $this->export_block_to_html($block_data); 
        exit(); 

        $elements_from_bin = [
            "header", "header-container", "header-nav", "header-logo","header-nav-link"
        ]; 
    
        $output = $block_data; 
    
        foreach ($elements_from_bin as $value) {
            $starting_tag = '[' . $value . ']';
            $closing_tag = '[/' . $value . ']'; 
            $anchor_string = "[anchor]";
    
            $pack_source = dirname(__FILE__) . "/bin/" . strtolower($value) . ".elements.pack";
            
            // Check if element pack file exists
            if (!file_exists($pack_source)) {
                throw new Exception("Element pack file does not exist: $pack_source");
            }
    
            $element_structure = $this->construct_element($pack_source, $anchor_string);
            
            #Before Replacing The Data Confirm The Data Endpoints 
            if ((substr(substr($output,strpos($output,$closing_tag) - 1 , 1),-3,1)) == ")"){
                if ((substr($output,strpos($output,$starting_tag) + strlen($starting_tag), 1)) == "("){
                    #The Data Command Structure 
                    $_s_pos = strpos($output,$starting_tag) + strlen($starting_tag);
                    $command = substr($output,$_s_pos,strpos(substr($output,$_s_pos),")") + 1);

                    $data_commands = []; 
                    $e = $this->element_data($pack_source); 
                    foreach ($e['data-inputs'] as $req_in) {
                        $search = '{$'.$req_in."}";  
                        $input_start = strpos($command,$search) + strlen($search) + 2;
                        $data_commands[$req_in] = substr($command,$input_start,strpos(substr($command,$input_start) ,'"')); 
                        # code...
                    }

                    #Data Endpoints Always Have Structures 
                    if (isset($e['structure'])){
                        $se = $e['structure']; 
                        foreach ($data_commands as $d_key => $d_value) {
                            $se = str_ireplace(['{$'.$d_key.'}'],[$d_value],$se); 
                        }
                    }

                    $output = str_ireplace([$command],[$se],$output); 
                }
            }

            $pos = strpos($output,$closing_tag); 
            #echo ($pos); 
            #echo $element_structure; 
            $starting_element_structure = substr($element_structure, 0, strpos($element_structure, $anchor_string)); 
            $ending_element_structure = substr($element_structure, strpos($element_structure, $anchor_string) + strlen($anchor_string)); 
            
            $output = str_ireplace([$starting_tag, $closing_tag], [$starting_element_structure, $ending_element_structure], $output);  
        }
        echo $output; 

        $context = str_ireplace($elements_from_bin, [], $block_data); 
    
        // Write output to file
        file_put_contents("quest.pxy", $output);
    }

    function construct_element_from_string($input_string, $data) {
        // Regex pattern to extract the data-link and data-anchor values 
        preg_match('/\[\w+\]\(\{\$data-link\}="([^"]+)",\{\$data-anchor\}="([^"]+)"\)\[\w+\]/', $input_string, $matches);
        
        if (count($matches) !== 3) {
            throw new Exception("Input string format is incorrect.");
        }
    
        // Extracting the link and anchor text from the matches
        $link = $matches[1]; // The value for data-link
        $anchor_text = $matches[2]; // The value for data-anchor
    
        // Construct the element using the provided data
        return $this->_construct_element('a', $link, $anchor_text);
    }
    
    // Example _construct_element function
    function _construct_element($tag, $href, $text) {
        return "<$tag href=\"$href\">$text</$tag>";
    }

    public function construct_element($element_pack,$_data=false){
        $output = false; 
        $element_file = $element_pack; 
        if (file_exists($element_file)){
            #Reconstruction Process
            $element_data = json_decode(file_get_contents($element_file),JSON_PRETTY_PRINT);
            if (isset($element_data['tag'])){
                $tag = $element_data['tag']; 
                $class_name = $element_data['class'] ?? 'element';
                
                if ($_data == false){
                    $_data = $element_data['text']; 
                }
        
                $constructed = '<'.$tag. ' class="'.$class_name.'">'.$_data.'</'.$tag.'>'; 
                return $constructed; 
            }   
        }    
    }

    public function element_data($element_pack){
        $output = false; 
        $element_file = $element_pack; 
        if (file_exists($element_file)){
            #Reconstruction Process
            $element_data = json_decode(file_get_contents($element_file),JSON_PRETTY_PRINT);
            return $element_data; 
        }    
    }


    public function construct_header(){
        #Start With The Header 
        $styles_file = dirname(__FILE__)."/bin/style/guide.pxy";
        if (file_exists($styles_file)){
            return "<style>".file_get_contents($styles_file)."</style>"; 
        }
    }
}

?>