<?php 
//<h1 class="hero-text">New Year Season</h1>

/*
function block_construction($block_pack){

}



<section class="hero">
<div class="hero_content container">
<div class="hero-description">
  <h1 class="hero-text">New Year Season</h1>
  <h2 class="hero-text">Bringing fashion back to its original and classic form</h2>
  <p class="hero-text">Fashion designers are reviving historical styles and honoring the art of garment design to create a new fashion revolution</p>
</div>
<img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571717/hero-1_abcffh.png" alt="" class="hero-1">
<img src="https://res.cloudinary.com/coderabbi/image/upload/v1641571716/hero-2_v32xws.png" alt="" class="hero-2">
</div>
</section>

exit(); 

$x = [
"action"=>"text",
"tag"=>"h1",
"class"=>"hero-text",
"text"=>"Click To Change Text",
];

echo json_encode($x,JSON_PRETTY_PRINT);  
exit(); 

*/


$x = [
  "action"=>"container",
  "tag"=>"div",
  "class"=>"link",
  "data-types"=>"string",
  "data-inputs"=> [
    "data-anchor","data-link"
  ],
  "structure"=>'<a href="{$data-link}">{$data-anchor}</a>',
  ];
  
  echo json_encode($x,JSON_PRETTY_PRINT);  
  exit(); 
  
?>
