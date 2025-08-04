<?php 
class bloging_notes{
    private $blogging_dir; 
    private $library_file; 
    private $bypass_encoding; 
    private $bypass_decoding; 
    private $_database; 
    private $notes_config; 

    public function __construct()
    {
        $this->blogging_dir = __DIR__."/blog/notes/";
        $this->library_file = $this->blogging_dir.'library.notes';
        $this->bypass_decoding = 'plain_decoding'; 
        $this->bypass_encoding = 'plain_encoding'; 
        $this->create_register_enviroment(); 
        $this->_database = false;
        $this->notes_config = [
            'database'=>'tblarticle'
        ]; 
    }

    public function register_database($module_service){
        $this->_database = $module_service; 
    }
    
    public function plain_encoding($string){
        return $string; 
    }

    public function plain_decoding($string){
        return $string; 
    }

    public function register_encoding($enc_algorithm){
        $this->bypass_encoding = $enc_algorithm; 
    }

    public function register_decoding($enc_algorithm){
        $this->bypass_decoding = $enc_algorithm; 
    }

    private function create_register_enviroment(){
        $public_dir = [
            __DIR__.'/blog',
            __DIR__.'/blog/notes/',
            __DIR__.'/blog/notes/material',
        ]; 

        foreach ($public_dir as $dir) {
            if (is_dir($dir) == false){
                if (file_exists($dir) == false){    
                    mkdir($dir);
                }
            } 
        }
    }

    private function create_note_id(){
        return 'note_'.str_shuffle('absvdvdhegrjirhmfeu'); 
    }

    public function format_to_blog($details,$author,$date,){
        return json_encode(['note'=>['details'=>$details,'author'=>$author,'date'=>$date]],JSON_PRETTY_PRINT); 
    }

    public function insert_note($contents){
        $unique_id = $this->create_note_id(); 
        $e = $this->bypass_encoding; 
        $_e = $this->bypass_decoding;

        $library_contents = []; 

        $_contents = $e($contents); 
        if (file_exists($this->library_file)){
            $library_contents_data = json_decode($_e(file_get_contents($this->library_file)),JSON_PRETTY_PRINT); 
            $library_contents = $library_contents_data; 
            //$library_contents[$unique_id] 
        }
        $library_contents[$unique_id] = [
            'contents' => $e($contents), 
            'mode' => $e('Filesystem'),  
        ]; 

        if ($this->_database == false){
            $library_contents[$unique_id]['mode'] = $e('Filesystem'); 
            #Fall To File System 
            
            $note_dir = $this->blogging_dir.'material'; 
            if (file_exists($note_dir) == false){
                mkdir($note_dir); 
            }
            $note_file = $note_dir.'/'.$unique_id.'.notes'; 
            $x = file_put_contents($note_file,$e($contents)); 

            $library_contents[$unique_id]['path'] = $note_dir; 
            $library_contents[$unique_id]['src'] = $note_file; 
        }else{
            $library_contents[$unique_id]['mode'] = $e('Database');
            $library_contents[$unique_id]['record'] = 'note_'.$unique_id; 
            @$database = $this->_database; 
            @$database->create($this->notes_config['database'],$_contents); 
        }
        
        if (file_put_contents($this->library_file,$e(json_encode($library_contents,JSON_PRETTY_PRINT)))){
            return $unique_id; 
        } 
    }

}