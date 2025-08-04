<?php 
include_once "function.php";

$name = "immoralclothes"; 
$seed = "Introducing {$name} a brand that redefines sophistication and style. Our clothing line is the epitome of timeless elegance, combining impeccable craftsmanship with a modern flair. We believe in empowering individuals to express their unique personalities through what they wear, and we strive to make every piece a statement of individuality and luxury.

At {$name}, we pay meticulous attention to detail, from the selection of the finest fabrics to the precision of our tailoring. Our designers draw inspiration from diverse cultural influences, creating collections that are a fusion of tradition and innovation. Whether you're looking for the perfect outfit for a special occasion or a wardrobe staple that exudes sophistication, our brand caters to every fashion need.

Quality and sustainability are at the core of our brand ethos. We are committed to using eco-friendly materials and ethical manufacturing processes, ensuring that our creations not only make you look good but also feel good about your choices. {$name} is more than just clothing; it's a lifestyle choice for those who appreciate the artistry and ethics of fashion.

Our collections span a wide range of styles, from classic and understated to bold and avant-garde. Whether you prefer the clean lines of minimalism or the opulence of intricate embellishments, {$name} has something to offer every fashion enthusiast. With our dedication to quality, innovation, and sustainability, we invite you to join us on a journey where fashion meets artistry."; 

$env_data = [
    'description'=>create_content_with_ai('paraphase the following: {'.$seed.'}, description cannot be more than 200 characters'),
    'homepage'=>'https://'.slugify($name).".varsitymarket.club",
    'private'=>true,
]; 

$subdomain = strtolower($name.".penease.digital"); 

#$session = new varsitymarket_github_services(file_get_contents(dirname(__FILE__)."/phase3"));
$session = new varsitymarket_github_services('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'); 

# Creating A New Enviroment
$session->create_enviroment($name,$env_data); 

#Create Custom Domain 
$session->configure_subdomain($subdomain); 

#Update The Repository 
$rep_data = [
    'private'=>false,
    'homepage'=>'https://'.strtolower($subdomain),
];  

$session->update_enviroment($name,$rep_data); 
# Listing Available Enviroments

#Reconfigure Github Pages 
$session->enable_domain(strtolower($subdomain)); 

echo "Completed Transactions"; 
?>