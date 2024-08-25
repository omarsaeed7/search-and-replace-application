<?php
function fix_name($name){
    $edit = ucwords(strtolower($name));
    return $edit;
}
// Word count
function word_count($article){

    return str_word_count($article);
}
//echo word_count("what");
// Percentage  of the search result
function percentage(string $article ,string $search){
    $persentage = str_search( $article , $search) * word_count($search) / word_count( $article) * 100;
    
    return $persentage;
}
// ercentage of the replace article
function percentage2(string $article ,string $replace , string $search){
    $persentage = word_count($replace) / word_count(replace2($search , $replace, $article)) * 100;
    return $persentage;
}

// Search Function
function str_search(string $article ,string $search){
    $article = trim($article);
    $search = trim($search);
    $counter = 0;
    while ($counter <= strlen($article)){
        $position = stripos($article, $search, $counter);

        if ($position === false ){
            break;
        }else {
            $pos[] = $position;
            //echo $position . "<br>";
            $counter = $position + 1;
        }

    }
    if ($counter <= 0 && $position === false){
        return 0;
    }
    else{
        return count($pos);
    }
    // $count= count($pos);
    // $article_word_count = word_count($article); // calling word count functoin
    // $persentage = $count / $article_word_count * 100;
    // return $persentage;
}

// Replace Function

function replace (string $article ,string $search)
{
    return str_ireplace( $search, "<mark>$search</mark>" , $article );
}
function replace2(string $search ,string $replace ,string $article )
{
    return str_replace( $search,  $replace , $article );
}

// echo str_replace("what" , "when" , "where is what");
?>
