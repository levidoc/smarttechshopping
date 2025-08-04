<?php 

class SystemBlockChain
{
    public array $chain;

    public function __construct($genesis_block=FALSE)
    {   
        if ($genesis_block == false){
            $this->chain = [$this->createGenesisBlock()];
        }else{
            $this->chain = [$genesis_block]; 
        }
        
    }

    private function createGenesisBlock(): BlockCells
    {
        return new BlockCells('Genesis Block', '0');
    }

    public function getLatestBlock(): BlockCells
    {
        return $this->chain[count($this->chain) - 1];
    }

    public function addBlock(BlockCells $newBlock): void
    {
        $newBlock->previousHash = $this->getLatestBlock()->hash;
        $newBlock->hash = $newBlock->calculateHash();
        $this->chain[] = $newBlock;
    }

    public function add_items($string){
        $newBlock = new BlockCells($string); 
        $newBlock->previousHash = $this->getLatestBlock()->hash;
        $newBlock->hash = $newBlock->calculateHash();
        $this->chain[] = $newBlock;
    }

    public function isChainValid(): bool
    {
        for ($i = 1, $chainLength = count($this->chain); $i < $chainLength; $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i - 1];

            if ($currentBlock->hash !== $currentBlock->calculateHash()) {
                return false;
            }

            if ($currentBlock->previousHash !== $previousBlock->hash) {
                return false;
            }
        }

        return true;
    }
}

class BlockCells
{
    public $data;
    public string $previousHash;
    public string $hash;

    public function __construct( $data, string $previousHash = '')
    {
        $this->data = $data;
        $this->previousHash = $previousHash;
        $this->hash = $this->calculateHash();
    }

    public function calculateHash(): string
    {   
        
        #Ensure Intensity 
        #$intensity = openssl_encrypt('Hello, World!', 'aes-256-cbc', "Secret Key", 0, openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'))); 
        $intensity = openssl_encrypt($this->previousHash, 'aes-256-cbc', "Secret Key", 0, "VARSITYMARKET001");
        $encode = hash("sha256",$intensity); 
        return hash(
            'sha256', 
            sprintf(
               '%s%s%s',
               $encode,
               $this->previousHash,
               json_encode($this->data),
           )
        );
    }
}

function DebugBlockchain(SystemBlockChain $blockchain): void
{
    foreach ($blockchain->chain as $block) {
        echo "Data: " . json_encode($block->data) . "\n";
        echo "Previous Hash: " . $block->previousHash . "\n";
        echo "Hash: " . $block->hash . "\n\n";
    }
}


#RANDOM BLOCK CHAIN SESSION
/*
    $user_authentication = "PASSWORD";
    $background_services = new SystemBlockChain( new BlockCells($user_authentication));
    #Signal Hashing Start 

    $x = rand(3,32);
    for ($i=0; $i < $x; $i++) { 
        $background_services->addBlock( new BlockCells($user_authentication.$background_services->chain[count($background_services->chain) - 1]->hash)); 
    }

    $background_services->addBlock( new BlockCells($user_authentication)); 
    #Signal Hashing End

    $closing_hash = $background_services->getLatestBlock();
    $closing_hash = $closing_hash->hash;  
    #Close The Hash 

    DebugBlockchain($background_services);

    die(); 

    #Authentication Token: 
    $authentication_token = 
    [
        "data"=>$user_authentication,"final_hash"=>$closing_hash,"intensity"=>$x,
    ]; 

    $guess_hash = "eaf10f5545c81bbb18677a33f19be4f36a9a1dc943f7a76b558b229225ca67e1";
    $background_services_ver = new SystemBlockChain( new BlockCells($user_authentication));
    #Signal Hashing Start 
    for ($i=0; $i < $x; $i++) { 
        $background_services_ver->addBlock( new BlockCells($user_authentication.$background_services_ver->chain[count($background_services_ver->chain) - 1]->hash)); 
    }
    $background_services_ver->addBlock( new BlockCells($user_authentication)); 
    #Signal Hashing End

    $closing_hash = $background_services_ver->getLatestBlock();
    $closing_hash = $closing_hash->hash;  
    #Close The Hash 

    if ($closing_hash == $guess_hash){
        trigger_error("Hash Found"); 
    }

 
print_r($authentication_token); 
*/
?>